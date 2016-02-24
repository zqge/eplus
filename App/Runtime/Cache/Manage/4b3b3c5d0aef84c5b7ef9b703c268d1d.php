<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E+CMS网站管理系统 - 轻量级企业网站管理系统,手机网站系统,微信站快速开发系统
</title>
    <meta name="keywords" content="开源免费CMS，企业建站，网站建设，微信建站
">
    <meta name="description" content="E+CMS（简称EP）是一款基于PHP+MySql开发的企业网站内容管理系统，其中免费版是完全开源的...">
    
    <link rel="shortcut icon" href="favicon.ico"> <link href="/eplus/App/Manage/View/Default/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/eplus/App/Manage/View/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/eplus/App/Manage/View/Default/css/animate.min.css" rel="stylesheet">
    <link href="/eplus/App/Manage/View/Default/css/style.min.css?v=4.0.0" rel="stylesheet">
    <link href="/eplus/App/Manage/View/Default/css/defined.css" rel="stylesheet">
    
     <link href="/eplus/App/Manage/View/Default/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
     <link href="/eplus/App/Manage/View/Default/css/plugins/iCheck/custom.css" rel="stylesheet">
     <link href="/eplus/App/Manage/View/Default/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/eplus/App/Manage/View/Default/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="/eplus/App/Manage/View/Default/css/plugins/footable/footable.core.css" rel="stylesheet">
     <link href="/eplus/App/Manage/View/Default/css/plugins/cropper/cropper.min.css" rel="stylesheet"> <!--  一款简单的jQuery图片裁剪插件 -->
    
    <script src="/eplus/App/Manage/View/Default/js/jquery.min.js?v=2.1.4"></script>
    <script src="/eplus/App/Manage/View/Default/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/eplus/App/Manage/View/Default/js/content.min.js?v=1.0.0"></script>
    <script src="/eplus/App/Manage/View/Default/js/common.js"></script>

    <script src="/eplus/App/Manage/View/Default/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/eplus/App/Manage/View/Default/js/plugins/validate/messages_zh.min.js"></script>
    <script src="/eplus/App/Manage/View/Default/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="/eplus/App/Manage/View/Default/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="/eplus/App/Manage/View/Default/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
  
</head>
 

<!-- 头部结束 -->
<body class="gray-bg">
    <div class="row  border-bottom white-bg dashboard-header">
        <div class="col-sm-12">
            <blockquote class="text-warning" style="font-size:14px">欢迎您使用E+内容管理系统！
            </blockquote>

            <hr>
        </div>

    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-4">

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>个人信息</h5>
                    </div>
                    <div class="ibox-content">
                        <p>您好,<?php echo ($v["admin_realname"]); ?></p>
                        <p>上次登录时间：<?php echo (date('Y-m-d H:i:s',$v["admin_olddate"])); ?></p>
                        <p>上次登录IP：<?php echo ($v["admin_oldip"]); ?></p>
                        <p>登录次数：<?php echo ($v["admin_login"]); ?></p>
                        
                    </div>
                </div>
            </div>
            
                <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>站长通知</h5>
                    </div>
                    <div class="ibox-content">
                        <p>基于ThinkPHP框架开发的企业网站管理系统，国内PHP+MYSQL开源建站程序
它具有操作简单、功能强大、稳定性好，二次开发及后期维护方便。</p>
                       
                    </div>
                </div>
            </div>
            
                    <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>开发团队</h5>
                    </div>
                    <div class="ibox-content">
                        <p>版权所有：E格网络工作室</p>
                        <p>官方网站：www.egeweb.cn</p>
                    </div>
                </div>
            </div>
           </div>
           </div>
    <script src="/eplus/App/Manage/View/Default/js/plugins/layer/layer.min.js"></script>
    <script src="/eplus/App/Manage/View/Default/js/welcome.min.js"></script>
</body>

</html>