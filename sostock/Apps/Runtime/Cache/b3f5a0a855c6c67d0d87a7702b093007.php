<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="keywords" content="<?php echo ($metas['keywords']); ?>">
    <meta name="description" content="<?php echo ($metas['description']); ?>">
<title>上涨概率排行榜</title>
<style type="text/css"></style>
<link href="__PUBLIC__/css/global.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="__PUBLIC__/js/function.js"></script>
    <script language="javascript" type="text/javascript" src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>
</head>
<body>
<div class="top">
    <div class="page">
        <div class="ny-logo"><img src="__PUBLIC__/images/logo-ny.png" width="165" height="55"></div>
        <div class="user2">
            <h3><a href="#"><img src="__PUBLIC__/images/q8.jpg" width="36" height="27"></a></h3>
        </div>
        <div class="search-ny">
            <input name="" type="text">
            <a href="#"><img src="__PUBLIC__/images/search-img-2.jpg" width="57" height="32" border="0"></a></div>
    </div>
</div>
<div class="page">
    <div class="ph-center">
        <div class="bzgl">上涨概率排行榜</div>
        <div class="bzbg">
            <table width="727" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr bgcolor="#B0C1E3">
                    <td><table width="100%" border="0" cellspacing="1" cellpadding="6">
                        <tr class="white">
                            <th width="10%" height="30" align="center" bgcolor="#4c73c1">股票代码</th>
                            <th width="11%" height="30" align="center" bgcolor="#4c73c1">股票简称</th>
                            <th width="15%" bgcolor="#4c73c1">收盘价</th>
                            <th width="16%" align="center" bgcolor="#4c73c1" action-type="sort" <?php if($data['order'] == 's1'): if($data['desc'] == '1'): ?>class="sort-down"<?php else: ?>class="sort-up"<?php endif; endif; ?>><a data-order="s1" href="javascript:;">5日涨幅超过<br />5%的概率</a></th>
                            <th width="16%" align="center" bgcolor="#4c73c1" action-type="sort" <?php if($data['order'] == 's2'): if($data['desc'] == '1'): ?>class="sort-down"<?php else: ?>class="sort-up"<?php endif; endif; ?>><a data-order="s2" href="javascript:;">5日涨幅超过<br />10%的概率</a></th>
                            <th width="16%" align="center" bgcolor="#4c73c1" action-type="sort" <?php if($data['order'] == 's3'): if($data['desc'] == '1'): ?>class="sort-down"<?php else: ?>class="sort-up"<?php endif; endif; ?>><a data-order="s3" href="javascript:;">10日涨幅超过<br />5%的概率</a></th>
                            <th width="16%" align="center" bgcolor="#4c73c1" action-type="sort" <?php if($data['order'] == 's4'): if($data['desc'] == '1'): ?>class="sort-down"<?php else: ?>class="sort-up"<?php endif; endif; ?>><a data-order="s4" href="javascript:;">20日涨幅超过<br />10%的概率</a></th>
                        </tr>
                        <?php if(is_array($data['list'])): $i = 0; $__LIST__ = $data['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td height="30" align="center" bgcolor="#FFFFFF"><a href="__URL__/view/code/<?php echo ($vo["code"]); ?>" target="_blank"><?php echo ($vo["code"]); ?></a></td>
                            <td height="30" align="center" bgcolor="#FFFFFF"><a href="__URL__/view/code/<?php echo ($vo["code"]); ?>" target="_blank"><?php echo ($vo["name"]); ?></a></td>
                            <td align="center" bgcolor="#FFFFFF"><?php echo ($vo["lastdayClose"]); ?></td>
                            <td align="center" bgcolor="#FFFFFF"><?php echo ($vo["fiveDayUp51"]); ?>%</td>
                            <td align="center" bgcolor="#FFFFFF"><?php echo ($vo["tenDayUp51"]); ?>%</td>
                            <td align="center" bgcolor="#FFFFFF"><?php echo ($vo["tenDayUp101"]); ?>%</td>
                            <td align="center" bgcolor="#FFFFFF"><?php echo ($vo["twentyDayUp101"]); ?>%</td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr>
                            <td colspan="7"><div class="pgs"><?php echo ($data['page']); ?></div></td>
                        </tr>
                    </table></td>
                </tr>
            </table>
        </div>

    </div>

    <div class="ny-right">
    <?php if(session('uid') > '0'): ?><div class="yh">
            <img src="__PUBLIC__/images/pic4.jpg" width="63" height="63">
            <p>用户名：巴菲特 <br>
                用户类型：注册用户 <br>
                到期时间：2015.5.20</p>
            <div class="yhzx1 white"><a href="__URL__/Person">个人中心</a></div>
            <div class="yhzx white"><a href="#">我要赞助</a></div>
            <div style="clear:both;display:block; "></div>
        </div><?php endif; ?>
    <div class="kx">
        <p>K线选股</p>
        <div class="xuangu">
            <ul>
                <li class="q1"><a href="__URL__/uplist">上涨概率排行榜</a></li>
                <li class="q2"><a href="#">回调上攻</a></li>
                <li class="q3"><a href="#">双底突破</a></li>
                <li class="q4"><a href="#">三底突破</a></li>
                <li class="q5"><a href="#">两阳夹一阴</a></li>
                <li class="q6"><a href="#">其他模式</a></li>
            </ul>
        </div>
    </div>
    <div class="kx">
        <p>财报选股</p>
        <div class="czx"><a href="#">成长型</a></div>
        <div class="jzx"><a href="#">价值型</a></div>
    </div>
    <div class="kx">
        <p>研报推荐</p>
        <div class="ybtj">
            <ul>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>

            </ul>
        </div>
        <div style="clear:both;display:block; "></div></div>
    <div class="kx">
        <p>专题</p>
        <div class="ybtj">
            <ul>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>
                <li>· <a href="#">银河证券：货币政策坚持现有基调</a></li>

            </ul>
        </div>
        <div style="clear:both;display:block; "></div></div>
</div>
    <div style="clear:both;display:block; "></div>
</div>
<div class="di">
    <div class="page">
        <div  class="tt">EMAIL:xxx@xxxx.com QQ:3012644588<br>
本站所载文章及数据仅供分享，不可作为投资依据，股市有风险，入市需谨慎。</div></div>
</div>
<form name="myform" id="myform" method="get" action="__ACTION__">
    <input type="hidden" name="s" value="/Index/uplist" />  <input type="hidden" name="p" value="<?php echo ($data['p']); ?>" /><input type="hidden" name="order" value="<?php echo ($data['order']); ?>" /><input type="hidden" name="desc" value="<?php echo ($data['desc']); ?>" />
</form>
<script type="text/javascript">
    $("th[action-type='sort'] a").click(function () {
        var form = $("#myform")[0];
        var data = $(this).data('order');
        if (data == form['order'].value) {
            //排序字段相同，则切换排序方向
            form['desc'].value = form['desc'].value == "0" ? "1" : "0";
        } else {
            form['order'].value = data;
        }
        form.submit();
        return false;
    });
</script>
</body>
</html>