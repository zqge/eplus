<?php
namespace Manage\Controller;
use Think\Controller;
use Common\Lib\Category; //引入类函数
use Common\Lib\Common; //引入类函数
use Common\Lib\String; //引入类函数
class NewsController extends CommonController {
   private  $modelId; 
   public function _initialize() {
   	parent::_initialize();
    $this->modelId=C('Model_News');//新闻模型
    }
/**
* 新闻列表
* @date: 2015-12-11 上午02:11:24
* @author: zhouqg
* @param: variable
* @return:
*/
    public function index(){
        
          // 搜索功能
   	    $keyword =  I('post.keyword');
   	    if( !empty($keyword) ){
   	    	 $where['news_title']=array('like',"%{$keyword}%");
       		 $this->assign('keyword',$keyword);
   	    }
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
    	
		$m = D('News'); 
		$where['news_del']='0';
		$order='news_sort,news_addtime desc';
		$result=D('News')->where($where)->relation(true)->select();
		//**分页实现代码
    	$count = count($result);// 查询满足要求的总记录数
    	$Page = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(20)
    	$show = $Page->show();// 分页显示输出
    	$this->assign('page',$show);// 赋值分页输出
    	$this->assign('count',$count);// 赋值分页输出
    	//**分页实现代码
		
    	$result=D('News')->where($where)->relation(true)->limit($Page->firstRow.','.$Page->listRows)->order($order)->select();
    	foreach ($result as $k => $v){
    		$result[$k]['news_title'] = Common::substr_ext($v['news_title'], 0, 16, 'utf-8',"");
    	}
//     dump($result);
//     exit;
    	$this->assign('vlist',$result); //赋值
    	$this->display();
    	
    }
  
    
/**
* 添加文章
* @date: 2015-12-18 上午07:23:45
* @author: zhouqg
* @param: variable
* @return:
*/
    public function add(){	
    	
    	$m=D('Column')->where(array('model_id'=>$this->modelId))->order('column_sort ASC')->select();
    	$m=Category::unlimitedForLevel($m,'&nbsp;&nbsp;├─');  
    	$this->assign('cate',$m);
    	//文章属性
    	$attr=M('Attr')->where(array('model_id'=>$this->modelId))->select(); 
    	$this->assign('attr',$attr);
    	$this->display();
    }
    /**
    * 处理文章
    * @date: 2015-12-18 上午09:41:42
    * @author: zhouqg
    * @param: variable
    * @return:
    */
	    public function do_add(){	
	    C('TOKEN_ON',false);//关闭表单验证
	     //配置文件开启了表单令牌验证 防止表单重复提交
	    $m=D('News'); //读取News表的model模型文件NewsModel.class.php
	    
    	if (!$m->autoCheckToken($_POST)){
    		$this->error('表单重复提交！');
    	}
    	
    	//自动创建  不需要接收表单    	
    	if (!$m->create()){
    		$this->error($m->geterror());
    	}
    	//文件上传
    	 $file=$_FILES['news_pic']['name'];
    	if (!empty($file)) {
    		 $upload=upload_file('News');
    		 if($upload['success']=='1'){ //文件上传成功
    		 $m->news_pic = $upload['url'];
    		 }else{ //文件上传失败
    		 $this->error($upload['error']);
    		 }
    	}
    	//文件上传结束
	    $arr=$m->relation(true)->add();
    	if ($arr){
    	  //插入属性表
	       $a = M('Attr_relevance') ;
		   $result = I('post.attr');
		    foreach ($result as $k=> $v){
		 	   $data[] = array('relevance_id' => $arr,'attr_id' => $v,'model_id' => $this->modelId,); 
		   	 }
		   $result=$a->addAll($data);
  
    		$this->success("新增成功", U('News/index'));
    	}else {
    		$this->error('新增失败');
    	}
    	
	    }
	    
/**
* 删除新闻到回收站
* @date: 2015-12-22 上午07:59:22
* @author: zhouqg
* @param: variable
* @return:
*/
public function do_trash(){		
	    
		$m=D('News'); 
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
    	$data['news_del']=1;
    	$data['news_deltime']=time();
    	$count=$m->where($where)->save($data); //修改表单用save函数
    	if ($count>0){
    		$this->success("成功删除{$count}条！");
    	}
    	else {
    		$this->error('批量删除失败！');
    	}
    
    }
    
/**
* 修改新闻
* @date: 2015-12-23 上午02:24:35
* @author: zhouqg
* @param: variable
* @return:
*/
    public function edit(){
    	
    	$id=I('get.id');
    	$m=D('News');//读取数据库模型model文件，关联模型。
    	$arr=$m->relation(true)->find($id);
		$arr['news_content_decode'] = html_entity_decode($arr['news_content']);
    	$this->assign('cate',$arr);
    	
    	$m=D('Column')->where(array('model_id'=>$this->modelId))->order('column_sort ASC')->select();
    	$m=Category::unlimitedForLevel($m,'&nbsp;&nbsp;├─');  
    	$this->assign('column',$m);
    	
    	//读取原有属性的id  然后跟属性数据库的值对比  有则置值为1  没有则是0
    	$m=D('News');//读取数据库模型model文件，关联模型。
    	$arr=$m->relation(true)->find($id);
    	$arr=$arr['child'];

    	foreach($arr as $k => $v){
    		$arr[$k]=$v['id'];
    	}
    	//文章属性
    	$attr=M('Attr')->where(array('model_id'=>$this->modelId))->select(); 
       	foreach($attr as $k => $v){
    		if (in_array($v['id'],$arr)){
    			$attr[$k]['access'] = '1';
    		}else {
    			$attr[$k]['access'] = '0';
    		}
    	}
    	$this->assign('attr',$attr);


    
    	$this->display();
    }
    
public function do_edit(){	
	    C('TOKEN_ON',false);//关闭表单验证
	     //配置文件开启了表单令牌验证 防止表单重复提交
	    $m=D('News'); //读取News表的model模型文件NewsModel.class.php
    	$id=I('post.id');
    	if (!$m->autoCheckToken($_POST)){
    		$this->error('表单重复提交！');
    	}
    	//自动创建  不需要接收表单    	
    	if (!$m->create()){
    		$this->error($m->geterror());
    	}    	
    	//文件上传
    	 $file=$_FILES['news_pic']['name'];
    	if (!empty($file)) {
    		 $upload=upload_file('News');
    		 if($upload['success']=='1'){ //文件上传成功
    			 delete_file(I('post.d_news_pic'));  //删除被替换的文件
    			 $m->news_pic = $upload['url'];
    		 }else{ //文件上传失败
    			 $this->error($upload['error']);
    		 }
    	}
    	//文件上传结束
	    $arr=$m->save();
    	if ($arr){
    	  //插入属性表
	       $a = M('Attr_relevance') ;
	       $a->where(array('relevance_id'=>$id,'model_id'=>$this->modelId))->delete();
		   $result = I('post.attr');
		    foreach ($result as $k=> $v){
		 	   $data[] = array('relevance_id' => $id,'attr_id' => $v,'model_id' => $this->modelId,); //1表示新闻模型
		   	 }
		   $result=$a->addAll($data);
  
    		$this->success("修改成功", U('News/index'));
    	}else {
    		$this->error('修改失败');
    	}
    	
	    }
    
}