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
);
