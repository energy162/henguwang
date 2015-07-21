<?php
// 本类由系统自动生成，仅供测试用途
class StockAction extends Action
{
    public function kline()
    {
        $code = I('get.code');
        if ($code == "") {
            $code = "000001";
        }
        $ts_info = M('ts_info');
        $stock = $ts_info->where("code='" . $code . "' and statuscode='013001'")->find();
        if (!$stock) {
            $code = "000001";
            //$stock=$ts_info->where("code='".$code."' and statuscode='013001'")->find();
        }

        $date = I('get.date');
        $fields = "OB_TRADEDATE s1,F002N s2,F003N s3,F005N s4,F006N s5,F007N s6,F015N s7, F004N s8,F017N s9";
        $trade = M('tb_trade');
        $cachetime = 60 * 10;
        $kcount = 30;
        if (!empty($date)) {
            $where = "ob_seccode='" . $code . "' and f004n>0";
            //先取大于指定日期的15支K线
            $where1 = $where . " and OB_TRADEDATE>='" . $date . "'";
            $order = "OB_TRADEDATE asc";
            $subQuery = $trade->field($fields)->where($where1)->order($order)->limit(0, $kcount / 2)->buildSql();
            $klines1 = $trade->table($subQuery . " a")->order("s1 asc")->select();
            if($klines1==null)
            {
                $klines1=array();
            }
            //取剩余的K线
            $kcount2 = $kcount - count($klines1);
            $where2 = $where . " and OB_TRADEDATE<'" . $date . "'";
            $order = "OB_TRADEDATE desc";
            $subQuery = $trade->field($fields)->where($where2)->order($order)->limit(0, $kcount2)->buildSql();
            $klines2 = $trade->table($subQuery . " a")->order("s1 asc")->cache(true, $cachetime)->select();
           

            die(json_encode(array_merge($klines2, $klines1)));
        } else {
            $enddate = I('get.enddate');
            $where = "ob_seccode='" . $code . "' and f004n>0";
            if (!empty($enddate)) {
                $where = $where . " and OB_TRADEDATE<='" . $enddate . "'";
            }
            $order = "OB_TRADEDATE desc";
            //缓存600秒 10分钟
            $subQuery = $trade->field($fields)->where($where)->order($order)->limit(0, $kcount)->buildSql();
            $klines = $trade->table($subQuery . " a")->order("s1 asc")->cache(true, $cachetime)->select();
            die(json_encode($klines));
        }
    }
}