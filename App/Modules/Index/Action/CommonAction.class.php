<?php
/**
* 前台公共类
* @author  <[c@easycms.cc]>
*/
class CommonAction extends Action
{
	Public function _initialize(){
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
		$result =$User->find($id);
		$result['expires_time'] = strtotime('+' . $result['expires_time'] . 'month', $result['regtime']);

		//新注册用户试用2天付费用户
		if(strtotime('+2 days', $result['regtime']) > time()) {
			$result['user_rank'] = 2;
		}

		$this->persons = $result;
		$this->assign('persons',$result);
	}
	
	//空操作
	public function _empty(){
		$this->redirect(__ROOT__);
	}
}
