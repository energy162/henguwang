<?php 
/**
* 前台2级列表页
* @author  <[c@easycms.cc]>
*/
class ListAction extends CommonAction
{
	Public function index(){
		$catsid=I('catsid','','intval');
		$cats=M('Category')->find($catsid);
		$this->assign('catName',$cats['name']);
		//数据分页
		import('ORG.Util.Page');// 导入分页类
   		$count=M('article')->where("tid=$catsid and islock=0")->count();//获取数据的总数
   		$page=new Page($count,10);
		$page->setConfig('prev', '<');
		$page->setConfig('next', '>');
		$page->setConfig('theme', '<div id="Pagination" class="pagination" style="display: block;">%upPage%%linkPage%%downPage%</div>');
		
   		//$page->setConfig('theme', '<ul class="pagination"><li>%upPage%</li><li>%downPage%</li><li>%prePage%</li><li>%linkPage%</li><li>%nextPage%</li><li>%end%</li></ul>');
   		$show=$page->show();//返回分页信息
		$articles=M('article')->where("tid=$catsid and islock=0")->order('article_id desc')->limit($page->firstRow.','.$page->listRows)->select();
		foreach($articles as $key=>$article) {
			$articles[$key]['pubtime'] = date('m月d日',$article['pubtime']);
		}
		$this->assign('show',$show);
		$this->assign('count',$count);
		$this->assign('list',$articles);
		//侧栏的数据分配

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
		

		$this->display('list');
	}

	Public function list_index(){
		$catsid=I('catsid','','intval');
		$cats=M('Category')->find($catsid);
		$this->assign('catName',$cats['name']);
		//数据分页
		import('ORG.Util.Page');// 导入分页类
   		$count=M('article')->where("tid=$catsid and islock=0")->count();//获取数据的总数
   		$page=new Page($count,5);
   		$page->setConfig('theme', '<ul class="pagination"><li>%upPage%</li><li>%downPage%</li><li>%prePage%</li><li>%linkPage%</li><li>%nextPage%</li><li>%end%</li></ul>');
   		$show=$page->show();//返回分页信息
		$articles=M('article')->where("tid=$catsid and islock=0")->order('article_id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('show',$show);
		$this->assign('count',$count);
		$this->assign('list',$articles);
		//侧栏的数据分配
		$sidebar1=M('Article')->where("tid=$catsid and ispush=1 and islock=0")->order('approval desc')->limit('5')->select();
		$sidebar2=M('Article')->where("tid=$catsid and ispush=1 and islock=0")->order('opposition desc')->limit('5')->select();
		$sidebar3=M('Article')->where("tid=$catsid and ispush=1 and islock=0")->order('rand()')->limit('5')->select();
		//赞多到少
		$this->assign('sidebar1',$sidebar1);
		//赞少到多
		$this->assign('sidebar2',$sidebar2);
		//随机5篇
		$this->assign('sidebar3',$sidebar3);
		$this->display('list_article');
	}
}