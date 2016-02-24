<?php
namespace Manage\Controller;
use Think\Controller;
class AuthController extends CommonController {
	/**
	 * 资源管理首页
	 */
    public function index(){
        
		$m = M('Auth_rule'); 
    	$where['status']='1';
    	$list = $m->where($where)->order('controller asc,id')->select();
    	$this->assign('vlist',$list); //赋值
    	$this->display();
    }
  
/**
* 添加权限规则
* @date: 2015-12-9 上午07:25:08
* @author: zhouqg
* @param: variable
* @return:
*/
    public function add(){
        
    	$this->display();
    }
    /**
    * 处理添加
    * @date: 2015-12-10 上午06:17:49
    * @author: zhouqg
    * @param: variable
    * @return:
    */
  public function do_add(){
  	   $m=M('Auth_rule');
  	   $data['name']=I('post.name');
  	   $data['title']=I('post.title');

  	   $arr = explode('/',$data['name']);
  	   $data['controller']=$arr['0'].'/'.$arr['1'];
    	$arr=$m->data($data)->add();
    	if ($arr){
    		$this->success("新增成功", U('Auth/index'));
    	}else {
    		$this->error('新增失败');
    	}
    }
    /**
    * 异步检查name的唯一性。
    * @date: 2015-12-9 上午09:38:17
    * @author: zhm
    * @param: variable
    * @return:
    */
    public function check(){
       $m=M('Auth_rule');
  	   $where['name']=I('post.name');
    	$arr=$m->where($where)->find();
     	if ($arr){
     		  echo "false";
    	}else {
  		    echo "true";
    	}
   }
    /**
    * 删除规则
    * @date: 2015-12-10 上午06:10:02
    * @author: zhm
    * @param: zhouqg
    * @return:
    */
   public function delall(){
   	    
    	$id=I('get.id');
         if(empty($id)){
    		$this->error('请选择要删除的项目！');
	    }
     	//判断id是数组还是一个数值
    	$where = 'id in('.$id.')';
    	$m=M('Auth_rule');
    	
    	$count=$m->where($where)->delete(); 
    	if ($count>0){
    		$this->success("成功删除{$count}条！");
    	}
    	else {
    		$this->error('批量删除失败！');
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
    	$m=D('Auth_rule');//读取数据库模型model文件，关联模型。
    	$arr=$m->find($id);
    	$this->assign('v',$arr);
    	$this->display();
    }
    
      /**
     * 处理栏目修改
     */
    public function do_edit(){
        $m=D('Auth_rule'); //读取Message表的model模型文件MeesageModel.class.php
        $data['title']=I('post.title');
        $data['id']=I('post.id');
        $arr=$m->save($data); //自动修改 不需要定义id 因为post表单中已经有
    	if ($arr){
    		$this->success('修改成功',U('Index'));
    	}else {
    		$this->error('修改失败');
    	}
    }
    
   
}