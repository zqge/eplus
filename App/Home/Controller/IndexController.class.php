<?php
namespace Home\Controller;
use Think\Controller;
use Common\Lib\Category; //引入类函数
class IndexController extends CommonController {
    public function index(){
    	//首页轮播图片
    	$where['page_del']='0';
    	$where['column_id']='72';
		$result=D('Page')->where($where)->order('page_sort ASC')->limit(3)->select();
        foreach ($result as $k=> $v){
        	if($k=='0'){  //显示第一张图片
        	$result[$k]['block']='1';
        	}
		   	$result[$k]['page_summary'] = html_entity_decode($result[$k]['page_summary']);
        }
        $this->assign('indexImg',$result);
        
        
        //案例
        $m=D('Column')->order('column_sort ASC')->relation(true)->select();
	    $pid=Category::getChildsId($m, '76');
	    $pid[]='76';
        $where=null;
		$where['product_del']='0';
		$where['column_id']=array('in',$pid);;
		$order='product_sort,product_createtime desc';
		$result=D('Product')->where($where)->order($order)->limit(14)->relation(true)->select();
		   foreach ($result as $k=> $v){
		   	$result[$k]['url'] = __APP__.'/Product/detail/id/'.$v['id'];
        }
        $this->assign('productList',$result);
		
        
        //新闻中心
        $where=null;
        $m = D('News'); 
		$where['news_del']='0';
		$where['column_id']='73';
		$order='news_sort,news_addtime desc';
		$result=D('News')->where($where)->order($order)->relation(true)->select();
		
		   foreach ($result as $k=> $v){
		   	$result[$k]['url'] = __APP__.'/News/detail/id/'.$v['id'];
        }
        $this->assign('newsList',$result);

       //常见问题
        $where=null;
        $m = D('News'); 
		$where['news_del']='0';
		$where['column_id']='75';
		$order='news_sort,news_addtime desc';
		$result=D('News')->where($where)->order($order)->limit('3')->relation(true)->select();		
		   foreach ($result as $k=> $v){
		   	$result[$k]['url'] = __APP__.'/News/detail/id/'.$v['id'];
        }
        $this->assign('cjwtList',$result);
        
   	    
    	$this->display();
    }
}