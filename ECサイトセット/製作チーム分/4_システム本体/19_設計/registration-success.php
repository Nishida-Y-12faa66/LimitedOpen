<?php
session_start();

const HOST = 'localhost';
const DB_NAME = 'ec_masaru';
const DB_USER = 'root';
const DB_PASS = '';

$cn = mysqli_connect(HOST,DB_USER,DB_PASS,DB_NAME);
mysqli_set_charset($cn,'utf8');	
$sql="INSERT INTO shop(user_id) VALUES ('".$_SESSION['id']."')";

mysqli_query($cn,$sql);

// セッションの値を初期化
$_SESSION = array();
 
// セッションを破棄
session_destroy();

require_once('./tpl/registration-success.php');

?>