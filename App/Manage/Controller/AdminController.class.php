<?php
namespace Manage\Controller;
use Think\Controller;
class AdminController extends CommonController {
/**
* 后台用户管理
* @date: 2015-12-11 上午02:11:24
* @author: zhouqg
* @param: variable
* @return:
*/
    public function index(){
        
		$m = M('Admin a'); 
	    $list = $m->field('a.*,c.title')->
	    join('left join ep_auth_group_access b on a.id = b.uid' )->
	    join('left join ep_auth_group c on c.id = b.group_id ' )->group('a.id')->select();
    	$this->assign('vlist',$list); //赋值
    	$this->display();
    	
    }
    
 /**
    * 异步检查name的唯一性。
    * @date: 2015-12-9 上午09:38:17
    * @author: zhm
    * @param: variable
    * @return:
    */
    public function check(){
       $m=M('Admin');
  	   $where['admin_name']=I('post.admin_name');
    	$arr=$m->where($where)->find();
     	if ($arr){
     		  echo "false";
    	}else {
  		    echo "true";
    	}
   }
   
   
    /**
    * 处理添加管理员
    * @date: 2015-12-11 上午06:26:37
    * @author: zhouqg
    * @param: variable
    * @return:
    */
  public function do_add(){
  	   $m=D('Admin'); //调用模型
  	  //自动创建  不需要接收表单    	
      	if (!$m->create()){
    		$this->error($m->geterror());
    	}
    	$arr=$m->relation(true)->add();
    	if ($arr){
    		$this->success("新增成功", U('Admin/index'));
    	}else {
    		$this->error('新增失败');
    	}
    }
    
  /**
    * 删除管理员
    * @date: 2015-12-10 上午06:10:02
    * @author: zhm
    * @param: zhouqg
    * @return:
    */
   public function delall(){
   	   
    	$id=I('get.id');
       if(empty($id)){
    		$this->error('请选择要删除的管理员！');
	    }
     	//判断id是数组还是一个数值
    	$where = 'id in('.$id.')';
    	$m=M('Admin');
    	$count=$m->where($where)->delete(); 
    	if ($count>0){
    		$this->success("成功删除{$count}条！");
    	}
    	else {
    		$this->error('批量删除失败！');
    	}
   }
   /**
   * 授予管理员岗位
   * @date: 2015-12-11 上午06:50:23
   * @author: zhouqg
   * @param: variable
   * @return:
   */
   
 public function addAuth(){
        
        $id=I('get.id');
        if(empty($id)){
        $this->error('未知管理员！');
        }
		$m = M('Auth_group'); 
		$list=$m->select();
    	$this->assign('vlist',$list); 

    	$m = M('Auth_group_access'); 
    	$result=$m->where("uid=$id")->find();
    	$this->assign('gid',$result['group_id']); 
    	$this->assign('uid',$id); 
    	
    	$this->display();
    	
    }
    
   /**
   * 授予管理员岗位
   * @date: 2015-12-11 上午06:50:23
   * @author: zhouqg
   * @param: variable
   * @return:
   */
   
 public function do_addAuth(){
        $data['uid']=I('post.uid');
        $data['group_id']=I('post.group_id');
		$m = M('Auth_group_access'); 
       $arr=$m->add($data,'',true); //add 第三个参数为true时，已存在则更新，否则新增
    	if ($arr){
    		$this->success('授权成功',U('Index'));
    	}else {
    		$this->error('授权失败');
    	}
    }
    
 /**
   *  编辑
   * @date: 2015-12-10 上午06:10:25
   * @author: zhouqg
   * @param: variable
   * @return:
   */
    public function edit(){
    	
    	$id=I('get.id');
    	$m=D('Admin');//读取数据库模型model文件，关联模型。
    	$arr=$m->find($id);
    	$this->assign('v',$arr);
    	$this->display();
    }
/**
* 处理编辑
* @date: 2015-12-11 上午07:39:05
* @author: zhouqg
* @param: variable
* @return:
*/
    public function do_edit(){
        $m=D('Admin'); 
      	  //自动创建  不需要接收表单    	
      	if (!$m->create()){
    		$this->error($m->geterror());
    	}
        $arr=$m->relation(true)->save(); //自动修改 不需要定义id 因为post表单中已经有
 
    	if ($arr){
    		$this->success('修改成功',U('Index'));
    	}else {
    		$this->error('修改失败');
    	}
    }
    
 /**
   *  编辑个人信息
   * @date: 2015-12-10 上午06:10:25
   * @author: zhouqg
   * @param: variable
   * @return:
   */
    public function personal(){
    	$id=$_SESSION['id'];
    	$m=D('Admin');//读取数据库模型model文件，关联模型。
    	$arr=$m->find($id);
    	$this->assign('v',$arr);
    	$this->display();
    }
/**
* 处理编辑个人信息
* @date: 2015-12-11 上午07:39:05
* @author: zhouqg
* @param: variable
* @return:
*/
    public function do_personal(){
        $m=D('Admin'); 
      	  //自动创建  不需要接收表单    	
      	if (!$m->create()){
    		$this->error($m->geterror());
    	}
        $arr=$m->relation(true)->save(); //自动修改 不需要定义id 因为post表单中已经有
    	if ($arr){
    		$this->success('修改成功');
    	}else {
    		$this->error('修改失败');
    	}
    }

/**
* 修改头像
* @date: 2016-1-5 上午09:43:49
* @author: zhouqg
* @param: variable
* @return:
*/
    public function photo(){
    	$id=$_SESSION['id'];
    	$m=D('Admin');//读取数据库模型model文件，关联模型。
    	$arr=$m->find($id);
    	$this->assign('v',$arr);

    
    	$this->display();
    }
    
    
  public function do_photo(){
  	//文件上传
    	 $file=$_FILES['file']['name'];
    	if (!empty($file)) {
    			 $upload=upload_photo($_POST);
    			 $m= D("Admin");
    			 $where['id'] = $_SESSION['id'];
    		 if($upload['success']=='1'){ //文件上传成功
    			 $m->admin_pic = $upload['url'];
    			 $res=$m->where($where)->save();
    			  if($res){
    			       		$this->success('修改成功');
    			  }else{
    			      		$this->error('修改失败');
    			  	
    			  }
    		 }else{ //文件上传失败
    			 $this->error($upload['error']);
    		 }
    	}else{
    	   $this->error('头像没有更改，请上传新图片!');
    	}
    }
    
/**
* 处理修改密码
* @date: 2016-01-18 上午08:00:34
* @author: Zhouqg
* @param: variable
* @return:
*/
	public function do_Pass() {
		//dump($_POST);
		//exit; 
	    $m=M('Admin'); //数据库表，配置文件中定义了表前缀，这里则不需要写
	    $pass_old=I('post.admin_oldpass');
	    $pass_new=I('post.admin_pass');
	    $repass_new=I('post.admin_repass');
	    
	    if($pass_new !=$repass_new){
	    	     $this->error('两次密码不一样！');
	    }
	    
	    $where['id']=$_SESSION['id'];	  
	     $where['admin_pass']=md5($pass_old);
	     $arr =$m->where($where)->find();
	     if(!$arr){
	     	$this->error('旧密码错误！');
	     }	     
	    
    	$data['id']=$_SESSION['id'];	 
    	$data['admin_pass']=md5($pass_new);
    	$count=$m->save($data); //修改表单用save函数
    	if ($count>0){
    		$this->success('修改成功！',U('Admin/pass'));
    	}
    	else {
    		$this->error('修改失败！');
    	}
		
	}
}