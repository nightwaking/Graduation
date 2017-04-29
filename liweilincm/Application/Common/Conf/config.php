<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'=>'mysql',// 数据库类型
    'DB_HOST'=>'127.0.0.1',// 服务器地址
    'DB_NAME'=>'graduate',// 数据库名
    'DB_USER'=>'root',// 用户名
    'DB_PWD'=>'cuimeng1',// 密码
    'DB_PORT'=>3306,// 端口
    'DB_PREFIX'=>'gra_',// 数据库表前缀
    'DB_CHARSET'=>'utf8',// 数据库字符集
    
    'TMPL_PARSE_STRING' => array(
        '__PUBLIC__' => __ROOT__.'/Public/Static',
        '__JS__' => __ROOT__.'/Public/Static/js',
        '__CSS__' => __ROOT__.'/Public/Static/css',
        '__IMAGE__' => __ROOT__.'/Public/Static/images',
        '__DATA__' => __ROOT__.'/Data/'
    ),
    'URL_HTML_SUFFIX' => '',

    'TMPL_ACTION_SUCCESS' => 'Public:dispatch_jump',
    'TMPL_ACTION_ERROR' =>  'Public:dispatch_jump',
);
