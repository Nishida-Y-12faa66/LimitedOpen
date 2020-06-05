<?php
require_once('./../../config.php');
require_once('./func/func.php');
session_start();

if(isset($_SESSION['name'])){

//会員情報書き込み
	registration(DB_HOST , DB_USER , DB_PASS , DB , $_SESSION['name'] , $_SESSION['id'] , $_SESSION['password'] , $_SESSION['mail']);

//urlのhash_login_id取得
	$get_id = get_hash_login_id(DB_HOST , DB_USER , DB_PASS , DB ,  $_SESSION['id'] , $_SESSION['mail']);

	$url = BASE_URL."/10/upload.php?id=".$get_id[0]['hash_login_id'];

//メール送信
	mb_language('Japanese');
	mb_internal_encoding('UTF-8');
	$to = $_SESSION['mail'];
	$title = '仮登録完了';
	$content = "仮登録完了しました。以下のURLから本登録を行ってください



	".$url;
	$from = 'From:ohs80587@osaka.hal.ac.jp';
	if (mb_send_mail($to, $title,$content, 'From:' . mb_encode_mimeheader('まさる堂') . '<'.FROM.'>')) {
    echo('ok');
	} 
	else {
    echo('ng');
	}
		
}

else{
	header('Location:index.php');
}

	require_once('./tpl/entry-complete.php');

//セッション切断
	unset($_SESSION['name']);
	unset($_SESSION['id']);
	unset($_SESSION['password']);
	unset($_SESSION['mail']);
?>