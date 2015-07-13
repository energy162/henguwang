<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="keywords" content="<?php echo ($metas['keywords']); ?>">
    <meta name="description" content="<?php echo ($metas['description']); ?>">
    <title><?php echo ($data['stock']['shortName']); ?>（<?php echo ($data['stock']['code']); ?>）-恨股网</title>
    <meta name="keywords" content="<?php echo ($metas['keywords']); ?>">
    <meta name="description" content="<?php echo ($metas['description']); ?>">
    <style type="text/css"></style>
    <link href="__PUBLIC__/css/global.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/css/silder.css" rel="stylesheet" type="text/css" />
    <script language="javascript" type="text/javascript" src="__PUBLIC__/js/function.js"></script>
    <script language="javascript" type="text/javascript" src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>
    <script language="javascript" type="text/javascript" src="__PUBLIC__/js/highstock.min.js"></script>
    <script language="javascript" type="text/javascript" src="__PUBLIC__/js/chartExt.js"></script>
    <script language="javascript" type="text/javascript" src="__PUBLIC__/js/slides.min.jquery.js"></script>
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
    <div class="zs-left" style="display: none"><a href="#"><img src="__PUBLIC__/images/left.jpg" width="15" height="27" border="0"></a></div>
    <div class="zs-right" style="display: none"><a href="#"><img src="__PUBLIC__/images/right.jpg" width="15" height="27" border="0"></a></div>
    <div class="ny-left">
        <div class="gszl">
            <p>公司资料</p>
            <ul>
                <li class="z1"><a href="http://guba.eastmoney.com/list,<?php echo ($data['stock']['code']); ?>.html" target="_blank">公司股吧</a></li>
                <li class="z2"><a href="http://data.p5w.net/stock/fxpj.php?code=<?php echo ($data['market']); echo ($data['stock']['code']); ?>" target="_blank">投资评级</a></li>
                <li class="z1"><a href="http://vip.stock.finance.sina.com.cn/corp/go.php/vCB_AllNewsStock/symbol/<?php echo ($data['market']); echo ($data['stock']['code']); ?>.phtml" target="_blank">公司新闻</a></li>
                <li class="z2"><a href="http://data.eastmoney.com/report/<?php echo ($data['stock']['code']); ?>.html" target="_blank">盈利预测</a></li>
                <li class="z1"><a href="http://data.p5w.net/stock/lsgg.php?code=<?php echo ($data['market']); echo ($data['stock']['code']); ?>" target="_blank">公司公告</a></li>
                <li class="z2"><a href="http://data.eastmoney.com/zjlx/<?php echo ($data['stock']['code']); ?>.html" target="_blank">资金流向</a></li>
                <li class="z1"><a href="http://f10.eastmoney.com/f10_v2/FinanceAnalysis.aspx?code=<?php echo ($data['market']); echo ($data['stock']['code']); ?>" target="_blank">财务数据</a></li>
                <li class="z2"><a href="http://vip.stock.finance.sina.com.cn/q/go.php/vReport_List/kind/search/index.phtml?symbol=<?php echo ($data['stock']['code']); ?>&t1=all" target="_blank">公司研报</a></li>
                <li class="z1"><a href="http://f10.eastmoney.com/f10_v2/ShareholderResearch.aspx?code=<?php echo ($data['market']); echo ($data['stock']['code']); ?>" target="_blank">主要股东</a></li>
                <li class="z2"><a href="http://vip.stock.finance.sina.com.cn/corp/go.php/vCI_CorpInfo/stockid/<?php echo ($data['stock']['code']); ?>.phtml" target="_blank">公司概况</a></li>
            </ul>
            <div style="clear:both;display:block; "></div>
        </div>
        <div class="gszl">
            <p>涨幅榜（<?php echo (date('md',strtotime($data['maxdate']))); ?>）</p>
            <div class="tline">
                <ul>
                    <li class="fj1 blue">名称</li>
                    <li class="fj2 blue">最新价</li>
                    <li class="fj3 blue">涨幅</li>
                </ul>
            </div>
            <?php if(is_array($data['uplist'])): $i = 0; $__LIST__ = $data['uplist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tline">
                    <ul>
                        <li class="fj1"><a href="__URL__/view/code/<?php echo ($vo["ob_seccode"]); ?>" target="_blank"><?php echo ($vo["ob_secname"]); ?></a></li>
                        <li class="fj2"><?php echo ($vo["f007n"]); ?></li>
                        <li class="fj3 red"><?php echo ($vo["f015n"]); ?>%</li>
                    </ul>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>


        </div>
        <div class="gszl">
            <p>跌幅榜（<?php echo (date('md',strtotime($data['maxdate']))); ?>）</p>
            <div class="tline">
                <ul>
                    <li class="fj1 blue">名称</li>
                    <li class="fj2 blue">最新价</li>
                    <li class="fj3 blue">跌幅</li>
                </ul>
            </div>
            <?php if(is_array($data['downlist'])): $i = 0; $__LIST__ = $data['downlist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tline">
                    <ul>
                        <li class="fj1"><a href="__URL__/view/code/<?php echo ($vo["ob_seccode"]); ?>" target="_blank"><?php echo ($vo["ob_secname"]); ?></a></li>
                        <li class="fj2"><?php echo ($vo["f007n"]); ?></li>
                        <li class="fj3 green"><?php echo ($vo["f015n"]); ?>%</li>
                    </ul>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
    </div>
    <div class="ny-center">
        <div class="gegu">
            <div class="gumc"><?php echo ($data['stock']['name']); ?>
                <p>（<?php echo ($data['stock']['code']); ?>）</p>
            </div>
            <div class="sj"><span>涨幅：<?php echo ($data['trade']['s10']); ?>% </span><span>现价：<?php echo ($data['trade']['s6']); ?>元 </span><span>涨跌：<?php echo ($data['trade']['s11']); ?></span><span>今开：<?php echo ($data['trade']['s3']); ?>元</span><span>最高：<?php echo ($data['trade']['s4']); ?>元</span><span>最低：<?php echo ($data['trade']['s5']); ?>元</span></div>
        </div>
        <div class="comment">统计显示，日K线历史上相似走势共：<?php echo ($data['probability']['num1']); ?>个；<?php echo ($data['probability']['days1']); ?>个交易日上涨概率<?php echo ($data['probability']['fiveDayUp1']); ?>%，涨幅超过5%的概率<?php echo ($data['probability']['fiveDayUp51']); ?>%，涨幅超过10%的概率为<?php echo ($data['probability']['fiveDayUp101']); ?>%；10日交易日涨幅超过5%的概率为<?php echo ($data['probability']['tenDayUp51']); ?>%，涨幅超过10%的概率为<?php echo ($data['probability']['tenDayUp101']); ?>%。（下图中ABCDE标记的即为相似K线）</div>
        <div class="clear"></div>
        <div class="Menubox">
            <ul class="Gray">
                <li id="san1" class="hover"><a href="#">日 线</a></li>
            </ul>
        </div>
        <div class="Contentbox">
            <div id="con_san_1" class="hover" style="height: 349px;width: 474px;padding:0;">
                <div id="container" style="height: 349px;width: 474px">
                </div></div>
            <div id="con_san_2" style="display:none"> <img src="__PUBLIC__/images/pic1.jpg" width="474" height="349"> </div>
        </div>
        <div class="clear"></div>
        <div class="Menubox2">
            <ul class="Gray">
                <li id="er1" class="hover"><a href="#">历史类似走势</a></li>
            </ul>
        </div>
        <div id="slides">
            <div class="slides_container" >
            <?php if($data['trend']): if(is_array($data['trend'])): $i = 0; $__LIST__ = $data['trend'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="slide">
                        <div class="lszs">
                            <p><a href="__URL__/view/code/<?php echo ($vo["code"]); ?>" target="_blank"><?php echo ($vo["name"]); ?>(<?php echo ($vo["code"]); ?>)</a> <span>历史相似日期：<?php echo ($vo["date"]); ?></span></p>
                        </div>
                        <div id="container<?php echo ($i); ?>" style="height: 349px;width: 474px;">
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

                <?php else: ?>
                <div class="slide">
                    <div class="lszs">
                            <p>你遇上了一个奇葩，这个走势在历史上没出现过哦！</p>
                    </div>
                        <div style="height: 349px;width: 474px;">
                        </div>
</div><?php endif; ?>
        </div>
        </div>
        <div class="clear"></div>
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
<script type="text/javascript">
    //绘制K线图
    function tradeChart(){
        var url="__APP__/Stock/kline";
        var stockCode = "<?php echo ($data['stock']['code']); ?>";
        var stockName = "<?php echo ($data['stock']['name']); ?>";
        var enddate="<?php echo ($data['maxdate']); ?>";
        new highStockChart('container',url, {"code":stockCode,"name":stockName,"enddate":enddate});
    <?php if(is_array($data['trend'])): $i = 0; $__LIST__ = $data['trend'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>var stockCode2="<?php echo ($vo["code"]); ?>";
        var stockName2="<?php echo ($vo["name"]); ?>";
        var stockDate="<?php echo ($vo["date"]); ?>";
        new highStockChart('container<?php echo ($i); ?>',url,{"code":stockCode2,"name":stockName2,"date":stockDate});<?php endforeach; endif; else: echo "" ;endif; ?>
        //$('.slide').eq(0).show();
    }

    function makesilder()
    {
        if (typeof useEffect == "undefined") { useEffect = 'slide' };
        var isTouch = typeof window.ontouchstart !== 'undefined';
        var mySildes = $('#slides');
        if (!isTouch && $('.slide', mySildes).size() > 1) {
            $('<a href="#" onfocus="this.blur()" class="prev"></a>').appendTo(mySildes).hide();
            $('<a href="#" onfocus="this.blur()" class="next"></a>').appendTo(mySildes).hide();
            // mySildes.hover(function () {
            $('.prev').show();
            $('.next').show();
            // }, function () {
            //     $('.prev').hide();
            //     $('.next').hide();
            //});

        }
        else {
            useEffect = 'slide';
        }
        mySildes.slides({
            preload: true,
            preloadImage: '__PUBLIC__/images/loading.gif',
            fadeSpeed: 1200,
            hoverPause: true,
            start: 1,
            effect: useEffect,
            crossfade: true,
            paginationClass: 'pagination',
            generatePagination: false,
            container: 'slides_container',
            animationStart: function (current) {
                //
                //alert(current);
            },
            animationComplete: function (current) {
                // var tmp = $('.slide', mySildes);
                // var b = parseInt($('.caption', tmp.eq(current - 1)).height() - 15);
                // $('.pagination').css({ bottom: b }).show();

            },
            slidesLoaded: function () {
                //var tmp = $('.slide', mySildes);
                //var b = parseInt($('.caption', tmp.eq(0)).height() - 15);
                //$('.pagination').css({ bottom: b }).show();
                //alert('load');
            }
        });
    }

    $(function() {
        tradeChart();
        makesilder();
    });
</script>
</body>
</html>