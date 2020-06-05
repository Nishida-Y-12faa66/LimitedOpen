<?php 
require_once './func.php';

session_start();
$prid = $_SESSION['prid'];

$cn = mysqli_connect('localhost', 'root', '', 'ec_masaru');
mysqli_set_charset($cn, 'utf8');

$sql = "SELECT id FROM trade WHERE product_id = '$prid';";
$result = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($result);
$phid = $row['id'];

$trade_id = $phid;
$_SESSION['trade_id'] = $trade_id;
?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>評価　|　まさる堂</title>
    <script src="./js/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/review_style.css">
  <link rel="stylesheet" type="text/css" href="./css/s-style.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >  
<link rel="stylesheet" href="./css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="http://code.z01.com/zico.min.css">
<script src="http://code.z01.com/jquery/jquery-3.2.1.min.js" ></script>
<script src="http://code.z01.com/v4/dist/js/popper.min.js"></script>
<script src="http://code.z01.com/v4/dist/js/bootstrap.min.js" ></script> -->
</head>
<body>
  <header>
    <div id="header-top">
      <h1><a href=""><img src="./images/masarudo.png" width="200px" height="auto"></a></h1>
      <div id="banana">
        <p><img src="./images/banana.png" width="22px" height="auto"></p>
      </div>

      <form method="post" action="#" class="search_container">
        <input type="text" size="45" placeholder="　キーワード検索">
        <button><img src="./images/wloupe.png" width="20px" height="20px"></button>
      </form>

      <p class="hdbtn" id="open"><span class="icon"><img src="./images/plus.png" width="15px" height="auto"></span> <span class="word">詳細条件</span></p>

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
              <td>キーワード</td><td><input type="text" name="keyword"></td>
            </tr>
            <tr>
              <td>カテゴリー</td>
              <td>

                <select name="category">
                  <option value="">すべて</option>
                  <option value="1">レディース</option>
                  <option value="2">メンズ</option>
                  <option value="3">コスメ/美容</option>
                  <option value="4">キッズ/ベビー/マタニティ</option>
                  <option value="5">エンタメ/ホビー</option>
                  <option value="6">楽器</option>
                  <option value="7">チケット</option>
                  <option value="8">インテリア/住まい/日用品</option>
                  <option value="9">スマホ/家電/カメラ</option>
                  <option value="10">ハンドメイド</option>
                  <option value="11">食料/飲料/酒</option>
                  <option value="12">スポーツ/アウトドア</option>
                  <option value="13">自転車/バイク</option>            
                  <option value="14">その他</option>
                </select>


              </td>
            </tr>
            <tr>
              <td>価格</td><td><input type="text" name="min-price">　～　<input type="text" name="max-price"></td>
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
            <button class="btn2">検索する</button>
          </div>
        </form>

      </section>
    </div>

    <nav id="header-bottom">
      <ul>
        <li id="category"><a href=""><img src="./images/list.png"  width="25px" height="auto"> カテゴリーから探す</a></li>
        <li id="notice"><a href=""><img src="./images/bell.png"  width="25px" height="auto"> <span class="word">お知らせ</a></li>
          <li id="my-page"><a href=""><img src="./images/hito.png"  width="25px" height="auto"> <span class = "word">マイページ</a></li>
      </ul>
    </nav>
  </header>

  <div id="space"></div><!--レイアウト調整用 -->

  <div id="wrapper">
    <!--メインビジュアル-->
    <div id="main-visual" class="contents-box">
      <div class="content-wrap">
                <form action="review_02.php" method="post">

<div>
  <h1 class="row1 ">レビュー</h1>
  <hr>

</div>
<br>
<div class="review-cont">
        
        <div class="review-btn">
          <button type="button" class="btn btn-lg btn-info" name="value" value="5">素晴らしいあげ</button>
          
        </div>
        <div class="review-btn">
          <button type="button" class="btn btn-lg btn-primary" name="value" value="4">素敵だわ</button>
         
        </div>
        <div class="review-btn">
          <button type="button" class="btn btn-lg btn-success" name="value" value="3">普通</button>
         
        </div>
        <div class="review-btn">         
          <button type="button" class="btn btn-lg btn-warning" name="value" value="2">ちょっび悪いじゃん</button>
        
        </div>
        <div class="review-btn">         
          <button type="button" class="btn btn-lg btn-danger" name="value" value="1">ガチで悪すぎん</button>
        </div>
</div>
<br>
<div class="text-cont">
      <label for=""><span class="input-group-text">コメント</span></label>
  
  <textarea class="form-control" aria-label="With textarea" width="400px" name="comment"></textarea>
</div>
<br>
<div class="review-cont">
  <!-- <a href="review_02.html"> --><button type="submit" class="btn-square-shadow btn-red btn-insure">確定</button><!-- </a> -->

</div>
        </form>
      </div><!--content-wrap-->
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
        <h1><img src="./images/wmasarudo.png"  width="150px" height="auto"></h1>
        <p><small>©2019 Masarudo</small></p>
      </section>
    </footer>
  </div><!--wrapper-->

      <div id="monkey">
        <p><img src="./images/saru2.png" width="80px" height="auto"></p>
      </div>
      

<!--       <div id="exhibit" class="shadow">
        <p><a href=""><img src="./../images/camera.png" width="50px" height="auto"></a></p>
        <p><a href="">出品</a></p>
      </div> -->

      <!--モーダルウィンドウのJS-->
      <script type="text/javascript">
        'use strict';
        {
          const open = document.getElementById('open');
          const close = document.getElementById('close');
          const modal = document.getElementById('modal');
          const mask = document.getElementById('mask');

          open.addEventListener('click', function () {
            modal.classList.remove('hidden');
            mask.classList.remove('hidden');
          });
          close.addEventListener('click', function () {
            modal.classList.add('hidden');
            mask.classList.add('hidden');
          });
          mask.addEventListener('click', function () {
            modal.classList.add('hidden');
            mask.classList.add('hidden');
          });
        }

        $('button.btn-info').click(function() { 
   $('button.btn-info').toggleClass("set");
    $('button.btn-info').append('<input type="hidden" name="value" value="5" id="ass_val">');
    });
        $('button.btn-primary').click(function() { 
   $('button.btn-primary').toggleClass("set");
    $('button.btn-primary').append('<input type="hidden" name="value" value="4" id="ass_val">');
});
        $('button.btn-success').click(function() { 
   $('button.btn-success').toggleClass("set");
    $('button.btn-success').append('<input type="hidden" name="value" value="3" id="ass_val">');
});
        $('button.btn-warning').click(function() { 
   $('button.btn-warning').toggleClass("set");
    $('button.btn-warning').append('<input type="hidden" name="value" value="2" id="ass_val">');
});
        $('button.btn-danger').click(function() { 
   $('button.btn-danger').toggleClass("set");
     $('button.btn-danger').append('<input type="hidden" name="value" value="1" id="ass_val">');
});
  



      </script>

    </body>
    </html>
