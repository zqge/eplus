<?php
namespace Manage\Controller;
use Think\Controller;
use Common\Lib\Category; //引入类函数
use Common\Lib\Common; //引入类函数
use Common\Lib\String; //引入类函数
class LinkController extends CommonController {
/**
* 友情链接列表
* @date: 2016-2-4 上午07:21:35
* @author: zhouqg
* @param: variable
* @return:
*/
    public function index(){
        
              // 搜索功能
   	    $keyword =  I('post.keyword');
   	    if( !empty($keyword) ){
   	    	 $where['link_name']=array('like',"%{$keyword}%");
       		 $this->assign('keyword',$keyword);
   	    }
    	
	    $m = D('Link'); 
		$order='link_sort,link_addtime desc';
		$result=$m->where($where)->select();
		//分页
        $count = count($result);// 查询满足要求的总记录数
    	$Page = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(20)
        $show = $Page->show();// 分页显示输出
    	$this->assign('page',$show);// 赋值分页输出
    	$this->assign('count',$count);// 赋值分页输出		
    	
		$result=$m->where($where)->order($order)-> limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('vlist',$result); //赋值
    	$this->display();
    	
    }
  
/**
* 添加处理
* @date: 2016-2-4 上午08:01:06
* @author: zhouqg
* @param: variable
* @return:
*/
  public function do_add(){
	    C('TOKEN_ON',false);//关闭表单验证
	     //配置文件开启了表单令牌验证 防止表单重复提交
	    $m=D('Link'); 
	    
    	if (!$m->autoCheckToken($_POST)){
    		$this->error('表单重复提交！');
    	}
    	
    	//自动创建  不需要接收表单    	
    	if (!$m->create()){
    		$this->error($m->geterror());
    	}
    	
	    $arr=$m->relation(true)->add();
    	if ($arr){
    		$this->success("新增成功", U('Link/index'));
    	}else {
    		$this->error('新增失败');
    	}
    	
    }

/**
* 修改
* @date: 2016-2-4 上午08:01:06
* @author: zhouqg
* @param: variable
* @return:
*/
    public function edit(){
    	
    	$id=I('get.id');
    	$m=D('Link');//读取数据库模型model文件，关联模型。
    	$arr=$m->relation(true)->find($id);
    	$this->assign('cate',$arr);
    	
    	$this->display();
    }
    
public function do_edit(){	
	    C('TOKEN_ON',false);//关闭表单验证
	     //配置文件开启了表单令牌验证 防止表单重复提交
	    $m=D('Link'); //读取News表的model模型文件NewsModel.class.php
    	$id=I('post.id');
    	if (!$m->autoCheckToken($_POST)){
    		$this->error('表单重复提交！');
    	}
    	//自动创建  不需要接收表单    	
    	if (!$m->create()){
    		$this->error($m->geterror());
    	}   	
    	//文件上传结束
	    $arr=$m->save();
    	if ($arr){

    		$this->success("修改成功", U('Link/index'));
    	}else {
    		$this->error('修改失败');
    	}
    	
	    }
	    
	    

/**
* 删除
* @date: 2016-2-4 上午08:59:31
* @author: zhouqg
* @param: _COOKIE
* @return:
*/
public function delete(){		
	    
		$m=D('Link'); 
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

    	$count=$m->where($where)->delete();
    	if ($count>0){
    		$this->success("成功删除{$count}条！");
    	}
    	else {
    		$this->error('删除失败！');
    	}
    
    }
    
}