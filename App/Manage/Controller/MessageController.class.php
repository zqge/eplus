<?php
namespace Manage\Controller;
use Think\Controller;
use Common\Lib\Category; //引入类函数
use Common\Lib\Common; //引入类函数
use Common\Lib\String; //引入类函数
class MessageController extends CommonController {
   private  $modelId; 
   public function _initialize() {
   	parent::_initialize();
    $this->modelId=C('Model_Message');//留言板模型
    }
/**
* 留言列表
* @date: 2015-12-30 上午02:11:24
* @author: zhouqg
* @param: variable
* @return:
*/
    public function index(){
        
          // 搜索功能
   	    $keyword =  I('post.keyword');
   	    if( !empty($keyword) ){
   	    	 $where['message_title']=array('like',"%{$keyword}%");
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
    	
		$m = D('Message'); 
		$where['message_del']='0';
		$order='message_sort,message_addtime desc';
		$result=D('Message')->where($where)->relation(true)->select();
		//**分页实现代码
    	$count = count($result);// 查询满足要求的总记录数
    	$Page = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(20)
    	$show = $Page->show();// 分页显示输出
    	$this->assign('page',$show);// 赋值分页输出
    	$this->assign('count',$count);// 赋值分页输出
    	//**分页实现代码
		
    	$result=D('Message')->where($where)->relation(true)->limit($Page->firstRow.','.$Page->listRows)->order($order)->select();
    	foreach ($result as $k => $v){
    		$result[$k]['message_title'] = Common::substr_ext($v['message_title'], 0, 16, 'utf-8',"");
    	}
//     dump($result);
//     exit;
    	$this->assign('vlist',$result); //赋值
    	$this->display();
    	
    }
  
  
	    
/**
* 删除到回收站
* @date: 2015-12-22 上午07:59:22
* @author: zhouqg
* @param: variable
* @return:
*/
public function do_trash(){		
	   
		$m=D('Message'); 
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
    	$data['message_del']=1;
    	$data['message_deltime']=time();
    	$count=$m->where($where)->save($data); //修改表单用save函数
    	if ($count>0){
    		$this->success("成功删除{$count}条！");
    	}
    	else {
    		$this->error('批量删除失败！');
    	}
    
    }
    
/**
* 回复留言
* @date: 2015-12-31 上午02:24:35
* @author: zhouqg
* @param: variable
* @return:
*/
    public function edit(){
    	$id=I('get.id');
    	$m=D('Message_exp');//读取数据库模型model文件，关联模型。
    	//留言内容
    	$where['mes_exp_pid'] = $id;
    	$where['mes_exp_type'] = '0';
    	$arr=$m->where($where)->find();
    	$user=Common::get_user($arr['answerer_id'],$arr['answerer_type']);
    	$arr['user']=$user ;
    	$this->assign('v',$arr);
    	//回复的内容
    	$where['mes_exp_type'] = '1';
    	$where['mes_exp_show'] = '0';
    	$arr=$m->where($where)->order('mes_exp_addtime asc')->select();
        foreach ($arr as $k=> $v) {
        	$arr[$k]['user']=Common::get_user($v['answerer_id'],$v['answerer_type']);
        }
    	$this->assign('vlist',$arr);
        
    	//当前管理员信息
    	
    	$admin=Common::get_user($_SESSION['id'],'2');
    	$this->assign('ad',$admin);
    	
    	$this->display();
    }
    
public function do_edit(){	
	   $pid= I('post.mes_exp_pid');
	   $data['mes_exp_pid']=$pid;  //主表id
	   $data['mes_exp_type']='1';  //类型为回复信息
	   $data['mes_exp_content']=I('post.mes_exp_content');  //回复信息
	   $data['mes_exp_addtime']=time();  //类型为回复信息
	   $data['answerer_type']='2';  //回复者类型为管理员
	   $data['answerer_id']=$_SESSION['id'];  //类型为回复信息
	   $data['answerer_ip']=get_client_ip();;  //回复者ip地址
	  //文件上传结束
	    $arr=M('Message_exp')->add($data);
    	if ($arr){
    		//更新主表
    		$data1['message_reply']='1';
    		$data1['message_updatetime']=time();
    		$arr=M('Message')->where(array('id'=>$pid))->save($data1);
    		$this->success("回复成功");
    	}else {
    		$this->error('修改失败');
    	}
    	
	    }
	    
	/**
	* 删除回复信息
	* @date: 2015-12-31 上午03:24:01
	* @author: zhouqg
	* @param: variable
	* @return:
	*/
    public function delete(){	
    	$id= I('get.id');
      	if ($id==null){
    		$this->error('请选择删除项！');
    	}
    		$m=M('Message_exp');
    	    $count=$m->where(array('id'=>$id))->delete(); 
  	  if ($count>0){
    		$this->success("删除成功");
    	}else {
    		$this->error('删除失败！');
    	}
    	
    }
}