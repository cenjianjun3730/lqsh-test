<?php

function p ($array) {
    dump($array, 1, '<pre>', 0);
}

function loginCheck () {
      if($_COOKIE['user']!=md5('admintest'))
            U('index', '', 'html', 1);            
}





function show_db_errorxx(){
	exit('系统访问量大，请稍等添加数据');
}
?>