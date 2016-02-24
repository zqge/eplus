<?php
return array(
		
		'URL_PATHINFO_DEPR'=>'/',//修改URL的分隔符
		'URL_CASE_INSENSITIVE' =>true,//实现URL访问不再区分大小写
		'URL_HTML_SUFFIX'=>'html|shmtl|xml', // 限制伪静态文件的后缀名
		'URL_MODEL'=>1,//url模式，0是普通模式，1是rwe模式，2是被书写模式，隐藏index.php入口文件
		'URL_ROUTER_ON'=>true,//开启url路由
		'URL_ROUTE_RULES'=>array(
		
		),

);
?>