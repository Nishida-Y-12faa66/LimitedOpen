<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>会員登録画面 - 確認</title>
  <link rel="stylesheet" type="text/css" href="./css/registration.css">
</head>

<body>
  <div id="header-top">
    <h1><a href=""><img src="./images/masarudo.png" width="200px" height="auto"></a></h1>
    <div id="banana">
      <img src="./images/banana.png" width="20px" height="auto">
    </div>

    <div id="navi">
      <ul>
        <li>会員情報入力</li>
        <li class="arrow y"></li>
        <li class="now">入力情報確認</li>
        <li class="arrow y"></li>
        <li>登録完了</li>
      </ul>
    </div>
  </div>

  <div id="space"></div>
  <!--レイアウト調整用 -->

  <p class="border"></p>

  <div id="wrapper3">
    <form action="" method="POST">
      <div class="form">

        <h2 class="pad">会員入力情報確認</h2>

        <div class="imp">
          <h2><img src="./images/saru2.png" width="26px" height="26px">
            <p>メールアドレス/ユーザーID/パスワード</p>
          </h2>
          <table>
            <tr>
              <td class="title">メールアドレス</td>
              <td><?php echo $mail; ?></td>
            </tr>
            <tr>
              <td class="title">ユーザーID</td>
              <td><?php echo $id; ?></td>
            </tr>
            <tr>
              <td class="title">パスワード</td>
              <td><?php echo $lpass; ?></td>
            </tr>
          </table>
        </div>

        <div class="name">
          <h2><img src="./images/saru2.png" width="26px" height="26px">
            <p>お客様の基本情報</p>
          </h2>
          <table>
            <tr>
              <td class="title">氏名</td>
              <td class="title"><span class="title">姓)</span><?php echo $fn; ?></td>
              <td class="title"><span class="title span">名)</span><?php echo $ln; ?></td>
            </tr>
            <tr>
              <td class="title">氏名(フリガナ)</td>
              <td class="title"><span class="title">姓)</span><?php echo $kfn; ?></td>
              <td class="title"><span class="title span">名)</span><?php echo $kln; ?></td>
            </tr>
          </table>
        </div>

        <div class="address">
          <h2><img src="./images/saru2.png" width="26px" height="26px">
            <p>お届け先の住所</p>
          </h2>
          <table>
            <tr>
              <td class="title">郵便番号</td>
              <td><?php echo $fcode; ?> - <?php echo $lcode; ?></td>
            </tr>
            <tr>
              <td class="title">都道府県,市町村</td>
              <td><?php echo $paddr; ?></td>
            </tr>
            <tr>
              <td class="title">番地・号・マンション</td>
              <td><?php echo $addr; ?></td>
            </tr>
          </table>
        </div>

        <div class="address">
          <h2><img src="./images/saru2.png" width="26px" height="26px">
            <p>お振込先の情報</p>
          </h2>
          <table>
            <tr>
              <td class="title">銀行名</td>
              <td><?php echo $bname; ?></td>
            </tr>
            <tr>
              <td class="title">支店名/支店コード</td>
              <td><?php echo $branch; ?></td>
            </tr>
            <tr>
              <td class="title">口座番号</td>
              <td><?php echo $bnumber; ?></td>
            </tr>
          </table>
        </div>

        <div class="submit">
          <input type="submit" value="入力した内容で登録する" name="ok" class="obutton c">
          <input type="submit" value="入力した内容を修正する" name="ng" class="nbutton c">
        </div>
      </div>
    </form>

  </div>

</body>
</html>