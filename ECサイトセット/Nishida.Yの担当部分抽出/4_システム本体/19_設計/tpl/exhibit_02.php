<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>確認　|　まさる堂</title>
  <link rel="stylesheet" type="text/css" href="./../css/template.css">
  <link rel="stylesheet" type="text/css" href="./../css/exhibit_style02.css">
</head>

<body>
  <header>
    <div id="header-top">
      <h1><a href=""><img src="./../images/masarudo.png" width="200px" height="auto"></a></h1>
      <div id="banana">
        <img src="./../images/banana.png" width="20px" height="auto">
      </div>

      <form method="post" action="#" class="search_container">
        <input type="text" size="45" placeholder="　キーワード検索">
        <button><img src="./../images/wloupe.png" width="20px" height="20px"></button>
      </form>

      <p class="hdbtn" id="open">
        <img src="./../images/plus.png" width="15px" height="auto">
        詳細条件
      </p>

      <!--モーダルウィンドウマスク-->
      <div id="mask" class="hidden"></div>

      <!---モーダルウィンドウ-->
      <section id="modal" class="hidden">

        <div id="close">
          <p><img src="./../images/x.png" width="20px" height="auto"></p>
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
            <button class="btn2">検索する</button>
          </div>
        </form>

      </section>
    </div>

    <nav id="header-bottom">
      <ul>
        <li id="category"><a href=""><img src="./../images/list.png" width="25px" height="auto"> カテゴリーから探す</a></li>
        <li id="notice"><a href=""><img src="./../images/bell.png" width="25px" height="auto"> <span
              class="word">お知らせ</a></li>
        <li id="my-page"><a href=""><img src="./../images/hito.png" width="25px" height="auto"> <span
              class="word">マイページ</a></li>
      </ul>
    </nav>
  </header>

  <div id="space"></div>
  <!--レイアウト調整用 -->

  <div id="wrapper">
    <!--メインビジュアル-->
    <div id="main-visual" class="contents-box">
      <div class="content-wrap">
      <div class="p-p-photo">
          <ul class="p-photo">
            <!-- <li class="e-photo"><img src="./../images/exhibit_01.png" alt=""></li> -->
            <li class="e-photo"><img id="tmp_img" src="<?php echo $upload_img_pass; ?>" alt="" height="150px"></li>
            <!-- <li class="e-photo"><img src="./../images/exhibit_01.png" alt=""></li>
            <li class="e-photo"><img src="./../images/exhibit_01.png" alt=""></li> -->
          </ul>
        </div>
        <h3>商品情報</h3>
        <div class="row">
          <label for="">商品名</label>
          <p><?php  echo $name; ?></p>
        </div>
        <div class="row"><label for="">商品説明</label>
          <p><?php echo $detail; ?></p>
        </div>
        <div class="row"><label for="">カテゴリ</label>
          <p><?php echo $data_category[$category]; ?></p>
        </div>
        <div class="row"><label for="">ブランド</label>
          <p><?php echo $bland; ?></p>
        </div>
        <div class="row"><label for="">商品の状態
          </label>
          <p><?php echo $data_status[$status]; ?></p>
        </div>
        <h3>配送について</h3>
        <div class="row">送料の負担
          <label for=""></label>
          <p><?php echo $data_burden[$burden]; ?></p>
        </div>
        <div class="row"><label for="">配送方法</label>
          <p><?php echo $data_method[$method]; ?></p>
        </div>
        <div class="row"><label for="">発送日の目安</label>
          <p><?php echo $data_waitting[$waitting]; ?></p>
        </div>
        <div class="row"><label for="">発送元の地域</label>
          <p><?php echo $data_from[$from]; ?></p>
          <!-- $data_from[$from] -->
        </div>
        <h3>価格について</h3>
        <div class="row"><label for="">値下げ申請</label>
          <p><?php echo $data_nego[$nego_flg];?></p>
        </div>
        <div class="row"><label for="">提示価格</label>
          <p>&yen;<?php echo $price; ?></p>
        </div>
        <?php if ($nego_flg == 0) {
          echo "<br><br>";
        }else { ?>
        <div class="row"><label for="">下限値</label>
          <p>&yen;<?php echo $min_price; ?></p>
        </div>
        <?php } ?>

        <h4>利用規約に同意の上、出品してください。</h4>
        <!-- 同意チェック入れる -->
        <div class="row">
          <a href="./index01.php"><button type="button" class="btn-square-shadow btn-blue">訂正</button></a>
          <a href="./index04.php"><button type="submit" class="btn-square-shadow btn-red">出品</button></a>
        </div>
      </div>
      <!--content-wrap-->
    </div>

    <!--フッター-->
    <footer>
      <p id="footer-img"><img src="./../images/footer.png"></p>
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
        <p id="page-top-btn"><a href="#space"><img src="./../images/banana.png" width="20px" height="auto"> <span
              class="white"> ページTOPへ戻る</span></a></p>
      </section>
      <section id="footer-bottom">
        <h1><img src="./../images/wmasarudo.png" width="150px" height="auto"></h1>
        <p><small>©2019 Masarudo</small></p>
      </section>
    </footer>
  </div>
  <!--wrapper-->
  <div id="monkey">
    <p><img src="./../images/saru2.png" width="80px" height="auto"></p>
  </div>
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
    $(".yes").click(
      function () {
        if (!($(".min-price").length)) {
          $(this)
            .parents('.p-p-item')
            .append('<div class="row min-price"><label>下限値</label><input type="text" name="item[min_price]">');
          $('.price')
            .css('visibility', 'hidden');
          $('.own_price')
            .css('visibility', 'visible');

        }
      }
    );
  </script>
</body>

</html>