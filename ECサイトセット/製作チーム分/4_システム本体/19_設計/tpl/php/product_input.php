<?php
  //ログイン中なのでPOSTは維持されている
  session_start();
  //input-data 対照表

//入力データ消去
if (isset($_POST['clear']) && $_POST['clear'] == 'clear') {
  header("Location: ./index01.php");
  exit();
}


  // input_data_check
if (isset($_POST['product'])) {
  if (
    $_POST['name'] != '' && $_POST['detail'] != '' && $_POST['category'] != '' && $_POST['status'] != '' && $_POST['burden'] != '' && $_POST['method'] != '' && $_POST['waitting'] != '' && $_POST['price'] != ''
    ){
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['detail'] = $_POST['detail'];
    $_SESSION['category'] = $_POST['category'];
    $_SESSION['bland'] = $_POST['bland'];
    $_SESSION['status'] = $_POST['status'];
    $_SESSION['burden'] = $_POST['burden'];
    $_SESSION['method'] = $_POST['method'];
    $_SESSION['waitting'] = $_POST['waitting'];
    $_SESSION['from'] = $_POST['from'];
    $_SESSION['price'] = $_POST['price'];
    if ($_POST['nego-flg'] == '1'){
      $_SESSION['nego_flg'] = 1;
      $_SESSION['min_price'] = $_POST['min-price'];
    }else {
      $_SESSION['nego_flg'] = 0;
      $_SESSION['min_price'] = "--";
    }

    if ($_FILES['upload_file']) { //現在jpg || png || gifのみ
      //共通部分
      $_SESSION['file_flg'] = 1;
      $_SESSION['file'] = $_FILES['upload_file'];
      $upload_file = $_FILES['upload_file'];
      // 拡張子による分岐
      // .jpg(jpeg) || .png || .gif
      $tmp_size = getimagesize($_SESSION['file']['tmp_name']); // 一時ファイルの情報を取得
      $img = $extension = null;
      switch ($tmp_size[2]) { // 画像の種類を判別
          case 1 : // GIF
              $img = imageCreateFromGIF($tmp_name);
              $extension = 'gif';
              break;
          case 2 : // JPEG
              $img = imageCreateFromJPEG($tmp_name);
              $extension = 'jpg';
              break;
          case 3 : // PNG
              $img = imageCreateFromPNG($tmp_name);
              $extension = 'png';
              break;
          default : break;
      }
      $_SESSION['file_img_type'] = $extension;
      $_SESSION['File_pass'] = UPLOAD_PATH.'xxx.'.$extension;
      move_uploaded_file($_SESSION['file']['tmp_name'],UPLOAD_PATH."xxx.".$extension);
    }

    
    header("Location: ./index02.php");
    exit();
  }
}

  //訂正時のデータ保持
  if ($_SESSION['process-status'] = 'back') {
    $display = [

    ];
  }else {
    $display = [

    ];
  }

