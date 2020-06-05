<?php

session_start();

$rcode = 0;

$yid = $_SESSION['yid'];
$uid = $_GET['user_id'];
$kid = $_GET['kid'];
$proid = $_SESSION['proid'];

if(isset($_SESSION['yid'])){
    $rcode = 1;
  }

$_SESSION['kid'] = $kid;

$cn = mysqli_connect('localhost','root','','ec_masaru');
mysqli_set_charset($cn,'utf8');
$sql = "SELECT login.user_id,nego_price.price FROM nego_price INNER JOIN login ON nego_price.applicant_id = login.id WHERE login.user_id = '$uid' AND nego_price.product_id = '$proid';";
$result = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($result);


$url = './kosho.php?kid=' . $kid;

if(isset($_POST['fix'])){
  header('location:' . $url);
  exit();
}
if(isset($_POST['confirm'])){
  //id生成

  //商品登録数/月の整理
  //読み込み比較
  $date = date('n');
  $fp = fopen("text/date_m.txt", "r");
  $line = fgets($fp);
  fclose($fp);

  //月で初めての登録かどうか
  if ($date == $line) {
    //商品登録数/月をカウント
    $fp = fopen("text/cnt.txt", "r");
    $cnt = fgets($fp);
    $cnt++;
    fclose($fp);
    $fp_cnt = fopen("text/cnt.txt", "w");
    fwrite($fp_cnt, $cnt);
    fclose($fp_cnt);


  }else {
    //商品登録数/月を初期化
    $fp_n = fopen("text/date_m.txt", "w");
    fwrite($fp_n, $date);
    fclose($fp_n);
    $cnt = 1;
    $fp_cnt = fopen("text/cnt.txt", "w");
    fwrite($fp_cnt, $cnt);
    fclose($fp_cnt);
  }
  //id用の部分データ生成
  //月
  $num = date('n');
  $format = "%X";
  $date_m = sprintf($format,$num);
  //年
  $date_y = date('y');
  //商品登録数/月
  $format = "%06X"; //六桁で0埋め
  $id_eice = sprintf($format,$cnt);
  // $id_eice = str_pad($num,6,0,STR_PAD_LEFT); 

  //合成
  $id = $date_m.=$date_y.=$id_eice;

  $sql = "SELECT id FROM login WHERE user_id = '$uid';";
  $wresult = mysqli_query($cn, $sql);
  $roww = mysqli_fetch_assoc($wresult);
  $bid = $roww['id'];
  $sql4 = "SELECT name FROM product WHERE id = '$kid';";
  $presult = mysqli_query($cn, $sql4);
  $prow = mysqli_fetch_assoc($presult);
  $title = $prow['name'];
  $dtitle = $title . 'の値下げ申請が通りました。';
  $detail = 'あなたが申請された' . $title . 'の値下げ申請が承諾されました。,入金の準備がされ次第、入金の程よろしくお願いいたします。';
  $sql2 = "INSERT INTO trade(id,product_id,parchaser_id,transfer_flg,status) VALUES('$id','$kid','$bid',0,1);";
  $result = mysqli_query($cn, $sql2);
  $sql3 = "INSERT INTO news3(id,title,detail,send_to,news_type) VALUES('$id','$dtitle','$detail','$bid',7);";
  $result = mysqli_query($cn, $sql3);
  $sql="UPDATE product SET release_area = 3 WHERE id = '$kid';";
  mysqli_query($cn,$sql);

  header('location:./my-page.php');


}

mysqli_close($cn);

require_once('./tpl/purchaser-check.php');

$product_list = [];

if($_SESSION['return'] == 1){
    $cn = mysqli_connect('localhost', 'root', '', 'ec_masaru');
    mysqli_set_charset($cn, 'utf8');
    foreach($_SESSION['session_products'] as $session_product){
        $ssql = "SELECT * FROM product WHERE name = '$session_product';";
        $sresult = mysqli_query($cn, $ssql);
        while ($srow = mysqli_fetch_assoc($sresult)) {
            $product_list[] = $srow;
        }
    }
    array_multisort( array_map( "strtotime", array_column( $product_list, "date" ) ), SORT_DESC, $product_list ) ;
}

$_SESSION['return'] = 0;

//全件表示かつ捜索
if (isset($_POST['rsearch']) || isset($_POST['nsearch']) || isset($_POST['asearch'])) {
    if($_SESSION['return'] == 0){
        $keyword = $_POST['keyword'];
        $keyword = '%' . $keyword . '%';
        $category = '';
        $session_products = [];
        if(isset($_POST['category'])){
            $category = $_POST['category'];
        }
        $cn = mysqli_connect('localhost', 'root', '', 'ec_masaru');
        mysqli_set_charset($cn, 'utf8');
        $sql = "SELECT * FROM product WHERE release_area = 2";
    
        // $stmt=mysqli_prepare($cn,"
        // SELECT * FROM player WHERE del_flg = 0");
        // mysqli_stmt_bind_param ($stmt,'s',$name);
    
        if ($keyword != '') {
            $sql  .= " AND name LIKE '$keyword'";
            // $stmt=mysqli_prepare($cn,"
            // SELECT * FROM player WHERE del_flg = 0 AND name LIKE '%(?)%')";
            // mysqli_stmt_bind_param ($stmt,'s',$search);
        }
        if ($category != '') {
            $sql  .= " AND category = $category";
            // $stmt=mysqli_prepare($cn,"
            // SELECT * FROM player WHERE del_flg = 0 AND name LIKE '%(?)%')";
            // mysqli_stmt_bind_param ($stmt,'s',$search);
        }
        $result = mysqli_query($cn, $sql);
    
        while ($row = mysqli_fetch_assoc($result)) {
            $product_list[] = $row;
            $session_products[] = $row['name'];
        }
        array_multisort( array_map( "strtotime", array_column( $product_list, "date" ) ), SORT_DESC, $product_list ) ;
        mysqli_close($cn);
    
        $_SESSION['session_products'] = $session_products;
    }
}

?>
