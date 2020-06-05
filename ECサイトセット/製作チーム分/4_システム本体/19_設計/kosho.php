<?php
session_start();

$yid = $_SESSION['yid'];

if(isset($_SESSION['yid'])){
  $rcode = 1;
}

if(isset($_SESSION['kid'])){
  if(isset($_GET['kid'])){
    if(!($_GET['kid'] == $_SESSION['kid'])){
      $kid = $_GET['kid'];
    }else{
      $kid = $_SESSION['kid'];
    }
  }else{
    $kid = $_SESSION['kid'];
  }
}else{
  $kid = $_GET['kid'];
}

$cn = mysqli_connect('localhost','root','','ec_masaru');
mysqli_set_charset($cn,'utf8');
$sql = "SELECT name FROM product WHERE id = '$kid';";
$result = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($result);
$sql2 = "SELECT id FROM login WHERE login.user_id = '$yid';";
$iresult = mysqli_query($cn, $sql2);
$irows = mysqli_fetch_assoc($iresult);
$id = $irows['id'];
$karrays = [];
$sql3 = "SELECT login.user_id,nego_price.price,product.name,nego_price.id,product.date,nego_price.product_id FROM nego_price INNER JOIN login ON nego_price.applicant_id = login.id INNER JOIN product ON nego_price.product_id = product.id WHERE product.exhibitor = '$id' AND product.id = '$kid';";
$kresult = mysqli_query($cn, $sql3);
while ($krows = mysqli_fetch_assoc($kresult)) {
  $karrays[] = $krows;
  $_SESSION['proid'] = $krows['product_id'];
}
require_once('./tpl/kosho.php');

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