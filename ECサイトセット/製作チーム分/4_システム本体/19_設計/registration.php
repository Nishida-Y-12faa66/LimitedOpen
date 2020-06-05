<?php

require_once('func.php');
require_once('error.php');

$codes = [];

session_start();

if (isset($_POST['check'])) {
  //** メアド、ID、パスワードに関するエラーチェック */
  $mail = $_POST['mail'];
  $id = $_POST['id'];
  $pass = $_POST['pass'];
  //** メアド */
  if($mail == ""){ //** 空白チェック */
    $codes[] = '101';
  }elseif (!(filter_var($mail, FILTER_VALIDATE_EMAIL))) { //** 正しいメアドかどうか */
    $codes[] = '102';
  }else{
    $mlists = mail_list();
    foreach ($mlists as $mlist) {
      if ($mail == $mlist['mail_address']) {
        $codes[] = '103'; //*** これまでに登録されたメールアドレスを被っている場合、エラーを出す */
      }
    }
  }

  //** ユーザーID */
  if ($id == '') {
    $codes[] = '201'; //*** 空欄の場合、エラーを出す */
  }else{
    $ilists = id_list();
    foreach($ilists as $ilist){
      if($id == $ilist['user_id']){
        $codes[] = '202'; //*** これまでに登録されたログインIDと被っている場合、エラーを出す */
      }
    }
  }

  //** パスワード */
  if($pass == ""){ //** 空白かどうか */
    $codes[] = '301';
  }elseif(strlen($pass) < 8){ //** 8文字以上かどうか */
    $codes[] = '302';
  }elseif(!(preg_match("/^(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}$/i",$pass))){ //** 正しく設定されているか(英数字) */
    $codes[] = '303';
  }


  //** 氏名に関するエラーチェック */
  $fn = $_POST['fn'];
  $ln = $_POST['ln'];
  $kfn = $_POST['kfn'];
  $kln = $_POST['kln'];
  //** 氏名(漢字) */
  if($fn == "" || $ln == ""){ //** 空白かどうか */
    $codes[] = '401';
  }

  //** 氏名(カタカナ) */
  if($kfn == "" || $kln == ""){ //** 空白かどうか */
    $codes[] = '501';
  }


  //** 住所に関するエラーチェック */
  $fcode = $_POST['zip21'];
  $lcode = $_POST['zip22'];
  $paddr = $_POST['addr21'];
  $addr = $_POST['addr'];
  //** 郵便番号 */
  if($fcode == "" || $lcode == ""){ //** 空白かどうか */
    $codes[] = '601';
  }

  //** 都道府県,市町村 */
  if($paddr == ""){ //** 空白かどうか */
    $codes[] = '701';
  }

  //** 住所 */
  if($addr == ""){ //** 空白かどうか */
    $codes[] = '801';
  }


  //** エラーが一つもない場合セッションに値を入れる */
  if(empty($codes)){


    $_SESSION['mail'] = $mail;
    $_SESSION['id'] = $id;
    $_SESSION['pass'] = $pass;

    $_SESSION['fn'] = $fn;
    $_SESSION['ln'] = $ln;
    $_SESSION['kfn'] = $kfn;
    $_SESSION['kln'] = $kln;

    $_SESSION['fcode'] = $fcode;
    $_SESSION['lcode'] = $lcode;
    $_SESSION['paddr'] = $paddr;
    $_SESSION['addr'] = $addr;

    //** 銀行口座 */
    if(!($_POST['bname'] == "")){
      $_SESSION['bname'] = $_POST['bname'];
    }
    if(!($_POST['branch'] == "")){
      $_SESSION['branch'] = $_POST['branch'];
    }
    if(!($_POST['bnumber'] == "")){
      $_SESSION['bnumber'] = $_POST['bnumber'];
    }

    header('location:registration-confirm.php');
  }

}

require_once 'tpl/registration.php';

?>

