<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>検索結果</title>
  <link rel="stylesheet" type="text/css" href="./css/s-result.css">
  <link rel="stylesheet" type="text/css" href="./css/s-style.css">

</head>

<body>
  <header>
    <div id="header-top">
      <h1><a href="./top-page.php"><img src="./images/masarudo.png" width="200px" height="auto"></a></h1>
      <div id="banana">
        <img src="./images/banana.png" width="20px" height="auto">
      </div>

      <form method="post" action="#" class="search_container">
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
        <?php if($rcode == 1): ?>
          <li id="notice"><a href="./my-page.php"><img src="./images/bell.png" width="25px" height="auto"> <span class="word">お知らせ</a></li>
        <?php endif ?>
          <?php if ($rcode == 0) : ?>
            <div id="popen">
              <li class="my-page"><img src="./images/hito.png" width="25px" height="auto"> <span class="word">ログイン</li>
            </div>
          <?php else : ?>
            <li class="my-page"><a href="my-page.php"><img src="./images/hito.png" width="25px" height="auto"> <span class="word">マイページ</</li>
          <?php endif ?>
          <div id="pmask" class="hidden"></div>
        <section id="pmodal" class="hidden">
          <div id="pclose">
            <p><img src="./images/x.png"></p>
          </div>
          <h2>ログイン・新規登録</h2>
          <div class="login">
            <p>既にアカウントを持っている方はこちら</p>
            <a href="login.php" class="button red">ログイン</a>
          </div>
          <div class="registration">
            <p>まだアカウントを持っていない方はこちら</p>
            <a href="registration.php" class="button blue">新規会員登録</a>
          </div>
        </section>

        <script type="text/javascript">
          'use strict'; {
            const open = document.getElementById('popen');
            const close = document.getElementById('pclose');
            const modal = document.getElementById('pmodal');
            const mask = document.getElementById('pmask');

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
        </script>
      </ul>
    </nav>
  </header>

  <div id="space"></div>
  <!--レイアウト調整用 -->

  <div id="wrapper">

    <!--ローカルナビ-->
    <div class="side2">

      <div id="local-nav">
        <nav id="category-nav" class="contents-box">
          <div class="content-wrap">
            <h3>詳細検索</h3>

            <form method="POST" action="#">
              <dl>
                <dt class="detail-search-list">キーワード</dt>
                <dd>
                  <input type="text" name="keyword">
                </dd>
                <dt class="detail-search-list">カテゴリ</dt>
                <dd>
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
                </dd>
                <dt class="detail-search-list">価格帯</dt>
                <dd>
                  <input type="text" name="min-price" class="DS-txt-box"> 円　～　
                  <input type="text" name="max-price" class="DS-txt-box"> 円
                </dd>
                <dt class="detail-search-list">商品の状態</dt>
                <dd class="checkbox">
                  <label>
                    <input type="radio" name="condition" value="" class="checkbox-input">
                    <span class="checkbox-parts">すべて</span>
                  </label>
                  <label>
                    <input type="radio" name="condition" value="N" class="checkbox-input">
                    <span class="checkbox-parts">新品・未使用のみ</span>
                  </label>
                </dd>
                <dt class="detail-search-list">配送料の負担</dt>
                <dd class="checkbox">
                  <label>
                    <input type="radio" name="burden" value="all" class="checkbox-input">
                    <span class="checkbox-parts">すべて</span>
                  </label>

                  <label>
                    <input type="radio" name="burden" value="include" class="checkbox-input">
                    <span class="checkbox-parts">送料込みのみ</span>
                  </label>
                </dd>
                <dt class="detail-search-list">販売状況</dt>
                <dd class="checkbox">
                  <ol>
                    <li>
                      <label>
                        <input type="radio" name="sale-condition" value="all" class="checkbox-input">
                        <span class="checkbox-parts">すべて</span>
                      </label>

                      <label>
                        <input type="radio" name="sale-condition" value="sale" class="checkbox-input">
                        <span class="checkbox-parts">販売中のみ</span>
                      </label>
                    </li>

                    <li>
                      <label>
                        <input type="radio" name="sale-condition" value="sold-out" class="checkbox-input">
                        <span class="checkbox-parts">売切れのみ</span>
                      </label>
                    </li>
                  </ol>

                </dd>

              </dl>
              <div class='side1'>
                <button class="btn1">条件をクリア</button>
                <div class="space1"></div>
                <input type="submit" value="検索する" class="btn2" name="nsearch">
              </div>
            </form>

          </div>

        </nav>

      </div>
      <!--ローカルナビ-->

      <!--メインページ-->

      <section id="main-page">
        <section id="s-result-info">
          <div class="contents-box hyouji">
            <h3>検索されたワード</h3>
            <div id="info-pos">
              <p>約<?php echo count($product_list); ?>件中 1~<?php echo count($product_list); ?>件の<?php echo count($product_list); ?>件表示中</p>
              <ol>
                <li>
                  <form method="POST" action="#">
                    <select name="" id="">
                      <option value="">新着順</option>
                      <option value="">高い順</option>
                      <option value="">低い順</option>
                    </select>
                  </form>
                </li>

                <li>
                  <form method="POST" action="#">
                    <input type="checkbox" type="submit" value="sql,whereの条件">販売中のみ
                  </form>
                </li>
              </ol>

            </div>

          </div>
        </section>

        <div id="main-contents" class="contents-box contheight">
          <?php foreach($product_list as $product_lists): ?>
            <div class="product_wrap">
              <form action="./product.php" method="GET">
              <div class="product_box_wrap">
                <div class="product_img_wrap">
                  <a href="./product.php?pid=<?php echo $product_lists['id']; ?>" title="xxx">
                    <?php $file =  './images/products/'.$product_lists['id'].'.jpg'; ?>
            	      <?php if(file_exists($file)): ?>
            		      <img src="./images/products/<?php echo $product_lists['id'] ?>.jpg" width="auto" height="130px">
                    <?php else: ?>
            		      <img src="./images/products/no-img.jpg" width="auto" height="130px">
                    <?php endif ?>
                  </a>
                </div>
                <div class="product_text_wrap">
                  <div class="product_name">
                    <p><?php echo mb_substr($product_lists['name'], 0, 10); ?></p>
                  </div>
                  <div class="product_price">
                    <p><?php echo number_format($product_lists['default_price']); ?>円</p>
                  </div>
                </div>
              </div>
              </form>
            </div>
          <?php endforeach ?>
        </div>

        <section id="s-result-paging">
          <div class="contents-box">
            <!-- ページングのリンク -->
            <div id="paging">
              <p><a href="#">1</a></p>
            </div>

          </div>
        </section>

      </section>

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

        <p id="page-top-btn"><a href="#space"><img src="./images/banana.png" width="20px" height="auto"> <span
              class="white"> ページTOPへ戻る</span></a></p>
      </section>

      <section id="footer-bottom">
        <h1><img src="./images/wmasarudo.png" width="150px" height="auto"></h1>
        <p><small>©2019 Masarudo</small></p>
      </section>
    </footer>
  </div>
  <!--wrapper-->

  <div id="monkey">
    <p><img src="./images/saru2.png" width="80px" height="auto"></p>
  </div>

  <div id="exhibit">
    <p><a href="exhibit_01.html"><img src="./images/camera.png" width="50px" height="auto"></a></p>
    <p><a href="exhibit_01.html">出品</a></p>
  </div>

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
  </script>
</body>

</html>