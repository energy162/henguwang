<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?php echo R('Index/Siteinfo/info',array('title'),'Widget');?>的后台管理面板</title>

<link href="../Public/dwz/themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../Public/dwz/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../Public/dwz/themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
<link href="../Public/dwz/uploadify/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
<!--[if IE]>
<link href="../Public/dwz/themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
<![endif]-->

<script src="../Public/dwz/js/speedup.js" type="text/javascript"></script>
<script src="../Public/dwz/js/jquery-1.7.1.js" type="text/javascript"></script>
<script src="../Public/dwz/js/jquery.cookie.js" type="text/javascript"></script>
<script src="../Public/dwz/js/jquery.validate.js" type="text/javascript"></script>
<script src="../Public/dwz/js/jquery.bgiframe.js" type="text/javascript"></script>

<script src="../Public/dwz/xheditor/xheditor-1.1.14-zh-cn.min.js" type="text/javascript"></script>
<script src="../Public/dwz/uploadify/scripts/swfobject.js" type="text/javascript"></script>
<script src="../Public/dwz/uploadify/scripts/jquery.uploadify.v2.1.0.js" type="text/javascript"></script>


<script src="../Public/dwz/js/dwz.min.js" type="text/javascript"></script>
<script src="../Public/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	DWZ.init("../Public/dwz/dwz.frag.xml", {
		//loginUrl:"login_dialog.html", loginTitle:"登录",	// 弹出登录对话框
		//loginUrl:"login.html",	// 跳到登录页面
		statusCode:{ ok:200, error:300, timeout:301}, //【可选】
		pageInfo:{ pageNum:"pageNum", numPerPage:"numPerPage", orderField:"_order", orderDirection:"_sort"}, //【可选】
		debug:false,	// 调试模式 【true|false】
		callback:function(){
			initEnv();
			$("#themeList").theme({ themeBase:"../Public/dwz/themes"}); // themeBase 相对于index页面的主题base路径
		}
	});
});



</script>
</head>

