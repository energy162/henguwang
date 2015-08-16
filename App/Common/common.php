<?php
/**
 * 修改用户锁定状态
 * @param  [number] $status   [状态值]
 * @param  [number] $id       [id]
 * @param  string $callback [返回值]
 * @return [string]          [组合链接]
 */
function showStatus($status, $id, $callback="") {
	switch ($status) {
		case 0 :
			$info = '<a href="__URL__/changeState/user_id/'.$id.'/islock/0/navTabId/listusers" target="ajaxTodo" callback="'.$callback.'">锁定</a>';
			break;
		case 1 :
			$info = '<a href="__URL__/changeState/user_id/'.$id.'/islock/1/navTabId/listusers" target="ajaxTodo" callback="'.$callback.'">恢复</a>';
			break;
	}
	return $info;

}

function changeInstall($status, $id, $callback="") {
	switch ($status) {
		case 0 :
			$info = '<a href="__URL__/changeInstall/plugin_id/'.$id.'/isinstalled/0/navTabId/listplugin" target="ajaxTodo" callback="'.$callback.'">安装</a>';
			break;
		case 1 :
			$info = '<a href="__URL__/changeInstall/plugin_id/'.$id.'/isinstalled/1/navTabId/listplugin" target="ajaxTodo" callback="'.$callback.'">卸载</a>';
			break;
	}
	return $info;

}


function showReason($status, $id, $callback=""){
	switch ($status) {
		case 0 :
			$info = '<a href="__URL__/changeState/link_id/'.$id.'/isverify/0/navTabId/listlink" target="ajaxTodo" callback="'.$callback.'">恢复显示</a>';
			break;
		case 1 :
			$info = '<a href="__URL__/changeState/link_id/'.$id.'/isverify/1/navTabId/listlink" target="ajaxTodo" callback="'.$callback.'">禁止显示</a>';
			break;
	}
	return $info;
}

function rubbish($status, $id, $callback=""){
	switch ($status) {
		case 1 :
			$info = '<a href="__URL__/changeState/article_id/'.$id.'/islock/1/navTabId/listarticle1" target="ajaxTodo" callback="'.$callback.'">恢复显示</a>';
			break;
		case 0 :
			$info = '<a href="__URL__/changeState/article_id/'.$id.'/islock/0/navTabId/listarticle" target="ajaxTodo" callback="'.$callback.'">加入回收站</a>';
			break;
	}
	return $info;
}

function crubbish($status, $id, $callback=""){
	switch ($status) {
		case 1 :
			$info = '<a href="__URL__/changeState/commend_id/'.$id.'/islock/1/navTabId/listcomment1" target="ajaxTodo" callback="'.$callback.'">恢复显示</a>';
			break;
		case 0 :
			$info = '<a href="__URL__/changeState/commend_id/'.$id.'/islock/0/navTabId/listcomment" target="ajaxTodo" callback="'.$callback.'">加入回收站</a>';
			break;
	}
	return $info;
}


function imgs($status,$id){
	$info1="../Public/../default/Images/test.jpeg";
	preg_match("/<img(.*)src=\"([^\"]+)\"[^>]+>/isU",$status,$matches);
	if(!empty($matches)){
              return  $img = $matches[2];
    }else{
              return  $info1;
    }
}

function photos($status){
	if(!$status==null){
              return  './Uploads/Picture/Avatar'.'/'.'avatar_'.$status;
    }else{
                return  './Uploads/Picture/Avatar'.'/'.'nophoto.gif';
    }
}


function SaveSetting($arr){
	$setfile=C('settingfile_path');
	$a=include './App/Conf/setting.config.php';
	$c=array_merge($a,$arr);
	$settingstr="<?php\n\r return ".var_export($c,TRUE)."\n\r?>";
	file_put_contents($setfile,$settingstr);
}


/**
 *自定义的删除函数,可以删除文件和递归删除文件夹
 */
 function my_del($path)
{
	if(is_dir($path))
	{
			$file_list= scandir($path);
			foreach ($file_list as $file)
			{
				if( $file!='.' && $file!='..')
				{
					my_del($path.'/'.$file);
				}
			}
			@rmdir($path);  //这种方法不用判断文件夹是否为空,	因为不管开始时文件夹是否为空,到达这里的时候,都是空的		
	}
	else
	{
		@unlink($path);    //这两个地方最好还是要用@屏蔽一下warning错误,看着闹心
	}

}

/**
 * 格式化字节大小
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 */
function format_bytes($size, $delimiter = '') {
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    return round($size, 2) . $delimiter . $units[$i];
}

/**
 * [移动端访问自动切换主题模板]
 * @return boolen [是否为手机访问]
 */
function ismobile() {
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        return true;
    
    //此条摘自TPM智能切换模板引擎，判断是否为客户端
    if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
        return true;
    //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
        //找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
    //判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array(
            'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
        );
        //从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    //协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
 }

function p5wFile($url)
{
    $c = file($url);
    return implode('', $c);
}

/**
 * @param $mixed
 * @return bool
 * var_export( isint( '123' ) ); //This will return true
 * var_export( isint( 123 ) ); //This will return true
 * var_export( isint( 'asd' ) ); //This will return false
 * var_export( isint( '123asd123' ) ); //This will return false
 */
function isint( $mixed )
{
    return ( preg_match( '/^\d*$/'  , $mixed) == 1 );
}

/**
 * @param $int
 * @return bool
 * The above returns:
 * 155        TRUE
 * 15.5       FALSE
 * "155"      TRUE
 * "15.5"     FALSE
 * "0155"     TRUE
 * "I'm 155"  FALSE
 * "test"     FALSE
 * ""         FALSE
 */
function isint2($int){

    // First check if it's a numeric value as either a string or number
    if(is_numeric($int) === TRUE){

        // It's a number, but it has to be an integer
        if((int)$int == $int){

            return TRUE;

            // It's a number, but not an integer, so we fail
        }else{

            return FALSE;
        }

        // Not a number
    }else{

        return FALSE;
    }
}

/**
 * @param $input
 * @return bool
 * check if input is a valid number
 * first number must be 1 thru 9, followed by a number 0-9, no decimals
 * true for "1", "1000"
 * false for "01", "-1", "1.2"
 */
function isInteger($input){
    return preg_match('@^[1-9][0-9]*$@',$input) === 1;
}

/**
  * 系统邮件发送函数
  * @param string $to    接收邮件者邮箱
  * @param string $subject 邮件主题 
  * @param string $body    邮件内容
  * @param string $attachment 附件列表
  * @return boolean 
  */
 function send_mail($to, $subject = '', $body = '', $attachment = null){
     $aTmp = C('THINK_EMAIL');

	$aTmp['acceptor'] = $to; 
	$aTmp['sendway'] = 'smtp';

     vendor('Mail.email'); //从PHPMailer目录导class.phpmailer.php类文件
     $email             = new email(); //PHPMailer对象

	$loginfo = "无法发送测试邮件，下面是出错信息：";
	if ($email->ready($aTmp)){
		$res = $email->send($aTmp['acceptor'],$subject,$body,$aTmp);
		if ($res){
			$loginfo = "已成功发送一封测试邮件，请查看接收邮箱。";
			//$this->endonly();
			//$this->page('admin/emailsend/test/success.html');
			return true;
		}elseif ($email->errorinfo){
			$err=$email->errorinfo;
			$loginfo .= "<br>".$err['error'];
		}
	}
	else{
		$loginfo .= "<br>".var_export($email->smtp->error,true);
	}

     return false;
 }

function get_sign($id) {
	return md5(md5($id . C('TOKEN')));
}