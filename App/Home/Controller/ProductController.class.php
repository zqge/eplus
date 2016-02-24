<?php
namespace Home\Controller;
use Think\Controller;
use Common\Lib\Category; //引入类函数
use Common\Controller\FrontendController;
class ProductController extends CommonController {
/**
* 产品内容
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
		$m=D('Product');
		$m->where(array('id'=>$id))->setInc('product_hits'); //点击数+1
    	$arr=$m->relation(true)->find($id);//查询出具体id的文章，获取该文章所在的栏目id数值nv_id
    	$arr['product_name'] = $this->substr_ext($arr['product_name'], 0, 220, 'utf-8',"");
    	$arr['product_content'] = html_entity_decode($arr['product_content']); //转译过滤字符
		$this->assign('v',$arr);

			
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
	   $m=D('Column')->order('column_sort ASC')->relation(true)->select();
	   $pid=Category::getChildsId($m, $id);
	   $pid[]=$id;


	   //列表
        $where=null;
		$where['product_del']='0';
		$where['column_id']=array('in',$pid);;
		$order='product_sort,product_createtime desc';
		$result=D('Product')->where($where)->order($order)->relation(true)->select();
		   foreach ($result as $k=> $v){
		   	$result[$k]['url'] = __APP__.'/Product/detail/id/'.$v['id'];
        }
        $this->assign('productList',$result);
		
    	$this->display();
    }
}