<body scroll="no">
	<div id="layout">
		<div id="header">
			<div class="headerNav">
				<a class="logo" href="#">标志</a>
				<ul class="nav">
					<li><a href="__APP__/" target="_blank">进入首页</a></li>	
					<li><a href="#" target="_blank">欢迎您：<?php echo (session('adminuser')); ?></a></li>
					<li><a href="__GROUP__/Login/logout">退出</a></li>
				</ul>
				
				<ul class="themeList" id="themeList">
					<li theme="default"><div class="selected">蓝色</div></li>
					<li theme="green"><div>绿色</div></li>
					<li theme="purple"><div>紫色</div></li>
					<li theme="silver"><div>银色</div></li>
					<li theme="azure"><div>天蓝</div></li>
				</ul>
			</div>
		</div>

		<div id="leftside">
			<div id="sidebar_s">
				<div class="collapse">
					<div class="toggleCollapse"><div></div></div>
				</div>
			</div>
			<div id="sidebar">
				<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>
				<div class="accordion" fillSpace="sidebar">
					<div class="accordionHeader">
						<h2><span>Folder</span>会员信息管理</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a href="<?php echo U('User/index');?>" target="navTab" rel="listusers" title="会员信息" >浏览会员信息</a></li>
							<li><a href="<?php echo U('User/add');?>" target="dialog" width="600" height="300">添加会员信息</a></li>
							<li><a href="<?php echo U('Rank/index');?>" target="navTab" rel="listusertype" title="会员等级" >会员等级</a></li>
						</ul>
					</div>
					<!-- 文章管理 -->
					<div class="accordionHeader">
						<h2><span>Folder</span>文章管理</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a href="<?php echo U('Category/index');?>" target="navTab" rel="listcate" title="文章分类列表" >文章分类列表</a></li>
							<li><a href="<?php echo U('Articlem/index');?>" target="navTab" rel="listarticle" title="文章列表" >文章列表</a></li>
							<li><a href="<?php echo U('Articlem/rubbish');?>" target="navTab" rel="listarticle1" title="文章回收站" >文章回收站</a></li>
						</ul>
					</div>
					<!-- 用户赞助 -->
					<div class="accordionHeader">
						<h2><span>Folder</span>用户赞助</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a href="<?php echo U('support/index');?>" target="navTab" rel="listcate" title="用户赞助列表" >用户赞助列表</a></li>
						</ul>
					</div>

					<div class="accordionHeader">
						<h2><span>Folder</span>系统管理</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<!-- <li><a href="<?php echo U('Bak/index');?>" target="navTab" rel="listdb" title="数据库下载" >数据库下载</a></li> -->
							<li><a href="<?php echo U('Link/index');?>" target="navTab" rel="listlink" title="友情链接" >友情链接列表</a></li>
							<!-- <li><a href="<?php echo U('Database/index',array('type'=>'export'));?>" target="navTab" rel="listdb" title="数据库备份" >数据库备份</a></li> -->
							<!-- <li><a href="<?php echo U('Database/index',array('type'=>'import'));?>" target="navTab" rel="listdb" title="数据库还原" >数据库还原</a></li> -->
							<li><a href="<?php echo U('Fields/index');?>" target="navTab" rel="listfields" title="站点参数配置" >站点参数配置</a></li>
							<li><a href="<?php echo U('System/index');?>" target="navTab" rel="listsystem" title="系统配置" >系统配置</a></li>
							<li><a href="<?php echo U('System/updateSystemCache');?>" target="dialog" rel="listsystem" title="更新系统缓存" >更新系统缓存</a></li>
							<li><a href="<?php echo U('System/updateTplCache');?>" target="dialog" rel="listsystem" title="更新模版缓存" >更新模版缓存</a></li>
						</ul>
					</div>
					<div class="accordionHeader">
						<h2><span>Folder</span>权限管理</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a href="<?php echo U('Rbacuser/index');?>" target="navTab" rel="rbacuser" title="用户管理" >用户管理</a></li>
							<!-- <li><a href="<?php echo U('Rbacrole/index');?>" target="navTab" rel="rbacrole" title="角色管理" >角色管理</a></li> -->
							<!-- <li><a href="<?php echo U('Rbacnode/index');?>" target="navTab" rel="rbacnode" title="节点管理" >节点管理</a></li> -->
					
						</ul>
					</div>
				</div>

			</div>
		</div>
		<div id="container">
			<div id="navTab" class="tabsPage">
				<div class="tabsPageHeader">
					<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
						<ul class="navTab-tab">
							<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
						</ul>
					</div>
					<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
					<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
					<div class="tabsMore">more</div>
				</div>
				<ul class="tabsMoreList">
					<li><a href="javascript:;">主页</a></li>
				</ul>
				<div class="navTab-panel tabsPageContent layoutBox">
					<div class="page unitBox">
						<div class="accountInfo">
							<p>今天是 <?php echo (date('Y-m-d g:i a',time())); ?> </p>
						</div>
						<div class="pageFormContent"  style="">			 
						<table class="list"  width="100%" layoutH="112">		
							<tr class="row" ><th colspan="3" class="space">系统信息</th></tr>
							<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="row" ><td width="50%"><?php echo ($key); ?></td><td width="50%"><?php echo ($v); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</table>
						<!--
						<div style="width:230px;position: absolute;top:60px;right:0" layoutH="80">
							<img src="001.jpg" width="200">
							
							<h2>事件消息</h2>
							<ul>
								<li >1.XXXXXXXXXXXXXXXXXXXXXXXxx</li>
								<li >2.XXXXXXXXXXXXXXXXXXXXXXXxx</li>
								<li >3.XXXXXXXXXXXXXXXXXXXXXXXxx</li>
								<li >4.XXXXXXXXXXXXXXXXXXXXXXXxx</li>
								<li >5.XXXXXXXXXXXXXXXXXXXXXXXxx</li>
							</ul>
						</div>
						
						-->
						
					</div>
					
					
				</div>
			</div>
		</div>

	</div>

</body>
</html>