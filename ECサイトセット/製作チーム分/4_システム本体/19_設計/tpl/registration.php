<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>会員登録画面</title>
  <link rel="stylesheet" type="text/css" href="./css/registration.css">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</head>

<body>
  <div id="header-top">
    <h1><a href=""><img src="./images/masarudo.png" width="200px" height="auto"></a></h1>
    <div id="banana">
      <img src="./images/banana.png" width="20px" height="auto">
    </div>

    <div id="navi">
      <ul>
        <li class="now">会員情報入力</li>
        <li class="arrow y"></li>
        <li>入力情報確認</li>
        <li class="arrow y"></li>
        <li>登録完了</li>
      </ul>
    </div>
  </div>

  <div id="space"></div>
  <!--レイアウト調整用 -->

  <p class="border"></p>

  <div id="wrapper">
    <form action="registration.php" method="POST">
      <div class="form">

        <h2 class="pad">会員情報入力</h2>

        <div class="imp">
          <h2><img src="./images/saru2.png" width="26px" height="26px">
            <p>メールアドレス/ユーザーID/パスワード</p>
          </h2>
          <table>
            <tr>
              <td class="title">メールアドレス<span class="red">必須</span></td>
              <td><input type="text" name="mail" size="50" autocomplete="off" value="<?php echo isset($_SESSION['mail']) ? $_SESSION['mail']:( isset($_POST['mail']) ? $_POST['mail'] : '' ); ?>">
              <?php foreach ($codes as $code): ?>
                <?php if($code == '101'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php elseif($code == '102'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php elseif($code == '103'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php endif ?>
              <?php endforeach ?></td>
            </tr>
            <tr>
              <td class="title">ユーザーID<span class="red">必須</span></td>
              <td><input type="text" name="id" size="40" autocomplete="off" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id']:( isset($_POST['id']) ? $_POST['id'] : '' ); ?>">
              <?php foreach ($codes as $code): ?>
                <?php if($code == '201'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php elseif($code == '202'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php endif ?>
              <?php endforeach ?></td>
            </tr>
            <tr>
              <td class="title">パスワード <span class="red2">※8文字以上の英数字</span><span class="red">必須</span></td>
              <td><input type="text" name="pass" size="40" autocomplete="off" value="<?php echo isset($_SESSION['pass']) ? $_SESSION['pass']:( isset($_POST['pass']) ? $_POST['pass'] : '' ); ?>">
              <?php foreach ($codes as $code): ?>
                <?php if($code == '301'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php elseif($code == '302'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php elseif($code == '303'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php endif ?>
              <?php endforeach ?></td>
            </tr>
          </table>
        </div>

        <div class="name">
          <h2><img src="./images/saru2.png" width="26px" height="26px">
            <p>お客様の基本情報</p>
          </h2>
          <table>
            <tr>
              <td class="title">氏名<span class="red">必須</span></span></td>
              <td><span class="title">姓)</span><input type="text" name="fn" autocomplete="off" value="<?php echo isset($_SESSION['fn']) ? $_SESSION['fn']:( isset($_POST['fn']) ? $_POST['fn'] : '' ); ?>"></td>
              <td><span class="title span">名)</span><input type="text" name="ln" autocomplete="off" value="<?php echo isset($_SESSION['ln']) ? $_SESSION['ln']:( isset($_POST['ln']) ? $_POST['ln'] : '' ); ?>">
              <?php foreach ($codes as $code): ?>
            <tr>
              <?php if($code == '401'): ?>
              <td></td>
              <td>
                <p class="red2 attention"><?php echo ERROR[$code]; ?></p>
              </td>
                <?php endif ?>
            </tr>
            <?php endforeach ?>
            <tr>
              <td class="title">氏名(フリガナ)<span class="red">必須</span></td>
              <td><span class="title">姓)</span><input type="text" name="kfn" autocomplete="off" value="<?php echo isset($_SESSION['kfn']) ? $_SESSION['kfn']:( isset($_POST['kfn']) ? $_POST['kfn'] : '' ); ?>"></td>
              <td><span class="title span">名)</span><input type="text" autocomplete="off" name="kln" value="<?php echo isset($_SESSION['kln']) ? $_SESSION['kln']:( isset($_POST['kln']) ? $_POST['kln'] : '' ); ?>"></td>
            </tr>
            <?php foreach ($codes as $code): ?>
            <tr>
              <?php if($code == '501'): ?>
              <td></td>
              <td>
                <p class="red2 attention"><?php echo ERROR[$code]; ?></p>
              </td>
                <?php endif ?>
            </tr>
            <?php endforeach ?>
          </table>
        </div>

        <div class="address">
          <h2><img src="./images/saru2.png" width="26px" height="26px">
            <p>お届け先の住所</p>
          </h2>
          <table>
            <tr>
              <td class="title">郵便番号<span class="red">必須</span></td>
              <td><input type="text" name="zip21" size="4" maxlength="3" autocomplete="off" value="<?php echo isset($_SESSION['fcode']) ? $_SESSION['fcode']:( isset($_POST['zip21']) ? $_POST['zip21'] : '' ); ?>">
               － <input type="text" name="zip22" size="5" maxlength="4" autocomplete="off" onKeyUp="AjaxZip3.zip2addr('zip21','zip22','addr21','addr21');" value="<?php echo isset($_SESSION['lcode']) ? $_SESSION['lcode']:( isset($_POST['zip22']) ? $_POST['zip22'] : '' ); ?>">
              <?php foreach ($codes as $code): ?>
                <?php if($code == '601'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php endif ?>
              <?php endforeach ?></td>
            </tr>
            <tr>
              <td class="title">都道府県,市町村<span class="red">必須</span></td>
              <td><input type="text" name="addr21" size="30" autocomplete="off" value="<?php echo isset($_SESSION['paddr']) ? $_SESSION['paddr']:( isset($_POST['addr21']) ? $_POST['addr21'] : '' ); ?>">
              <?php foreach ($codes as $code): ?>
                <?php if($code == '701'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php endif ?>
              <?php endforeach ?></td>
            </tr>
            <tr>
              <td class="title">番地・号・マンション名<span class="red">必須</span></td>
              <td><input type="text" name="addr" size="40" autocomplete="off" value="<?php echo isset($_SESSION['addr']) ? $_SESSION['addr']:( isset($_POST['addr']) ? $_POST['addr'] : '' ); ?>">
              <?php foreach ($codes as $code): ?>
                <?php if($code == '801'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php endif ?>
              <?php endforeach ?></td>
            </tr>
          </table>
        </div>

        <div class="bank">
          <h2><img src="./images/saru2.png" width="26px" height="26px">
            <p>お振込先の情報</p>
          </h2>
          <table>
            <tr>
              <td class="title">銀行名<span class="red">必須</span></td>
              <td><input type="text" name="bname" autocomplete="off" size="30" value="<?php echo isset($_SESSION['bcode']) ? $_SESSION['bcode']:( isset($_POST['bcode']) ? $_POST['bcode'] : '' ); ?>"></td>
            </tr>
            <tr>
              <td class="title">支店名/支店コード<span class="red">必須</span></td>
              <td><input type="text" autocomplete="off" name="branch" value="<?php echo isset($_SESSION['branch']) ? $_SESSION['branch']:( isset($_POST['branch']) ? $_POST['branch'] : '' ); ?>"></td>
            </tr>
            <tr>
              <td class="title">口座番号<span class="red">必須</span></td>
              <td><input type="text" autocomplete="off" name="bnumber" value="<?php echo isset($_SESSION['bnumber']) ? $_SESSION['bnumber']:( isset($_POST['bnumber']) ? $_POST['bnumber'] : '' ); ?>"></td>
            </tr>
          </table>
        </div>

        <input type="submit" value="確認" class="button" name="check">

      </div>
    </form>
  </div>
</body>