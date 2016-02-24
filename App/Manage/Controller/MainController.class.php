<?php
namespace Manage\Controller;
use Think\Controller;
class MainController extends CommonController {
	/**
	 * 显示后台管理首页
	 */
    public function index(){

    	$id=$_SESSION['id'];
    	//获得管理员信息
    	$m = M('Admin a'); 
  		$result = $m->field('a.id,a.admin_name,a.admin_realname,a.admin_pic,c.title')->where(array('a.id'=>$id))->
	    join('left join ep_auth_group_access b on a.id = b.uid' )->
	    join('left join ep_auth_group c on c.id = b.group_id ' )->find();
	    
    	if($result['title']=="" || empty($result['title'])){
	   		 $result['title'] = '非授权用户';
  		  }
	    $this->assign('v',$result); //管理员信息
    	
    	$this->display();
    	
    }
    /**
    * 首页
    * @date: 2016-1-20 上午06:52:39
    * @author: zhouqg
    * @param: variable
    * @return:
    */
public function home(){
		$id=$_SESSION['id'];
    	//获得管理员信息
    	$m = M('Admin a'); 
  		$result = $m->where(array('id'=>$id))->find();
	    
    	if($result['title']=="" || empty($result['title'])){
	   		 $result['title'] = '非授权用户';
  		  }
	    $this->assign('v',$result); //管理员信息
    	$this->display();
    	
    }
    
}