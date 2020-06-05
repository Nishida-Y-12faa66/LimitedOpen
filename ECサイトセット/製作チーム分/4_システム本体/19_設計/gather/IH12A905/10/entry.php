<?php
	require_once('./../../config.php');
	require_once('./func/func.php');
	
	session_start();
	if (isset($_POST['name']) || isset($_POST['id']) || isset($_POST['password']) || isset($_POST['mail'])){
	
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['id'] = $_POST['id'];
	$_SESSION['password']= $_POST['password'];
	$_SESSION['mail'] = $_POST['mail'];

//エラーチェック
	if($_SESSION['name'] == ''){
		$msg1 = '氏名を入力してください';
	}
	else{
		$msg1 = '';
	}

	if($_SESSION['id'] != ''){
		if(login_id_check(DB_HOST , DB_USER , DB_PASS , DB , $_SESSION['id'])){
			$msg2 = '';
		}
		else{
			$msg2 = 'このログインIDは使えません';
		}
		
	}
	else{
		$msg2 = 'ログインIDを入力してください';
	}

	if($_SESSION['password'] == ''){
		$msg3 = 'パスワードを入力してください';
	}
	else{
		$msg3 = '';
	}

	if($_SESSION['mail'] == ''){
		$msg4 = 'メールアドレスを入力してください';
	}

	elseif (strpos($_SESSION['mail'],'@') === false) {
		$msg4 = '無効なアドレスです';
	}
	else{
		$msg4 = '';
	}

	if ($msg1 == '' && $msg2 == '' && $msg3 == '' && $msg4 == '') {
		header('Location:confirm.php');
	}

}
	require('./tpl/entry.php');
?>