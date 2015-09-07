<?php  
/**
 * 前台登陆注册
 * @author  <[l@easycms.cc]>
 */
class LoginAction extends Action{
	//空操作
	public function _empty(){
		$this->redirect("Index/Index/index");
	}

	Public function _initialize(){
   		// 控制器初始化方法
   		// 判断是否手机访问
   		if (ismobile()) {
            //C('DEFAULT_THEME','mobile');
        }
	}


	public function index(){
		$this->display('login');
	}
	public function checkLogin(){
		//		if($_SESSION["verify"]!=md5($_POST['code'])){
		//			$this->error("验证码错误");
		//		}
		$User = M("Member_user"); 
		if (!$User->create()){
			 $this->error(($User->getError()));
		}else{
			$name=$User->create();
			$where['username']=strtolower($name['username']);
			$where['password']=md5($name['password']);
			$result =$User->where($where)->find();
			if($result['islock']==1){
				$this->error('您的账号已经被管理锁定，请联系管理员',U('Login/index'));
			}
			if($result!=null){
				if(!$result['state'])
				{
					$this->error('您的账户尚未验证邮箱，请先进行邮箱验证。');
				}
				$_SESSION[C('USER_AUTH_KEY_F')]=$result['username'];
				$_SESSION[C('USER_AUTH_KEY_ID')]=$result["user_id"];
				$this->success('登陆成功',U('Index/index'));
			}else{
				$this->error('登陆失败',U('Login/index'));
			}
		}
	}

	public function checkreg(){
			$this->display('signup');
	}
	public function checkregs(){
		if(!$_POST['license']){
			$this->error("请同意网站注册协议");
		}
		if($_SESSION["verify"]!=md5($_POST['code'])){
			$this->error("验证码错误");
		}
		$User = D("Member_user"); 
		$result=$User->create();
		if (!$result){
			 $this->error(($User->getError()));
		}else{
			$addresult=$User->where($result)->add();
			if($addresult>0){
				$sign = get_sign($addresult);

				$to = $_POST['email'];
				$subject = '恨股网会员注册激活邮件';

				$body = file_get_contents('email.html');
				$body = preg_replace('/\\\\/','', $body); //Strip backslashes

				$patterns = array();
				$patterns[0] = '/{name}/';
				$patterns[1] = '/{active_url}/';
				$replacements = array();
				$replacements[0] = $_POST['username'];
				$replacements[1] = U('/index/Login/verify_email',array('uid'=>$addresult,'sign'=>$sign), true, false, true);
				$body = preg_replace($patterns, $replacements, $body);

				if(!send_mail($to, $subject, $body))
				{
					$this->error('验证邮件发送失败，请联系管理员',U('Login/index'));
				}
				//exit;
				//$_SESSION[C('USER_AUTH_KEY_F')]=$result['username'];
				//$_SESSION[C('USER_AUTH_KEY_ID')]=$addresult;
				$this->success('注册成功,系统将会发送封验证邮件到您邮箱，请登录您的注册邮箱，完成验证。',U('Index/index'));
			}else{
				$this->error('注册失败',U('Login/index'));
			}
		}
	}

	public function verify(){
			import('ORG.Util.Image');
			Image::buildImageVerify();
		}	

	public function doLogout(){
			//清除前台的服务端的session值
			unset($_SESSION[C('USER_AUTH_KEY_F')]);
			unset($_SESSION[C('USER_AUTH_KEY_ID')]);
			$this->success('退出成功',U('Index/Index/index'));
		}

	public function checkName(){
		$username=$_GET['username'];
		$user=M('Member_user');
		$where['username']=$username;
		$count=$user->where($where)->count();
		if($count){
			echo '不允许';
		}else{
			echo '允许';
		}
	}

	public function checkEmail(){
		$email=$_GET['email'];
		if(!preg_match('/^(?:[a-z\d]+[_\-\+\.]?)*[a-z\d]+@(?:([a-z\d]+\-?)*[a-z\d]+\.)+([a-z]{2,})+$/i',$email)){
           echo '不允许';exit;
        }
		$user=M('Member_user');
		$where['email']=$email;
		$count=$user->where($where)->count();
		if($count){
			echo '不允许';
		}else{
			echo '允许';
		}
	}

	public function lost(){
		if(I('post.'))
		{
			//die(var_dump(I('post.')));
			$User = M("Member_user"); 
			$where['username'] = I('post.username'); 
			$where['email'] = I('post.email', '', 'email');
			
			if($where['email'] && $where['username'])
			{
				$result =$User->where($where)->find();
				$sign = get_sign($addresult);

				$to = $where['email'];
				$subject = '恨股网会员找回密码邮件';

				$body = file_get_contents('email.html');
				$body = preg_replace('/\\\\/','', $body); //Strip backslashes

				$patterns = array();
				$patterns[0] = '/{name}/';
				$patterns[1] = '/{active_url}/';
				$replacements = array();
				$replacements[0] = $_POST['username'];
				$replacements[1] = U('/index/Login/verify_email',array('uid'=>$addresult,'sign'=>$sign), true, false, true);
				$body = preg_replace($patterns, $replacements, $body);

				if(!send_mail($to, $subject, $body))
				{
					$this->error('邮件发送失败，请联系管理员',U('Login/index'));
				}
				
				$this->success('注册成功,系统将会发送封验证邮件到您邮箱，请登录您的注册邮箱，完成验证。',U('Index/index'));
			}
			
		}
		$this->display('lost');
	}

	public function resetpassword(){
		$this->display('resetpassword');
	}

	public function agreement() {
		$field=M('fields');
		$where['field']='license';
		$license=$field->where($where)->find();
		$this->assign('license',$license);
		$this->display('agreement');
	}

	public function verify_email() {
		$User = M("Member_user");

		$where['user_id']=$_GET['uid'];
		$result =$User->where($where)->find();

		if(!$result) {
			$this->error('找不到该会员记录',U('Login/index'));
		}

		if(get_sign($_GET['uid']) != $_GET['sign']) {
			$this->error('错误的验证地址',U('Login/index'));
		} else {
			$data['state'] = 1;
			$is_save = $User->where($where)->save($data);

			$_SESSION[C('USER_AUTH_KEY_F')]=$result['username'];
			$_SESSION[C('USER_AUTH_KEY_ID')]=$result['user_id'];
			$this->success('邮箱验证成功',U('Index/index'));
		}
	}
	
}
