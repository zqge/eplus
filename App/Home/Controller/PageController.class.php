<?php
namespace Home\Controller;
use Think\Controller;
use Common\Lib\Category; //引入类函数
use Common\Controller\FrontendController;
class PageController extends CommonController {
/**
* 单页内容
* @date: 2016-1-30 上午06:49:55
* @author: zhouqg
* @param: variable
* @return:
*/
	public function index(){
  	//**查询具体id的单页
    	$id=I('get.id');
		if (!preg_match('/^\d+$/i', $id)){
				$this->error('url参数错误');
				exit;//仿制用户恶意输出url参数
		}  
		$m=D('Page');
    	$arr=$m->relation(true)->find($id);
        $arr['page_content'] =  html_entity_decode($arr['page_content']); //转译过滤字符
   
    	$this->assign('v',$arr);
    	
    	$this->display();
    }
    
}