<?php
namespace Manage\Controller;
use Think\Controller;
use Common\Lib\Category;
class ColumnController extends CommonController {
/**
* 栏目管理
* @date: 2015-12-23 上午02:11:24
* @author: zhouqg
* @param: variable
* @return:
*/
    public function index(){
        
		$m=D('Column')->alias('a')->field('a.*,b.column_name column_pname')->
		 join('left join ep_column b on b.id = a.parent_id' )->
		order('a.column_sort ASC','a.column_addtime ASC')->relation(true)->select();
		$m=Category::unlimitedForLevel($m,'&nbsp;&nbsp;&nbsp;├─');
    	$this->assign('vlist',$m); //赋值
    	$this->display();
    	
    }
    /**
    * 栏目添加
    * @date: 2015-12-23 上午09:21:48
    * @author: zhouqg
    * @param: variable
    * @return:
    */
   public function add(){
   	     
    	//显示所属栏目
    	$id=I('get.id');
    	if (!$id){
			$id='0';
    	}
        $m=D('Column')->order('column_sort ASC')->select();
    	$m=Category::unlimitedForLevel($m,'&nbsp;&nbsp;├─');  //新闻栏目为1
       $this->assign('cate',$m);
       $this->assign('pid',$id);
       
    	//显示栏目所属模型
    	$m=M('Model')->select();
    	$this->assign('Modellist',$m);

    	$m=D('Column');//读取父类模型id
    	$modelId=$m->find($id);
    	$this->assign('modelId',$modelId['model_id']);
    	
    	$this->display();
    }
 /**
    * 处理添加
    * @date: 2015-12-24 上午09:41:42
    * @author: zhouqg
    * @param: variable
    * @return:
    */
	    public function do_add(){	
	    C('TOKEN_ON',false);//关闭表单验证
	     //配置文件开启了表单令牌验证 防止表单重复提交
	    $m=D('Column'); 
	    
    	if (!$m->autoCheckToken($_POST)){
    		$this->error('表单重复提交！');
    	}
    	//自动创建  不需要接收表单    	
    	if (!$m->create()){
    		$this->error($m->geterror());
    	}
	    $arr=$m->relation(true)->add();
    	if ($arr){
    		$this->success("新增成功", U('Column/index'));
    	}else {
    		$this->error('新增失败');
    	}
    	
	    }
	    /**
	    *  编辑栏目
	    * @date: 2015-12-24 上午02:10:46
	    * @author: zhouqg
	    * @param: variable
	    * @return:
	    */
   public function edit(){
   	     
    	$id=I('get.id');
        $m=D('Column')->order('column_sort ASC')->select();
    	$m=Category::ForUpwardlevel($m,'&nbsp;&nbsp;├─',$id);  //新闻栏目为1
       $this->assign('cate',$m);
       
    	//显示栏目所属模型
    	$m=M('Model')->select();
    	$this->assign('Modellist',$m);

    	$m=D('Column');
    	$attr=$m->relation(true)->find($id);
    	$this->assign('attr',$attr);
    	
    	$this->display();
    }
    
public function do_edit(){	
	    C('TOKEN_ON',false);//关闭表单验证
	     //配置文件开启了表单令牌验证 防止表单重复提交 
       $m=D('Column'); 
	     if (!$m->autoCheckToken($_POST)){
    		$this->error('表单重复提交！');
    	}
    	//自动创建  不需要接收表单    	
    	if (!$m->create()){
    		$this->error($m->geterror());
    	}

	    $arr=$m->save();

    	if ($arr){
    		$this->success("修改成功", U('index'));
    	}else {
    		$this->error('修改失败');
    	}
	    }
/**
* 删除栏目
* @date: 2015-12-24 上午07:59:22
* @author: zhouqg
* @param: variable
* @return:
*/
    public function delete(){		
    	
    	$m=D('Column'); 
		$id = I('get.id');
    	if ($id==null){
    		$this->error('请选择删除项！');
    	}
    	   $m=D('Column')->order('column_sort ASC')->select();
    	   $m=Category::getChilds($m,$id);  
    	   if(!empty($m)){
    		$this->error('该栏目存在子栏目，不可删除！');
    	   }
    	   $m=D('News')->where("column_id=$id")->select();
    	   
    	   if(!empty($m)){
    	       		$this->error('该栏目下有内容，请先删除所有内容（包括回收站）！');
    	   }
 		$m=D('Column');
    	$count=$m->delete($id);
    	if ($count>0){
    		$this->success("删除成功！");
    	}
    	else {
    		$this->error('删除失败！');
    	}
    
    }
    
}