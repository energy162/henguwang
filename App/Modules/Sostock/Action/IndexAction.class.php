<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends PublicAction {
    public function index(){
        $this->display('index');
    }
    public function view()
    {
        $code=I('get.code');

        if($code=="")
        {
            $code="000001";
        }
        if(!isint2($code))
        {
            $code="000001";
        }
        $market="sz";
        if(substr($code,1,1)=="6")
        {
            $market="sh";
        }
        $data['market']=$market;
        $ts_info=M('ts_info');

        $stock=$ts_info->where("code='".$code."' and statuscode='013001'")->find();

        if(!$stock)
        {
            $code="000001";
            $stock=$ts_info->where("code='".$code."' and statuscode='013001'")->find();
        }
        $data['stock']=$stock;

        $trade = M('tb_trade');

        $fields="OB_TRADEDATE s1,F002N s2,F003N s3,F005N s4,F006N s5,F007N s6,F015N s7, F004N s8,F017N s9,F015N s10";
        $where="ob_seccode='" . $code . "' and f004n>0";
        $trades=$trade->field($fields)->where($where)->order("OB_TRADEDATE desc")->find();
        if($trades)
        {
            $trades['s2']=number_format($trades['s2'],2);
            $trades['s3']=number_format($trades['s3'],2);
            $trades['s4']=number_format($trades['s4'],2);
            $trades['s5']=number_format($trades['s5'],2);
            $trades['s6']=number_format($trades['s6'],2);
            $trades['s7']=number_format($trades['s7'],2);
            $trades['s8']=number_format($trades['s8'],2);
            $trades['s9']=number_format($trades['s9'],2);
            $trades['s10']=number_format($trades['s10'],2);
            $trades['s11']=number_format($trades['s6']-$trades['s2'],2);
        }
        $data['trade']=$trades;
        $ts_trend=M('ts_trend');
        $fiveDayValue=$ts_trend->where("code='".$code."'")->order("date desc")->getField("fiveDayValue");

        $trendlist=$ts_trend->table(array("ts_trend"=>"a","ts_info"=>"b"))->field("a.code,b.name,a.date")->where("a.code!='".$code."' and a.fiveDayValue='".$fiveDayValue."' and a.code=b.code")->order("a.date desc")->limit(0,10)->select();
        $data['trend']=$trendlist;

        $maxtradedate=$trade->max("OB_TRADEDATE");
        $data['maxdate']=$maxtradedate;
        $uplist=$trade->field("ob_seccode,ob_secname,f007n,f015n")->where("OB_TRADEDATE='".$maxtradedate."'")->order("F015N desc")->limit(0,10)->select();
        foreach($uplist as &$val)
        {
            $val['f007n']=number_format($val['f007n'],2);
            $val['f015n']=number_format($val['f015n'],2);
        }
        $data['uplist']=$uplist;

        $downlist=$trade->field("ob_seccode,ob_secname,f007n,f015n")->where("OB_TRADEDATE='".$maxtradedate."' and f015n IS NOT NULL")->order("F015N asc")->limit(0,10)->select();
        foreach($downlist as &$val)
        {
            $val['f007n']=number_format($val['f007n'],2);
            $val['f015n']=number_format($val['f015n'],2);
        }
        $data['downlist']=$downlist;
        $ts_probability=M('ts_probability');
        $data['probability']=$ts_probability->where("code='".$code."'")->find();
        //$data['probability']['']

        //dump($data['trend']);

        //$trade=M('tb_trade');
        //$klines=$trade->where("ob_seccode='".$code."'")->order("OB_TRADEDATE desc")->limit(0,30);
        //$data['klines']=
        //session('uid',1);
        $this->assign('data', $data);
        $this->display('view');
    }
    public function uplist(){
        $order = I("get.order");
        if (!in_array($order, array("s1", "s2", "s3", "s4"))) {
            $order = "s1";
        }
        $orderArr=array("s1"=>"fiveDayUp51","s2"=>"tenDayUp51", "s3"=>"tenDayUp101", "s4"=>"twentyDayUp101");
        $orderField=$orderArr[$order];
        $desc = I("get.desc");
        if (!in_array($desc, array('0', '1'))) {
            $desc = "1";
        }
        if ($desc == "0") {
            $descstr = "ASC";
        } else {
            $descstr = "DESC";
        }
        $data['order']=$order;
        $data['desc']=$desc;
        $ts_probability=M('ts_probability');
        $where="a.`date`=(select max(`date`) from ts_probability)";
        $field="a.code,a.name,a.date,a.lastdayClose,a.fiveDayUp51,tenDayUp51,tenDayUp101,twentyDayUp101";
        $pageSize = 30;
        $count =$ts_probability->table("ts_probability a")->where($where)->count();

        import("@.Common.P5wPage");
        $Page = new P5wPage($count, $pageSize, ""); // 实例化分页类 传入总记录数和每页显示的记录数
        $data['p']=$Page->nowPage;
        $data['page'] = $Page->show();
        $list=$ts_probability->table("ts_probability a")->field($field)->where($where)->order($orderField." ".$descstr.",a.code asc")->limit($Page->firstRow . ',' . $Page->listRows)->select();

        foreach($list as &$val)
        {
            $val['lastdayClose']=number_format($val['lastdayClose'],2);
            $val['fiveDayUp51']=number_format($val['fiveDayUp51'],2);
            $val['tenDayUp51']=number_format($val['tenDayUp51'],2);
            $val['tenDayUp101']=number_format($val['tenDayUp101'],2);
            $val['twentyDayUp101']=number_format($val['twentyDayUp101'],2);
        }
        $data['list']=$list;
        $this->assign('data', $data);
        $this->display('uplist');
    }
}