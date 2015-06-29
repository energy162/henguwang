<?php if (!defined('THINK_PATH')) exit();?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Motel Champlain</title>
<link rel="stylesheet" type="text/css" href="/Public/css/global.css" /><link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
<script type="text/javascript" src="/Public/js/function.js"></script><script type="text/javascript" src="/Public/js/tools.js"></script><script type="text/javascript" src="/Public/js/jquery.js"></script>
<script>
    $(function(){
        $('input[name="username"]').focus(function(){
          $('#umessage').remove();
        });
          
        $('input[name="username"]').blur(function(){
          var username=$(this).val();
            $.get('__APP__/Login/checkName',{'username':username},function(data){
            if(username!=''){
              if(data=='不允许'){
                $('input[name="username"]').parent().parent().after('<div class="ts_2" id="umessage"  style="color:red">该用户名已经注册</div>');
              }else{
                $('input[name="username"]').parent().parent().after('<div class="ts_2" id="umessage" style="color:green">可以注册</div>');
              }
              }else{
                $('input[name="username"]').after('<div class="ts_2" id="umessage" style="color:blue">注册名不能为空</div>');
            }
            })
          });
      });

function fleshVerify(type){ 
	//重载验证码
	var timenow = new Date().getTime();
	if (type){
		$('#verifyImg').attr("src", '__URL__/verify/adv/1/'+timenow);
	}else{
		$('#verifyImg').attr("src", '__URL__/verify/'+timenow);
	}
}
   </script>
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
<div class="page">
	<div class="dlym">
	<div class="Menubox3">
    <ul class="Gray">
      <li id="zc1" onMouseOver="setTab('san',1,2)"  class="hover"><a href="<?php echo U('Index/Login/index');?>"><img src="__PUBLIC__/images/dl-2.jpg" width="266" height="50"></a></li>
      <li id="zc2" onMouseOver="setTab('san',2,2)" ><a href="#"><img src="__PUBLIC__/images/zc-2.jpg" width="266" height="50"></a></li>
    </ul>
  </div>
  <div class="dlym-sr2">
  <form class="form-signin" role="form" action="<?php echo U('Login/checkregs');?>" method="post">
    <div class="zc_2"><span class="wz">用户名：</span><span class="srk"><input name="username" type="text"></span></div>
    <div class="zc_2"><span class="wz">密　码：</span><span class="srk"><input name="password" type="password"></span></div>
	<div class="zc_2"><span class="wz">验　证：</span><span class="srk"><input name="code" type="text"></span></div>
    <div class="ts_2"><img id="verifyImg" SRC="<?php echo U('Login/verify');?>" onClick="fleshVerify(this)" border="0" alt="点击刷新验证码" style="cursor:pointer;width:80px;vertical-align:top;" align="absmiddle"></div>
    <div class="zc_2"><span class="wz">邮　箱：</span><span class="srk"><input name="email" type="text"></span></div>
    <div class="zc"></div>
    <div class="zc"><input name="license" type="checkbox" value="1" checked="true">我已经认真阅读并同意<a href="javascript:void window.open ( '<?php echo U('Login/agreement');?>', 'newwindow', 'height=800, width=1000, top=0, left=0,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=n o,status=no')">《网站注册协议》</a></div>
      <div class="anniu"><input type="image" src="__PUBLIC__/images/pic11.jpg" width="288" height="41" border="0"></div>

  </div>
  <div style="clear:both;display:block; "></div>
</div>
<div class="blank100"></div>
</div>
<div class="di">
	<div class="page">
    <div  class="tt">EMAIL:xxx@xxxx.com QQ:3012644588<br>
本站所载文章及数据仅供分享，不可作为投资依据，股市有风险，入市需谨慎。</div></div>
</div>
</body>
</html>