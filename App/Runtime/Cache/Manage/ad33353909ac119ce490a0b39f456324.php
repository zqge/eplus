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
    <div class="wrapper wrapper-content animated fadeInRight">
       <div class="row">
            <div class="col-sm-12">
       <div class="ibox float-e-margins">
                    <div class="ibox-title  back-change">
                        <h5>修改头像</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">选项 01</a>
                                </li>
                                <li><a href="#">选项 02</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="image-crop">
                                    <img id="image" src="<?php echo ($v["admin_pic"]); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>图片预览：</h4>
                                    <form method="post"  id="form1" action="<?php echo U('Admin/do_photo');?>"  class="form-horizontal m-t" enctype="multipart/form-data">
                                
                                <div class="img-preview" style="height: 160px;width: 160px;"></div>
                                <h4>说明：</h4>
                                <p>
                                    你可以选择新图片上传，然后下载裁剪后的图片
                                </p>
                                
                                <div class="btn-group">
                                    <label title="上传图片" for="inputImage" class="btn btn-primary">
                                        <input type="file" accept="image/*" name="file" id="inputImage" class="hide"> 上传新图片
                                    </label>                                                                        
                                  <input type="hidden"  name="dataX" id="dataX" > 
                                  <input type="hidden"  name="dataY" id="dataY" > 
                                  <input type="hidden"  name="dataWidth" id="dataWidth" > 
                                  <input type="hidden"  name="dataHeight" id="dataHeight" > 
                                    
                                    <label title="提交修改" id="save" class="btn btn-primary">提交修改</label>
                        </form>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-white" id="zoomIn" type="button">放大</button>
                                    <button class="btn btn-white" id="zoomOut" type="button">缩小</button>
                             <!-- 
                                    <button class="btn btn-white" id="rotateLeft" type="button">左旋转</button>
                                    <button class="btn btn-white" id="rotateRight" type="button">右旋转</button>
                                    <button class="btn btn-warning" id="setDrag" type="button">裁剪</button>
                                     -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
</div>
</div>                     
</body>
    <script src="/eplus/App/Manage/View/Default/js/plugins/cropper/cropper.min.js"></script>
   <script>
   $(document).ready(function(){
   var o=$(".image-crop > img");
   var files=
   $(o).cropper({
	   aspectRatio:1,
	   preview:".img-preview"
   });
   var r=$("#inputImage");
   window.FileReader?r.change(function(){
	   var e,
	   i=new FileReader,
	   t=this.files;
	   files=t;
	   t.length&&(e=t[0],/^image\/\w+$/.test(e.type)?(i.readAsDataURL(e),
	   i.onload=function(){o.cropper("reset",!0).cropper("replace",this.result)}):showMessage("请选择图片文件"))})
	   :r.addClass("hide"),
	   $("#download").click(function(){window.open(o.cropper("getDataURL"))}),
	   $("#zoomIn").click(function(){o.cropper("zoom",.1)}),
	   $("#zoomOut").click(function(){o.cropper("zoom",-.1)}),
	   $("#rotateLeft").click(function(){o.cropper("rotate",45)}),
	   $("#rotateRight").click(function(){o.cropper("rotate",-45)}),
	   $("#setDrag").click(function(){o.cropper("setDragMode","crop")});

	$('#save').click(function(){  //删除
							$("#dataX").val(Math.round(o.cropper("getData").x));
							$("#dataY").val(Math.round(o.cropper("getData").y));
							$("#dataWidth").val(Math.round(o.cropper("getData").width));
							$("#dataHeight").val(Math.round(o.cropper("getData").height));
							$("#form1").submit();
	            	});
   });

</script>
</html>