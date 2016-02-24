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

<body id="index">
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
<section id="banner">
	<ul id="banner_img">
   <?php if(is_array($indexImg)): $i = 0; $__LIST__ = $indexImg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li  <?php if($v['block'] == '1' ): ?>style="display: block;"<?php endif; ?> >
  <div class="wrapper">
  <div class="ad_txt">
  <?php echo ($v["page_summary"]); ?>
  </div>
  <div class="ad_img">
  <a title="<?php echo ($v["page_title"]); ?>"  href="<?php echo ($v["page_url"]); ?>"  >
  <img alt="<?php echo ($v["page_title"]); ?>" src="<?php echo ($v["page_pic"]); ?>">
  </a>
  </div>
  </div>
  </li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
	<div id="banner_ctr">
		<div id="drag_ctr"></div>
	<ul>
	   <?php if(is_array($indexImg)): $i = 0; $__LIST__ = $indexImg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v["page_title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
 </ul>
		<div id="drag_arrow"></div>
	</div>
</section>
<section id="service">
	<ul>
		<li class="cur">
			<a href="#" title="网站建设/网站设计">
        	<h3 class="website">网站建设</h3>
            <p>提供全方位一站式企业信息化解决方案，帮您建设属于自己的信息化平台。深入剖析企业需求，致力于树立良好的企业品牌形象，完善企业对内外的传播需求。积极协助企业找到发展战略核心，从战略的角度树立企业的品牌形象。</p>
            </a>
		</li>
		<li>
        <a href="#" title="微信公众平台开发"  >
		<h3 class="weixin">微信 / 微站</h3>
		<p>让您紧握移动互联网的脉搏，赢在微时代，公众平台搭配我们自己开发的后台如虎添翼，在保留公众平台所有的优势前提下，全方位的O2O解决方案，铸就新的传奇。</p>
		</a>
		</li>
        <li>
        <a href="#" title="网站推广/网站优化">
<h3 class="seo">网站推广</h3>
            <p>做完网站就够了吗？网站推广的意义等同于广告！成千上万的同行网站，让客户立刻找到你！点击免费，提高网站在所有搜索引擎的排名。</p>
            </a>
		</li>
        <li class="arrow"></li>
	</ul>
</section>

<section id="caseslist">
	<ul class="cases">
  <li><a title="E格科技网络公司建设成功案例" href="/eplus/index.php/Product/group/id/76"><img alt="E格科技网络公司建设成功案例" 
  src="/eplus/App/Home/View/Pc/Default/img/icase_t.gif">
  </a>
  </li>
     <?php if(is_array($productList)): $i = 0; $__LIST__ = $productList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$List): $mod = ($i % 2 );++$i;?><li class="item1"><img alt="<?php echo ($List["product_name"]); ?>" src="<?php echo ($List["product_pic"]); ?>" 
  data-original="<?php echo ($List["product_pic"]); ?>">
  <p><a title="<?php echo ($List["product_name"]); ?>" 
  href="<?php echo ($List["url"]); ?>"><?php echo ($List["product_name"]); ?></a></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
</section>
<section id="news">
	<div class="newsdata">
    <div class="questionlist">
		<h2 class="cat_title"><span><a class="more" href="/eplus/index.php/News/group/id/73">more+</a></span>新闻中心</h2>
<div class="clear"></div>
<ul>
   <?php if(is_array($newsList)): $i = 0; $__LIST__ = $newsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$List): $mod = ($i % 2 );++$i;?><li>
  <a title="<?php echo ($List["news_title"]); ?>" href="<?php echo ($List["url"]); ?>" 
  target="_blank">· <?php echo ($List["news_title"]); ?></a>
  </li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
		</div>
        <div id="newsbox">
        <h2 class="cat_title"><span><a class="more" href="/eplus/index.php/News/group/id/75">more+</a></span>常见问题</h2> 
		<ul>
<?php if(is_array($cjwtList)): $i = 0; $__LIST__ = $cjwtList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$List): $mod = ($i % 2 );++$i;?><li>
  	 <?php if(empty($List['news_pic'] ) != true): ?><a href="<?php echo ($List["url"]); ?>" target="_blank"><img src="<?php echo ($List["news_pic"]); ?>"  width="90" ></a><?php endif; ?>	
  <div class="newslist"><a title="<?php echo ($List["news_title"]); ?>" href="<?php echo ($List["url"]); ?>"><?php echo ($List["news_title"]); ?></a><span>uptated:<?php echo (date('Y-m-d H:i:s',$List["news_addtime"])); ?></span>
  <p><?php echo ($List["news_description"]); ?></p>
  </div>
  </li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
		</div>
	</div>
    <div class="clear"></div>
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


