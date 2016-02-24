-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 02 月 24 日 11:36
-- 服务器版本: 5.5.40
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `eplus`
--

-- --------------------------------------------------------

--
-- 表的结构 `ep_admin`
--

CREATE TABLE IF NOT EXISTS `ep_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(30) DEFAULT NULL COMMENT '后台管理员用户名',
  `admin_pass` char(64) DEFAULT NULL COMMENT '管理员密码',
  `admin_login` int(11) DEFAULT '0' COMMENT '登录次数',
  `admin_realname` varchar(100) DEFAULT NULL COMMENT '管理员名字',
  `admin_pic` varchar(100) DEFAULT NULL COMMENT '缩位图',
  `admin_email` varchar(100) DEFAULT NULL COMMENT '管理员邮箱',
  `admin_oldip` varchar(20) DEFAULT NULL COMMENT '上次登录ip',
  `admin_ip` varchar(20) DEFAULT NULL COMMENT '登录ip',
  `admin_rsdate` int(11) DEFAULT NULL COMMENT '注册时间',
  `admin_olddate` int(11) DEFAULT NULL,
  `admin_lock` int(11) DEFAULT '0' COMMENT '0不锁，1锁定',
  `admin_date` int(11) DEFAULT NULL COMMENT '登录日期',
  `admin_auth` int(11) DEFAULT '1' COMMENT '是否开启权限验证：0:不开启；1：开启',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='后台管理员表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ep_admin`
--

INSERT INTO `ep_admin` (`id`, `admin_name`, `admin_pass`, `admin_login`, `admin_realname`, `admin_pic`, `admin_email`, `admin_oldip`, `admin_ip`, `admin_rsdate`, `admin_olddate`, `admin_lock`, `admin_date`, `admin_auth`) VALUES
(1, 'admin', 'b13dc76c70b8c3ebe6fd5390b478f00d', 77, '1', '/eplus/Uploads/Images/20160218/56c583e21946a.png', 'zqge@foxmail.com', '0.0.0.0', '0.0.0.0', 1449798247, 1455775601, 0, 1455784816, 0),
(3, 'test', '202cb962ac59075b964b07152d234b70', NULL, 'e格', NULL, 'zqge@foxmail.com', '0.0.0.0', '0.0.0.0', 1449798247, 1449801659, 0, 1451530864, 0),
(5, '32222', NULL, NULL, '222', NULL, 'zqge@foxmail.com', NULL, NULL, 1449814767, NULL, 0, NULL, 1),
(6, 'zqge', '202cb962ac59075b964b07152d234b70', 2, '非吃不可', NULL, 'zqge@foxmail.com', '0.0.0.0', '0.0.0.0', 1451531063, 1451890923, 0, 1451891265, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ep_attr`
--

CREATE TABLE IF NOT EXISTS `ep_attr` (
  `id` int(11) NOT NULL COMMENT '属性id',
  `attr_name` varchar(100) DEFAULT NULL COMMENT '属性名字',
  `attr_color` char(100) DEFAULT NULL COMMENT '属性颜色',
  `model_id` int(11) NOT NULL COMMENT '模型id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章属性表';

--
-- 转存表中的数据 `ep_attr`
--

INSERT INTO `ep_attr` (`id`, `attr_name`, `attr_color`, `model_id`) VALUES
(1, '头条', '#37b44a', 1),
(2, '推荐', '#9d0039', 1),
(3, '好帖', '#0c004b', 1),
(4, '精华', '#0054a5', 1),
(5, '头条', '#37b44a', 5),
(6, '推荐', '#9d0039', 5);

-- --------------------------------------------------------

--
-- 表的结构 `ep_attr_relevance`
--

CREATE TABLE IF NOT EXISTS `ep_attr_relevance` (
  `relevance_id` int(11) NOT NULL COMMENT '关联id（根据model_id来确定关联哪个表）',
  `attr_id` int(11) NOT NULL COMMENT '属性表的关联id',
  `model_id` int(11) NOT NULL COMMENT '模型id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ep_attr_relevance`
--

INSERT INTO `ep_attr_relevance` (`relevance_id`, `attr_id`, `model_id`) VALUES
(4, 5, 5),
(1, 6, 5),
(4, 6, 5),
(5, 5, 5),
(88, 4, 1),
(88, 3, 1),
(1, 5, 5);

-- --------------------------------------------------------

--
-- 表的结构 `ep_auth_group`
--

CREATE TABLE IF NOT EXISTS `ep_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '' COMMENT '认证组名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否开启 0为关闭 1为开启 （默认为1 开启）',
  `rules` varchar(1000) NOT NULL DEFAULT '' COMMENT '规则ID （这里填写的是 ep_auth_rule里面的规则的ID) ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `ep_auth_group`
--

INSERT INTO `ep_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1, '超级管理员', 1, '20,21,22,23,24,1,12,13,19,25,26,27,28,41,42,43,44,14,15,16,17,18,45,46,29,30,31,32,37,38,39,40,33,34,35,36,47,48,49'),
(2, '系统管理员', 1, '21,1');

-- --------------------------------------------------------

--
-- 表的结构 `ep_auth_group_access`
--

CREATE TABLE IF NOT EXISTS `ep_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL COMMENT '管理员ID',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '认证组ID',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ep_auth_group_access`
--

INSERT INTO `ep_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1),
(3, 2),
(5, 2);

-- --------------------------------------------------------

--
-- 表的结构 `ep_auth_rule`
--

CREATE TABLE IF NOT EXISTS `ep_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `controller` varchar(30) DEFAULT NULL COMMENT '控制器',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- 转存表中的数据 `ep_auth_rule`
--

