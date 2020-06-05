<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>ログイン画面</title>
  <link rel="stylesheet" type="text/css" href="./css/login-regist.css">
</head>

<body>
  <div id="header-top">
    <h1><a href="top-page.php"><img src="./images/masarudo.png" width="200px" height="auto"></a></h1>
    <div id="banana">
      <img src="./images/banana.png" width="20px" height="auto">
    </div>
  </div>

  <div id="space"></div>
  <!--レイアウト調整用 -->

  <p class="border"></p>

  <div id="wrapper">
    <form action="login.php" method="POST">
      <div class="login">
        <div class="id">
          <p>ユーザーID</p>
          <input type="text" name="yid" autocomplete="off" class="id2" size="40" value="<?php echo isset($_POST['yid']) ? $_POST['yid']: '' ; ?>">
          <?php foreach ($codes as $code): ?>
                <?php if($code == '201'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php elseif($code == '203'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php endif ?>
              <?php endforeach ?>
        </div>
        <p>
      </div>
      <div class="pass">
        <p>パスワード</p>
        <input type="password" name="pass" class="pass2" size="40" value="<?php echo isset($_POST['pass']) ? $_POST['pass']: '' ; ?>">
        <?php foreach ($codes as $code): ?>
                <?php if($code == '301'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php elseif($code == '304'): ?>
                  <p class="red2"><?php echo ERROR[$code]; ?></p>
                <?php endif ?>
              <?php endforeach ?>
      </div>

      <input type="submit" value="ログイン" class="button red log" name="log">
    </form>
  </div>
</body>
</html>