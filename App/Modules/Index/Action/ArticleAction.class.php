<?php
/**
* 前台文章发布
* @author  <[c@easycms.cc]>
*/
class ArticleAction extends CommonAction
{
	
	Public function index(){
		$result = $this->persons;

		//文章
		$article_id=I('articleid','','intval');
		$this->assign('aid',$article_id);
		$article=D('Article')->relation(true)->where("article_id=$article_id")->find();

		if(!$article)
		{
			$this->error('错误的内容id');
		}
		$article['pubtime'] = date('Y年m月d日 H:i',$article['pubtime']);

		//判断是否跳转
		if($article['islink']) {
			header("location:" . $article['url']);
		}

		//权限判断
		$model = M('category');
		$id = $article['tid'];
		$category = $model->find($id);
		$allow_rank = unserialize($category['visit']);
		if($allow_rank && !in_array($result['user_rank'], $allow_rank)) {
			if(empty($result))
			{
				$this->error('您尚未登录，请先注册登录');
			}
			else
			{
				$this->error('您还不是本站赞助用户，暂时无法访问');
			}
		}

		

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
		
		$this->assign('article',$article);

		if($article['modelid']==1){
			preg_match_all("/<img(.*)src=\"([^\"]+)\"[^>]+>/isU",$article['content'],$matches);
            $img = $matches[2];
    		$this->assign('imgs',$img);
    		//dump($img);
			$this->display('image_article');
		}else{
			$this->display('content');
		}
	}

	Public function content(){
		$article_id=I('articleid','','intval');
		$this->assign('aid',$article_id);
		$article=D('Article')->relation(true)->where("article_id=$article_id")->find();
		//前一篇文章
		$preArticle=M('Article')->where("article_id<$article_id")->order('article_id desc')->limit(1)->find();
		$this->assign('preArticle',$preArticle);
		//后一篇文章
		$nextArticle=M('Article')->where("article_id>$article_id")->limit(1)->find();
		$this->assign('nextArticle',$nextArticle);
		$this->assign('article',$article);
		//侧栏的数据分配
		$sidebar1=M('Article')->where('ispush=1 and islock=0')->order('approval desc')->limit('5')->select();
		$sidebar2=M('Article')->where('ispush=1 and islock=0')->order('opposition desc')->limit('5')->select();
		$sidebar3=M('Article')->where('ispush=1 and islock=0')->order('rand()')->limit('5')->select();
		//赞多到少
		$this->assign('sidebar1',$sidebar1);
		//赞少到多
		$this->assign('sidebar2',$sidebar2);
		//随机5篇
		$this->assign('sidebar3',$sidebar3);
		//设置前台文章标题右侧的钩子，插件机制
		$p=M('Plugin')->where("position=1 and isinstalled=1")->select();
		$this->assign('plugin1',$p);
		//获取文章的二维码图片从谷歌api
		$qrcode='http://'.$_SERVER['HTTP_HOST'].__URL__."/index/articleid/$article_id";
		$this->assign('qrcode',$qrcode);
		if($article['modelid']==1){
			preg_match_all("/<img(.*)src=\"([^\"]+)\"[^>]+>/isU",$article['content'],$matches);
            $img = $matches[2];
    		$this->assign('imgs',$img);
    		//dump($img);
			$this->display('image_article');
		}else{
			$this->display('article_article');
		}
	}

	public function checkuser(){
		if (isset($_SESSION['username'])) {
			echo '	 <li><a>'.$_SESSION['username'].'</a></li>
         			 <li><a href="'.U('Member/person/index').'" style="color:red">个人中心</a></li>
         			 <li><a href="'.U('Index/login/doLogout').'">退出</a></li>';
		}else{
			echo '	 <li><a href="'.U('Index/Login/checkreg').'">注册</a></li>
        			 <li><a href="'.U('Index/Login/index').'">登陆</a></li>';
		}
	}
}
