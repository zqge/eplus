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
 

       <!-- 编辑器 --> 
       <script type="text/javascript" charset="utf-8" src="/eplus/Public/Lib/ueditor/ueditor.config.js"></script>
      <script type="text/javascript" charset="utf-8" src="/eplus/Public/Lib/ueditor/ueditor.all.js"> </script>
      <script type="text/javascript" charset="utf-8" src="/eplus/Public/Lib/ueditor/lang/zh-cn/zh-cn.js"></script>
 <!-- 编辑器 -->
<!-- 头部结束 -->
<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加新闻</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post"  id="form1" action="<?php echo U('News/do_edit');?>"  class="form-horizontal m-t" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">所属栏目:</label>
                                <div class="col-sm-5">
                                    <select class="form-control m-b" name="column_id">
                                <option value="" >==请选择分类==</option>
                             	<?php if(is_array($column)): $i = 0; $__LIST__ = $column;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($v['id'] == $cate['column_id']): ?>selected="selected"<?php endif; ?> >
							<?php echo ($v["html"]); echo ($v["column_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题 ：</label>
                                <div class="col-sm-5">
                                    <input placeholder="请输入文章标题"  value="<?php echo ($cate["news_title"]); ?>" id="news_title" name="news_title" class="form-control" type="text" >
                                </div>
                            </div>
                                   <div class="form-group">
                                <label class="col-sm-2 control-label">作者：</label>
                                <div class="col-sm-5">
                                    <input placeholder="请输入作者名称" value="<?php echo ($cate["news_author"]); ?>" id="news_author" name="news_author" class="form-control" type="text" >
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                  
							
						<div class="form-group">
					                   <!--  编辑器 -->
								<label class="col-sm-1 control-label">内容：</label>
                                <div class="col-sm-10">					
                                 <script id="container" name="news_content"   type="text/plain"><?php echo ($cate["news_content_decode"]); ?></script>
					            <!--  编辑器 -->   
							</div>
							</div>
							
                                   <div class="hr-line-dashed"></div>
                                   <div class="form-group">
                                <label class="col-sm-2 control-label"> 自定义属性:</label>
                                <div class="col-sm-8">
                                <?php if(is_array($attr)): $i = 0; $__LIST__ = $attr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><label class="checkbox-inline">
                                        <input type="checkbox" name='attr[]' value="<?php echo ($v["id"]); ?>" <?php if($v['access']==1): ?>checked="checked"<?php endif; ?>  id="inlineCheckbox1">
                                        <span style="color:<?php echo ($v["attr_color"]); ?>"><?php echo ($v["attr_name"]); ?></span>
										</label><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>    
                                       <div class="form-group">
                                <label class="col-sm-2 control-label">缩略图：</label>
                                <div class="col-sm-5">
                                <input type="file"  class="form-control" value="<?php echo ($cate["news_pic"]); ?>" id="news_pic"  name="news_pic">
                                </div>
                            </div>
                                  <div class="form-group"  style="display:none" id="showImg">
                                 <div class="col-sm-6 col-md-3 col-sm-offset-2">
      								<a href="#" class="thumbnail">
         								<img src="<?php echo ($cate["news_pic"]); ?>" id="show_img"  >
     							 </a>
  						 </div>
                            </div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">文章排行：</label>
                                <div class="col-sm-5">
                                    <input placeholder=" 输入数字，越小越靠前" value="<?php echo ($cate["news_sort"]); ?>"  id="news_sort"  name="news_sort"  value='100' class="form-control" type="text" >
                                </div>
                            </div>
                                            <div class="form-group">
                                <label class="col-sm-2 control-label">点击量：</label>
                                <div class="col-sm-5">
                                    <input id="news_hits"   value="<?php echo ($cate["news_hits"]); ?>" name="news_hits"  value='0' class="form-control" type="text" >
                                </div>
                            </div>
                                               <div class="form-group">
                                <label class="col-sm-2 control-label">关键字：</label>
                                <div class="col-sm-5">
                                    <input id="news_keywords" value="<?php echo ($cate["news_keywords"]); ?>" placeholder="多个关键字用英文逗号相隔"  name="news_keywords"  class="form-control" type="text" >
                                </div>
                            </div>
                                               <div class="form-group">
                                <label class="col-sm-2 control-label">描述：</label>
                                <div class="col-sm-5">
    								<textarea  placeholder="文章描述"   id="news_description" name="news_description"  class="form-control" rows="3"><?php echo ($cate["news_description"]); ?></textarea>
                                 <span class="help-block m-b-none"> 填写关键字与描述有利于SEO优化</span>                           
                              
                                </div>
                            </div>
                                        <div class="form-group">
                                <label class="col-sm-2 control-label">是否外部链接：</label>
                                <div class="col-sm-5">
    								 <div class="input-group m-b">
    								 <span class="input-group-addon"> 
    								 <input type="checkbox"  value="<?php echo ($cate["is_link"]); ?>" <?php if($cate['is_link']==1): ?>checked="checked"<?php endif; ?>  name="is_link"  id="is_link" > </span>
                                      <input placeholder="填写URL地址,文章链接到该地址，谨慎填写！"  type="text"  <?php if($cate['is_link']==0): ?>readonly<?php endif; ?> class="form-control" name="external_links"  id="external_links" value="<?php echo ($cate["external_links"]); ?>">
                                    </div>
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                			<input type="hidden" name="id" value="<?php echo ($cate["id"]); ?>" />		
                                			<input type="hidden" name="d_news_pic" value="<?php echo ($cate["news_pic"]); ?>" />		
                                
                                    <button class="btn btn-primary"  id="save"  type="submit">提交</button>
                                     <input class="btn btn-primary"  type="button" name="return" value="返回" onclick="history.go(-1)">
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
          <script>
        $(document).ready(function(){  
            $("#is_link").click(function(){ //设置外部链接
                if($(this).val()=='0'){
                	$(this).val('1');
                  	$("#external_links").attr("readonly",false);
                    }else{
                    	$(this).val('0');
                    	$("#external_links").val("");
                    	$("#external_links").attr("readonly",true);
                        }
            });

            //初始化，如果有缩位图则显示缩位图
            if($("#show_img").attr("src") != ""){
            		    $("#showImg").show();
                }

            //显示缩位图
            $("#news_pic").change(function(){
            	var objUrl = getObjectURL(this.files[0]) ;
            	if (objUrl) {
            		$("#show_img").attr("src", objUrl) ;
            		$("#showImg").show();
            	}
            }) ;
        });
    </script>
          <!-- 编辑器 --> 
       <script type="text/javascript" charset="utf-8" src="/eplus/Public/Lib/ueditor/ueditor.config.js"></script>
      <script type="text/javascript" charset="utf-8" src="/eplus/Public/Lib/ueditor/ueditor.all.min.js"> </script>
      <script type="text/javascript" charset="utf-8" src="/eplus/Public/Lib/ueditor/lang/zh-cn/zh-cn.js"></script>
      <!-- 实例化编辑器 -->
        <script type="text/javascript">
        var editor = UE.getEditor('container');
    </script>
   <!-- 编辑器 --> 
</body>
<script type="text/javascript">   
  <!--   
        $(document).ready(function(){  
            var v = $("#form1").validate({   //表单验证
                rules:{   
            	news_title:{required:true},   
            	news_author:{required:true},   
            	column_id:{required:true},   
                },messages:{   
                	news_title:{required:"标题必须填写！"},   
                	news_author:{required:"作者必须填写！"},   
                	column_id:{required:"请选择所选栏目！"},   
                	
                }, submitHandler:function(form1){ 
                	form1.submit(); 
                	} 
                });   
        });
  //-->   
  </script>  
</html>