<?php
namespace Manage\Controller;
use Think\Controller;
class TrashController extends CommonController {
/**
* 回收站
* @date: 2015-12-28 上午02:11:24
* @author: zhouqg
* @param: variable
* @return:
*/
    public function index(){
        
        $m = M();
        $prefix = C('DB_PREFIX') ;  //表前缀
        $sql = " select a.*,b.column_name from 
        				(
        				select id,column_id,news_title title,news_deltime deltime,'News' model 
                       from ".$prefix."news where news_del='1'
                       union
                       select id,column_id,product_name title,product_deltime deltime,'Product' model 
                       from ".$prefix."product where product_del='1' 
                       union
                       select id,column_id,page_title title,page_deltime deltime,'Page' model 
                       from ".$prefix."page where page_del='1' 
                       union
                       select id,column_id,download_title title,download_deltime deltime,'Download' model 
                       from ".$prefix."download where download_del='1' 
                       union
                       select id,column_id,message_title title,message_deltime deltime,'Message' model 
                       from ".$prefix."message where message_del='1' 
                       )  a
                       left join ".$prefix."column b
                       on a.column_id  = b.id
                       order by a.deltime desc";
		$result = $m->query($sql); 
		//**分页实现代码
    	$count = count($result);// 查询满足要求的总记录数
    	$Page = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(20)
    	$show = $Page->show();// 分页显示输出
    	$this->assign('page',$show);// 赋值分页输出
    	$this->assign('count',$count);// 赋值分页输出
    	//**分页实现代码
		$sql=$sql.' limit '.$Page->firstRow.','.$Page->listRows;
    	$result = $m->query($sql); 

	    $this->assign('vlist',$result); //赋值
    	$this->display();
    }
    
/**
* 彻底删除
* @date: 2015-12-28 上午07:59:22
* @author: zhouqg
* @param: variable
* @return:
*/
    public function delall(){
        
    	$id= I('post.id');
      	if ($id==null){
    		$this->error('请选择删除项！');
    	}
    	foreach ($id as $k=>$v){
    		$data =  explode(',',$v); 
	   		if($data['0']=='News'){  //判断是删除哪个模型（表）里面的内容
	    			 $news[]=$data['1']; //新闻模型
	    	}else if($data['0']=='Product'){
	    		    $product[]=$data['1']; //产品模型
	    	}else if($data['0']=='Page'){
	    		    $page[]=$data['1']; //单页模型
	    	}else if($data['0']=='Download'){
	    	 	   $download[]=$data['1']; //下载模型
	    	}else if($data['0']=='Message'){
	    	 	   $message[]=$data['1']; //留言板
	    	}
	    	
    	}    
  		//删除News表的内容
    	if(!empty($news)){  
    		$m=M('News');
    	    $where = 'id in('.implode(',',$news).') and news_del=1 ';
    	    $countNews=$m->where($where)->delete(); 
    	    //同时删除属性表里面的信息
    	    $m=M('attr_relevance');
    	    $where = 'relevance_id in('.implode(',',$news).') and model_id='.C('Model_News'); 
    	    $m->where($where)->delete(); 
    	}
  		//删除product表的内容
    	if(!empty($product)){  
    		$m=M('Product');
    	    $where = 'id in('.implode(',',$product).') and product_del=1 ';
    	    $countProduct=$m->where($where)->delete(); 
    	}
      		//删除page表的内容
    	if(!empty($page)){  
    		$m=M('Page');
    	    $where = 'id in('.implode(',',$page).') and page_del=1 ';
    	    $countPage=$m->where($where)->delete(); 
    	}    	
		//删除download表的内容
    	if(!empty($download)){  
    		$m=M('Download');
    	    $where = 'id in('.implode(',',$download).') and download_del=1 ';
    	    $countDownload=$m->where($where)->delete(); 
    	    //同时删除属性表里面的信息
    	    $m=M('attr_relevance');
    	    $where = 'relevance_id in('.implode(',',$download).') and model_id='.C('Model_Download'); 
    	    $m->where($where)->delete(); 
    	}
		//删除Message表的内容
    	if(!empty($message)){  
    		$m=M('Message');
    	    $where = 'id in('.implode(',',$message).') and message_del=1 ';
    	    $countMessage=$m->where($where)->delete(); 
    	    //同时删除属性表里面的信息
    	    $m=M('Message_exp');
    	    $where = 'mes_exp_pid in('.implode(',',$message).')  '; 
    	    $m->where($where)->delete(); 
    	}
    	
    	//一共删除了多少条
    	$count=$countNews+$countProduct+$countPage+$countDownload+$countMessage;
    	if ($count>0){
    		$this->success("成功删除{$count}条！",U('index'));
    	}else {
    		$this->error('批量删除失败！');
    	}
    
    }
    
/**
* 
* @date: 2015-12-28 上午07:59:22
* @author: zhouqg
* @param: variable
* @return:
*/
    public function restore(){	
        
    	$id= I('post.id');
      	if ($id==null){
    		$this->error('请选择还原项！');
    	}
    	foreach ($id as $k=>$v){
    		$data =  explode(',',$v); 
	   		if($data['0']=='News'){ //新闻模型
	    			 $news[]=$data['1']; 
	    	}else if($data['0']=='Product'){//产品模型
	    		    $product[]=$data['1']; 
	    	}else if($data['0']=='Page'){//单页模型
	    		    $page[]=$data['1']; 
	    	}else if($data['0']=='Download'){//单页模型
	    		    $download[]=$data['1']; 
	    	}else if($data['0']=='Message'){//单页模型
	    		    $message[]=$data['1']; 
	    	}
 
    	}   
    	//还原News表的内容
    	if(!empty($news)){  
    		$m=M('News');
    	    $where = 'id in('.implode(',',$news).') and news_del=1 ';
    	    $data['news_del']=0;
    		$countNews=$m->where($where)->save($data); 
    	}
  		//还原product表的内容
    	if(!empty($product)){  
    		$m=M('Product');
    	    $where = 'id in('.implode(',',$product).') and product_del=1 ';
    	 	$data['product_del']=0;
    		$countProduct=$m->where($where)->save($data); 
    	}
  		//还原page表的内容
    	if(!empty($page)){  
    		$m=M('Page');
    	    $where = 'id in('.implode(',',$page).') and page_del=1 ';
    	 	$data['page_del']=0;
    		$countPage=$m->where($where)->save($data); 
    	}
   		//还原download表的内容
    	if(!empty($download)){  
    		$m=M('Download');
    	    $where = 'id in('.implode(',',$download).') and download_del=1 ';
    	 	$data['download_del']=0;
    		$countDownload=$m->where($where)->save($data); 
    	}
   //还原Message表的内容
    	if(!empty($message)){  
    		$m=M('Message');
    	    $where = 'id in('.implode(',',$message).') and message_del=1 ';
    	 	$data['message_del']=0;
    		$countMessage=$m->where($where)->save($data); 
    	}
    	
    	//一共还原了多少条
    	$count=$countNews+$countProduct+$countPage+$countDownload+$countMessage;
   		 if ($count>0){
    		$this->success("成功还原{$count}条！",U('index'));
    		}else {
    		$this->error('还原失败！');
    	}
    }
}