<?php
namespace Manage\Controller;
use Think\Controller;
use Common\Lib\Category; //引入类函数
use Common\Lib\Common; //引入类函数
use Common\Lib\String; //引入类函数
class ProductController extends CommonController {
   private  $modelId; 
   public function _initialize() {
   	parent::_initialize();
    $this->modelId=C('Model_Product');//产品模型
    }
/**
* 产品列表
* @date: 2015-12-25 上午02:11:24
* @author: zhouqg
* @param: variable
* @return:
*/
    public function index(){
         
   	    //栏目选择
   	    $selColumn =  I('post.selColumn');
   	    if(!empty($selColumn) && $selColumn!='0'){
   	    $where['column_id']=$selColumn;
   	    $this->assign('selColumn',$selColumn);
   	    }
   	    //获得栏目列表
    	$m=D('Column')->where(array('model_id'=>$this->modelId))->order('column_sort ASC')->select();
   	    $m=Category::unlimitedForLevel($m,'&nbsp;&nbsp;├─');  
   	    $this->assign('Column',$m);
    	
		$where['product_del']='0';
		$order='product_sort,product_createtime desc';
		$result=D('Product')->where($where)->relation(true)->select();
    	foreach ($result as $k => $v){
    		$result[$k]['news_title'] = Common::substr_ext($v['news_title'], 0, 16, 'utf-8',"");
    	}
//     dump($result);
//     exit;
    	$this->assign('vlist',$result); //赋值
    	$this->display();
    }
    
/**
* 添加产品
* @date: 2015-12-25 上午07:23:45
* @author: zhouqg
* @param: variable
* @return:
*/
    public function add(){	
    	
    	$m=D('Column')->where(array('model_id'=>$this->modelId))->order('column_sort ASC')->select();
    	$m=Category::unlimitedForLevel($m,'&nbsp;&nbsp;├─');  
    	$this->assign('cate',$m);
    
    	$this->display();
    }
    
/**
    * 处理产品
    * @date: 2015-12-25 上午09:41:42
    * @author: zhouqg
    * @param: variable
    * @return:
    */
	    public function do_add(){	
	    C('TOKEN_ON',false);//关闭表单验证
	     //配置文件开启了表单令牌验证 防止表单重复提交
	    $m=D('Product'); 
	    
    	if (!$m->autoCheckToken($_POST)){
    		$this->error('表单重复提交！');
    	}
    	//自动创建  不需要接收表单    	
    	if (!$m->create()){
    		$this->error($m->geterror());
    	}
    	//文件上传
    	 $file=$_FILES['product_pic']['name'];
    	if (!empty($file)) {
    		 $upload=upload_file('Product');
    		 if($upload['success']=='1'){ //文件上传成功
    		 $m->product_pic = $upload['url'];
    		 }else{ //文件上传失败
    		 $this->error($upload['error']);
    		 }
    	}
    	//文件上传结束
	    $arr=$m->relation(true)->add();
    	if ($arr){
    		$this->success("新增成功", U('Product/index'));
    	}else {
    		$this->error('新增失败');
    	}
	    }
/**
* 删除产品到回收站
* @date: 2015-12-22 上午07:59:22
* @author: zhouqg
* @param: variable
* @return:
*/
    public function do_trash(){	
    	
    	$m=D('Product'); 
    	$id = I('post.id');   
    	if(empty($id)){  //如果post方式为空，则验证是否通过get方式传递过来
    		$id = I('get.id');
    	}
    	if ($id==null){
    		$this->error('请选择删除项！');
    	}
    	//判断id是数组还是一个数值
    	if(is_array($id)){
    		$where = 'id in('.implode(',',$id).')';
    		//implode() 函数返回一个由数组元素组合成的字符串
    	}else{
    		$where = 'id='.$id;
    	}
    	$data['product_del']=1;
    	$data['product_deltime']=time();
    	
    	$count=$m->where($where)->save($data); //修改表单用save函数
    	if ($count>0){
    		$this->success("成功删除{$count}条！");
    	}
    	else {
    		$this->error('批量删除失败！');
    	}
    
    }
  
/**
* 修改产品
* @date: 2015-12-25 上午02:24:35
* @author: zhouqg
* @param: variable
* @return:
*/
    public function edit(){
    	
    	$id=I('get.id');
    	$m=D('Product');//读取数据库模型model文件，关联模型。
    	$arr=$m->relation(true)->find($id);
		$arr['product_content_decode'] = html_entity_decode($arr['product_content']);
	
    	$this->assign('cate',$arr);
    	
    	$m=D('Column')->where(array('model_id'=>$this->modelId))->order('column_sort ASC')->select();
    	$m=Category::unlimitedForLevel($m,'&nbsp;&nbsp;├─');  
    	$this->assign('column',$m);
    	
    	$this->display();
    }
/**
* 处理修改产品
* @date: 2015-12-25 上午02:24:35
* @author: zhouqg
* @param: variable
* @return:
*/
public function do_edit(){	
	    C('TOKEN_ON',false);//关闭表单验证
	     //配置文件开启了表单令牌验证 防止表单重复提交
	    $m=D('Product'); 
    	$id=I('post.id');
    	if (!$m->autoCheckToken($_POST)){
    		$this->error('表单重复提交！');
    	}
    	//自动创建  不需要接收表单    	
    	if (!$m->create()){
    		$this->error($m->geterror());
    	}
    	//文件上传
    	 $file=$_FILES['product_pic']['name'];
    	if (!empty($file)) {
    		 $upload=upload_file('Product');
    		 if($upload['success']=='1'){ //文件上传成功
    		 	 delete_file(I('post.d_product_pic'));  //删除被替换的文件
    			 $m->product_pic = $upload['url'];
    		 }else{ //文件上传失败
    		 $this->error($upload['error']);
    		 }
    	}
    	//文件上传结束
	    $arr=$m->save();
    	if ($arr){
    		$this->success("修改成功", U('Product/index'));
    	}else {
    		$this->error('修改失败');
    	}
    	
	    }
}