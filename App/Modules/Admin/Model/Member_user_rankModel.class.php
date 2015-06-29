<?php
/**
 * 自定义会员模型类
 * @author  <[c@easycms.cc]>
 */
class Member_userModel extends Model{
	
	//自动验证（参考手册中6.15自动验证）
	protected $_validate = array(
		 array('name','require',"等级名称必须填写"), 

	);
	
	
	//自动填充（参考手册中6.17自动完成）
	protected $_auto = array( 
	);

	protected function myname(){
		return strtolower($_POST['username']);
	}
	
	protected function mypass(){
		return md5($_POST['password']);
	}
	
	
	//字段映射
	protected $_map = array(
        //'name' =>'username', // 把表单中name映射到数据表的username字段
        //'mail'  =>'email', // 把表单中的mail映射到数据表的email字段
    );

}
