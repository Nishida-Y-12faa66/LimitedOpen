<?php

require_once('error.php');

$codes = [];

session_start();

if(isset($_POST['log'])){
  $yid = $_POST['yid'];
  $pass = $_POST['pass'];

  $dpass = "";
  $cn = mysqli_connect('localhost','root','','ec_masaru');
	mysqli_set_charset($cn,'utf8');
  $sql = "SELECT user_id,pass_h FROM login WHERE user_id = '$yid';";
  $result = mysqli_query($cn, $sql);
  $row = mysqli_fetch_assoc($result);
  $dpass = $row['pass_h'];
  $did = $row['user_id'];

  if($yid == ""){
    $codes[] = '201';
  }elseif(!($did == $yid)){
    $codes[] = '203';
  }

  if($pass == ""){
    $codes[] = '301';
  }

  if(empty($codes)){
    if(password_verify($pass, $dpass)){
      $sql = "SELECT * FROM members INNER JOIN login ON members.id = login.id;";
      $result2 = mysqli_query($cn, $sql);
      $row2 = mysqli_fetch_assoc($result2);
      $_SESSION['yid'] = $yid;
      $_SESSION['fn'] = $rows2['f_name'];
      $_SESSION['ln'] = $rows2['l_name'];
      $_SESSION['code'] = $rows2['postal_code'];
      $_SESSION['addr'] = $rows2['address1'] . $rows2['address2'];
      header("location:./top-page.php");
      exit;
    }else{
      $codes[] = '304';
    }
  }
}

require './tpl/login.php';

?>