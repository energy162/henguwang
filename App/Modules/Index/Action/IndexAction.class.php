<?php
/**
* 前台首页
* @author  <[c@easycms.cc]>
*/
class IndexAction extends CommonAction
{ 
	Public function index(){
		$cats=D('Category');
		$link=M('link');

		//首页主板块
		$dPushCats = $cats->limit('6')->where('ispush=1 and isverify=1')->relation(true)->select();
		$links=$link->where("isverify=1")->select();

		//这个是页面下面的6个板块
		$this->assign('modelid0',$dPushCats);

		//显示首页友情链接
		$this->assign('links',$links);

		//显示模板	
		$this->display('index');
	}

	/*Public function main(){
		$cats=D('Category');
		$link=M('link');
		$portrait=M('Member_user');
		$article=M('article');
		//首页中部3篇文章推荐展示
		$mPushArticle=$article->where('isslides=1 and islock=0')->order('rand()')->select();
		//首页下部4个分类推荐展示
		$dPushCats = $cats->limit('4')->where('ispush=1 and isverify=1')->relation(true)->select();
		$approval1=$article->where('ispush=1 and islock=0')->order('article_id desc')->limit('5')->select();
		$approval3=$article->where('ispush=1 and islock=0')->order('rand()')->limit('5')->select();
		$approval2=$article->where('ispush=1 and islock=0')->order('article_id desc')->limit('5')->select();
		$links=$link->where("isverify=1")->select();
		$portraits=$portrait->where('islock=0')->limit('24')->order('user_id desc')->select();
		//首页中部3篇文章推荐展示
		$this->assign('modelid1',$mPushArticle);
		//这个是页面下面的4个板块
		$this->assign('modelid0',$dPushCats);
		//按赞的次数进行遍历
		$this->assign('approval',$approval1);
		//随机精选5篇文章
		$this->assign('approval3',$approval3);
		//评论最多5篇的文章
		$this->assign('links',$links);
		//显示首页友情链接
		$this->assign('portrait',$portraits);
		//显示首页右侧用户注册头像
		$this->assign('approval2',$approval2);
		//显示模板	
		$this->display('main');
	}*/

	Public function main(){
		$result = $this->persons;

		$cats=D('Category');
		$link=M('link');
		$article=M('article');

		$code=I('code',0);
		if(!$code)
		$this->error("请输入股票代码或者名称");

		//K线选股
		$kxxg = $cats->where('id=73')->relation(true)->select();
		$this->assign('kxxg',$kxxg);

		$kxxg_list = $article->where('tid=73')->order('article_id asc')->limit('6')->select();
		$this->assign('kxxg_list',$kxxg_list);
		//var_dump($kxxg);var_dump($kxxg_list);

		//财报选股
		$cbxg_list = M('Article')->where('tid=74')->order('article_id asc')->limit('2')->select();
		$this->assign('cbxg_list',$cbxg_list);

		//研报推荐
		$ybtj_list = M('Article')->where('tid=75')->order('article_id asc')->limit('10')->select();
		$this->assign('ybtj_list',$ybtj_list);

		//专题
		$zt_list = M('Article')->where('tid=76')->order('article_id asc')->limit('10')->select();
		$this->assign('zt_list',$zt_list);

		//查询股票信息
		$this->view();

		//显示模板	
		$this->display('main');
	}

	Public function about(){
		$this->display('about');
	}

	Public function support(){
		//K线选股
		$kxxg_list = M('Article')->where('tid=73')->order('article_id asc')->limit('6')->select();
		$this->assign('kxxg_list',$kxxg_list);

		//财报选股
		$cbxg_list = M('Article')->where('tid=74')->order('article_id asc')->limit('2')->select();
		$this->assign('cbxg_list',$cbxg_list);

		//研报推荐
		$ybtj_list = M('Article')->where('tid=75')->order('article_id asc')->limit('10')->select();
		$this->assign('ybtj_list',$ybtj_list);

		//专题
		$zt_list = M('Article')->where('tid=76')->order('article_id asc')->limit('10')->select();
		$this->assign('zt_list',$zt_list);


		$this->display('support');
	}
	public function addSupport(){
		if(!$_POST['username']){
			$this->error("请填写注册用户名");
		}
		if(!$_POST['content'] || $_POST['content'] == '请在此处输入您的汇款账号以及意见，并点击提交'){
			$this->error("请填写汇款账号以及意见");
		}

		$support = D("support"); 
		$result=$support->create();
		if (!$result){
			 $this->error(($User->getError()));
		}else{
			$addresult=$support->where($result)->add();
			if($addresult>0){
				$this->success('提交成功',U('Index/Index/support'));
			}else{
				$this->error('提交失败',U('Index/Index/support'));
			}
		}
	}

	private function view()
    {
		$common = A('Index/Common');

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
        $ts_info=M('ts_info', null);

        $stock=$ts_info->where("code='".$code."' and statuscode='013001'")->find();

        if(!$stock)
        {
            $code="000001";
            $stock=$ts_info->where("code='".$code."' and statuscode='013001'")->find();
        }
        $data['stock']=$stock;

        $trade = M('tb_trade', null);

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
        //$this->display('view');
    }

	public function uplist(){
		$this->right();

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
