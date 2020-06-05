<?php
	function registration($host , $user , $pass , $db_name , $name , $id , $password , $mail){

	//パスワードハッシュ化
	$salt = md5(date('Ymdhs'));//ソルト値

	$min = 1000;
	$max = 10000;
	$stretch = rand ( $min , $max );//ストレッチング値

	for ($i=0; $i < $stretch ; $i++) { //md5でハッシュ化
		$hash_pass = md5($_SESSION['password'].$salt);
	}

	$cn = mysqli_connect($host,$user,$pass,$db_name);
	mysqli_set_charset($cn,'utf8');
	$sql="INSERT INTO m_user(name , login_id , password , mail , hash_login_id , salt , stretch) VALUES ('".$name."','".$id."','".$hash_pass."','".$mail."','".md5($id)."','".$salt."','".$stretch."');";

	mysqli_query($cn,$sql);
	mysqli_close($cn);

}


function get_hash_login_id($host , $user , $pass , $db_name , $id , $mail){

	$cn = mysqli_connect($host,$user,$pass,$db_name);
	mysqli_set_charset($cn,'utf8');
	$sql= "SELECT hash_login_id FROM  m_user WHERE login_id = '".$id."' AND mail = '".$mail."'";

	$result = mysqli_query($cn , $sql);

	$player_list = [];

	while($row = mysqli_fetch_assoc($result)){
		$player_list[] = $row;
	}

	mysqli_close($cn);
	return $player_list;

}

	function get_information($host , $user , $pass , $db_name , $num){
	$cn = mysqli_connect($host,$user,$pass,$db_name);
	mysqli_set_charset($cn,'utf8');
	$sql= "SELECT * FROM  m_news ORDER BY created_at DESC LIMIT ".$num.",5";

	$result = mysqli_query($cn , $sql);

	$news_info = [];
	
	while($row = mysqli_fetch_assoc($result)){
		$news_info[] = $row;
	}
	mysqli_close($cn);
	return $news_info;
}

function get_information2($host , $user , $pass , $db_name){
	$cn = mysqli_connect($host,$user,$pass,$db_name);
	mysqli_set_charset($cn,'utf8');
	$sql= "SELECT * FROM  m_news";

	$result = mysqli_query($cn , $sql);

	$news_info = [];
	
	while($row = mysqli_fetch_assoc($result)){
		$news_info[] = $row;
	}
	mysqli_close($cn);
	return $news_info;
}

function get_info_id($host , $user , $pass , $db_name){
	$cn = mysqli_connect($host,$user,$pass,$db_name);
	mysqli_set_charset($cn,'utf8');
	$sql= "SELECT MAX(id) FROM  m_news";

	$result = mysqli_query($cn , $sql);

	$news_info = [];
	
	while($row = mysqli_fetch_assoc($result)){
		$news_info[] = $row;
	}
	mysqli_close($cn);
	return $news_info;
}

function state_change($host , $user , $pass , $db_name , $hash_pass){
	$cn = mysqli_connect($host , $user , $pass , $db_name);
	mysqli_set_charset($cn,'utf8');
	$sql= "UPDATE m_user SET user_state = 1 WHERE password = '".$hash_pass."'";
	
	mysqli_query($cn,$sql);	
	mysqli_close($cn);
}


function get_user($host , $user , $pass , $db_name , $id ){
	$cn = mysqli_connect($host,$user,$pass,$db_name);
	mysqli_set_charset($cn,'utf8');
	$sql= "SELECT * FROM  m_user WHERE hash_login_id = '".$id."'";

	$result = mysqli_query($cn , $sql);

	$user_info = [];

	while($row = mysqli_fetch_assoc($result)){
		$user_info[] = $row;
	}

	mysqli_close($cn);
	return $user_info;

}

function login_id_check($host , $user , $pass , $db_name , $login_id){
	$cn = mysqli_connect($host,$user,$pass,$db_name);
	mysqli_set_charset($cn,'utf8');
	$sql= "SELECT COUNT(*) FROM  m_user WHERE login_id = '".$login_id."'";

	$result = mysqli_query($cn , $sql);

	$user_info = [];

	while($row = mysqli_fetch_assoc($result)){
		$user_info[] = $row;
	}
	mysqli_close($cn);

	if($user_info[0]['COUNT(*)'] != 1){
		return true;
	}
	else{
		return false;
	}

}

function get_user_info($host , $user , $pass , $db_name , $login_id){
	$cn = mysqli_connect($host,$user,$pass,$db_name);
	mysqli_set_charset($cn,'utf8');
	$sql= "SELECT salt,stretch,password,user_state,hash_login_id FROM  m_user WHERE login_id = '".$_POST['login_id']."'";

	$result = mysqli_query($cn , $sql);

	$user_info = [];

	while($row = mysqli_fetch_assoc($result)){
		$user_info[] = $row;
	}

	mysqli_close($cn);
	return $user_info;

}

function img_name($host , $user , $pass , $db_name , $img_name,$hash_pass){
	$cn = mysqli_connect($host , $user , $pass , $db_name);
	mysqli_set_charset($cn,'utf8');
	$sql= "UPDATE m_user SET file_name = '".$img_name."' WHERE password = '".$hash_pass."'";
		
	mysqli_query($cn,$sql);	
	mysqli_close($cn);
}


?>