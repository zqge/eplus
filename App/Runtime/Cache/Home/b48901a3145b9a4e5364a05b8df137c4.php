<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ege科技网络公司 - 专注于海南网站设计制作、网站推广SEO、网络营销、公司品牌形象VI设计、及空间 、主机、域名服务。</title>
<meta name="description" content="Ege网络工作室是海南最专业的SEO网站推广、网站建设、网络营销团队，他们为金融、教育、体育、招聘、连锁加盟、企事业单位等行业提供搜索引擎营销解决方案。具有大中型网站运维、管理、市场推广等丰富经验，核心技术能够显著提高网站流量及排名。核心成员具有5年的SEO、SEM经验，10年的网站建设、网络营销经验和上百个关键词排名成功的案例。" />
<meta name="keywords" content="海南网站建设，企业建站，网站建设，微信建站
，手机建站" />
<link href="/eplus/App/Home/View/Pc/Default/style/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/eplus/favicon.ico" type="image/x-icon" />
<!--[if lt IE 9]><script type="text/javascript" src="/eplus/App/Home/View/Pc/Default/js/html5.js"></script><![endif]-->
<script type="text/javascript" src="/eplus/App/Home/View/Pc/Default/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/eplus/App/Home/View/Pc/Default/js/jquery.plugin.min.js"></script>
<script type="text/javascript" src="/eplus/App/Home/View/Pc/Default/js/jquery.SuperSlide.2.1.1.js"></script>
</head>

<body id="con">
<!-- nav -->
<header>
	<div class="wrapper">
		<h1 class="logo"><a href="#" title="E格科技网络公司"><img src="/eplus/App/Home/View/Pc/Default/img/logo.png" width="214" height="60" alt="E格科技网络公司" /></a></h1>
    	<nav>
<ul>
  <li class="home hover"><a title="E格科技网络公司" 
  href="/eplus/index.php">首页</a></li>
  <li class="nav1"><a title="关于" 
  href="/eplus/index.php/Page/index/id/104/">关于</a></li>
  <li class="nav2"><a title="服务" 
  href="/eplus/index.php/Page/index/id/105/">服务</a></li>
  <li class="nav3"><a title="案例" 
  href="/eplus/index.php/Product/group/id/76/">案例</a></li>
  <li class="nav4"><a title="联系方式" 
  href="/eplus/index.php/Page/index/id/106/">联系方式</a></li>
  </ul>
		</nav>
  </div>
</header>
<!-- /nav -->
<section id="caseslist">

	<div class="case_logo">
	<!-- 
    	<img src="/img/case_logo1.png" />
    	<img src="/case_logo2.png" />
    	<img src="/case_logo3.png" />
    	 -->
    </div>
    
<ul class="cases2 wrapper">
   <?php if(is_array($productList)): $i = 0; $__LIST__ = $productList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$List): $mod = ($i % 2 );++$i;?><li class="item1">
        	<a href="<?php echo ($List["url"]); ?>" title="<?php echo ($List["product_name"]); ?>">
			<img src="<?php echo ($List["product_pic"]); ?>" data-original="<?php echo ($List["product_pic"]); ?>" alt="<?php echo ($List["product_name"]); ?>" /></a>
        	<p><?php echo ($List["product_intro"]); ?></p>
        	<a href="<?php echo ($List["url"]); ?>"><strong><?php echo ($List["product_name"]); ?></strong>
            </a>
	</li><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="clear"></div>
</ul>
</section>
	<div id="footerinfo">
		<div class="wrapper">
			<div class="adrtel">咨询电话：13876961163	&nbsp;&nbsp;办公地址：海口市琼山区道客新村一巷35号</div>
            <p>技术支持：<a href="http://www.egeweb.cn" target="_blank">Ege科技</a>  <!-- 站长统计代码 --></p>

			<div class="links">
                 友情链接：
<?php
 $_link_m=D('Link')->order(link_sort)->limit("20")->where("link_show=0")->select(); foreach($_link_m as $_link_v): extract($_link_v); ?><li><a href="<?php echo ($link_url); ?>" target="_blank"><?php echo ($link_name); ?></a> </li><?php endforeach;?>    
			</div>
							<p>琼ICP备15001182号</p>
			
		</div>
  </div>

<!-- 
<div id="service2">
	<a class="srvCns" href="http://wpa.qq.com/msgrd?v=3&uin=87567798&site=qq&menu=yes" target="_blank">在线咨询</a>
	<a class="goTop" id="goTop" title="返回顶部" style="display:none">返回顶部	
	</a>
</div>
-->
<script type="text/javascript" src="/eplus/App/Home/View/Pc/Default/js/jquery.plugin.min.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src=/eplus/App/Home/View/Pc/Default/js/killie6.js"></script>
<![endif]-->

<script>
//<![CDATA[
		$("#keywords").focusin(function() {
		  $(this).val()=="在这里搜索..."?$(this).val(""):false;
		});
		$("#keywords").focusout(function() {
			$(this).val($(this).val());
			$(this).val()==""?$(this).val("在这里搜索..."):false;
		});
		$("#info img").lazyload({effect:"fadeIn",failurelimit:10});

//]]>
</script>
</body>
</html>