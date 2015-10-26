<?php
//注意，请不要在这里配置SAE的数据库，配置你本地的数据库就可以了。
return array(
    //'配置项'=>'配置值'
    'USERNAME' => 'admintest',
    'PWD' => '123456789',      //后台登录密码

    //修改模文件后缀名
    //'TMPL_TEMPLATE_SUFFIX' => '.tpl',     

    //数据库参数
    'DB_HOST' => '127.0.0.1',
    'DB_USER' => 'root',
    'DB_PWD' => '3730',
    'DB_NAME' => 'lqsh',
    'DB_PREFIX' => 'tp_',

    'TMPL_VAR_IDENTIFY' => 'array',
    'URL_HTML_SUFFIX'=>'.html',
    'URL_MODEL' => 2

);
?>