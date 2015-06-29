<?php 
/**
 * 自定义会员模型类
 * @author  <[c@easycms.cc]>
 */
class SupportModel extends Model{
	protected $_validate=array(
		 array('username','/(^[A-Za-z0-9]{2,12}$)|(^[\x{4e00}-\x{9fa5}]{2,10}$)/u','请输入2到12个字符或者汉字'),

		);

		
	//自动填充
	protected $_auto = array( 
		//array('sex','w'),  //指定某个字段设置某个值
		array("addtime","time","1","function"), //当执行添加时为addtime字段指定time时间
		array('content',"filter_content","1","callback"),
		
	);


	protected function filter_content(){
		return str_replace("\n",'<br />',htmlspecialchars($_POST['content']));
	}
	


}
