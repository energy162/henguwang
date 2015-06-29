<?php if (!defined('THINK_PATH')) exit();?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Motel Champlain</title>
<link rel="stylesheet" type="text/css" href="/Public/css/global.css" /><link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
<script type="text/javascript" src="/Public/js/function.js"></script><script type="text/javascript" src="/Public/js/tools.js"></script><script type="text/javascript" src="/Public/js/jquery.js"></script>
</head>
<body>
<div class="top">
  <div class="page">
    <div class="ny-logo"><img src="__PUBLIC__/images/logo-ny.png" width="165" height="55"></div>
    <div class="user2">
      <h3><a href="#"><img src="__PUBLIC__/images/q8.jpg" width="36" height="27"></a></h3>
    </div>
    <div class="search-ny">
      <input name="code" type="text" id="_code">
      <a href="javascript:void(0);" onclick="searchCode('__APP__')"><img src="__PUBLIC__/images/search-img-2.jpg" width="57" height="32" border="0"></a></div>
  </div>
</div>
<div class="page_2">
<?php if($message != null): ?><div class="ts_3"><img src="__PUBLIC__/images/gou.jpg"></div>
    <div class="ts_4"><?php echo ($message); ?></div>
<?php else: ?>
    <div class="ts_3"><img src="__PUBLIC__/images/cha.jpg"></div>
    <div class="ts_4"><?php echo ($error); ?></div><?php endif; ?>
    <div class="ts_5">页面自动 <a id="href" href="<?php echo ($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo ($waitSecond); ?></b></div>
  <div class="blank100"></div>
</div>
<div class="di">
	<div class="page">
    <div  class="tt">EMAIL:xxx@xxxx.com QQ:3012644588<br>
本站所载文章及数据仅供分享，不可作为投资依据，股市有风险，入市需谨慎。</div></div>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time == 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 2000);
})();
</script>
</body>
</html>