<?php
  //ログイン中なのでPOSTは維持されている
  // 実登録
  session_start();

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


  $yid = $_SESSION['yid'];

  $cn = mysqli_connect('localhost','root','','ec_masaru');
  mysqli_set_charset($cn,'utf8');
  $sql2 = "SELECT id FROM login WHERE user_id = '$yid';";
  $result = mysqli_query($cn, $sql2);
  $row = mysqli_fetch_assoc($result);
  $exhibitor = $row['id'];
  
  // release-area
  $name = $_SESSION['name'];
  $detail = $_SESSION['detail'];
  $category = $data_category_regist[$_SESSION['category']];
  // $category = $_SESSION['category'];
  $bland = $_SESSION['bland'];
  $status = (int)$_SESSION['status'];
  $burden = (int)$_SESSION['burden'];
  $method = (int)$_SESSION['method'];
  $waitting = (int)$_SESSION['waitting'];
  $from = (int)$_SESSION['from'];
  $price = (int)$_SESSION['price'];
  $nego_flg = $_SESSION['nego_flg'];
  $min_price = (int)$_SESSION['min_price'];
  $release_area = 2;
  //DBへの登録自動化
  $sql = "INSERT INTO product(id,name,detail,exhibitor,category,bland,status,postage_burden,delivery_method,delivery_waitting,from_send,default_price,nego_flg,min_price,trade_price,release_area,open_to) 
  VALUES('".$id."','".$name."','".$detail."','".$exhibitor."',".$category.",'".$bland."',".$status.",".$burden.",".$method.",".$waitting.",".$from.",".$price.",".$nego_flg.",".$min_price.",".$price.",".$release_area.",'null');";
  mysqli_query($cn,$sql);
  mysqli_close($cn);

  // 画像リネーム　//jpg,png,gifのみ
  if ($_SESSION['file_flg'] == 1) {
    $type = $_SESSION['file_img_type'];
    rename( './../images/products/xxx.'.$type, './../images/products/'.$id.'.'.$type);
  }//else{ //画像なしの場合商品表示の際、対処？
    
$_SESSION['file_flg'] = 0;
  //}


// '登録完了';
// var_dump(isset($_FILES));
// var_dump($_FILES);
// echo "<br>id ";
// var_dump($id);
// echo "<br>name ";
// var_dump($name);
// echo "<br>detail ";
// var_dump($detail);
// echo "<br>exhibitor ";
// var_dump($exhibitor);
// echo "<br>category ";
// var_dump($category);
// echo "<br>bland ";
// var_dump($bland);
// echo "<br>status ";
// var_dump($status);
// echo "<br>burden ";
// var_dump($burden);
// echo "<br>method ";
// var_dump($method);
// echo "<br>waitting ";
// var_dump($waitting);
// echo "<br>price ";
// var_dump($price);
// echo "<br>nego-flg ";
// var_dump($nego_flg);
// echo "<br>min_price ";
// var_dump($min_price);
// echo "<br>trade_price ";
// var_dump($price);
// echo "<br>release_area ";
// var_dump($release_area);
// echo "<br>open_to ";
// echo "null";



?>