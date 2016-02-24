<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
   
  public function _initialize(){
        if (ismobile()) {
            //设置默认默认主题为 Mobile
            C('DEFAULT_V_LAYER','View/Mobile');
           //模板路径
           C('DEFAULT_THEME',C('DEFAULT_THEME__MOBILE'));
        }else{
          //设置默认默认主题为 PC
          C('DEFAULT_V_LAYER','View/Pc');
          //模板路径
          C('DEFAULT_THEME',C('DEFAULT_THEME__PC'));
        }              
          C('DEFAULT_V_LAYER','View/Pc');
        
    }    
    /**
    * 过滤html src标签和截取中文函数
    * @date: 2016-1-30 上午06:48:48
    * @author: zhouqg
    * @param: variable
    * @return:
    */
function substr_ext($str, $start=0, $length, $charset="utf-8", $suffix=""){
		if(function_exists("mb_substr")){
			return strip_tags(mb_substr($str, $start, $length, $charset).$suffix);
		}
		elseif(function_exists('iconv_substr')){
			return strip_tags(iconv_substr($str,$start,$length,$charset).$suffix);
		}
		$re['utf-8']  = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		$re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		$re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		preg_match_all($re[$charset], $str, $match);
		$slice = join("",array_slice($match[0], $start, $length));
		return strip_tags($slice.$suffix);
	}
	  
}