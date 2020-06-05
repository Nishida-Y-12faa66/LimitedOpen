<?php

session_start();

$yid = $_SESSION['yid'];

if(isset($_SESSION['yid'])){
  $rcode = 1;
}

/** お知らせに関するSQL抽出 */
$cn = mysqli_connect('localhost','root','','ec_masaru');
mysqli_set_charset($cn,'utf8');
$sql = "SELECT news3.title,news3.detail,news3.news_type,news3.id,news3.nego_id,news3.update_time FROM news3 INNER JOIN login ON news3.send_to = login.id OR news3.send_to = '' WHERE login.user_id = '$yid';";
$result = mysqli_query($cn, $sql);
$narrays = array();
while ($nrows = mysqli_fetch_assoc($result)) {
  $narrays[] = $nrows;
}
array_multisort( array_map( "strtotime", array_column( $narrays, "update_time" ) ), SORT_DESC, $narrays ) ;

/** 値下げ交渉に関するSQL抽出 */
$sql2 = "SELECT id FROM login WHERE login.user_id = '$yid';";
$iresult = mysqli_query($cn, $sql2);
$irows = mysqli_fetch_assoc($iresult);
$id = $irows['id'];
$sql3 = "SELECT login.user_id,nego_price.price,product.name,nego_price.id FROM nego_price INNER JOIN login ON nego_price.applicant_id = login.id INNER JOIN product ON nego_price.product_id = product.id WHERE product.exhibitor = '$id';";
$kresult = mysqli_query($cn, $sql3);
while ($krows = mysqli_fetch_assoc($kresult)) {
  $karrays[] = $krows;
}


/** 出品数に関するSQL抽出 */
$sarrays = [];
$scnt = 0;
$sql4 = "SELECT * FROM product INNER JOIN login ON product.exhibitor = login.id WHERE login.user_id = '$yid';";
$sresult = mysqli_query($cn, $sql4);
while ($srows = mysqli_fetch_assoc($sresult)) {
  $sarrays[] = $srows;
  $scnt++;
}

/** 評価数に関するSQL抽出 */
$harrays = [];
$hcnt = 0;
$sql5 = "SELECT * FROM assessment INNER JOIN login ON assessment.re_valuer = login.id WHERE login.user_id = '$yid';";
$hresult = mysqli_query($cn, $sql5);
while ($hrows = mysqli_fetch_assoc($hresult)) {
  $harrays[] = $hrows;
  $hcnt++;
}

//** 取引上の通知 */
$tarrays = [];
$sql6 = "SELECT login.user_id,product.name,trade.status,trade.date FROM trade INNER JOIN login ON trade.parchaser_id = login.id INNER JOIN product ON trade.product_id = product.id WHERE product.exhibitor = '$id' AND trade.status IN(1,2,3,4);";
$tresult = mysqli_query($cn, $sql6);
while ($trows = mysqli_fetch_assoc($tresult)) {
  $tarrays[] = $trows;
}
$sql7 = "SELECT product.name,trade.status,trade.date FROM trade INNER JOIN product ON trade.product_id = product.id WHERE trade.parchaser_id = '$id' AND trade.status IN(1,4);";
$tresult = mysqli_query($cn, $sql7);
while ($trows = mysqli_fetch_assoc($tresult)) {
  $tarrays[] = $trows;
}
array_multisort( array_map( "strtotime", array_column( $tarrays, "date" ) ), SORT_DESC, $tarrays ) ;

//** 購入済 かつ 取引中に関する */
$sql8 = "SELECT product.name,trade.status,trade.date FROM trade INNER JOIN product ON trade.product_id = product.id WHERE trade.parchaser_id = '$id';";
$tresult = mysqli_query($cn, $sql8);
while ($hrows = mysqli_fetch_assoc($tresult)) {
  $harrays[] = $hrows;
}

require_once('./tpl/news-all.php');

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