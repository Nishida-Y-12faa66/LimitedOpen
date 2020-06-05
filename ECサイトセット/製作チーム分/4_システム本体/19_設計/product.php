<?php
session_start();
$rcode = 0;

if (isset($_SESSION['yid'])) {
  $rcode = 1;
}

const HOST = 'localhost';
const DB_NAME = 'ec_masaru';
const DB_USER = 'root';
const DB_PASS = '';

$pid = '';
if (isset($_SESSION['pid'])) {
  if (isset($_GET['pid'])) {
    if (!($_GET['pid'] == $_SESSION['pid'])) {
      $pid = $_GET['pid'];
    } else {
      $pid = $_SESSION['pid'];
    }
  } else {
    $pid = $_SESSION['pid'];
  }
} else {
  $pid = $_GET['pid'];
}

$_SESSION['pid'] = $pid;

$cn = mysqli_connect(HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($cn, 'utf8');

/* チャット */
$sql = "SELECT user_id,msg FROM chat_detail WHERE chat_id = '" . $_SESSION['pid'] . "' ORDER BY post_date desc"; //変える必要あり
$result = mysqli_query($cn, $sql);
$msg_list = [];
while ($row = mysqli_fetch_assoc($result)) {
  $msg_list[] = $row;
}

/* 購入者情報 */
if(isset($_SESSION['yid'])){
  $sql4 = "SELECT id FROM login WHERE user_id = '" . $_SESSION['yid'] . "';"; //変える必要あり
  $result4 = mysqli_query($cn, $sql4);
  $row4 = mysqli_fetch_assoc($result4);
  $bid = $row4['id'];
}

/*出品者情報*/
$sql = "SELECT login.user_id,login.id FROM login INNER JOIN product ON login.id = product.exhibitor INNER JOIN shop ON login.user_id = shop.user_id WHERE product.id = '$pid';";
$result3 = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($result3);
$uid = $row['user_id'];
$suid = $row['id'];
$_SESSION['uid'] = $uid;
$uimg = $uid . '.jpg';
$file_path = './plofile/' . $uimg;

/* 商品詳細 */
$sql = "SELECT * FROM product WHERE id = '$pid';";
$result2 = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($result2);
$name = $row['name'];
$prid = $row['id'];
$detail = explode(",", $row['detail']);
$category = ['レディース', 'メンズ', 'コスメ/美容', 'キッズ/ベビー/マタニティー', 'エンタメ/ホビー', '楽器', 'チケット', 'インテリア/住まい/日用品', 'スマホ/家電/カメラ', 'ハンドメイド', '食品/飲料/酒', 'スポーツ/アウトドア', '自転車/バイク', 'その他'];
$row['category'] = $category[$row['category'] - 1];
$mdelivery = ['まさる堂発送', '出品者発送'];
$row['delivery_method'] = $mdelivery[$row['delivery_method'] - 1];
$burden = ['送料込み', '着払い'];
$row['postage_burden'] = $burden[$row['postage_burden'] - 1];
$wdelivery = ['１～２日', '３～４日', '５～７日'];
$row['delivery_waitting'] = $wdelivery[$row['delivery_waitting'] - 1];
$pstatus = ['新品/未使用', '未使用に近い', '目立った傷や汚れなし', 'やや傷や汚れあり', '傷や汚れあり', '全体的に状態が悪い'];
$row['status'] = $pstatus[$row['status'] - 1];

if (isset($_POST['return'])) {
  $_SESSION['return'] = 1;
  header('location:./search-result.php');
}

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
} else {
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
$date_m = sprintf($format, $num);
//年
$date_y = date('y');
//商品登録数/月
$format = "%06X"; //六桁で0埋め
$id_eice = sprintf($format, $cnt);
// $id_eice = str_pad($num,6,0,STR_PAD_LEFT); 

//合成
$id = $date_m .= $date_y .= $id_eice;


/*値下げ交渉登録*/
if (isset($_POST['h_price'])) { //ポストの値が存在し、セッションが存在するとき

  if ($_POST['h_price'] != '') { //ポストの値が空白じゃないとき

    //値をセッションに保存

    $_SESSION['h_price'] = $_POST['h_price'];
    $hprice = $_SESSION['h_price'];


    if ($_SESSION['h_price'] != "") {

      date_default_timezone_set('Asia/Tokyo'); //タイムゾーン設定

      //メッセージの返信

      $title = '「' . $name . '」に値下げ交渉が届きました。';
      $sql = "INSERT INTO nego_price(id,product_id,applicant_id,price) VALUES ('$id','$pid','$bid','$hprice');";
      $result5 = mysqli_query($cn, $sql);
      $nsql = "INSERT INTO news3(id,nego_id,title,send_to,news_type) VALUES('$id','$id','$title','$suid',2);";
      $result6 = mysqli_query($cn, $nsql);
    }
  }
}

//購入
if(isset($_POST['pbuy'])){
  $sql7 = "UPDATE product set release_area = 3 WHERE name = '$name';";
  $result = mysqli_query($cn, $sql7);
  $ksql = "INSERT INTO trade(id,product_id,parchaser_id,status) VALUES('$id','$prid','$bid',1);";
  $result6 = mysqli_query($cn, $ksql);
  header("location:pay_01.php");
  $_SESSION['prid'] = $prid;
  exit();
}

mysqli_close($cn);


?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title><?php echo $row['name']; ?>　|　まさる堂</title>
  <link rel="stylesheet" type="text/css" href="./css/template.css">
  <link rel="stylesheet" type="text/css" href="./css/product.css ">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link rel="stylesheet" href="./css/modaal.css">
  <script src="./css/modaal.js"></script>
</head>

<body>
  <header>
    <div id="header-top">
      <h1><a href="./top-page.php"><img src="./images/masarudo.png" width="200px" height="auto"></a></h1>
      <div id="banana">
        <img src="./images/banana.png" width="20px" height="auto">
      </div>

      <form method="post" action="./search-result.php" class="search_container">
        <input type="text" size="45" placeholder="　キーワード検索" name="keyword">
        <button name="asearch"><img src="./images/wloupe.png" width="20px" height="20px"></button>
      </form>

      <p class="hdbtn" id="open">
        <img src="./images/plus.png" width="15px" height="auto">
        詳細条件
      </p>

      <!--モーダルウィンドウマスク-->
      <div id="mask" class="hidden"></div>

      <!---モーダルウィンドウ-->
      <section id="modal" class="hidden">

        <div id="close">
          <p><img src="./images/x.png" width="20px" height="auto"></p>
        </div>
        <h2>絞り込み検索</h2>
        <form method="post" action="#">
          <table>
            <tr>
              <td>キーワード</td>
              <td><input type="text" name="keyword"></td>
            </tr>
            <tr>
              <td>カテゴリー</td>
              <td>

                <select name="category">
                  <option value="">すべて</option>
                  <option value="LD">レディース</option>
                  <option value="MN">メンズ</option>
                  <option value="CS">コスメ/美容</option>
                  <option value="KD">キッズ/ベビー/マタニティ</option>
                  <option value="HB">エンタメ/ホビー</option>
                  <option value="IM">楽器</option>
                  <option value="TC">チケット</option>
                  <option value="IN">インテリア/住まい/日用品</option>
                  <option value="EL">スマホ/家電/カメラ</option>
                  <option value="HM">ハンドメイド</option>
                  <option value="FD">食料/飲料/酒</option>
                  <option value="SP">スポーツ/アウトドア</option>
                  <option value="BK">自転車/バイク</option>
                  <option value="OT">その他</option>
                </select>

              </td>
            </tr>
            <tr>
              <td>価格</td>
              <td><input type="text" name="min-price">　～　<input type="text" name="max-price"></td>
            </tr>
            <tr>
              <td>商品の状態</td>
              <td class="checkbox">
                <label>
                  <input type="radio" name="condition" value="" class="checkbox-input">
                  <span class="checkbox-parts">すべて</span>
                </label>
                <label>
                  <input type="radio" name="condition" value="N" class="checkbox-input">
                  <span class="checkbox-parts">新品・未使用のみ</span>
                </label>
              </td>
            </tr>
            <tr>
              <td>配送料の負担</td>
              <td class="checkbox">
                <label>
                  <input type="radio" name="burden" value="all" class="checkbox-input">
                  <span class="checkbox-parts">すべて</span>
                </label>

                <label>
                  <input type="radio" name="burden" value="include" class="checkbox-input">
                  <span class="checkbox-parts">送料込みのみ</span>
                </label>
              </td>
            </tr>
            <tr>
              <td>販売状況</td>
              <td>
                <label>
                  <input type="radio" name="sale-condition" value="all" class="checkbox-input">
                  <span class="checkbox-parts">すべて</span>
                </label>

                <label>
                  <input type="radio" name="sale-condition" value="sale" class="checkbox-input">
                  <span class="checkbox-parts">販売中のみ</span>
                </label>

                <label>
                  <input type="radio" name="sale-condition" value="sold-out" class="checkbox-input">
                  <span class="checkbox-parts">売切れのみ</span>
                </label>
              </td>
            </tr>
          </table>

          <div class='side1'>
            <button class="btn1">条件をクリア</button>
            <div class="space1"></div>
            <input type="submit" value="検索する" class="btn2" name="rsearch">
          </div>
        </form>

      </section>
    </div>

    <nav id="header-bottom">
      <ul>
        <li id="category"><a href=""><img src="./images/list.png" width="25px" height="auto"> カテゴリーから探す</a></li>
        <?php if ($rcode == 1) : ?>
          <li id="notice"><a href="./my-page.php"><img src="./images/bell.png" width="25px" height="auto"> <span class="word">お知らせ</a></li>
        <?php endif ?>
        <?php if ($rcode == 0) : ?>
          <div id="popen">
            <li class="my-page"><img src="./images/hito.png" width="25px" height="auto"> <span class="word">ログイン</li>
          </div>
        <?php else : ?>
          <li class="my-page"><a href="my-page.php"><img src="./images/hito.png" width="25px" height="auto"> <span class="word">マイページ</</li> <?php endif ?> <div id="pmask" class="hidden">
      </ul>
    </nav>
  </header>

  <div id="space"></div>
  <!--レイアウト調整用 -->


  <div id="wrapper">
    <!--メインビジュアル-->
    <div class="contents-box">
      <div class="content-wrap">
        <div class="picture">
          <p class="image_area"><img src="./images/products/<?php echo $pid ?>.jpg" width="500px" height="auto"></p>
        </div>
        <!--picture-->

        <div class="right_area">
          <?php if ($row['postage_burden'] == 1) { ?>
            <p class="color1_1">送料込み</p>
          <?php } ?>
          <?php if ($row['nego_flg'] == 0) { ?>
            <p class="color2_1">すぐに購入可</p>
          <?php } ?>
          <h2 class="product_name"><?php echo $row['name']; ?></h2>

          <p class="price">¥<?php echo number_format($row['default_price']); ?></p>
          <p class="gray">商品説明</p>
          <?php foreach ($detail as $details) : ?>
            <p><?php echo $details; ?></p>
          <?php endforeach ?>
          <form action="" method="POST">
            <div class="side">
              <input type="submit" value="購入する" class="color3_1" name="pbuy">


              <p class="color3_3" <?php if ($row['nego_flg'] == 0) { ?>style="display: none;" <?php } ?>><a href="#modaal" class="modaal">値下げ交渉する</a></p>
            </div>
          </form>
          <div id="modaal" style="display:none;>
            <h2 class="mt">購入希望価格</h2><br><br>
            <p>出品者と値段交渉することができます。<br><br>
              希望価格を以下へ記入し、「希望する」を押すと<br>出品者へ送信されます。</p><br><br>
            <form action="" method="post">
              <table class="priw">
                <tr>
                  <td></td>
                  <td><input type="text" name="h_price" class="priw2" placeholder="　　　　最低価格<?php echo $row['min_price'] ?>円"></td>
                </tr>
                <tr>

                  <td colspan="2"><button class="color3_5" onclick="msgdsp()">希望する</button></td>
                </tr>
              </table>
            </form>
          </div>



        </div>

        <div class="comment">
          <p class="gray">コメント</p>
          <span>　　　全<?php echo count($msg_list) ?>件のコメント</span>
          <?php
          $i = 0;
          foreach ($msg_list as $key => $msg) {
            if ($i >= 4) {
              break;
            } ?>
            <div class="com">
              <div class="com_left">

                <p><a href="plofile.php?pid=<?php echo $msg['user_id'] ?>">
                    <?php
                    $file =  './plofile/' . $msg['user_id'] . '.jpg';
                    if (file_exists($file)) { ?>
                      <img src="./plofile/<?php echo $msg['user_id'] ?>.jpg">
                    <?php } else { ?>
                      <img src="./plofile/default.png">
                    <?php } ?>

                  </a></p>
              </div>

              <div class="com_right">

                <p class="com_user"><?php echo $msg['user_id'] ?></p>
                <p class="com_com"><?php echo $msg['msg'] ?></p>
              </div>

            </div>
          <?php
            $i++;
          } ?>
          <p class="color3_4"><a href="./message.php">コメントする</a></p>

        </div>
        <!--comment-->

        <div class="detail">
          <p class="gray">商品情報</p>
          <table>
            <tr>
              <td>カテゴリー</td>
              <td><?php echo $row['category']; ?></td>
            </tr>
            <tr>
              <td>ブランド</td>
              <td><?php echo $row['bland']; ?></td>
            </tr>
            <tr>
              <td>商品状態</td>
              <td><?php echo $row['status']; ?></td>
            </tr>
            <tr>
              <td>発送方法</td>
              <td><?php echo $row['delivery_method']; ?></td>
            </tr>
            <tr>
              <td>発送日の目安</td>
              <td><?php echo $row['delivery_waitting']; ?></td>
            </tr>
            <tr>
              <td>配送料の負担</td>
              <td><?php echo $row['postage_burden']; ?></td>
            </tr>

            <tr>
              <td>発送元の地域</td>
              <td>東京都</td>
            </tr>
          </table>

          <div class="prohi_profile">

            <p class="gray">出品者情報</p>

            <p><a href="plofile.php?pid=<?php echo $uid ?>">
                <?php if (file_exists($file_path)) { ?>
                  <img src="./plofile/<?php echo $uid ?>.jpg" width="100px" height="100px;">
                <?php } else { ?>
                  <img src="./plofile/default.png" width="100px" height="100px;">
                <?php } ?>

              </a></p>
            <ul>
              <li><a href="plofile.php?pid=<?php echo $uid ?>"><?php echo $uid ?></a></li>
              <li class="color3_2"><a href="plofile.php?pid=<?php echo $uid ?>">出品者情報を見る</a></li>
            </ul>

          </div>
        </div>
        <!--detail-->
      </div>
      <!--content-wrap-->
    </div>
  </div>

  <!--フッター-->

  <footer>
    <p id="footer-img"><img src="./images/footer.png"></p>
    <section id="footer-top">
      <ul>
        <li class="footer-title">まさる堂について</li>
        <li>会社概要</li>
        <li>採用情報</li>
      </ul>

      <ul>
        <li class="footer-title">ヘルプ＆ガイド</li>
        <li>プライバシーポリシー</li>
        <li>まさる堂ガイド</li>
        <li>ヘルプ</li>
      </ul>

      <ul>
        <li class="footer-title">プライバシーと利用規約</li>
        <li>プライバシーポリシー</li>
        <li>まさる堂利用規約</li>
        <li>あんしんスマホサポート制度に関する利用特約</li>
        <li>コンプライアンスポリシー</li>
      </ul>
      <ul>
        <li></li><br>
        <li>個人データの安全管理に係る基本方針</li>
        <li>特定商取引に関する表記</li>
        <li>資金決済法に基づく表示</li>
        <li>法令順守と犯罪抑止のために</li>
      </ul>

      <p id="page-top-btn"><a href="#space"><img src="./images/banana.png" width="20px" height="auto"> <span class="white"> ページTOPへ戻る</span></a></p>
    </section>

    <section id="footer-bottom">
      <h1><img src="./images/wmasarudo.png" width="150px" height="auto"></h1>
      <p><small>©2019 Masarudo</small></p>
    </section>
  </footer>
  </div>
  <!--wrapper-->



  <!--       <div id="exhibit" class="shadow">
          <p><a href=""><img src="./../images/camera.png" width="50px" height="auto"></a></p>
          <p><a href="">出品</a></p>
        </div> -->

  <!--モーダルウィンドウのJS-->
  <script type="text/javascript">
    'use strict'; {
      const open = document.getElementById('open');
      const close = document.getElementById('close');
      const modal = document.getElementById('modal');
      const mask = document.getElementById('mask');

      open.addEventListener('click', function() {
        modal.classList.remove('hidden');
        mask.classList.remove('hidden');
      });
      close.addEventListener('click', function() {
        modal.classList.add('hidden');
        mask.classList.add('hidden');
      });
      mask.addEventListener('click', function() {
        modal.classList.add('hidden');
        mask.classList.add('hidden');
      });
    }

    $('.modaal').modaal();

    function msgdsp() {
      alert("希望価格を出品者へ送信しました。");
    }
  </script>

  <form action="" method="post">
    <input type="submit" value="検索結果に戻る" name="return" class="maru">
  </form>

</body>

</html>