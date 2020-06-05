<?php
require_once('./../../config.php');
require_once('./func/func.php');

session_start();

if (!isset($_SESSION['login_id'])) {
	header('Location:./index.php');
}

if (isset($_GET['flg'])) {
	unset($_SESSION['login_id']);
	header('Location:./index.php');
}
$get_id = get_info_id(DB_HOST,DB_USER,DB_PASS,DB);
$info_num = floor($get_id[0]['MAX(id)']/5)+1;
$MIN = 1;
$MAX = $info_num;

if (isset($_GET['page'])) {
	$get_information = get_information(DB_HOST,DB_USER,DB_PASS,DB,($_GET['page']-1)*5);
	$next = $_GET['page'] + 1;
	$prev = $_GET['page'] - 1;
}
else{
	$get_information = get_information(DB_HOST,DB_USER,DB_PASS,DB,0);
	$_GET['page'] = 1;
	$next = $_GET['page'] + 1;
	$prev = $_GET['page'] - 1;


}

$get_user = get_user(DB_HOST,DB_USER,DB_PASS,DB,$_SESSION['login_id']);

$file_dir = "./images/user/".$get_user[0]['id']."/thumb_".$get_user[0]['file_name'];


require_once('./tpl/information.php');


?>
