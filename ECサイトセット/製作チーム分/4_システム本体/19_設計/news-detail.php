<?php
session_start();

$yid = $_SESSION['yid'];
$id = $_GET['id'];

if(isset($_SESSION['yid'])){
  $rcode = 1;
}

$cn = mysqli_connect('localhost','root','','ec_masaru');
mysqli_set_charset($cn,'utf8');
$sql = "SELECT * FROM news3 WHERE id = '$id';";
$result = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($result);

if($row['news_type'] == 1){
  $detail = explode(",",$row['detail']);
}
if($row['news_type'] == 7){
  $detail = explode(",",$row['detail']);
}

if($row['news_type'] == 2){
  $sql2 = "SELECT id FROM login WHERE login.user_id = '$yid';";
  $iresult = mysqli_query($cn, $sql2);
  $irows = mysqli_fetch_assoc($iresult);
  $iid = $irows['id'];
  $sql3 = "SELECT login.user_id,nego_price.price,product.name,nego_price.id FROM nego_price INNER JOIN login ON nego_price.applicant_id = login.id INNER JOIN product ON nego_price.product_id = product.id WHERE product.exhibitor = '$iid';";
  $kresult = mysqli_query($cn, $sql3);
  while ($krows = mysqli_fetch_assoc($kresult)) {
    $karrays[] = $krows;
  }
}

require_once('./tpl/news-detail.php');

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