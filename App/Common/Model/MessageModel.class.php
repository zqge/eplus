<?php 
namespace Common\Model;
use Think\Model\RelationModel;
class MessageModel extends RelationModel{//继承relation
		/**
		 * 自动验证
		 */
		protected $_validate=array(
				//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间]),
		);
		/**
		 * 关联模型
		 */
		protected $_link = array(
				'Column'=>array( //dept可以随便取名字
						'mapping_type' => self::BELONGS_TO,//这里跟3.1有点不一样
						'class_name' => 'Column', //要关联的模型类名(即表名)
				
						'mapping_name'=> 'id',//关联的映射名称，用于获取数据用(附表的关联字段)
						'foreign_key'=>'column_id', //关联的外键Id(主表的关联字段)
				
						'mapping_fields'=>array('column_name'), //关联要查询的字段
						'as_fields'=>'column_name', //直接把关联的字段值映射成数据对象中的某个字段
				),
		);
		
	}

?>