INSERT INTO `ep_auth_rule` (`id`, `name`, `title`, `controller`, `type`, `status`, `condition`) VALUES
(1, 'Manage/Auth/index', '【资源管理】列表', 'Manage/Auth', 1, 1, ''),
(15, 'Manage/Group/add', '【岗位管理】添加', 'Manage/Group', 1, 1, ''),
(14, 'Manage/Group/index', '【岗位管理】列表', 'Manage/Group', 1, 1, ''),
(13, 'Manage/Auth/delall', '【资源管理】删除', 'Manage/Auth', 1, 1, ''),
(12, 'Manage/Auth/add', '【资源管理】添加', 'Manage/Auth', 1, 1, ''),
(20, 'Manage/Admin/index', '【用户管理】列表', 'Manage/Admin', 1, 1, ''),
(16, 'Manage/Group/getAuth', '【岗位管理】授权', 'Manage/Group', 1, 1, ''),
(17, 'Manage/Group/edit', '【岗位管理】编辑', 'Manage/Group', 1, 1, ''),
(18, 'Manage/Group/delall', '【岗位管理】删除', 'Manage/Group', 1, 1, ''),
(19, 'Manage/Auth/edit', '【资源管理】编辑', 'Manage/Auth', 1, 1, ''),
(21, 'Manage/Admin/add', '【用户管理】添加', 'Manage/Admin', 1, 1, ''),
(25, 'Manage/Column/index', '【栏目管理】列表', 'Manage/Column', 1, 1, ''),
(22, 'Manage/Admin/edit', '【用户管理】编辑', 'Manage/Admin', 1, 1, ''),
(23, 'Manage/Admin/delall', '【用户管理】删除', 'Manage/Admin', 1, 1, ''),
(24, 'Manage/Admin/addAuth', '【用户管理】授权', 'Manage/Admin', 1, 1, ''),
(26, 'Manage/Column/add', '【栏目管理】添加', 'Manage/Column', 1, 1, ''),
(27, 'Manage/Column/edit', '【栏目管理】编辑', 'Manage/Column', 1, 1, ''),
(28, 'Manage/Column/delete', '【栏目管理】删除', 'Manage/Column', 1, 1, ''),
(29, 'Manage/News/index', '【新闻管理】列表', 'Manage/News', 1, 1, ''),
(30, 'Manage/News/add', '【新闻管理】添加', 'Manage/News', 1, 1, ''),
(31, 'Manage/News/edit', '【新闻管理】编辑', 'Manage/News', 1, 1, ''),
(32, 'Manage/News/do_trash', '【新闻管理】删除', 'Manage/News', 1, 1, ''),
(33, 'Manage/Product/index', '【产品管理】列表', 'Manage/Product', 1, 1, ''),
(34, 'Manage/Product/add', '【产品管理】添加', 'Manage/Product', 1, 1, ''),
(35, 'Manage/Product/edit', '【产品管理】编辑', 'Manage/Product', 1, 1, ''),
(36, 'Manage/Product/do_trash', '【产品管理】删除', 'Manage/Product', 1, 1, ''),
(37, 'Manage/Page/index', '【单页管理】列表', 'Manage/Page', 1, 1, ''),
(38, 'Manage/Page/add', '【单页管理】添加', 'Manage/Page', 1, 1, ''),
(39, 'Manage/Page/edit', '【单页管理】编辑', 'Manage/Page', 1, 1, ''),
(40, 'Manage/Page/do_trash', '【单页管理】删除', 'Manage/Page', 1, 1, ''),
(41, 'Manage/Download/index', '【下载管理】列表', 'Manage/Download', 1, 1, ''),
(42, 'Manage/Download/add', '【下载管理】添加', 'Manage/Download', 1, 1, ''),
(43, 'Manage/Download/edit', '【下载管理】编辑', 'Manage/Download', 1, 1, ''),
(44, 'Manage/Download/do_trash', '【下载管理】删除', 'Manage/Download', 1, 1, ''),
(45, 'Manage/Message/index', '【留言管理】列表', 'Manage/Message', 1, 1, ''),
(46, 'Manage/Message/do_trash', '【留言管理】删除', 'Manage/Message', 1, 1, ''),
(47, 'Manage/Trash/index', '【回收站】列表', 'Manage/Trash', 1, 1, ''),
(48, 'Manage/Trash/delall', '【回收站】删除', 'Manage/Trash', 1, 1, ''),
(49, 'Manage/Trash/restore', '【回收站】还原', 'Manage/Trash', 1, 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `ep_column`
--

CREATE TABLE IF NOT EXISTS `ep_column` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `parent_id` int(11) NOT NULL COMMENT '父类id，0为顶级栏目',
  `model_id` int(11) NOT NULL COMMENT '模型id',
  `column_name` varchar(100) DEFAULT NULL COMMENT '栏目名称中文',
  `column_ename` varchar(100) DEFAULT NULL COMMENT '栏目名称英文',
  `column_descr` text COMMENT '栏目说明',
  `column_addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `column_sort` int(11) DEFAULT '100' COMMENT '栏目排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='栏目表' AUTO_INCREMENT=79 ;

--
-- 转存表中的数据 `ep_column`
--

INSERT INTO `ep_column` (`id`, `parent_id`, `model_id`, `column_name`, `column_ename`, `column_descr`, `column_addtime`, `column_sort`) VALUES
(73, 0, 1, '新闻中心', 'news', '', 1454124114, 100),
(76, 0, 2, '产品案例', '', '', 1454376971, 100),
(61, 0, 2, '产品栏目', 'product', '', 1450926497, 100),
(77, 76, 2, '网站建设', '', '', 1454377013, 100),
(65, 0, 5, '下载栏目', 'Download', '', 1451376539, 100),
(67, 0, 6, '留言板栏目', '', '', 1451459861, 100),
(68, 67, 6, '问题咨询', '', '', 1451459899, 100),
(69, 67, 6, '意见建议', '', '', 1451459929, 100),
(72, 0, 3, '首页轮播', 'index_img', '', 1454052334, 100),
(75, 0, 1, '常见问题', '', '', 1454316600, 100),
(78, 0, 3, '单页栏目', '', '', 1454396475, 100);

-- --------------------------------------------------------

--
-- 表的结构 `ep_config`
--

CREATE TABLE IF NOT EXISTS `ep_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `config_name` varchar(100) NOT NULL COMMENT '配置名称',
  `config_value` varchar(200) DEFAULT NULL COMMENT '配置内容',
  `config_description` text COMMENT '配置描述',
  `config_lock` tinyint(1) DEFAULT '0' COMMENT '0：未锁定；1：锁定',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='网站配置信息表' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `ep_config`
--

INSERT INTO `ep_config` (`id`, `config_name`, `config_value`, `config_description`, `config_lock`) VALUES
(1, 'webname', 'E+CMS网站管理系统', '网站名称', 0),
(2, 'webtitle', 'E+CMS网站管理系统 - 轻量级企业网站管理系统,手机网站系统,微信站快速开发系统\n', '网站title', 0),
(5, 'description', 'E+CMS（简称EP）是一款基于PHP+MySql开发的企业网站内容管理系统，其中免费版是完全开源的...', '网站描述', 0),
(6, 'keywords', '开源免费CMS，企业建站，网站建设，微信建站\r\n', NULL, 0),
(7, 'egename', 'Ege科技网络公司', '网站名称', 0),
(8, 'egetitle', 'Ege科技网络公司 - 专注于海南网站设计制作、网站推广SEO、网络营销、公司品牌形象VI设计、及空间 、主机、域名服务。', '网站title', 0),
(9, 'egekeywords', '海南网站建设，企业建站，网站建设，微信建站\r\n，手机建站', NULL, 0),
(10, 'egedescription', 'Ege网络工作室是海南最专业的SEO网站推广、网站建设、网络营销团队，他们为金融、教育、体育、招聘、连锁加盟、企事业单位等行业提供搜索引擎营销解决方案。具有大中型网站运维、管理、市场推广等丰富经验，核心技术能够显著提高网站流量及排名。核心成员具有5年的SEO、SEM经验，10年的网站建设、网络营销经验和上百个关键词排名成功的案例。', '网站描述', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ep_download`
--

CREATE TABLE IF NOT EXISTS `ep_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `column_id` int(11) NOT NULL COMMENT '所属栏目id',
  `download_title` varchar(200) NOT NULL COMMENT '标题',
  `download_keywords` varchar(200) DEFAULT NULL COMMENT '关键字',
  `download_description` text COMMENT '描述',
  `download_content` text COMMENT '内容',
  `download_author` varchar(50) DEFAULT NULL COMMENT '发布者',
  `download_hits` int(11) DEFAULT '0' COMMENT '点击数',
  `download_num` int(11) DEFAULT '0' COMMENT '下载次数',
  `download_addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `download_updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `download_del` tinyint(1) DEFAULT '0' COMMENT '0不被删除，1被删除',
  `download_deltime` int(11) DEFAULT NULL COMMENT '删除时间',
  `download_pic` text COMMENT '缩位图',
  `download_sort` int(11) DEFAULT '100' COMMENT '排序',
  `download_show` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否显示（0显示；1不显示）',
  `download_link` text NOT NULL COMMENT '下载地址，可多个地址，以“；”分割',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='下载模型表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ep_download`
--

INSERT INTO `ep_download` (`id`, `column_id`, `download_title`, `download_keywords`, `download_description`, `download_content`, `download_author`, `download_hits`, `download_num`, `download_addtime`, `download_updatetime`, `download_del`, `download_deltime`, `download_pic`, `download_sort`, `download_show`, `download_link`) VALUES
(1, 65, '测试标题', '关键字', '描述', '&lt;p&gt;内容&lt;/p&gt;', '测试作者', 0, 0, 1451438270, 1451438270, 0, NULL, '/eplus/Uploads/Download/20151230/568330beadad0.jpg', 100, 0, ''),
(4, 65, '是是', '122', '', '&lt;p&gt;是否&lt;/p&gt;', '丰富', 12, 0, 1451442941, 1451444072, 0, NULL, '/eplus/Uploads/Download/Pic/20151230/568342fd5afaa.png', 100, 0, '/eplus/Uploads/Download/file/20151230/5683476863efe.txt,/eplus/Uploads/Download/file/20151230/568342fd5ceea.xlsx');

-- --------------------------------------------------------

--
-- 表的结构 `ep_link`
--

CREATE TABLE IF NOT EXISTS `ep_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(100) DEFAULT NULL,
  `link_name` varchar(100) DEFAULT NULL,
  `link_description` text COMMENT '链接网站描述',
  `link_sort` int(11) DEFAULT NULL,
  `link_show` int(11) DEFAULT '0' COMMENT '0：可见；1：隐藏',
  `link_addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='友情链接表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `ep_link`
--

INSERT INTO `ep_link` (`id`, `link_url`, `link_name`, `link_description`, `link_sort`, `link_show`, `link_addtime`) VALUES
(1, 'http://www.egeweb.cn', 'Ege科技网络公司', '', 100, 0, 1455760639);

-- --------------------------------------------------------

--
-- 表的结构 `ep_message`
--

CREATE TABLE IF NOT EXISTS `ep_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `column_id` int(11) DEFAULT NULL COMMENT '栏目id',
  `message_title` varchar(100) DEFAULT NULL COMMENT '标题',
  `message_sort` int(11) DEFAULT '100' COMMENT '排行',
  `message_addtime` int(11) NOT NULL COMMENT '创建日期',
  `message_updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `message_del` tinyint(11) NOT NULL DEFAULT '0' COMMENT '是否被删除（0不被删除，1被删除）',
  `message_deltime` int(11) NOT NULL COMMENT '删除日期',
  `message_show` tinyint(11) NOT NULL DEFAULT '0' COMMENT '是否可见除（0可见，1隐藏）',
  `message_reply` tinyint(1) NOT NULL DEFAULT '0' COMMENT '(0:未回复；1：已回复)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='留言板' AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 表的结构 `ep_message_exp`
--

CREATE TABLE IF NOT EXISTS `ep_message_exp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mes_exp_pid` int(11) NOT NULL COMMENT '主表id',
  `mes_exp_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型（0：主题；1：回复）',
  `mes_exp_title` varchar(100) DEFAULT NULL COMMENT '标题',
  `mes_exp_content` text COMMENT '内容',
  `mes_exp_pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `mes_exp_person` varchar(20) DEFAULT NULL COMMENT '提交人',
  `mes_exp_tel` varchar(20) DEFAULT NULL COMMENT '电话号码',
  `mes_exp_email` varchar(100) DEFAULT NULL COMMENT '电子邮箱',
  `mes_exp_qq` varchar(20) DEFAULT NULL COMMENT 'QQ',
  `mes_exp_addtime` int(11) NOT NULL COMMENT '创建日期',
  `mes_exp_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否可见（0可见，1隐藏）',
  `answerer_type` tinyint(1) DEFAULT NULL COMMENT '回复者类型（0：游客；1：用户；2：管理员）',
  `answerer_id` int(11) DEFAULT NULL COMMENT '回复者id',
  `answerer_ip` varchar(50) DEFAULT NULL COMMENT '留言者ip地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='留言板扩展表' AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- 表的结构 `ep_model`
--

CREATE TABLE IF NOT EXISTS `ep_model` (
  `id` int(11) NOT NULL COMMENT '模型id',
  `model_name` varchar(100) DEFAULT NULL COMMENT '模型名字',
  `model_table` char(30) NOT NULL COMMENT '栏目控制器名',
  `model_list` char(100) DEFAULT NULL COMMENT '模型列表模板',
  `model_show` char(100) DEFAULT NULL COMMENT '模型内容展示模板',
  `model_addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章模型表';

--
-- 转存表中的数据 `ep_model`
--

INSERT INTO `ep_model` (`id`, `model_name`, `model_table`, `model_list`, `model_show`, `model_addtime`) VALUES
(1, '文章模型', 'News', 'List_article.html', 'Show_article.html', 0),
(2, '产品模型', 'Product', 'List_product.html', 'Show_product.html', 0),
(4, '图片模型', 'Photo', 'List_photo.html', 'Show_photo.html', 0),
(5, '下载模型', 'Download', 'List_Download.html', 'Show_Download.html', 0),
(3, '单页模型', 'Page', 'List_page.html', 'Show_page.html', 0),
(6, '留言板模型', 'Message', 'List_Message.html', 'Show_Message.html', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ep_news`
--

CREATE TABLE IF NOT EXISTS `ep_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章编号',
  `column_id` int(11) NOT NULL COMMENT '文章所属栏目id',
  `news_title` varchar(200) DEFAULT NULL COMMENT '标题',
  `news_keywords` varchar(200) DEFAULT NULL COMMENT '关键字',
  `news_description` text COMMENT '描述',
  `news_content` longtext COMMENT '内容',
  `news_author` varchar(100) DEFAULT NULL COMMENT '发布者',
  `news_hits` int(11) DEFAULT '0' COMMENT '点击数',
  `news_updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `news_addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `news_del` tinyint(1) DEFAULT '0' COMMENT '0不被删除，1被删除',
  `news_deltime` int(11) DEFAULT NULL COMMENT '删除时间',
  `news_images` int(11) DEFAULT '0' COMMENT '是否为图片文章，0为不是，1为图片',
  `news_sort` int(11) DEFAULT '100' COMMENT '文章排序',
  `news_pic` text COMMENT '文章封面图片地址',
  `is_link` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否外部链接：0否；1是',
  `external_links` varchar(80) DEFAULT NULL COMMENT '外部链接地址，有外部链接时生效',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='新闻模型表' AUTO_INCREMENT=105 ;

--
-- 转存表中的数据 `ep_news`
--

INSERT INTO `ep_news` (`id`, `column_id`, `news_title`, `news_keywords`, `news_description`, `news_content`, `news_author`, `news_hits`, `news_updatetime`, `news_addtime`, `news_del`, `news_deltime`, `news_images`, `news_sort`, `news_pic`, `is_link`, `external_links`) VALUES
(94, 73, '十三五规划解读之改革创新：扶持100个创业创新平台', '', '', '&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;国有农场有关职能2年纳入地方管理&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　 “十三五”期间，我省将强力推进新一轮农垦改革。以推进垦区集团化、农场企业化改革为主线，把农垦打造成海南经济新的增长极和国家热带特色农业示范区。理顺农垦管理体制，激活农垦经营机制，推进国有农场生产经营企业化和社会管理属地化。用两年时间，把国有农场承担的社会管理和公共服务职能纳入地方政府统一管理。进一步加大土地、财政、税收、金融等方面支持力度，实现普惠性政策对垦区全覆盖。&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　 全面放开本省居民在县城落户限制&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　 统筹推进其他领域改革。加快价格改革，全面放开竞争性领域商品和服务价格。深化户籍制度改革，全面放开本省居民在建制镇和小城市（县城）的落户限制，逐步放宽海口等中心城市落户条件，全面推行流动人口居住证管理制度，促进农业转移人口落户城镇，推进城镇基本公共服务向未落户的城镇常住人口全覆盖。&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　 土地房屋等不动产统一登记&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　 深化行政审批制度改革。最大限度取消和下放行政审批事项，最大限度减少审批环节和申报材料，推进行政审批标准化，实施互联网申报和全流程阳光审批。探索通过业主承诺、技术标准规范、事中事后监管等措施，逐步实现重点园区建设项目零审批。完成土地、房屋、林权、海域使用权等不动产统一登记改革。&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　 扶持创建100个创业创新平台&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　 加快研发和创业创新基地建设。引进国际国内一流科研机构在海南建设研发基地，建设重大科技平台和产业技术创新战略联盟。增强海南大学等高等学校和科研院所的研发能力。“十三五”期间，力争建成国家重点实验室2家以上；省级重点实验室、工程（技术）研究中心总数达到130家以上；扶持创建100个创业孵化基地、众创空间、中小企业创业基地等创业创新平台；扶持创建3个国家级或省级创业型城市。&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　 支持扩大特色产品出口&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　 努力扩大特色产品出口。加强洋浦石油和天然气储备基地建设，鼓励我省企业先行先试，自主开展油品进口、转口、加工及成品油出口等业务。支持扩大文昌鸡、橡胶、胡椒、槟榔、咖啡、果蔬、茶叶、临高乳猪、椰子加工产品等特色农产品及农产品精深加工出口，鼓励发展水产品精深加工和出口贸易。提高光伏、机电等产品科技含量，增强对外市场竞争优势。促进广播影视作品、出版物、动漫游戏、高端工艺美术等文化产品和服务出口。到2020年出口总额达400亿元人民币以上，年均增长7%。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 'admin', 12, 1454124232, 1454124232, 0, NULL, 0, 100, NULL, 0, ''),
(95, 73, '海口市海上驿站项目', '', '', '&lt;p style=&quot;box-sizing: border-box; margin: 20px 35px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong style=&quot;box-sizing: border-box; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;&quot;&gt;　一、&amp;nbsp;&lt;/strong&gt;&lt;strong style=&quot;box-sizing: border-box; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;&quot;&gt;项目背景&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　　随着海南国际旅游岛品牌效应不断扩大，海南省在发展海洋休闲产业领域已经迈出一大步。然而，海南省海上休闲项目的缺乏已经制约了海南省海上旅游的发展。目前，海南为游艇旅游服务的海上平台几乎是空白，配套服务设施的缺失与高速发展的游艇消费需求不相匹配，已经成为制约海南游艇产业发展的瓶颈。要实现“海南游艇游”，最急切的是要建设一批与游艇俱乐部有着密切配套关系，能够为游艇提供全方位的补给、靠泊、安全保障、中途休息等服务的海上“服务区”。于是“海上驿站”应运而生。建设环海南岛的海上驿站将突破我国，尤其是海南游艇产业发展的瓶颈，是游艇产业和旅游产业发展的大势所趋。&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;strong style=&quot;box-sizing: border-box; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;&quot;&gt;　　二、&amp;nbsp;&lt;/strong&gt;&lt;strong style=&quot;box-sizing: border-box; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;&quot;&gt;建设地点&lt;/strong&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;　　本项目拟在海口市沿海海域由西向东拟建四个海上驿站平台，建设地点依次为：喜来登酒店北侧、海口港西侧、美源湾和南渡江出海口。&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;strong style=&quot;box-sizing: border-box; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;&quot;&gt;　　三、&amp;nbsp;&lt;/strong&gt;&lt;strong style=&quot;box-sizing: border-box; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;&quot;&gt;建设内容&lt;/strong&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;　　海上驿站实质是游艇游航路上的“服务区”，提供游艇补给服务以及中途靠泊、休息，避免游艇爱好者长途驾驶与乘坐游艇旅行的疲劳。海上驿站的远程通讯联络功能还为游艇提供信息服务和安全保障，解除游艇航行的后顾之忧。“海上驿站”的服务功能相当于游艇码头、海上加油站、海上施工平台、浮船坞等海上人工浮岛平台功能的综合体，是一个集游艇补给、靠泊、休闲、观光、旅游功能于一体的综合性的人造海上浮岛型消费平台。&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;strong style=&quot;box-sizing: border-box; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;&quot;&gt;　　四、&amp;nbsp;&lt;/strong&gt;&lt;strong style=&quot;box-sizing: border-box; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;&quot;&gt;投资规模&lt;/strong&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&amp;nbsp; &amp;nbsp; 　项目总投资1亿元。&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;strong style=&quot;box-sizing: border-box; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;&quot;&gt;　　五、&amp;nbsp;&lt;/strong&gt;&lt;strong style=&quot;box-sizing: border-box; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;&quot;&gt;建设规模&lt;/strong&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;　　1.&amp;nbsp;喜来登酒店北侧海上驿站建设规模：建设海上驿站平台一座，平台总面积为2875&amp;nbsp;㎡；供游艇靠泊及人员上下使用，平台上部相应建设生活辅助建筑物、水、电、通讯等工程。&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;　　2.&amp;nbsp;海口港西侧海上驿站建设规模：建设海上驿站平台一座，平台面积为：2160㎡，平台上部相应建设生活辅助建筑物、水、电、通讯等工程。&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;　　3.&amp;nbsp;美源湾和南渡江出海口海上驿站建设规模：建设海上驿站平台各一座，平台上部相应建设生活辅助建筑物、水、电、通讯等工程。&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;strong style=&quot;box-sizing: border-box; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;&quot;&gt;　　六、&amp;nbsp;&lt;/strong&gt;&lt;strong style=&quot;box-sizing: border-box; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;&quot;&gt;建设条件&lt;/strong&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;　　根据《海南省海洋功能区划(2011-2020&amp;nbsp;年)》，项目所在海域的海洋功能区为海口东海岸旅游休闲娱乐区。本项目建设主要用于满足游艇及帆船在离岸海域的临时简单补给、休闲服务的需求，同时丰富了海南省海洋休闲产业的内容，有利于发展海南省海洋旅游，符合海口东海岸旅游休闲娱乐区的海域使用的用途管制要求。&lt;br style=&quot;box-sizing: border-box;&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 'admin', 33, 1454308756, 1454124294, 0, NULL, 0, 100, '/eplus/Uploads/News/20160201/56aefd94819cf.png', 0, ''),
(96, 73, '产业融合发展 科技文化强园 打造特色鲜明的创新型园区', '', '', '&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;26日上午，省五届人大四次会召开，海南省省长刘赐贵作《政府工作报告》。报告指出，发挥创新引领作用，着力提高发展质量和效益。&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　　报告提出，以财政投入为引导，建立科技创新投入稳定增长机制，推动形成以企业为主体、市场为导向、产学研紧密结合的技术创新体系。鼓励企业聚焦重大科技需求，开展关键核心技术联合攻关，促进产学研一体化发展。实施省级重大科技项目，引进集成高新技术和产品。在重要创新领域组建重点实验室、工程技术研究中心，引进国内外高水平科研机构在海南建设研发基地。加强知识产权工作，提升核心竞争力。&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　　另外，要推动大众创业、万众创新，加强创新创业公共服务等载体建设，推广创客空间、创新工场等新型孵化模式。举办各类创新、创业大赛和技能竞赛，鼓励科技人才、高校毕业生、返乡农民工、退役士兵等开展创业创新，提供创业培训和师资培训，掀起创业创新热潮。落实创业担保贷款、税费减免、财政贴息、资金补贴等扶持政策，鼓励天使、风投、创投基金入驻海南，推动设立新兴产业投资基金，扶持创业创新活动和高新技术产业发展。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '海创客', 10, 1454139917, 1454139917, 0, NULL, 0, 100, NULL, 0, ''),
(97, 73, '海南首家专业众筹平台上线 省残基会众筹助残公益项目', '', '', '&lt;p style=&quot;box-sizing: border-box; margin: 20px 35px 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;“大众创业，万众创新”。今天（1月10日），“海南合观众筹(&lt;a href=&quot;http://www.hgzc8.com/&quot; style=&quot;box-sizing: border-box; transition: 0.3s; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); text-decoration: none;&quot;&gt;www.hgzc8.com&lt;/a&gt;)”正式上线。海南省残疾人基金会借助该平台，首次以众筹方式募集资金，助推海南残疾人公益事业发展。&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　　据悉，“海南合观众筹”项目主要由北京合观投资管理有限公司控股，借助北京合观投资在股权投融资、债权投融资、并购重组和基金管理方面的丰富经验及较高专业水准，立足海南，搭建海南首家专业众筹平台(&lt;a href=&quot;http://www.hgzc8.com/&quot; style=&quot;box-sizing: border-box; transition: 0.3s; border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(0, 0, 0); text-decoration: none;&quot;&gt;www.hgzc8.com&lt;/a&gt;)。并通过专业团队指导包装，运用公益、消费及股权等众筹合作模式，助力海南公益事业，中小微企业和优势产业快速提升发展。实现金融与其他行业共生共荣，为海南未来经济发展贡献智慧和力量。&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　　今天，海南省残疾人基金会与“海南合观众筹”签订合作协议。首次以众筹方式设立海南省残疾人基金。由合观众筹免费为该基金项目提供平台服务，通过第三方托管平台安全透明化管理，全面助力海南残疾人公益事业。&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　　此外，首批上线项目也正式亮相，其中救助白内障患者公益众筹、牛大力、澄迈特产龙吉贡米消费众筹及爱哪哪股权众筹等多个项目在现场进行了路演。海南慧济健康管理有限公司现场认筹救治10例白内障老人，帮助他们重见光明;黑马会海口分会也现场认筹捐赠5000元爱心基金，让更多需要帮助的人感受到关爱与温暖。&lt;/p&gt;&lt;p style=&quot;box-sizing: border-box; margin: 15px 35px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: 宋体; line-height: 28px; font-size: 14px; color: rgb(67, 67, 67); white-space: normal; word-spacing: 1px; background-color: rgb(255, 255, 255);&quot;&gt;　　本次活动由海南省残疾人联合会、海南合观众筹网络科技有限公司主办。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 'admin', 27, 1455785511, 1454140063, 0, NULL, 0, 100, '/eplus/Uploads/News/20160201/56aeff5f6fda0.jpg', 0, ''),
(100, 75, '哪些网站需要改版', '', '', '&lt;p&gt;&lt;span style=&quot;color: rgb(102, 102, 102); font-family: &amp;#39;Microsoft YaHei&amp;#39;, &amp;#39;Segoe UI&amp;#39;, Tahoma, Arial, Verdana, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);&quot;&gt;网站在运营过程中盈利模式及网站定位准确，网站已经可以带来效益，但是通过数据分析发现网站存在不足之处或者功能不够全面的地方，以及要求界面风格或者首页更换的部分修改，一般都可以要求建站在不影响收录和权重的前提下进行公司改版网站。&lt;/span&gt;&lt;br style=&quot;color: rgb(102, 102, 102); font-family: &amp;#39;Microsoft YaHei&amp;#39;, &amp;#39;Segoe UI&amp;#39;, Tahoma, Arial, Verdana, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;br style=&quot;color: rgb(102, 102, 102); font-family: &amp;#39;Microsoft YaHei&amp;#39;, &amp;#39;Segoe UI&amp;#39;, Tahoma, Arial, Verdana, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;color: rgb(102, 102, 102); font-family: &amp;#39;Microsoft YaHei&amp;#39;, &amp;#39;Segoe UI&amp;#39;, Tahoma, Arial, Verdana, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);&quot;&gt;注意：建议网站改版找原来为企业设计制作网站的建站公司，由于各建站公司所使用的技术不一定一致，第二家网站建设公司若需要修改网站源码存在一定难度！&lt;/span&gt;&lt;/p&gt;', 'admin', 4, 1454317389, 1454317389, 0, NULL, 0, 100, '/eplus/Uploads/News/20160201/56af1f4d457f4.jpg', 0, ''),
(101, 75, '微站，让微信营销如虎添翼', '', '', '&lt;p&gt;1. 关注微信，自动回复&lt;/p&gt;&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.028studio.com/uploads/allimg/140730/1404003326-0.jpg&quot; style=&quot;border: 0px; max-width: 900px; background-image: url(http://www.028studio.com/templets/default/img/bg_loading_anim.gif); background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: 50% 50%; background-repeat: no-repeat;&quot;/&gt;&lt;/p&gt;&lt;p&gt;微站，可以配置用户关注微信后的自动回复消息。用户可以通过微信回复消息进入到微站，以展现丰富的内容，更好地实现互动。微站是微信回复页面的内容载体，实现了比微信图文信息更丰富的内容，让微信回复界面的内容不再单薄。&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;2.自定义微信回复页面&lt;/p&gt;&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.028studio.com/uploads/allimg/140730/14040035G-1.jpg&quot; style=&quot;border: 0px; max-width: 900px; background-image: url(http://www.028studio.com/templets/default/img/bg_loading_anim.gif); background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: 50% 50%; background-repeat: no-repeat;&quot;/&gt;&lt;/p&gt;&lt;p&gt;微站，提供微信自定义回复页面的配置功能。用户可选择文本、图文等回复方式，用户可以直接选择微站栏目作为微信回复页面的内容，也可以自定义。微信的每一个回复页面，都可以通过微站后台进行配置，图形化操作界面，简单、便捷、易用，无需登录微信公众平台，无需任何程序开发。&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;3.发送地理位置，返回分支机构&lt;/p&gt;&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.028studio.com/uploads/allimg/140730/1404004454-2.jpg&quot; style=&quot;border: 0px; max-width: 900px; background-image: url(http://www.028studio.com/templets/default/img/bg_loading_anim.gif); background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: 50% 50%; background-repeat: no-repeat;&quot;/&gt;&lt;/p&gt;&lt;p&gt;微站实现了微信发送地理微站，返回分支机构列表的功能。用户向企业微信发送地理位置，微信自动返回用户当前位置附近的分支机构列表。用户点击可查看分支机构信息，以及当前位置到目标位置的导航路线。一键轻松获取目标信息，无需地图定位搜索。&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;4.微站自定义菜单，一键同步到微信&lt;/p&gt;&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.028studio.com/uploads/allimg/140730/1404004326-3.jpg&quot; style=&quot;border: 0px; max-width: 900px; background-image: url(http://www.028studio.com/templets/default/img/bg_loading_anim.gif); background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: 50% 50%; background-repeat: no-repeat;&quot;/&gt;&lt;/p&gt;&lt;p&gt;微站本身提供的自定义菜单功能，不仅可以在微站中使用，还可以一键同步到微信服务号中。通过图形化操作界面编辑文字、上传图片即可，无需任何程序开发。借助微站，微信自定义菜单从此不再有技术门槛、人人都可以配置使用，从而使企业微信平台可以承载丰富内容。&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;微站与微信，相得益彰，让您的企业微信与众不同！&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 'admin', 1, 1454317492, 1454317492, 0, NULL, 0, 100, NULL, 0, ''),
(104, 73, 's是', '', '', '&lt;p&gt;水电费是&lt;/p&gt;', '说的', 0, 1455757936, 1455696645, 1, 1455768130, 0, 1, '/eplus/Uploads/News/20160218/56c51a701cf23.png', 0, ''),
(99, 75, '手机网站与微信网站的区别', '', '', '&lt;p&gt;先来了解一些基本定义：&lt;br/&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;什么是手机网站&lt;/p&gt;&lt;p&gt;又叫移动设备网站、Wap网站。是专门指针对手机、平板电脑等移动设备的屏幕进行排版设计的网站，只有手机、平板电脑等移动设备上浏览才能获得最佳用户体验，这一类的网站可以统称为手机网站。&lt;/p&gt;&lt;p&gt;随着智能手机的处理速度越来越强，现在的智能手机的速度相当于10年的台式台式电脑，使得在手机里也可以访问电脑网站，但是用户体验极差，网页缩放太小、不符合手机操作习惯等，所以需要专门针对手机屏幕及其使用习惯来设计手机网站。&lt;/p&gt;&lt;p&gt;因此，不能说在手机里访问的网站就是手机网站，在电脑里访问的网站就是电脑网站。&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;什么是微信网站&lt;/p&gt;&lt;p&gt;微信网站也可简称为微网站，它是利用微信公众平台二次开发接口将手机网站和微信对接起来，以达到相互通信，数据共享的目的。因此，严格来说不能和电脑网站和手机网站并列分类，但是由于微信有几亿的用户，说的人多了，自然也就有了这个概念。相对于同类产品易信（网易和电信结合开发）。它和微信功能和二次开发接口几乎相同，但很少有人说易信网站。原因是易信用户不多，如果哪天易信也有几个亿的用户了，易信网站也就有了。&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;微网站是一个以微信作为访问入口的手机网站，可以认为微网站＝手机网站+微信功能。企业可以在微网站中将商家简介，产品展示，服务说明，促销信息，活动公告，地址，联系方式等内容分享到微网站，让顾客方便快捷全面地了解企业，微网站是适应现在移动客户端对浏览体验与交互性能要求。新一代微信网站，有八项特点：便捷性，隐私性，互动性，传播力，关注力，成交率，转化率，曝光率。&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;微网站除具备手机网站的一般功能外，还有微信独有的功能：&lt;/p&gt;&lt;p&gt;1）自定义菜单：赋予微信更好的用户体验，一个微网站就是一个APP&lt;/p&gt;&lt;p&gt;2）开放的微信API接口：让微信能够和现有的软件系统能够完美整合在一起，微信API接口将手机网站和微信公众帐号无缝整合就形成了微网站&lt;/p&gt;&lt;p&gt;3）支持多种微信消息：图文消息、文本消息、音乐消息、地理位置&lt;/p&gt;&lt;p&gt;4）一键分享：实现用户自行推广，病毒式传播营销&lt;/p&gt;&lt;p&gt;5）利用微信信息内容推送、微博广播功能，以及其他社交网络，实现精准营销&lt;/p&gt;&lt;p&gt;6）开放数据分析功能，对访客记录、分析，获取精准有效数据&lt;/p&gt;&lt;p&gt;7）内容符合微信的特点，简单高效，有吸引力。&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;现在做微信网站的往往是把托管在第三方微信公共平台，使微信网站无法与手机网站或与PC网站数据同步更新！实现电脑网站+手机网站+微信三站合一，自动同步数据，共用空间！所以做网站就做三站合一的网站！&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 'admin', 2, 1454317192, 1454317192, 0, NULL, 0, 100, NULL, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `ep_page`
--

CREATE TABLE IF NOT EXISTS `ep_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `column_id` int(11) DEFAULT NULL COMMENT '所属栏目id',
  `page_title` varchar(200) DEFAULT NULL COMMENT '标题',
  `page_keywords` varchar(200) DEFAULT NULL COMMENT '关键字',
  `page_description` text COMMENT '描述',
  `page_content` longtext COMMENT '内容',
  `page_summary` text COMMENT '简介',
  `page_url` varchar(100) DEFAULT NULL COMMENT '外部链接',
  `page_hits` int(11) DEFAULT '0' COMMENT '点击数',
  `page_sort` int(11) DEFAULT '100' COMMENT '排序',
  `page_pic` varchar(100) DEFAULT NULL COMMENT '图片地址',
  `page_updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `page_addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `page_del` tinyint(1) DEFAULT '0' COMMENT '0不被删除，1被删除',
  `page_deltime` int(11) DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='单页模型表' AUTO_INCREMENT=107 ;

--
-- 转存表中的数据 `ep_page`
--

INSERT INTO `ep_page` (`id`, `column_id`, `page_title`, `page_keywords`, `page_description`, `page_content`, `page_summary`, `page_url`, `page_hits`, `page_sort`, `page_pic`, `page_updatetime`, `page_addtime`, `page_del`, `page_deltime`) VALUES
(105, 78, '服务', '', '', '&lt;style&gt;.con { position: relative; overflow: hidden;}\r\n \r\n  /* con_routing */\r\n#con_routing { padding: 50px 0 80px 60px; background: url(images/shadow.jpg) no-repeat center bottom;}\r\n#con_routing h1 { font-size: 24px; text-align: center; line-height: 50px; margin-bottom: 40px; }\r\n#con_routing h1 span { display: block; font-size: 48px; height: 50px; line-height: 50px; color: #999; }\r\n#con_routing .hd { font-size: 30px; color: #f90; line-height: 40px;}\r\n#con_routing ul { padding-top: 80px; background: url(images/heart.jpg) no-repeat 770px 0; margin-top: -40px; }\r\n#con_routing li { float: left; width: 183px; height: 183px; background: #ccc; margin: 0 2px 2px 0; display: inline; position: relative; z-index: 10; }\r\n#con_routing li .tit { position: relative; width: 183px; height: 183px;}\r\n  #con_routing li .tit .n { position: absolute; width: 80px; height: 50px; background: url(/eplus/Uploads/Img/num.png) no-repeat; left: 15px; top: 15px; opacity: .2; filter: Alpha(Opacity=20); }\r\n#con_routing li .tit .t { position: absolute; font-size: 24px; right: 15px; bottom: 15px; color: #fff; }\r\n#con_routing li .txt { display: none; position: absolute; top: 0; left: 185px; height: 143px; width: 328px; font-size: 14px; line-height: 24px; padding: 20px; background: #E8D5B2; color: #000;  }\r\n#con_routing li.active { z-index: 19; }\r\n#con_routing .n1 .tit .n { background-position: 0 0; }\r\n#con_routing .n2 .tit .n { background-position: 0 -50px; }\r\n#con_routing .n3 .tit .n { background-position: 0 -100px; }\r\n#con_routing .n4 .tit .n { background-position: 0 -150px; }\r\n#con_routing .n5 .tit .n { background-position: 0 -200px; }\r\n#con_routing .n6 .tit .n { background-position: 0 -250px; }\r\n#con_routing .n7 .tit .n { background-position: 0 -300px; }\r\n#con_routing .n8 .tit .n { background-position: 0 -350px; }\r\n#con_routing .n9 .tit .n { background-position: 0 -400px; }\r\n#con_routing .n2,\r\n#con_routing .n4,\r\n#con_routing .n5,\r\n#con_routing .n7,\r\n#con_routing .n9 { background: #AEAEAE; }\r\n#con_routing .n5 { clear: left; }\r\n#con_routing .n4 .txt,\r\n#con_routing .n8 .txt,\r\n#con_routing .n9 .txt { left: inherit; right: 185px; }&lt;/style&gt;&lt;section id=&quot;service_c&quot;&gt;&lt;ul class=&quot;catbtn&quot;&gt;&lt;li class=&quot;website&quot;&gt;&lt;a href=&quot;#&quot; title=&quot;品牌网站建设&quot;&gt;网站建设&lt;/a&gt;&lt;/li&gt;&lt;li class=&quot;seosite&quot;&gt;&lt;a href=&quot;#&quot; title=&quot;网站SEO推广&quot;&gt;网站推广&lt;/a&gt;&lt;/li&gt;&lt;/ul&gt;&lt;div style=&quot;width:1060px; margin:0 auto;&quot;&gt;&lt;div class=&quot;websitebox&quot; id=&quot;servicebox&quot; style=&quot;padding:40px 40px 0 40px;&quot;&gt;&lt;div class=&quot;hide&quot;&gt;关闭&lt;/div&gt;&lt;h1&gt;你的网站是否够称职？&lt;/h1&gt;&lt;p&gt;ege能够帮您搭建适应各种设备及浏览器访问、针对主流搜索引擎优化、用户体验良好的网站。&lt;br/&gt;深入剖析企业需求，致力于树立良好的企业品牌形象，完善企业对内外的传播需求。积极协助企业找到发展战略核心，从战略的角度树立企业的品牌形象。&lt;/p&gt;&lt;div class=&quot;websitebox1&quot;&gt;&lt;h3&gt;能否被搜索引擎收录并排在前列？&lt;em&gt;+ MORE&lt;/em&gt;&lt;/h3&gt;&lt;p class=&quot;hide&quot;&gt;在中国,百度一家独大,占据了大约64.47%的市场份额，所以一个网站是否能被百度友好的收录很重要！你现在能来到的网站，也许就是通过百度！&lt;/p&gt;&lt;h3&gt;换个浏览器网站就打不开？&lt;em&gt;+ MORE&lt;/em&gt;&lt;/h3&gt;&lt;p class=&quot;hide&quot;&gt;兼容性不够的话会影响访问网站的速度，一般是超过3秒载入，访问者就会流失。&lt;/p&gt;&lt;h3&gt;网站还没上线，设计已经落后了！&lt;em&gt;+ MORE&lt;/em&gt;&lt;/h3&gt;&lt;p class=&quot;hide&quot;&gt;四亿手机网站已经习惯用手机浏览网站，大部分的网站设计公司仅仅停留在制作pc网站。&lt;/p&gt;&lt;/div&gt;&lt;div id=&quot;con_intro&quot;&gt;&lt;h2&gt;出色的网站设计，特别是ege原创设计团队制作的网站必须具备以下特点&lt;/h2&gt;&lt;ul class=&quot;loop clearfix&quot;&gt;&lt;li class=&quot;fl&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160203/1454488028830126.gif&quot; title=&quot;1454488028830126.gif&quot; alt=&quot;website_03.gif&quot;/&gt;&lt;h3&gt;代码清爽规范标准，方便后期维护&lt;/h3&gt;&lt;p&gt;E格遵循行业标准代码，追求新技术html5、CSS3、Ajax&lt;/p&gt;&lt;/li&gt;&lt;li class=&quot;fr&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160203/1454488038357335.gif&quot; title=&quot;1454488038357335.gif&quot; alt=&quot;website_05.gif&quot;/&gt;&lt;h3&gt;兼容各大浏览器&lt;/h3&gt;&lt;p&gt;针对时下流行浏览器进行优化，IE、chrome、safari、firefox、360，opera一个也不落下。&lt;/p&gt;&lt;/li&gt;&lt;li class=&quot;s&quot;&gt;&lt;/li&gt;&lt;li class=&quot;fl&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160203/1454488055455190.gif&quot; title=&quot;1454488055455190.gif&quot; alt=&quot;website_10.gif&quot;/&gt;&lt;h3&gt;设计上的原创性，界面不雷同&lt;/h3&gt;&lt;p&gt;原创设计，是在刷新固有的经典界面之后呈现出破土而出的生命气息，是在展现某种被忽视的体验，并预设着新的可能性。E格做到了！&lt;/p&gt;&lt;/li&gt;&lt;li class=&quot;fr&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160203/1454488064316154.gif&quot; title=&quot;1454488064316154.gif&quot; alt=&quot;website_12.gif&quot;/&gt;&lt;h3&gt;在企业、商城上的丰富经验&lt;/h3&gt;&lt;p&gt;E格在企业、商城等行业网站建设有丰富经验，每一天我们都在刷新行业纪录。&lt;/p&gt;&lt;/li&gt;&lt;li class=&quot;s&quot;&gt;&lt;/li&gt;&lt;li class=&quot;fl&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160203/1454488079669961.gif&quot; title=&quot;1454488079669961.gif&quot; alt=&quot;website_17.gif&quot;/&gt;&lt;h3&gt;视频支持多平台环境播放&lt;/h3&gt;&lt;p&gt;视频支持在PC、iPhone、iPad、安卓等环境播放&lt;/p&gt;&lt;/li&gt;&lt;li class=&quot;fr&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160203/1454488086109171.gif&quot; title=&quot;1454488086109171.gif&quot; alt=&quot;website_19.gif&quot;/&gt;&lt;h3&gt;有针对手机、平板客户端网站的丰富设计经验&lt;/h3&gt;&lt;p&gt;依托多屏优化技术，能够保证用户在使用PC、手机或者平板访问网站时都能够获得最佳的用户体验。&lt;/p&gt;&lt;/li&gt;&lt;li class=&quot;s&quot;&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;&lt;div class=&quot;con&quot; id=&quot;con_routing&quot;&gt;&lt;h1&gt;建站服务流程&lt;/h1&gt;&lt;div class=&quot;hd&quot;&gt;业界最专业的服务！&lt;/div&gt;&lt;ul class=&quot;clearfix&quot;&gt;&lt;li class=&quot;n1&quot;&gt;&lt;div class=&quot;tit&quot;&gt;&lt;span class=&quot;n&quot;&gt;&lt;/span&gt;&lt;span class=&quot;t&quot;&gt;需求分析&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;txt&quot; style=&quot;display: none;&quot;&gt;销售顾问与客户（负责人）直接沟通，整理出需求内容，并提供几套初步实施方案作为选择，客户选定方案，签订合同。&lt;/div&gt;&lt;/li&gt;&lt;li class=&quot;n2&quot;&gt;&lt;div class=&quot;tit&quot;&gt;&lt;span class=&quot;n&quot;&gt;&lt;/span&gt;&lt;span class=&quot;t&quot;&gt;效果图设计&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;txt&quot; style=&quot;display: none;&quot;&gt;主设计师与客户直接沟通，了解网站定位、重点内容、风格要求及其他信息后开始设计效果图，并约定提供效果图的时间。根据反馈意见修改设计直到最终确认通过。&lt;/div&gt;&lt;/li&gt;&lt;li class=&quot;n3&quot;&gt;&lt;div class=&quot;tit&quot;&gt;&lt;span class=&quot;n&quot;&gt;&lt;/span&gt;&lt;span class=&quot;t&quot;&gt;原型站搭建&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;txt&quot; style=&quot;display: none;&quot;&gt;在首页效果图确认后，前端工程师会在10个工作日内建立好测试网站，并通知客户已经搭建好哪些板块，哪些版面还需要调整，在这过程不断完善整个网站内容。&lt;/div&gt;&lt;/li&gt;&lt;li class=&quot;n4&quot;&gt;&lt;div class=&quot;tit&quot;&gt;&lt;span class=&quot;n&quot;&gt;&lt;/span&gt;&lt;span class=&quot;t&quot;&gt;网站操作培训&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;txt&quot; style=&quot;display: none;&quot;&gt;在前端工程师搭建好原型站后，安排技术支持工程师与客户一对一的进行系统操作培训，使得客户（负责人）在查看原型站的时候能更快的了解网站的操作，方便对完善网站及早提出意见。&lt;/div&gt;&lt;/li&gt;&lt;li class=&quot;n5&quot;&gt;&lt;div class=&quot;tit&quot;&gt;&lt;span class=&quot;n&quot;&gt;&lt;/span&gt;&lt;span class=&quot;t&quot;&gt;内部测试&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;txt&quot; style=&quot;display: none;&quot;&gt;在原型站上完成里面全部内容后，前端工程师提出内部测试，测试部会全部进行内部测试，经过与前端工程师反馈修复后，递交内部测试验收申请。&lt;/div&gt;&lt;/li&gt;&lt;li class=&quot;n6&quot;&gt;&lt;div class=&quot;tit&quot;&gt;&lt;span class=&quot;n&quot;&gt;&lt;/span&gt;&lt;span class=&quot;t&quot;&gt;客户测试&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;txt&quot; style=&quot;display: none;&quot;&gt;通过内部测试通过后，正式通知客户做网站验收检测，客户在规定验收时间内进行测试，并反馈意见。知道修复完成，可以通过验收&lt;/div&gt;&lt;/li&gt;&lt;li class=&quot;n7&quot;&gt;&lt;div class=&quot;tit&quot;&gt;&lt;span class=&quot;n&quot;&gt;&lt;/span&gt;&lt;span class=&quot;t&quot;&gt;迁移上线&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;txt&quot; style=&quot;display: none;&quot;&gt;项目正式签订验收合格书，网站可以进行备份打包迁移到客户的服务器上，网站的设计源文件同时发给客户做备案。&lt;/div&gt;&lt;/li&gt;&lt;li class=&quot;n8&quot;&gt;&lt;div class=&quot;tit&quot;&gt;&lt;span class=&quot;n&quot;&gt;&lt;/span&gt;&lt;span class=&quot;t&quot;&gt;售后服务&lt;/span&gt;&lt;/div&gt;&lt;div class=&quot;txt&quot; style=&quot;display: none;&quot;&gt;售后服务有技术支持部支持，提供7*24小时的全程陪护，客户可以通过电话、QQ、邮箱等方式来获得您的专项服务。&lt;/div&gt;&lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;&lt;!-- con_routing e --&gt;&lt;/div&gt;&lt;div class=&quot;seositebox&quot; id=&quot;servicebox&quot; style=&quot; display:none;&quot;&gt;&lt;div class=&quot;hide&quot;&gt;关闭&lt;/div&gt;&lt;div class=&quot;seositeboxlist&quot;&gt;&lt;h1&gt;什么是网站推广?&lt;/h1&gt;成千上万的同行网站，让客户立刻找到你&lt;p&gt;SEO整站优化就是通过对网站定位、网站结构及网站内容的整体优化，确保网站所有页面都具备搜索引擎友好性保证页面内容被搜索引擎收录让网站在百度等搜索引擎都有比较高的好的整体排名表现。&lt;/p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160203/1454488222892952.gif&quot; title=&quot;1454488222892952.gif&quot; alt=&quot;seo_11.gif&quot;/&gt;&lt;/div&gt;&lt;div class=&quot;seositeboxlist&quot; style=&quot; padding:0 39px&quot;&gt;&lt;h1&gt;为什么要做网站推广?&lt;/h1&gt;做完网站就够了吗？网站推广的意义等同于广告&lt;p&gt;企业网站本身就是为了宣传企业及企业的产品和服务而诞生的，网站做好之后如果被埋没在众多同行的网站之中让客户无法看到，岂不是失去了做网站的意义。&lt;br/&gt;现在很多客户已经了解到网站推广的重要性，知道百度竞价推广，而我们所说的网站推广（即SEO网站优化）和百度竞价推广又有何区别呢？&lt;/p&gt;&lt;em&gt;如何建立一个成功的网站？&lt;/em&gt; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;img src=&quot;/ueditor/php/upload/image/20160203/1454488253102587.gif&quot; title=&quot;1454488253102587.gif&quot; alt=&quot;service-seo_21.gif&quot;/&gt;&lt;/div&gt;&lt;div class=&quot;seositeboxlist&quot;&gt;&lt;h1&gt;SEO与百度竞价的区别&lt;/h1&gt;点击免费，提高网站在所有搜索引擎的排名&lt;p&gt;搜索引擎优化其实和百度的竞价排名是一个道理，最终的结果就是让网站在各大搜索引擎里有较好的排名，从而让你的访客更容易找到你！让你的网站在竞争中脱颖而出！&lt;/p&gt;&lt;table border=&quot;1&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; width=&quot;100%&quot;&gt;&lt;tbody&gt;&lt;tr class=&quot;firstRow&quot;&gt;&lt;td class=&quot;s_1&quot;&gt;关键项&lt;/td&gt;&lt;td class=&quot;s_1&quot;&gt;百度竞价&lt;/td&gt;&lt;td class=&quot;s_1&quot;&gt;SEO&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;strong&gt;费用&lt;/strong&gt;&lt;/td&gt;&lt;td&gt;按点击付费&lt;/td&gt;&lt;td&gt;按年收取固定费用&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;strong&gt;点击量&lt;/strong&gt;&lt;/td&gt;&lt;td&gt;在费用范围内点击&lt;/td&gt;&lt;td&gt;不限&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;strong&gt;形象展现&lt;/strong&gt;&lt;/td&gt;&lt;td&gt;推广位置&lt;/td&gt;&lt;td&gt;自然排名&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;strong&gt;针对范围&lt;/strong&gt;&lt;/td&gt;&lt;td&gt;百度&lt;/td&gt;&lt;td&gt;各大搜索引擎&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/div&gt;&lt;div class=&quot;clear&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/section&gt;&lt;script type=&quot;text/javascript&quot;&gt;$(&quot;.website&quot;).click(function(){\r\n	$(&quot;.websitebox&quot;).slideDown(&quot;slow&quot;);\r\n	$(&quot;.website&quot;).animate({&quot;background-position-y&quot;:&quot;-188px&quot;,opacity:&quot;1&quot;},{duration:&quot;normal&quot;, easing: &quot;swing&quot;});\r\n	$(&quot;.seositebox&quot;).hide(100);\r\n	$(&quot;.seosite&quot;).animate({&quot;background-position-y&quot;:&quot;0&quot;,opacity:&quot;1&quot;},{duration:&quot;normal&quot;, easing: &quot;swing&quot;});//鼠标out的样子\r\n});\r\n$(&quot;.seosite&quot;).click(function(){\r\n	$(&quot;.seositebox&quot;).slideDown(&quot;slow&quot;);\r\n	$(&quot;.seosite&quot;).animate({&quot;background-position-y&quot;:&quot;-188px&quot;,opacity:&quot;1&quot;},{duration:&quot;normal&quot;, easing: &quot;swing&quot;});\r\n	$(&quot;.websitebox&quot;).hide(100);\r\n	$(&quot;.website&quot;).animate({&quot;background-position-y&quot;:&quot;0&quot;,opacity:&quot;1&quot;},{duration:&quot;normal&quot;, easing: &quot;swing&quot;});//鼠标out的样子\r\n});\r\n$(&quot;#servicebox div.hide&quot;).click(function(){\r\n	$(this).parents(&quot;#servicebox&quot;).hide(&quot;slow&quot;);\r\n});\r\n\r\njQuery(&quot;.websitebox1&quot;).slide({titCell:&quot;h3&quot;, targetCell:&quot;P&quot;,defaultIndex:1,effect:&quot;slideDown&quot;,delayTime:300,trigger:&quot;click&quot;,triggerTime:300,defaultPlay:false,returnDefault:true});\r\n//业界最专业的服务\r\n$(&quot;#con_routing li .tit&quot;).hover(function(){\r\n    $(this).next().stop(1,1).fadeIn(200)\r\n        .parent().addClass(&quot;active&quot;)\r\n        .siblings().removeClass(&quot;active&quot;).find(&quot;.txt&quot;).hide();\r\n},function(){\r\n    $(this).next().hide();\r\n});\r\n\r\n$(&quot;#con_case .bd .title a&quot;).each(function(){\r\n    var _title = $(this).text();\r\n    //_title = _title.length&lt;=6 ? _title : _title.slice(0,6)+&quot;...&quot;;\r\n    $(&quot;#con_case .hd ul&quot;).append(&quot;&lt;li&gt;&lt;span&gt;&quot;+_title+&quot;&lt;/span&gt;&lt;/li&gt;&quot;);\r\n})\r\n$(&quot;#con_case&quot;).slide();\r\n$(&quot;.LBimg&quot;).lightBox({fixedNavigation:true});\r\n$(&quot;.col_right&quot;).slide({mainCell:&quot;ul&quot;,effect:&quot;topLoop&quot;,autoPlay:true,vis:15});&lt;/script&gt;', '', '', 0, 100, NULL, 1455673673, 1454400947, 0, NULL),
(100, 72, '微站时代来临', '', '', '', '&lt;h2&gt;微站时代来临&lt;/h2&gt;&lt;p&gt;智能手机、平板电脑&lt;br/&gt;2016您的网站触手可及了吗？&lt;/p&gt;&lt;p&gt;E格网络为您链接微世界，赶紧联系我们吧！&lt;/p&gt;', '#', 0, 1, '/eplus/Uploads/Page/20160129/56ab1dddc86df.png', 1454122547, 1454054877, 0, NULL),
(102, 72, 'E格网络', '', '', NULL, '&lt;h2&gt;微站时代来临&lt;/h2&gt;&lt;p&gt;智能手机、平板电脑&lt;br/&gt;2016您的网站触手可及了吗？&lt;/p&gt;&lt;p&gt;E格网络为您链接微世界，赶紧联系我们吧！&lt;/p&gt;', '#', 0, 2, '/eplus/Uploads/Page/20160130/56ac2378d11fb.png', 1454122529, 1454121848, 0, 1455673936),
(104, 78, '关于我们', '', '', '&lt;article&gt;&lt;div class=&quot;wrapper&quot;&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;h1 style=&quot;margin: 0px 0px 10px; padding: 0px 4px 0px 0px; text-align: left; font-size: 32px; font-weight: bold; border-bottom-color: rgb(204, 204, 204); border-bottom-width: 2px; border-bottom-style: solid;&quot; label=&quot;标题居左&quot;&gt;关于我们&lt;/h1&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p style=&quot;padding: 10px 0px; margin-top: 0px; margin-bottom: 0px; line-height: 28px; font-size: 14px; color: rgb(51, 51, 51); font-family: Tahoma, 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Ege工作室成立于2015年，专注于海南网站设计制作、网站推广SEO、网络营销、公司品牌形象VI设计、及空间 、主机、域名服务。&lt;/p&gt;&lt;p style=&quot;padding: 10px 0px; margin-top: 0px; margin-bottom: 0px; line-height: 28px; font-size: 14px; color: rgb(51, 51, 51); font-family: Tahoma, 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Ege工作室是海南最专业的SEO网站推广、网络营销团队，他们为金融、教育、体育、招聘、连锁加盟、企事业单位等行业提供搜索引擎营销解决方案。具有大中型网站运维、管理、市场推广等丰富经验，核心技术能够显著提高网站流量及排名。核心成员具有5年的SEO、SEM经验，10年的网站建设、网络营销经验和上百个关键词排名成功的案例。&lt;/p&gt;&lt;p style=&quot;padding: 10px 0px; margin-top: 0px; margin-bottom: 0px; line-height: 28px; font-size: 14px; color: rgb(51, 51, 51); font-family: Tahoma, 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;企业把网络营销的工作交给Ege工作室来完成，就等于企业自身拥有了一支高效、专业、专注的网络营销团队。我们将利用自身的优势和专业技术，使企业通过网站获得最大限度的利润。&lt;/p&gt;&lt;p style=&quot;padding: 10px 0px; margin-top: 0px; margin-bottom: 0px; line-height: 28px; font-size: 14px; color: rgb(51, 51, 51); font-family: Tahoma, 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;我们的服务理念是：用最低的价格，为企业带来最大的利润！&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;/div&gt;&lt;/article&gt;', NULL, '', 0, 100, NULL, 1455673842, 1454396551, 0, NULL),
(106, 78, '联系方式', '', '', '&lt;article&gt;&lt;div class=&quot;wrapper&quot;&gt;&lt;div class=&quot;contactleft&quot;&gt;&lt;h1 class=&quot;title_contact&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160204/1454549104140584.gif&quot; title=&quot;1454549104140584.gif&quot; alt=&quot;ABOUTUS.gif&quot;/&gt;&lt;/h1&gt;&lt;p class=&quot;tel&quot;&gt;咨询电话：13876961163&lt;/p&gt;&lt;p class=&quot;adr&quot;&gt;办公地址：海口市琼山区道客新村1巷35号&lt;/p&gt;&lt;p class=&quot;adr&quot;&gt;邮箱：zqge@foxmail.com&lt;/p&gt;&lt;p class=&quot;qq&quot;&gt;&lt;a target=&quot;_blank&quot; href=&quot;http://wpa.qq.com/msgrd?v=3&amp;uin=87567798&amp;site=qq&amp;menu=yes&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160204/1454549131137766.png&quot; title=&quot;1454549131137766.png&quot; alt=&quot;qq.png&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class=&quot;clear&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;/article&gt;', NULL, '', 0, 100, NULL, 1454550418, 1454483435, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ep_product`
--

CREATE TABLE IF NOT EXISTS `ep_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `column_id` int(11) NOT NULL COMMENT '栏目id',
  `product_name` varchar(100) NOT NULL COMMENT '产品名称',
  `product_price` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '产品价格',
  `product_company` varchar(100) DEFAULT NULL COMMENT '生产公司',
  `product_parameter` text COMMENT '产品参数',
  `product_number` int(11) DEFAULT NULL COMMENT '产品数量',
  `product_content` text COMMENT '产品内容',
  `product_intro` text COMMENT '产品简介',
  `product_keywords` varchar(100) DEFAULT NULL COMMENT '关键字',
  `product_pic` varchar(100) DEFAULT NULL COMMENT '产品图片',
  `product_url` varchar(200) DEFAULT NULL COMMENT '外部链接',
  `product_date` int(11) DEFAULT NULL COMMENT '生产日期',
  `product_hits` int(11) DEFAULT NULL COMMENT '点击数',
  `product_person` varchar(20) DEFAULT NULL COMMENT '责任人',
  `product_tel` varchar(20) DEFAULT NULL COMMENT '电话号码',
  `product_del` tinyint(11) NOT NULL DEFAULT '0' COMMENT '是否被删除（0不被删除，1被删除）',
  `product_deltime` int(11) DEFAULT NULL COMMENT '删除时间',
  `product_sort` int(11) DEFAULT '100' COMMENT '排行',
  `product_createtime` int(11) NOT NULL COMMENT '创建日期',
  `product_updatetime` int(11) NOT NULL COMMENT '更新日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品表' AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `ep_product`
--

INSERT INTO `ep_product` (`id`, `column_id`, `product_name`, `product_price`, `product_company`, `product_parameter`, `product_number`, `product_content`, `product_intro`, `product_keywords`, `product_pic`, `product_url`, `product_date`, `product_hits`, `product_person`, `product_tel`, `product_del`, `product_deltime`, `product_sort`, `product_createtime`, `product_updatetime`) VALUES
(11, 77, '恩明设计培训', 0.00, 'E格网络工作室', '', 0, '&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &amp;#39;Microsoft YaHei&amp;#39;, &amp;#39;Segoe UI&amp;#39;, Tahoma, Arial, Verdana, sans-serif; font-size: 12px; line-height: 21.6000003814697px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;a class=&quot;LBimg&quot; href=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115207-50.jpg&quot; title=&quot;&quot; style=&quot;color: rgb(51, 153, 255); text-decoration: none;&quot;&gt;&lt;img src=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115207-50.jpg&quot; data-original=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115207-50.jpg&quot; alt=&quot;&quot; style=&quot;border: 8px solid rgba(255, 255, 255, 0.8); max-width: 914px; margin: 0px auto; display: block; background: url(http://www.028studio.com/templets/default/img/bg_loading_anim.gif) 50% 50% no-repeat;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &amp;#39;Microsoft YaHei&amp;#39;, &amp;#39;Segoe UI&amp;#39;, Tahoma, Arial, Verdana, sans-serif; font-size: 12px; line-height: 21.6000003814697px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;a class=&quot;LBimg&quot; href=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115208.jpg&quot; title=&quot;&quot; style=&quot;color: rgb(51, 153, 255); text-decoration: none;&quot;&gt;&lt;img src=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115208.jpg&quot; data-original=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115208.jpg&quot; alt=&quot;&quot; style=&quot;border: 8px solid rgba(255, 255, 255, 0.8); max-width: 914px; margin: 0px auto; display: block; background: url(http://www.028studio.com/templets/default/img/bg_loading_anim.gif) 50% 50% no-repeat;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &amp;#39;Microsoft YaHei&amp;#39;, &amp;#39;Segoe UI&amp;#39;, Tahoma, Arial, Verdana, sans-serif; font-size: 12px; line-height: 21.6000003814697px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;a class=&quot;LBimg&quot; href=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115208-50.jpg&quot; title=&quot;&quot; style=&quot;color: rgb(51, 153, 255); text-decoration: none;&quot;&gt;&lt;img src=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115208-50.jpg&quot; data-original=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115208-50.jpg&quot; alt=&quot;&quot; style=&quot;border: 8px solid rgba(255, 255, 255, 0.8); max-width: 914px; margin: 0px auto; display: block; background: url(http://www.028studio.com/templets/default/img/bg_loading_anim.gif) 50% 50% no-repeat;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &amp;#39;Microsoft YaHei&amp;#39;, &amp;#39;Segoe UI&amp;#39;, Tahoma, Arial, Verdana, sans-serif; font-size: 12px; line-height: 21.6000003814697px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;a class=&quot;LBimg&quot; href=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115209.jpg&quot; title=&quot;&quot; style=&quot;color: rgb(51, 153, 255); text-decoration: none;&quot;&gt;&lt;img src=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115209.jpg&quot; data-original=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115209.jpg&quot; alt=&quot;&quot; style=&quot;border: 8px solid rgba(255, 255, 255, 0.8); max-width: 914px; margin: 0px auto; display: block; background: url(http://www.028studio.com/templets/default/img/bg_loading_anim.gif) 50% 50% no-repeat;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &amp;#39;Microsoft YaHei&amp;#39;, &amp;#39;Segoe UI&amp;#39;, Tahoma, Arial, Verdana, sans-serif; font-size: 12px; line-height: 21.6000003814697px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;a class=&quot;LBimg&quot; href=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115210.jpg&quot; title=&quot;&quot; style=&quot;color: rgb(51, 153, 255); text-decoration: none;&quot;&gt;&lt;img src=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115210.jpg&quot; data-original=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115210.jpg&quot; alt=&quot;&quot; style=&quot;border: 8px solid rgba(255, 255, 255, 0.8); max-width: 914px; margin: 0px auto; display: block; background: url(http://www.028studio.com/templets/default/img/bg_loading_anim.gif) 50% 50% no-repeat;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &amp;#39;Microsoft YaHei&amp;#39;, &amp;#39;Segoe UI&amp;#39;, Tahoma, Arial, Verdana, sans-serif; font-size: 12px; line-height: 21.6000003814697px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;a class=&quot;LBimg&quot; href=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115210-50.jpg&quot; title=&quot;&quot; style=&quot;color: rgb(51, 153, 255); text-decoration: none;&quot;&gt;&lt;img src=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115210-50.jpg&quot; data-original=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115210-50.jpg&quot; alt=&quot;&quot; style=&quot;border: 8px solid rgba(255, 255, 255, 0.8); max-width: 914px; margin: 0px auto; display: block; background: url(http://www.028studio.com/templets/default/img/bg_loading_anim.gif) 50% 50% no-repeat;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &amp;#39;Microsoft YaHei&amp;#39;, &amp;#39;Segoe UI&amp;#39;, Tahoma, Arial, Verdana, sans-serif; font-size: 12px; line-height: 21.6000003814697px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;a class=&quot;LBimg&quot; href=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115211.jpg&quot; title=&quot;&quot; style=&quot;color: rgb(51, 153, 255); text-decoration: none;&quot;&gt;&lt;img src=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115211.jpg&quot; data-original=&quot;http://www.028studio.com/uploads/allimg/150911/2-150911115211.jpg&quot; alt=&quot;&quot; style=&quot;border: 8px solid rgba(255, 255, 255, 0.8); max-width: 914px; margin: 0px auto; display: block; background: url(http://www.028studio.com/templets/default/img/bg_loading_anim.gif) 50% 50% no-repeat;&quot;/&gt;&lt;/a&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '    恩明设计培训，是国内首家“家居时尚设计”培训机构。\r\n依托国内顶级家居设计品牌——789DDN®的教育资源及行业影响力，旨在为家居行业输出更多的优秀设计研发人才！', '', '/eplus/Uploads/Product/20160202/56b00a9be1e57.jpg', NULL, NULL, 16, NULL, NULL, 0, NULL, 100, 1454377627, 1454377627),
(14, 77, '是否', 0.00, '是否', '', 0, NULL, '', '', '/eplus/Uploads/Product/20160218/56c51b9ae623f.png', '', NULL, 0, NULL, NULL, 1, 1455775626, 100, 1455758205, 1455758234),
(13, 77, '宝来钢业集体有限公司', 0.00, 'E格网络工作室', '', 0, '&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160202/1454385311115122.png&quot; title=&quot;1454385311115122.png&quot; alt=&quot;QQ图片20160202115448.png&quot; width=&quot;863&quot; height=&quot;511&quot; style=&quot;width: 863px; height: 511px;&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160202/1454384522936974.png&quot; style=&quot;width: 878px; height: 444px;&quot; title=&quot;1454384522936974.png&quot; width=&quot;878&quot; height=&quot;444&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20160202/1454384522125880.png&quot; style=&quot;width: 860px; height: 604px;&quot; title=&quot;1454384522125880.png&quot; width=&quot;860&quot; height=&quot;604&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 'Baolai Steel Group is a wholly owned private corporation, specializing in the production of stainless steel materials and special alloy. ', '', '/eplus/Uploads/Product/20160202/56b0259ca8212.png', 'http://www.blsteelgroup.com/', NULL, 13, NULL, NULL, 0, NULL, 100, 1454384540, 1454385338);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
