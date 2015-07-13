/**
 * Created by lifuping on 2015/5/15.
 */
//highstock K线图
var highStockChart = function (divID,klineurl, result) {
    //var $reporting = $("#report");
    var firstTouch = true;
    var dayData = [];//K线数据
    //开盘价^最高价^最低价^收盘价^成交量^成交额^涨跌幅^换手率^五日均线^十日均线^20日均线^30日均线^昨日收盘价 ^当前点离左边的相对距离
    var open, high, low, close, y, zde, zdf, hsl, zs, relativeWidth;
    //定义数组
    var ohlcArray = [], volumeArray = [], flagArray=[] ;

    //修改colum条的颜色（重写了源码方法）
    var originalDrawPoints = Highcharts.seriesTypes.column.prototype.drawPoints;
    Highcharts.seriesTypes.column.prototype.drawPoints = function () {
        var merge = Highcharts.merge,
            series = this,
            chart = this.chart,
            points = series.points,
            i = points.length;

        while (i--) {
            var candlePoint = chart.series[0].points[i];
            if (candlePoint.open != undefined && candlePoint.close != undefined) {  //如果是K线图 改变矩形条颜色，否则不变
                var color = (candlePoint.open < candlePoint.close) ? '#DD2200' : '#33AA11';
                var seriesPointAttr = merge(series.pointAttr);
                seriesPointAttr[''].fill = color;
                seriesPointAttr.hover.fill = Highcharts.Color(color).brighten(0.3).get();
                seriesPointAttr.select.fill = color;
            } else {
                var seriesPointAttr = merge(series.pointAttr);
            }

            points[i].pointAttr = seriesPointAttr;
        }

        originalDrawPoints.call(this);
    }

    //常量本地化
    Highcharts.setOptions({
        global: {
            useUTC: false
        },
        lang: {
            rangeSelectorFrom: "日期:",
            rangeSelectorTo: "至",
            rangeSelectorZoom: "范围",
            loading: '加载中...',          
            shortMonths: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            weekdays: ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
        }
    });


    //开始绘图
    return new Highcharts.StockChart({
        chart: {
            renderTo: divID,
            margin: [0, 5, 0, 0],
            plotBorderColor: '#3C94C4',
            plotBorderWidth: 0.3,
            events: {
                load: function () {
                    var ohlcSeries = this.series[0], volumeSeries = this.series[1],flagSeries=this.series[2];
                    var _this = this;
                    var url=klineurl+ "/code/" + result.code;
                    if(result.date)
                    {
                        url +='/date/'+result.date;
                    }
                    if(result.enddate)
                    {
                        url +='/enddate/'+result.enddate;
                    }
                    $.ajax({
                        type: "GET",
                        url:url,
                        data: {},
                        dataType: "json",
                        success: function (data) {
                            var ma5Sum = 0.00, ma10Sum = 0.00, ma20Sum = 0.00, ma30Sum = 0.00, ma60Sum = 0.00;
                            var lastclose = 0.00; var zde = 0.00; var zdf = 0.00;
                            var i = 0;
                            $(data).each(function () {
                                var tmpData = this;
                                //交易日期 s1,s2 zs,s3 open,s4 high,s5 low,s6 close,s7 zdf, s8 volume,s9 hsl                                    
                                var dateStr = tmpData.s1.toString();
                                var nowdate = new Date(dateStr).getTime();
                                if (i > 0) {
                                    lastclose = dayData[i - 1][4];
                                    zde = tmpData.s6 - lastclose;
                                    if (lastclose != 0) {
                                        zdf = zde / lastclose * 100;
                                    }
                                    else {
                                        zdf = 0.00;
                                    }
                                } else {
                                    zdf = 0.00;
                                    zde = 0.00;
                                }

                                dayData.push([
                                    nowdate,//交易日期 0
                                    tmpData.s3,//open 1
                                    tmpData.s4,//high 2
                                    tmpData.s5,//low 3
                                    tmpData.s6,//close 4
                                    tmpData.s8,//volume 5
                                    tmpData.s7,//zdf 6
                                    zde,//zde 7
                                    tmpData.s9, //hsl 8
                                    tmpData.s2
                                ]);
                                ohlcArray.push([
                                    parseInt(nowdate), // the date
                                    parseFloat(tmpData.s3), // open
                                    parseFloat(tmpData.s4), // high
                                    parseFloat(tmpData.s5), // low
                                    parseFloat(tmpData.s6) // close
                                ]);
                                volumeArray.push([
                                    parseInt(nowdate), // the date
                                    parseInt(tmpData.s8) // 成交量
                                ]);

                                i++;
                               
                                
                            });

                            ohlcSeries.setData(ohlcArray, true);
                            volumeSeries.setData(volumeArray, true);
                            i = dayData.length;
                            var ii=0;
                            var titleArray=new Array("E","D","C","B","A");//直接定义并初始化;
                            while (i--) {
                                if(ii>=5)
                                {
                                    break;
                                }
                                var dateinfo=dayData[i];
                                if(result.date)
                                {
                                    var nowdate = new Date(result.date).getTime();
                                    if (nowdate>=dateinfo[0])
                                    {
                                        flagArray.push({
                                            x : dateinfo[0],
                                            title : titleArray[ii],
                                            text : Highcharts.dateFormat('%Y-%m-%d', dateinfo[0])
                                        });
                                        ii++;
                                    }
                                }else
                                {

                                    flagArray.push({
                                        x : dateinfo[0],
                                        title : titleArray[ii],
                                        text : Highcharts.dateFormat('%Y-%m-%d', dateinfo[0])
                                    });
                                    ii++;
                                }


                            }

                            flagSeries.setData(flagArray,true);
                        }
                    });
                   
                    
                }
            }
        },
        loading: {
            labelStyle: {
                position: 'relative',
                top: '10em',
                zindex: 1000
            }
        },
        credits: {
            enabled: false
        },
        rangeSelector: {           
            enabled: false,
            inputDateFormat: '%Y-%m-%d'  //设置右上角的日期格式
        },
        plotOptions: {
            //修改蜡烛颜色
            candlestick: {
                color: '#33AA11',
                upColor: '#DD2200',
                lineColor: '#33AA11',
                upLineColor: '#DD2200',
                maker: {
                    states: {
                        hover: {
                            enabled: false
                        }
                    }
                }
            },
            //去掉曲线和蜡烛上的hover事件
            series: {
                states: {
                    hover: {
                        enabled: false
                    }
                },
                line: {
                    marker: {
                        enabled: false
                    }
                }
            }
        },
        //格式化悬浮框
        tooltip: {
            formatter: function () {
                if (this.y == undefined) {
                    return;
                }
                for (var i = 0; i < dayData.length; i++) {
                    if (this.x == dayData[i][0]) {
                        zdf = parseFloat(dayData[i][6]).toFixed(2);
                        zde = parseFloat(dayData[i][7]).toFixed(2);
                        hsl = parseFloat(dayData[i][8]).toFixed(2);
                        zs = parseFloat(dayData[i][9]).toFixed(2);
                    }
                }

                open = this.points[0].point.open.toFixed(2);
                high = this.points[0].point.high.toFixed(2);
                low = this.points[0].point.low.toFixed(2);
                close = this.points[0].point.close.toFixed(2);
                y = (this.points[1].point.y * 0.0001).toFixed(2);
                relativeWidth = this.points[0].point.shapeArgs.x;
                var stockName = this.points[0].series.name;
                var tip = '<b>' + Highcharts.dateFormat('%Y-%m-%d  %A', this.x) + '</b><br/>';
                tip += stockName + "<br/>";
                if (open > zs) {
                    tip += '开盘价：<span style="color: #DD2200;">' + open + ' </span><br/>';
                } else {
                    tip += '开盘价：<span style="color: #33AA11;">' + open + ' </span><br/>';
                }
                if (high > zs) {
                    tip += '最高价：<span style="color: #DD2200;">' + high + ' </span><br/>';
                } else {
                    tip += '最高价：<span style="color: #33AA11;">' + high + ' </span><br/>';
                }
                if (low > zs) {
                    tip += '最低价：<span style="color: #DD2200;">' + low + ' </span><br/>';
                } else {
                    tip += '最低价：<span style="color: #33AA11;">' + low + ' </span><br/>';
                }
                if (close > zs) {
                    tip += '收盘价：<span style="color: #DD2200;">' + close + ' </span><br/>';
                } else {
                    tip += '收盘价：<span style="color: #33AA11;">' + close + ' </span><br/>';
                }
                if (zde > 0) {
                    tip += '涨跌额：<span style="color: #DD2200;">' + zde + ' </span><br/>';
                } else {
                    tip += '涨跌额：<span style="color: #33AA11;">' + zde + ' </span><br/>';
                }
                if (zdf > 0) {
                    tip += '涨跌幅：<span style="color: #DD2200;">' + zdf + '% </span><br/>';
                } else {
                    tip += '涨跌幅：<span style="color: #33AA11;">' + zdf + '% </span><br/>';
                }
                if (y > 10000) {
                    tip += "成交量：" + (y * 0.0001).toFixed(2) + "(亿股)<br/>";
                } else {
                    tip += "成交量：" + y + "(万股)<br/>";
                }
                 tip += "换手率："+hsl+"<br/>";                
                return tip;
            }, //crosshairs:	[true, true]//双线
            crosshairs: {
                dashStyle: 'dash'
            },
            borderColor: '#333333',
            positioner: function () { //设置tips显示的相对位置
                var halfWidth = this.chart.chartWidth / 2;//chart宽度
                var width = this.chart.chartWidth - 155;
                var height = this.chart.chartHeight / 5 - 8;//chart高度
                if (relativeWidth < halfWidth) {
                    return { x: width, y: height };
                } else {
                    return { x: 30, y: height };
                }
            },
            shadow: true
        },
        title: {
            enabled: false
        },
        exporting: {
            enabled: false  //设置导出按钮不可用
        },
        scrollbar: {
            barBackgroundColor: 'gray',
            barBorderRadius: 7,
            barBorderWidth: 0,
            buttonBackgroundColor: 'gray',
            buttonBorderWidth: 0,
            buttonArrowColor: 'yellow',
            buttonBorderRadius: 7,
            rifleColor: 'yellow',
            trackBackgroundColor: 'white',
            trackBorderWidth: 1,
            trackBorderColor: 'silver',
            trackBorderRadius: 7,
            enabled: false,
            liveRedraw: false //设置scrollbar在移动过程中，chart不会重绘
        },
        navigator: {
            enabled: false,
            adaptToUpdatedData: false,
            xAxis: {
                labels: {
                    formatter: function (e) {
                        return Highcharts.dateFormat('%m-%d', this.value);
                    }
                }
            },
            handles: {
                backgroundColor: '#808080'
                //	borderColor: '#268FC9'
            },
            margin: -10
        },
        xAxis: {
            type: 'datetime',
            tickLength: 0,//X轴下标长度
            // minRange: 3600 * 1000*24*30, // one month
            events: {
                afterSetExtremes: function (e) {
                    var minTime = Highcharts.dateFormat("%Y-%m-%d", e.min);
                    var maxTime = Highcharts.dateFormat("%Y-%m-%d", e.max);
                   // var chart = this.chart;
                    // showTips(e.min, e.max, chart);
                }
            }
        },
        yAxis: [{
            title: {
                enable: false
            },
            height: '70%',
            lineWidth: 1,//Y轴边缘线条粗细
            gridLineColor: '#346691',
            gridLineWidth: 0.1,             
            // gridLineDashStyle: 'longdash',
            opposite: true
        }, {
            title: {
                enable: false
            },
            top: '75%',
            height: '25%',
            labels: {
                x: -15
            },
            gridLineColor: '#346691',
            gridLineWidth: 0.1,
            lineWidth: 1,
            opposite: true
        }],
        series: [
            {
                type: 'candlestick',
                id: "candlestick",
                name: result.name,
                data: ohlcArray,
                dataGrouping: {
                    enabled: false
                }
            }
            , {
                type: 'column',//2
                name: '成交量',
                data: volumeArray,
                yAxis: 1,
                dataGrouping: {
                    enabled: false
                }
            }, {
                type : 'flags',
                onSeries : 'candlestick',
                shape : 'circlepin',
                width : 14


            }
        ]
    });
}
