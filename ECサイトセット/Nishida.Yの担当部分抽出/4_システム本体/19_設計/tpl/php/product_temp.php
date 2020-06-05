<?php
  //ログイン中なのでPOSTは維持されている
  // 仮登録
  session_start();
  // id生成
  // exhibitor,release-area
  $name = $_SESSION['name'];
  $detail = $_SESSION['detail'];
  $category = $_SESSION['category'];
  $bland = $_SESSION['bland'];
  $status = $_SESSION['status'];
  $burden = $_SESSION['burden'];
  $method = $_SESSION['method'];
  $waitting = $_SESSION['waitting'];
  $price = $_SESSION['price'];
  $nego-flg = $_SESSION['nego_flg'];
  $min-price = $_SESSION['min-price'];
  $release-area = 1;
  //DBへの登録自動化
  $cn = mysqli_connect('localhost','root','','ph22');
  mysqli_set_charset($cn,'utf8');
  $sql = "INSERT INTO Menbers_Registration(name,user_id,mail_address,password,created_at) VALUES('".$name."','".$user_id."','".$mail_address."','".$password."','".date('Y-m-d H:i:s')."');";
  mysqli_query($cn,$sql);
  mysqli_close($cn);
//echo '登録完了';

?>