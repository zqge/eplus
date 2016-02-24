<?php
namespace Manage\Controller;
use Think\Controller;
class CommonController extends Controller {
	/**
	 * 公共验证控制器CommonAction
	 */
	Public function _initialize(){
		header("Content-Type:text/html; charset=utf-8");
		//session_start();
		if (!isset($_SESSION['admin_name']) || $_SESSION['admin_name']==''){
			$this->error('请勿无权访问！你的ip已被记录',U('Login/index'));	
		}
		$this->auth();
	}
/**
* 初始化权限系统
* @date: 2015-12-9 上午03:47:30
* @author: zhouqg
* @param: variable
* @return:
*/
	Public function auth(){
    	$adminAuth = $_SESSION['admin_auth'];
		$auth =  new \Think\Auth();  //初始化权限系统
		$name=MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
    	$uid=$_SESSION['id'];
    	
    	$where['name']=$name;
    	$where['status']='1';
    	$m=D('Auth_rule')->where($where)->find();
    	if($m){  //只对已经添加的规则做权限判断
    		if(!$auth->check( $name, $uid)){
    	  		$this->error('没有权限');
    		}
    	}
	
	}
		
}