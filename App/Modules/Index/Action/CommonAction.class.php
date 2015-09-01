<?php
/**
* 前台公共类
* @author  <[c@easycms.cc]>
*/
class CommonAction extends Action
{
	Public function _initialize(){
		load('extend');
		if (ismobile()) {
            C('DEFAULT_THEME','mobile');
        }
		//全局首页，用户个人中心导航分类展示
		$cats=M('Category')->where('isverify=1 and isshow=1')->order('sort desc')->select();
		$this->assign('cats',$cats);

		$m=M('member_user_rank');
		$ranklist = $m->order('rank_id asc')->getField('rank_id,name');
		$this->assign('ranklist',$ranklist);

		//个人信息
		$User=M('Member_user');
		$id=$_SESSION[C('USER_AUTH_KEY_ID')];
		$result = array();
		if(!empty($id))
		{
			$result =$User->find($id);
			$result['expires_time'] = strtotime('+' . $result['expires_time'] . 'month', $result['regtime']);

			//新注册用户试用2天付费用户
			if(strtotime('+2 days', $result['regtime']) > time() && $result['user_rank']<2) {
				$result['user_rank'] = 2;
				$result['expires_time'] = strtotime('+2 days', $result['regtime']);
			}
		}

		$this->persons = $result;
		$this->assign('persons',$result);
	}
	
	//空操作
	public function _empty(){
		$this->redirect(__ROOT__);
	}

	public function right()
	{
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
	}
}
