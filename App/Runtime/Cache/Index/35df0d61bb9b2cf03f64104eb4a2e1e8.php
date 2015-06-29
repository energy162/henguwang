<?php if (!defined('THINK_PATH')) exit();?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Motel Champlain</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	text-align:center;
	background:url(__PUBLIC__/images/index-bg.jpg)
}
</style>
<link rel="stylesheet" type="text/css" href="/Public/css/global.css" /><link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
<script type="text/javascript" src="/Public/js/function.js"></script><script type="text/javascript" src="/Public/js/tools.js"></script><script type="text/javascript" src="/Public/js/jquery.js"></script>
<base target="_self">
</head>
<body>
<div class="page">
  <div class="user">
  <?php if($_SESSION[C('USER_AUTH_KEY_ID')]): ?><a href="<?php echo U('Index/Login/doLogout');?>"  target="_Self">退出</a>
  <?php else: ?>
  <a href="<?php echo U('Index/Login/index');?>">登录</a>&nbsp;<a href="<?php echo U('Index/Login/checkreg');?>">注册</a><?php endif; ?>
  </div>
  <div class="logo"><img src="__PUBLIC__/images/logo.png" width="285" height="64"></div>
  <div class="search">
    <input name="code" type="text" id="_code">
    <a href="javascript:void(0);" onclick="searchCode('__APP__')"><img src="__PUBLIC__/images/search-img.jpg"></a>
  </div>
    <div class="blank170"></div>
  <div class="fl">
      <?php if(is_array($modelid0)): $i = 0; $__LIST__ = $modelid0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$modelids): $mod = ($i % 2 );++$i;?><div  class="<?php if($key+1 == count($modelid0)): ?>ts2<?php else: ?>ts<?php endif; ?>"><img src="__PUBLIC__/images/q1.jpg" width="57" height="63">
        <p><?php echo ($modelids["name"]); ?></p>
        <span><?php if(is_array($modelids["Article"])): $i = 0; $__LIST__ = $modelids["Article"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Articles): $mod = ($i % 2 );++$i; if($Articles["ispush"] == 1): ?><a href="<?php echo U('Index/Article/index/',array('articleid'=>$Articles['article_id']));?>" target="_blank"><?php echo ($Articles["title"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?></span></div><?php endforeach; endif; else: echo "" ;endif; ?>

  <div style="clear:both;display:block; "></div></div>
  
  <div class="links"><span>友情连接：</span><?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><a href="<?php echo ($link["url"]); ?>"><?php echo ($link["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div>
  <!-- footer start -->
  <div class="bq">
    <div class="phone">
		<span><a href="<?php echo U('Index/Index/about');?>"  style="color:#b7b7b7;">关于我们</a></span>
		<span>　　EMAIL:3012644588@qq.com</span>
		<span>　　联系我们：QQ 3012644588</span><br>
		  本站所载文章及数据仅供分享，不可作为投资依据，股市有风险，入市需谨慎。
	</div>
    <div class="copyright">Copyright © 恨股网. All Rights Reserved</div>
</div>

  <!-- footer end -->
</div>
</body>
</html>