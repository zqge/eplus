<?php
namespace Manage\Controller;
use Think\Controller;
class GroupController extends CommonController {
	/**
	 * 岗位管理首页
	 */
    public function index(){
        
		$m = M('Auth_group'); 
    	$list = $m->select();
    	$this->assign('vlist',$list); //赋值
    	$this->display();
    }
  
/**
* 添加岗位
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
  	   $m=M('Auth_group');
  	   $data['title']=I('post.title');
  	   $data['status']=I('post.status');
  	   
    	$arr=$m->data($data)->add();
    	if ($arr){
    		$this->success("新增成功", U('Group/index'));
    	}else {
    		$this->error('新增失败');
    	}
    }
   
    /**
    * 删除岗位
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
    	$m=M('Auth_group');
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
    	$m=D('Auth_group');//读取数据库模型model文件，关联模型。
    	$arr=$m->find($id);
    	$this->assign('v',$arr);
    	$this->display();
    }
    
      /**
     * 处理栏目修改
     */
    public function do_edit(){
        $m=D('Auth_group'); //读取Message表的model模型文件MeesageModel.class.php
        $data['id']=I('post.id');
        $data['title']=I('post.title');
        $data['status']=I('post.status');
        
        $arr=$m->save($data); //自动修改 不需要定义id 因为post表单中已经有
    	if ($arr){
    		$this->success('修改成功',U('Index'));
    	}else {
    		$this->error('修改失败');
    	}
    }
    
   /**
   * 给岗位添加权限
   * @date: 2015-12-10 上午08:14:11
   * @author: zhouqg
   * @param: variable
   * @return:
   */
     public function    getAuth(){
     
     $gid=I('get.id');
       if(empty($gid)){
    		$this->error('请选择要授权的岗位！');
	    }
	  $m = M('Auth_group'); 
      $result = $m->where('id='.$gid)->getField('rules');;
	  $result = explode(",",$result);
	  $this->assign('gid',$gid); //赋值

	  $m = M('Auth_rule'); 
      $where['status']='1';
      $list = $m->where($where)->order('controller asc,id')->select();

        //判断之前是否已经被选中，选中则为1
    	foreach ($list as $k => $v){
    		if (in_array($v['id'],$result)) {   
    		$list[$k]['check']='1';
    		}else{
    		$list[$k]['check']='0';
    		}
    	}
    	
    	$this->assign('vlist',$list); //赋值
     	$this->display();
     	
     }
     
    public function do_getAuth(){
    	$name = I('post.name')    	;	
    	$data['rules'] = implode(',',$name);
        $data['id']=I('post.gid');
    	
        $m=D('Auth_group'); //读取Message表的model模型文件MeesageModel.class.php
        
        $arr=$m->save($data); //自动修改 不需要定义id 因为post表单中已经有
    	if ($arr){
    		$this->success('修改成功',U('Index'));
    	}else {
    		$this->error('修改失败');
    	}
    }
}