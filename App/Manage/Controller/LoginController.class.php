<?php
namespace Manage\Controller;
use Think\Controller;
class LoginController extends Controller {
 /**
 * 后台登陆处理
 * @date: 2015-12-4 上午06:53:17
 * @author: zhouqg
 * @param: variable
 * @return:
 */
    public function do_login(){

    	if (I('post.admin_name')==''){
    		$this->error('请填写用户名');
    	}
    	if (I('post.admin_pass')==''){
    		$this->error('请填写登录密码');
    	}
    	if (I('post.verify')==''){
    		$this->error('请填写验证码');
    	}
    	// 检查验证码
    	$verify = I('post.verify');
//     	dump($verify);
//     	exit;
    	if (!check_verify($verify)) {
			$this->error('验证码不正确');
		}
    	//判断用户是否存在和密码是否正确
    	$m=M('Admin');
    	$admin_name=I('post.admin_name');
    	$admin_pass=I('post.admin_pass');
    	
    	$where['admin_name']=$admin_name;
    	$where['admin_pass']=md5($admin_pass);
    	$arr=$m->field('id,admin_name,admin_date,admin_ip,admin_lock,admin_auth')->where($where)->find();

    	if ($arr) {
    		//**判断管理员是否被锁定
    		if ($arr['admin_lock']==1){
    			$this->error('该管理用户已被锁定');
    		}
    		session_start();
    		$_SESSION['admin_name']=$admin_name;
    		$_SESSION['id']=$arr['id'];
    		$_SESSION['admin_date']=$arr['admin_date'];
    		$_SESSION['admin_ip']=$arr['admin_ip'];
    		$_SESSION['admin_auth']=$arr['admin_auth']; //是否开启权限验证
    		

    		//**将登录的时间和ip插入数据库中
    		$m=M('Admin'); //数据库表，配置文件中定义了表前缀，这里则不需要写
    		$data['id']=$_SESSION['id'];//注明id
    		$data['admin_date']=time();//登录时间
    		$data['admin_ip']=get_client_ip();//登录ip
    		$data['admin_login']=array('exp', 'admin_login+1');
    		$data['admin_olddate']=$_SESSION['admin_date'];//将本次
    		$data['admin_oldip']=$_SESSION['admin_ip'];//将本次
    		$count=$m->save($data); //修改表单用save函数
    		//dump($count);
    		//exit;
    		if ($count>0){
    			$this->success('登录成功',U('Main/index'));
    		}
    		
    	}else {
    		$this->error('用户名或者密码错误');
    	}
    	
    }
    
  /**
     * 退出
     */
    public function logout(){
    	session_start();
    	session_unset();//删除所有session变量
    	session_destroy();//删除session文件
    	$this->success('成功退出',U('Login/index'));
    	
    }
}