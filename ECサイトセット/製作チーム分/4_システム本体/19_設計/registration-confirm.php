<?php

session_start();

$mail = $_SESSION['mail'];
$id = $_SESSION['id'];
$pass = $_SESSION['pass'];
$lpass = '';
for($p = 0 ; $p < strlen($pass) ; $p++){
  $lpass .= '*';
}
$pass = password_hash($pass, PASSWORD_BCRYPT);

$fn = $_SESSION['fn'];
$ln = $_SESSION['ln'];
$kfn = $_SESSION['kfn'];
$kln = $_SESSION['kln'];

$fcode = $_SESSION['fcode'];
$lcode = $_SESSION['lcode'];
$paddr = $_SESSION['paddr'];
$addr = $_SESSION['addr'];

if (isset($_SESSION['bname'])) {
  $bname = $_SESSION['bname'];
} else {
  $bname = '未登録';
}
if (isset($_SESSION['branch'])) {
  $branch = $_SESSION['branch'];
} else {
  $branch = '未登録';
}
if (isset($_SESSION['bnumber'])) {
  $bnumber = $_SESSION['bnumber'];
} else {
  $bnumber = '未登録';
}

require_once('./tpl/registration-confirm.php');
$month = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C');

//*** 入力した内容で登録するを押された場合 */
if (isset($_POST['ok'])) {
  $code = strval($fcode) . strval($lcode);
  $cn = mysqli_connect('localhost', 'root', '', 'ec_masaru');
  mysqli_set_charset($cn, 'utf8');
  $sql1 = "SELECT id FROM members;";
  $rsl = mysqli_query($cn, $sql1);
  $kid = "";
  $dmonth = "";
  while ($row = mysqli_fetch_assoc($rsl)){
    $kid = $row['id'];
  }
  if(!($kid == "")){
    $dmonth = substr($kid, 0, 1); //** データベース上の最近の月情報 */
  }

  $nmonth = date('n') - 1; //** 現在の月取得 */
  $nmonth = $month[$nmonth]; //** 月情報 */

  $nyear = date('y'); //** 現在の年取得 */

  
  $mid = substr($kid, 3);
  $mid = ltrim($mid, '0'); //** 5桁なので前に0がある場合、一度無くす */
  if(!($dmonth == $nmonth) || $kid == ''){ //** その月の新規会員がいない場合 */
    $mid = '00001'; //** 00001にする */
  }else{
    $mid++; //** これまでの会員に＋１ */
    $mid = sprintf('%05d', $mid); //** 5桁に合わせる */
  }

  var_dump($nid = strval($nmonth) . strval($nyear) . strval($mid));

  $sql2 = "INSERT INTO login(id, user_id, pass_h, mail_address) VALUES('$nid', '$id', '$pass', '$mail');";
  mysqli_query($cn, $sql2);
  $sql3 = "INSERT INTO members(id, f_name, l_name, postal_code, address1, address2, regist_date) VALUES('$nid', '$fn', '$ln', '$code', '$paddr', '$addr', '".date('Y-m-d H:i:s')."');";
  mysqli_query($cn,$sql3);
  mysqli_close($cn);

  header("location:./registration-success.php");
  exit;
}

//*** 入力した内容を修正するを押された場合 */
if (isset($_POST['ng'])) {
    header("location:./registration.php");
}

?>