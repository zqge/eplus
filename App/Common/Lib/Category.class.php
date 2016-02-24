<?php 
namespace Common\Lib;
/**
 * 无限极分类
 */
class Category{
			/**
			 * 组合一维数组，用于输出顶级栏目所属的二级栏目
			 */
			Static Public function unlimitedForLevel($m, $html='--', $parent_id=0, $level=0){
				$arr=array();
				foreach ($m as $v){
					if ($v['parent_id'] == $parent_id){
						$v['level']=$level+1;
						$v['html']=str_repeat($html,$level);
						$arr[]=$v;
						$arr=array_merge($arr,self::unlimitedForLevel($m,$html,$v['id'],$level+1));
					}
				}
				return $arr;
			}
			
		/**
			 * 组合一维数组，用于输出顶级栏目所属的二级栏目(不包括自身及子栏目)
			 */
			Static Public function ForUpwardlevel($m, $html='--', $id,$parent_id=0, $level=0){
				$arr=array();
				foreach ($m as $v){
					if ($v['parent_id'] == $parent_id){
						if($v['id']==$id){ //不包括自身及子栏目
							break; 
						}
						$v['level']=$level+1;
						$v['html']=str_repeat($html,$level);
						$arr[]=$v;
						$arr=array_merge($arr,self::ForUpwardlevel($m,$html, $id,$v['id'],$level+1));
					}
				}
				return $arr;
			}
			
	        /**
	         * 多维数组，用于在前台输出含有二级栏目的导航条
	         */
	        Static Public function unlimitedForLayer ($m, $name = 'child', $parent_id = 0) {
	        	$arr = array();
	        	foreach ($m as $v) {
	        		if ($v['parent_id'] == $parent_id) {
	        			$v[$name] = self::unlimitedForLayer($m, $name, $v['id']);
	        			$arr[] = $v;
	        		}
	        	}
	        	return $arr;
	        }
	        
	        /**
	         * 传递一个子分类ID返回所有的父级分类
	         */
	        Static Public function getParents ($m, $id) {
	        	$arr = array();
	        	foreach ($m as $v) {
	        		if ($v['id'] == $id) {
	        			$arr[] = $v;
	        			$arr = array_merge(self::getParents($m, $v['parent_id']), $arr);
	        		}
	        	}
	        	return $arr;
	        }
	        
	        /**
	         * 传递一个父级分类ID返回所有子分类
	         */
	        Static Public function getChilds ($m, $parent_id) {
	        	$arr = array();
	        	foreach ($m as $v) {
	        		if ($v['parent_id'] == $parent_id) {
	        			$arr[] = $v;
	        			$arr = array_merge($arr, self::getChilds($m, $v['id']));
	        		}
	        	}
	        	return $arr;
	        }
	        

	        /**
	         * 传递一个父级分类ID返回所有子分类ID(注意：这里的parent_id是栏目表的父级id,根据数据库表的名字填写)
	         */
	        Static Public function getChildsId ($m, $parent_id) {
	        	$arr = array();
	        	foreach ($m as $v) {
	        		if ($v['parent_id'] == $parent_id) {
	        			$arr[] = $v['id'];
	        			$arr = array_merge($arr, self::getChildsId($m, $v['id']));
	        		}
	        	}
	        	return $arr;
	        }
	        
	        
	        /**
	         * 传递一个子分类ID返回父级分类ID(注意：这里的parent_id是栏目表的父级id,根据数据库表的名字填写)
	         */
	        Static Public function getfId ($m, $id) {
	        	$arr = array();
	        	foreach ($m as $v) {
	        		if ($v['id'] == $id) {
	        			$arr[] = $v['parent_id'];
	        			$arr = array_merge($arr, self::getfId($m, $v['parent_id']));
	        		}
	        	}
	        	return $arr;
	        }
	        
	        
}

//print_r(Category::unlimitedForLevel($m));
//print_r(Category::unlimitedForLayer($m));
 //print_r(Category::getParents($cate,7));
 //print_r(Category::getChildsId($cate,2));
 //print_r(Category::getChilds($cate,2));
//id是栏目id    parent_id是栏目父id   
?>