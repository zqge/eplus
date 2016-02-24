<?php 
namespace Common\Model;
use Think\Model\RelationModel;
class LinkModel extends RelationModel{//继承relation
		/**
		 * 自动验证
		 */
		protected $_validate=array(
				//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间]),
				array('link_name','require',' 网站名称必须填写！'),
				array('link_url','require','网站ulr必须填写'),
		);

		/**
		 * 关联模型
		 */
		protected $_link = array(
		);
		
		
		/**
		 * 自动完成，在create时自动执行
		 * array('填充字段','填充内容','填充条件','附加规则')
		 */
		protected $_auto=array(
				array('link_addtime','time',1,'function'),
				array('link_name','htmlspecialchars',3,'function'),
		);


	}

?>