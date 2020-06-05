<?php 
	require_once('./../../config.php');
	require_once('./func/func.php');

	if(isset($_POST['login_id'])){

		if(!login_id_check(DB_HOST , DB_USER , DB_PASS , DB , $_POST['login_id'])){

			$user_info = get_user_info(DB_HOST , DB_USER , DB_PASS , DB , $_POST['login_id']);
			$salt = $user_info[0]['salt'];
			$stretch =  $user_info[0]['stretch'];

			for ($i=0; $i < $stretch ; $i++) { //md5でハッシュ化
				$hash_pass = md5($_POST['password'].$salt);
			}

			if ($user_info[0]['password'] == $hash_pass) {
				
				if ($user_info[0]['user_state'] == 0) {
					header('Location:upload.php?id='.$user_info[0]['hash_login_id']);
				}
				else{
					session_start();
					$_SESSION['login_id'] = $user_info[0]['hash_login_id'];

					var_dump($_SESSION['login_id']);
					header('Location:information.php');
				}
			}

			else{
				$msg = '入力に誤りがあります';
			}

		}

		else{
			$msg = '入力に誤りがあります';
		}

	}

	require_once('./tpl/login.php');

?>