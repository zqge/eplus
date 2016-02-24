<?php
return array(
	//'配置项'=>'配置值'
		'TMPL_PARSE_STRING' =>  array( // 添加输出替换
				'__UPLOAD__'    =>  __ROOT__.'/Uploads',
				'__PC__' => __ROOT__. '/App/'.'Home/View/Pc'.'/'.C('DEFAULT_THEME__PC'),
				'__MOBILE__' =>__ROOT__. '/App/'.'Home/View/Mobile'.'/'.C('DEFAULT_THEME__MOBILE'),

		),
);