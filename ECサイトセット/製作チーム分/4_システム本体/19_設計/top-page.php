<?php

session_start();
$rcode = 0;

if(isset($_SESSION['yid'])){
  $rcode = 1;
}

$ydate = date("Y-m-d H:i:s", strtotime("-1 day"));
$scnt = 0;
$ncnt = 0;
$cn = mysqli_connect('localhost','root','','ec_masaru');
mysqli_set_charset($cn,'utf8');
$sql = "SELECT * FROM product WHERE release_area = 2;";
$result = mysqli_query($cn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  if($row['date'] > $ydate ){
    $ncnt++;
  }
  $sarrays[] = $row;
  $scnt++;
}
array_multisort( array_map( "strtotime", array_column( $sarrays, "date" ) ), SORT_DESC, $sarrays ) ;

require_once('./tpl/top-page.php');

?>