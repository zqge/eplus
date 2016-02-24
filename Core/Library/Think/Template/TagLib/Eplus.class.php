<?php
/**
 * 自定义标签库
 */
namespace Think\Template\TagLib;
use Think\Template\TagLib;
class Eplus extends TagLib{
    // 标签定义
    protected $tags=array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'verify'=>array('attr'=>'width,height','close'=>0), //闭合标签      验证码
        'config'=>array('attr'=>'name','close'=>0), //闭合标签      验证码
    	'linklist'=>array('attr'=>'limit,order','close'=>1), //不闭合标签      页尾友情链接
        
    );
    
  
    /**
     * 验证码标签
     */
    public function _verify($attr)   {//闭合标签不需要$content
    	$width = empty($attr['width'])? '200' : $attr['width'];
    	$height = empty($attr['height'])? '32' : $attr['height'];
//     	dump($height);
//     	exit;
  	$str="<img src='__APP__/Manage/Verify/code?w={$width}&h={$height}' onclick='this.src=this.src+\"?\"+Math.randon'/>";
     	//实现验证码功能的代码，最后return出去
//$str= "daaa";
    	return $str;
    }
    
    public function _config($attr)   {//闭合标签不需要$content
    
    	$where['config_name'] = $attr['name'];
    	$where['config_lock']="0";
    	$m=$attr['name'];
    	$limit = $attr['name'];
    	$att=D('Config')->where($where)->select();
    	$str=$att[0]["config_value"];
    	return $str;
    } 
   
 	/**
	 * 友情链接标签
	 */
	public function _linklist($attr, $content) {
		$order = empty($attr['order'])? 'link_sort' : $attr['order'];
		$limit = empty($attr['limit'])? '20' : $attr['limit'];
// 		    	dump($order);
// 		    	exit;
		//$attr = $this->parseXmlAttr($attr);
		$str = <<<str
<?php
	
	\$_link_m=D('Link')->order($order)->limit("$limit")->where("link_show=0")->select();
// 	dump(\$_link_m);
// 	exit;
	
	foreach(\$_link_m as \$_link_v):
			extract(\$_link_v);
// 		dump(\$_link_m);
// 		exit;
?>
str;
	
		$str .= $content;
		$str .='<?php endforeach;?>';
	
		return $str;
	}
  
   
}

?>

