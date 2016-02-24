<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>E+CMS网站管理系统 - 轻量级企业网站管理系统,手机网站系统,微信站快速开发系统
</title>
    <meta name="keywords" content="开源免费CMS，企业建站，网站建设，微信建站
">
    <meta name="description" content="E+CMS（简称EP）是一款基于PHP+MySql开发的企业网站内容管理系统，其中免费版是完全开源的...">

    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/eplus/App/Manage/View/Default/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/eplus/App/Manage/View/Default/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/eplus/App/Manage/View/Default/css/animate.min.css" rel="stylesheet">
    <link href="/eplus/App/Manage/View/Default/css/style.min.css?v=4.0.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" width="60px" height="60px" src="<?php echo ($v["admin_pic"]); ?>" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold"><?php echo ($v["admin_name"]); ?></strong></span>
                                <span class="text-muted text-xs block"><?php echo ($v["title"]); ?><b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="J_menuItem" href="<?php echo U('Admin/photo');?>">修改头像</a>
                                </li>
                                <li><a class="J_menuItem"  href="<?php echo U('Admin/personal');?>" target="main">个人资料</a>
                                </li>
                                  <li><a class="J_menuItem"  href="<?php echo U('Admin/pass');?>" target="main">修改密码</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo U('Login/logout');?>">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">E+
                        </div>
                    </li>
                      <li>
                        <a class="J_menuItem" href="<?php echo U('Main/home');?>"  data-index="0"><i class="fa fa-home"></i> <span class="nav-label">首页</span></a>
                    </li>
                     <li>
                        <a href="#">
                            <i class=" fa fa-wrench"></i>
                            <span class="nav-label">系统管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                                  <li>
                                <a href="#">权限管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                      <li>
                                <a class="J_menuItem" href="<?php echo U('Auth/index');?>" target="main" >资源管理</a>
                            		</li>
                            		<li>
                                <a class="J_menuItem" href="<?php echo U('Group/index');?>" target="main" >岗位管理</a>
                                    </li>
                                </ul>
                            </li>
                                  		<li>
                                <a class="J_menuItem" href="<?php echo U('Admin/index');?>" target="main" >用户管理</a>
                                    </li>
                              	<li>
                                <a class="J_menuItem" href="<?php echo U('Column/index');?>" target="main" >栏目管理</a>
                                    </li>
                        </ul>

                    </li>
                         <li>
                        <a href="#"><i class="fa fa-edit"></i>
                         <span class="nav-label">内容管理</span>
                         <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                <a class="J_menuItem" href="<?php echo U('News/index');?>" data-index="0" target="main" >新闻管理 </a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo U('Product/index');?>" target="main" >产品管理</a>
                            </li>
                             <li>
                                <a class="J_menuItem" href="<?php echo U('Page/index');?>" target="main" >单页管理</a>
                            </li>
                              <li>
                                <a class="J_menuItem" href="<?php echo U('Download/index');?>" target="main" >下载管理</a>
                            </li>                 
                                    	<li>
                                <a class="J_menuItem" href="<?php echo U('Message/index');?>" target="main" >留言管理</a>
                                    </li>             
                             <li>
                                <a class="J_menuItem" href="<?php echo U('Trash/index');?>" target="main" >回收站</a>
                            </li>
                         </ul>
                    </li>
                         <li>
                        <a href="#"><i class="fa fa-heart"></i>
                         <span class="nav-label">营销管理</span>
                         <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                <a class="J_menuItem" href="<?php echo U('Link/index');?>" data-index="0" target="main" >友情链接 </a>
                            </li>
                         </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
        
         <div class="row border-bottom" style="display:none">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown hidden-xs">
                            <a class="right-sidebar-toggle" aria-expanded="false">
                                <i class="fa fa-tasks"></i> 主题
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
                </button>
                <nav class="page-tabs J_menuTabs">
                    <div class="page-tabs-content">
                        <a href="javascript:;" class="active J_menuTab" data-id="<?php echo U('Main/home');?>">首页</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
                </button>
                <div class="btn-group roll-nav roll-right">
                    <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>
                    </button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </div>
                <a href="<?php echo U('Login/logout');?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo U('Main/home');?>" frameborder="0" data-id="<?php echo U('Main/home');?>" seamless></iframe>
            </div>
            
            <div class="footer">
                <div class="pull-right">&copy; 2015-2016 <a href="http://www.egeweb.cn/" target="_blank">egeweb</a>
                </div>
            </div>
        </div>
        <!--右侧部分结束-->
        <!--右侧边栏开始-->
        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active">
                        <a data-toggle="tab" href="#tab-1">
                            <i class="fa fa-gear"></i> 主题
                        </a>
                    </li>
              
                </ul>

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> 主题设置</h3>
                            <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                        </div>
                        <div class="skin-setttings">
                            <div class="title">主题设置</div>
                            <div class="setings-item">
                                <span>收起左侧菜单</span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                        <label class="onoffswitch-label" for="collapsemenu">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>固定顶部</span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                        <label class="onoffswitch-label" for="fixednavbar">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>
                        固定宽度
                    </span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                        <label class="onoffswitch-label" for="boxedlayout">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="title">皮肤选择</div>
                            <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                            </div>
                            <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                            </div>
                            <div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色/紫色主题
                        </a>
                    </span>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
        <!--右侧边栏结束-->
    </div>
    <script src="/eplus/App/Manage/View/Default/js/jquery.min.js?v=2.1.4"></script>
    <script src="/eplus/App/Manage/View/Default/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/eplus/App/Manage/View/Default/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/eplus/App/Manage/View/Default/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/eplus/App/Manage/View/Default/js/plugins/layer/layer.min.js"></script>
    <script src="/eplus/App/Manage/View/Default/js/hplus.min.js?v=4.0.0"></script>
    <script type="text/javascript" src="/eplus/App/Manage/View/Default/js/contabs.min.js"></script>
    <script src="/eplus/App/Manage/View/Default/js/plugins/pace/pace.min.js"></script>
</body>

</html>