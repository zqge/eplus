<?php
namespace Home\Controller;
use Think\Controller;
use Common\Lib\Category; //引入类函数
use Common\Controller\FrontendController;
class SearchController extends CommonController {
/**
* 查找结果
* @date: 2016-2-01 上午06:49:55
* @author: zhouqg
* @param: variable
* @return:
*/
	public function result(){
	  	//**分类id
    	$keyword=I('post.keywords');
 	 	$where['news_title']=array('like',"%{$keyword}%");
       	$this->assign('keyword',$keyword);
	   //新闻中心
      
        $m = D('News'); 
		$where['news_del']='0';
		$order='news_sort,news_addtime desc';
		$result=D('News')->where($where)->order($order)->relation(true)->select();
       //分页
        $count = count($result);// 查询满足要求的总记录数
		$Page=getpage($count,'25');
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		
		$result=D('News')->where($where)->order($order)-> limit($Page->firstRow.','.$Page->listRows)->relation(true)->select();
		   foreach ($result as $k=> $v){
		   	$result[$k]['url'] = __APP__.'/News/detail/id/'.$v['id'];
        }
        $this->assign('newsList',$result);

    	$this->display();
    }
}