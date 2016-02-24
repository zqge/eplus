<?php
namespace Common\Model;
use Think\Model\RelationModel;
class AdminModel extends RelationModel{//继承relation
		/**
		 * 自动验证   by Eplus
		 */
		protected $_validate=array(
				//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间]),
				array('admin_name','','用户已经存在',0,'unique',1), //成功验证是否存在用户名
				//array('repassword','password','确认密码不正确',0,'confirm'),
				array('admin_name','require','用户名必须填写'),
				array('admin_pass','require','密码必须填写'),
				array('admin_realname','require','真实姓名必须填写'),
				array('admin_email','checkemail','电子邮件检测失败',0,'callback',0),
		);
		
		/**
		 * 处理checkemail回调函数   
		 */
		protected function checkemail(){
			$email=$_POST['admin_email'];
			if(!preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email)){
				return false;
			}else{
				return true;
			}
		}

		/**
		 * 处理验证条件中callback函数checkCode 
		 */
		protected function checkCode($verify){
			if(md5($verify)!=$_SESSION['verify']){
				return false;
			}else{
				return true;
			}
		}
			
		
		/**
		 * 自动完成密码md5加密和危险字符过滤处理   
		 */
		protected $_auto = array (
				array('admin_pass','md5',1,'function') , //对password字段在新增的时候使md5函数处理
				array('admin_rsdate','time',1,'function'), 
				array('admin_login','0',1),
				
		);
		

	}
?>

