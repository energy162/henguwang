<?php
/**
 * 安装程序配置文件
 */
return array(
    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__AVATAR__' => __ROOT__ .'/Uploads/Picture/Avatar',
    ),
	'TMPL_L_DELIM'		=>	'{', //修改左定界符
    'TMPL_R_DELIM'		=>	'}', //修改右定界符

	/* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '112.74.127.204', // 服务器地址
    'DB_NAME'   => 'sostock', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '26a01abfa7',  // 密码PYY1234567891
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => '', // 数据库表前缀
);