<div id="service2">
	<a class="srvCns" href="http://wpa.qq.com/msgrd?v=3&uin=87567798&site=qq&menu=yes" target="_blank">在线咨询</a>
	<a class="goTop" id="goTop" title="返回顶部" style="display:none">返回顶部	
	</a>
</div>

<script type="text/javascript" src="/eplus/App/Home/View/Pc/Default/js/jquery.plugin.min.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src=/eplus/App/Home/View/Pc/Default/js/killie6.js"></script>
<![endif]-->

<script type="text/javascript">
//<![CDATA[
	<!--- 首页 ---->
	$('.ad_img,#banner_ctr,.logo').pngFix();
	//Banner Start
	var curIndex=0;
	var time=800;
	var slideTime=5000;
	var adTxt=$("#banner_img>li>div>.ad_txt");
	var adImg=$("#banner_img>li>div>.ad_img");
	var int=setInterval("autoSlide()",slideTime);

	$("#banner_ctr>ul>li[class!='first-item'][class!='last-item']").click(function(){
		show($(this).index("#banner_ctr>ul>li[class!='first-item'][class!='last-item']"));
		window.clearInterval(int);
		int=setInterval("autoSlide()",slideTime);
	});
	
	function autoSlide(){
		curIndex+1>=$("#banner_img>li").size()?curIndex=-1:false;
		show(curIndex+1);
	}
	function show(index){
		$.easing.def="easeOutQuad";
		$("#drag_ctr,#drag_arrow").stop(false,true).animate({left:index*24+6},300);
		$("#banner_img>li").eq(curIndex).stop(false,true).fadeOut(time);
		adTxt.eq(curIndex).stop(false,true).animate({top:"340px"},time);
		adImg.eq(curIndex).stop(false,true).animate({right:"120px"},time);
		setTimeout(function(){
			$("#banner_img>li").eq(index).stop(false,true).fadeIn(time);
			adTxt.eq(index).children("p").css({paddingTop:"50px",paddingBottom:"50px"}).stop(false,true).animate({paddingTop:"0",paddingBottom:"0"},time);
			adTxt.eq(index).css({top:"0",opacity:"0"}).stop(false,true).animate({top:"110px",opacity:"1"},time);
			adImg.eq(index).css({right:"-50px",opacity:"0"}).stop(false,true).animate({right:"10px",opacity:"1"},time);
		},200)
		curIndex=index;
	}
	//Banner End
	//Cases Start
	$("#caseslist>.cases>li").live({mouseenter:function(){
		$("p",this).stop(false,true).slideDown("normal","easeOutQuad");
		},mouseleave:function(){
		$("p",this).stop(false,true).slideUp("normal","easeOutQuad");
		}});
	$("#caseslist>.cases>li>img,#newsbox>ul>li>a>img").lazyload({effect:"fadeIn",failurelimit:10});
	//Cases End
	//nav start
	(function(){
	var nav = $("#service ul");
	var lis = nav.children("li");
	var arrow = $(".arrow").css("left");
	var speed = 300;
	var n = 0;
	//取cur位置
	for(var i=0; i<lis.length; i++){
		if(lis.eq(i).attr("class") == "cur"){
			n = i;
		}
	}
	lis.eq(0).hover(function(){
		$(".arrow").stop(true, true).animate({left:"0px"}, speed);
		lis.removeClass("cur");
		$(this).addClass("cur");
	})
	lis.eq(1).hover(function(){
		$(".arrow").stop(true, true).animate({left:"370px"}, speed);
		lis.removeClass("cur");
		$(this).addClass("cur");
	})
	lis.eq(2).hover(function(){
		$(".arrow").stop(true, true).animate({left:"738px"}, speed);
		lis.removeClass("cur");
		$(this).addClass("cur");
	})
	nav.mouseleave(function(){
		$(".arrow").stop(true, true).animate({left:arrow}, speed);
		lis.removeClass("cur");
		lis.eq(n).addClass("cur");
	})
}())
//]]>
</script>
</body>
</html>