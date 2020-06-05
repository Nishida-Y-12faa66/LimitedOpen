<?php
session_start();
$name = $_SESSION['name'];
$detail = $_SESSION['detail'];
$category = $_SESSION['category']; //q
$bland = $_SESSION['bland'];
$status = $_SESSION['status']; //q
$burden = $_SESSION['burden']; //q
$method = $_SESSION['method']; //q
$waitting = $_SESSION['waitting']; //q
$price = $_SESSION['price'];
$from = $_SESSION['from'];
$nego_flg = $_SESSION['nego_flg'];
if ($nego_flg == 0) {
  $_SESSION['min_price'] = 0;
}
$min_price = $_SESSION['min_price'];


//upload_img_pass
$upload_img_pass = $_SESSION['File_pass'];



// //押されたボタンにて、ページ遷移先を変更
// if (isset($_POST['go'])) {
//   // 登録
//     header("Location: registration.php");
//     exit();
// }elseif (isset($_POST['back'])) {
//   // 訂正
//     header("Location: input=mr.php");
//     exit();
// }

// var_dump($name);
// var_dump(isset($_SESSION['name']));
// var_dump($_SESSION['price']);
// var_dump($_SESSION['nego_flg']);
 ?>