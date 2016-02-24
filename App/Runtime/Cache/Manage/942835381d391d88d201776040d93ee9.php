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
                        <div class="ibox-title">
                            <h5>产品列表</h5>
                        </div>
                        <div class="ibox-content">
                        
                              <div class="col-sm-6">
                                <div class="btn-group hidden-xs" id="exampleTableEventsToolbar" role="group">
                                    <button onclick="window.open('/eplus/index.php/manage/product/add','_self')"  type="button" class="btn btn-primary">
										添加
                                    </button>    
                                </div>
                                </div>
                                
                           <form action="<?php echo U('Product/index');?>"  method="post"  id="form_sel" name="form_sel">
                                 <div class="col-sm-3 m-b-xs">
                                <select class="input-sm form-control input-s-sm inline" name="selColumn" id="selColumn">
                                    <option value="0">选择栏目</option>
                                   <?php if(is_array($Column)): $i = 0; $__LIST__ = $Column;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>"   <?php if($v['id'] == $selColumn): ?>selected="selected"<?php endif; ?> >
									<?php echo ($v["html"]); echo ($v["column_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            </form>
                                
                                      <div class="col-sm-3">
                                <div class="input-group">
                                <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="输入搜索词">
                                </div>
                            </div>
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>                                        
                                    <th data-toggle="true">编号</th>
                                    <th>产品名称</th>
                                    <th>所在栏目</th>
                                    <th>价格</th>
                                    <th>点击数</th>
                                    <th>创建时间</th>
                                    <th>更新时间</th>
                                    <th data-hide="all">图片</th>
                                    <th data-hide="all">公司</th>
                                    <th data-hide="all">数量</th>
                                    <th data-hide="all">参数</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                           <?php if(is_array($vlist)): $i = 0; $__LIST__ = $vlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                                   <td><?php echo ($v["id"]); ?></td>
                                    <td><?php echo ($v["product_name"]); ?></td>
                                    <td><?php echo ($v["column_name"]); ?></td>
                                    <td><?php echo ($v["product_price"]); ?></td>
                                    <td><?php echo ($v["product_hits"]); ?></td>
                                    <td><?php echo (date('Y-m-d H:i:s', $v["product_createtime"])); ?></td>
								   <td><?php echo (date('Y-m-d H:i:s', $v["product_updatetime"])); ?></td>
                                    <td><img src="<?php echo ($v["product_pic"]); ?>" 
   width="100" height="100" class="img-thumbnail"></td>
                                    <td><?php echo ($v["product_company"]); ?></td>
                                    <td><?php echo ($v["product_number"]); ?></td>
                                    <td><?php echo ($v["product_parameter"]); ?></td>
                                   <td>
                                        <a href="/eplus/index.php/manage/product/edit/id/<?php echo ($v["id"]); ?>"><i class="fa fa-edit text-navy"></i></a>
                                        <a  href="/eplus/index.php/manage/product/do_trash/id/<?php echo ($v["id"]); ?>" onClick="return confirm('是否确定删除?')"><i class="fa fa-remove color-red"></i></a>
                                     </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="/eplus/App/Manage/View/Default/js/plugins/footable/footable.all.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".footable").footable();
            
          	$('#selColumn').change(function(){
        		$("#form_sel").submit();
            	});
        });
    </script>
</body>

</html>