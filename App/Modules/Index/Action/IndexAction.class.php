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
}
