<?php 
namespace Common\Model;
use Think\Model\RelationModel;
class ColumnModel extends RelationModel{//继承relation
		protected $_validate=array(
				//array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间]),
				array('column_name','require','栏目名称必须填写!'), //成功验证栏目名称是否填写
				array('model_id','require','栏目模型必须填写!'),
				array('parent_id','require','所属栏目必须填写!'),
				array('column_sort','require','栏目排序必须填写!'),
		);
		/**
		 * 模型关联    
		 */
		protected $_link = array(
				'Model'=>array( //dept可以随便取名字
						'mapping_type' => self::BELONGS_TO,//这里跟3.1有点不一样
						'class_name' => 'Model', //要关联的模型类名(即表名)
		
						'mapping_name'=> 'id',//关联的映射名称，用于获取数据用(附表的关联字段)
						'foreign_key'=>'model_id', //关联的外键Id(主表的关联字段)
		
						'mapping_fields'=>array('model_name','model_table'), //关联要查询的字段
						'as_fields'=>'model_name,model_table:url', //直接把关联的字段值映射成数据对象中的某个字段
				),
		);
		
		/**
		 * 自动完成，在create时自动执行   
		 */
		protected $_auto=array(
				array('column_addtime','time',1,'function'),
				array('column_name','htmlspecialchars',3,'function'),
				array('column_ename','htmlspecialchars',3,'function'),
				
		);

		
	}

?>