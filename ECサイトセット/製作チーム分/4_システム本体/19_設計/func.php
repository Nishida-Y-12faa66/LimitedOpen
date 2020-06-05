<?php

//*** メールアドレス一覧を呼び出す関数 */
function mail_list(){
  $cn = mysqli_connect('localhost','root','','ec_masaru');
	mysqli_set_charset($cn,'utf8');
  $sql = "SELECT mail_address from login INNER JOIN members ON login.id = members.id;";
  $result = mysqli_query($cn, $sql);
  $marrays = array();
  while ($mrows = mysqli_fetch_assoc($result)) {
    $marrays[] = $mrows;
  }
  mysqli_close($cn);
  return $marrays;
}

//*** ユーザーIDを一覧を呼び出す関数 */
function id_list(){
  $cn = mysqli_connect('localhost','root','','ec_masaru');
	mysqli_set_charset($cn,'utf8');
  $sql = "SELECT user_id from login INNER JOIN members ON login.id = members.id;";
  $result = mysqli_query($cn, $sql);
  $rarrays = array();
  while ($rrows = mysqli_fetch_assoc($result)) {
    $rarrays[] = $rrows;
  }
  mysqli_close($cn);
  return $rarrays;
}

function cn(){
  $cn=mysqli_connect('localhost','root','','ec_masaru');
  return $cn;
}


//product_id と　購入者IDが飛んできた
function pay_01($product_id,$parchaser_id,$pay_id){
$cn = cn();
mysqli_set_charset($cn,'utf8');
$sql = "INSERT INTO trade(`id`, `product_id`, `parchaser_id`, `transfer_flg`, `transfer_detial`, `status`) VALUES ('".$pay_id."', '".$product_id."', '".$parchaser_id."', '1', '".transfer_detail()."', '2')";
mysqli_query($cn,$sql);
//product lelease_area =3
$sql = "UPDATE product SET release_area=3 WHERE id='".$product_id."'";
mysqli_query($cn,$sql);
mysqli_close($cn);
}
//
function pay_id($length = 9){
static $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789';
$str = '';
for ($i = 0; $i < $length; ++$i) {
  $str .= $chars[mt_rand(0, 61)];
}
return $str;

}

function transfer_detail($length = 9){
static $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789';
$str = '';
for ($i = 0; $i < $length; ++$i) {
  $str .= $chars[mt_rand(0, 61)];
}
return $str;

}

function assessment_id($length = 9){
static $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789';
$str = '';
for ($i = 0; $i < $length; ++$i) {
  $str .= $chars[mt_rand(0, 61)];
}
return $str;

}


function assessment($trade_id,$value,$comment,$uid,$sid){
$cn = cn();
mysqli_set_charset($cn,'utf8');
$sql = "INSERT INTO assessment(id,trade_id,valuer,re_valuer,value,comment,type) VALUES ( '".assessment_id()."' , '$trade_id','$uid','$sid',$value,'$comment',1)";
mysqli_query($cn,$sql);
$sql = "UPDATE `trade` SET `status`='5' WHERE `id`='".$trade_id."'
";
mysqli_query($cn,$sql); 
mysqli_close($cn);

}

?>