<?php
namespace Home\Controller;
use Think\Controller;
use Common\Lib\Category; //引入类函数
use Common\Controller\FrontendController;
class NewsController extends CommonController {
/**
* 文章内容
* @date: 2016-1-30 上午06:49:55
* @author: zhouqg
* @param: variable
* @return:
*/
	public function detail(){
	  	//**查询具体id的文章
    	$id=I('get.id');
		if (!preg_match('/^\d+$/i', $id)){
				$this->error('url参数错误');
				exit;//仿制用户恶意输出url参数
		}  
    	//内容	
		$m=D('News');
		$m->where(array('id'=>$id))->setInc('news_hits'); //点击数+1
    	$arr=$m->relation(true)->find($id);//查询出具体id的文章，获取该文章所在的栏目id数值nv_id
    	$arr['news_title'] = $this->substr_ext($arr['news_title'], 0, 220, 'utf-8',"");
    	$arr['news_content'] = html_entity_decode($arr['news_content']); //转译过滤字符
		$this->assign('v',$arr);
		
			//获取上下级栏目
			$m=D('Column')->order('column_sort ASC')->relation(true)->select();
			//$m=Category::getChilds($m,$id);//获取id所有的下级栏目的信息
			$m=Category::getParents($m,$arr['column_id']);//获取id所有的下级栏目的信息
			foreach ($m as $k=> $v){
	   		$m[$k]['url'] = __APP__.'/News/group/id/'.$v['id'];
        }
     
			$this->assign('clist',$m);
			
		//相关列表
			$m=D('News');
			$where['news_del']='0';
			$where['id']=array('neq',$id);
			$order='news_sort,news_updatetime desc';
			$list=$m->where($where)->order($order)->limit('10')->relation(true)->select();
	 	  foreach ($list as $k=> $v){
		   		$list[$k]['url'] = __APP__.'/News/detail/id/'.$v['id'];
        	}
			$this->assign('vlist',$list);
			
    	$this->display();
    }
    
    
/**
* 文章内容
* @date: 2016-2-01 上午06:49:55
* @author: zhouqg
* @param: variable
* @return:
*/
	public function group(){
	  	//**分类id
    	$id=I('get.id');
		if (!preg_match('/^\d+$/i', $id)){
				$this->error('url参数错误');
				exit;//仿制用户恶意输出url参数
		}  
		
	   //新闻中心
        $where=null;
        $m = D('News'); 
		$where['news_del']='0';
		$where['column_id']=$id;
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
		
		
		//获取上下级栏目
		$m=D('Column')->order('column_sort ASC')->relation(true)->select();
		//$m=Category::getChilds($m,$id);//获取id所有的下级栏目的信息
		$m=Category::getParents($m,$id);//获取id所有的下级栏目的信息
		foreach ($m as $k=> $v){
	   		$m[$k]['url'] = __APP__.'/News/group/id/'.$v['id'];
        }

        $this->assign('clist',$m);
		
	//相关列表
		$m=D('News');
		$where['news_del']='0';
		$where['id']=array('neq',$id);
		$order='news_sort,news_updatetime desc';
		$list=$m->where($where)->order($order)->limit('10')->relation(true)->select();
 	  foreach ($list as $k=> $v){
	   		$list[$k]['url'] = __APP__.'/News/detail/id/'.$v['id'];
        }
		$this->assign('vlist',$list);
		
    	$this->display();
    }
}