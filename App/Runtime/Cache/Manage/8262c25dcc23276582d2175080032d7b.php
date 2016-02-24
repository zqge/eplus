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
                        <h5>单页列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row"> 
                         <div class="col-sm-6">
                                <div class="btn-group hidden-xs" id="exampleTableEventsToolbar" role="group">
                                    <button onclick="window.open('/eplus/index.php/manage/page/add','_self')"  type="button" class="btn btn-primary">
										添加
                                    </button>    
                                                                    
                                    <button type="button" id="remove" class="btn btn-danger" >
															删除                                 
   									</button>
             
                                </div>
                                </div>
                                <form action="<?php echo U('Page/index');?>"  method="post"  id="form_sel" name="form_sel">
                               <div class="col-sm-3 m-b-xs">
                                <select class="input-sm form-control input-s-sm inline" name="selColumn" id="selColumn">
                                    <option value="0">选择栏目</option>
                                   <?php if(is_array($Column)): $i = 0; $__LIST__ = $Column;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>"   <?php if($v['id'] == $selColumn): ?>selected="selected"<?php endif; ?> >
									<?php echo ($v["html"]); echo ($v["column_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="text" placeholder="请输入关键词" class="input-sm form-control" name="keyword"  value="<?php echo ($keyword); ?>"> 
                                    <span class="input-group-btn"><button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                </div>
                            </div>
                          </form>
                            
                        </div>                                                
                        <div class="table-responsive">
                        <form action="/eplus/index.php/manage/page/do_trash" method="post" id="form_do" name="form_do">
                        
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="i-checks"   id="checkBox" ></th>
                                        <th>编号</th>
                                        <th>标题</th>
                                        <th>栏目</th>
                                        <th>发布时间</th>
                                        <th>更新时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                			<?php if(is_array($vlist)): $i = 0; $__LIST__ = $vlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                                        <td>
                                            <input type="checkbox"  class="i-checks" name="id[]" value="<?php echo ($v["id"]); ?>">
                                        </td>
                                          <td><?php echo ($v["id"]); ?></td>
                                          
                                      <td><?php echo ($v["page_title"]); ?></td>
                                       <td><?php echo ($v["column_name"]); ?></td>
                                        <td><?php echo (date('Y-m-d H:i:s', $v["page_addtime"])); ?></td>
										<td><?php echo (date('Y-m-d H:i:s', $v["page_updatetime"])); ?></td>
                                        <td>
                                        <a href="/eplus/index.php/manage/page/edit/id/<?php echo ($v["id"]); ?>"><i class="fa fa-edit text-navy"></i></a>
                                        <a  href="/eplus/index.php/manage/page/do_trash/id/<?php echo ($v["id"]); ?>" onClick="return confirm('是否确定删除?')"><i class="fa fa-remove color-red"></i></a>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                             </form>
                        </div>     
<div class="green-black"><?php echo ($page); ?>总共<?php echo ($count); ?>条记录</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="/eplus/App/Manage/View/Default/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/eplus/App/Manage/View/Default/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})
            $('#checkBox').on('ifChecked', function(event){ //全选
        		$('input').iCheck('check');
        	});

        	$('#checkBox').on('ifUnchecked', function(event){ //反选
        		$('input').iCheck('uncheck');
        	});
        	$('#remove').click(function(){  //删除
                if(confirm("确定要删除数据吗？"))
                {
                	document.form_do.submit();
                }
            	});

         	$('#selColumn').change(function(){
        		$("#form_sel").submit();
            	});

            });

    </script>
</body>

</html>