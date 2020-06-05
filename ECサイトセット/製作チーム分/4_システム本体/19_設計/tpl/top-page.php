<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>まさる堂</title>
  <link rel="stylesheet" type="text/css" href="./css/top-page.css">
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
        <form method="post" action="./search-result.php">
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

    <!--メインビジュアル-->
    <div id="main-visual" class="contents-box">
      <div class="content-wrap">
        <div class='side3'>
          <p id="buy" class="basic">
            <a href="">
              <ruby>
                <rb>BUY</rb>
                <rt>買いたい</rt>
              </ruby>
            </a>
          </p>

          <div class="space3">

            <div class="side3">
              <p><img src="./images/1.png"></p>
              <p><img src="./images/2.png"></p>
            </div>
          </div>

          <p id="sell" class="basic">
            <a href="">
              <ruby>
                <rb>SELL</rb>
                <rt>売りたい</rt>
              </ruby>
            </a>
          </p>
        </div>


      </div>
    </div>

    <!--新着商品-->
    <div id="new-products" class="contents-box">
      <div class="side2">
        <div id="products-quantity">
          <p>掲載点数　　<span class="large-word"><?php echo $scnt; ?></span>　　点</p>
          <p>新着商品　　<span class="wlarge-word"><?php echo $ncnt; ?></span>　　点</p>

        </div>
        <div id="new-contents">
          <div class="side2">
            <?php $i = 0; ?>
            <?php foreach($sarrays as $sarray): ?>
              <?php if ($i >= 6) : ?>
                <?php break; ?>
              <?php endif ?>
              <?php $file =  './images/products/'.$sarray['id'].'.jpg'; ?>
            	  <?php if(file_exists($file)): ?>
            		  <p><img src="./images/products/<?php echo $sarray['id'] ?>.jpg" width="auto" height="130px"></p>
                <?php else: ?>
            		  <p><img src="./images/products/no-img.jpg" width="auto" height="130px"></p>
                <?php endif ?>
              <?php $i++; ?>
            <?php endforeach ?>
            <p><a href=""><img src="./images/right.png"></a></p>
          </div>

        </div>
      </div>
    </div>


    <!--ローカルナビ-->
    <div class="side2">

      <div id="local-nav">
        <nav id="category-nav" class="contents-box">
          <div class="content-wrap">
            <h3>商品をさがす</h3>
            <h4>カテゴリー</h4>
            <ul class="checkbox">
              <li>
                <label>
                  <input type="radio" name="category" value="LD" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/ld.png" width="20px" height="auto"> レディース</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="MN" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/mn.png" width="20px" height="auto"> メンズ</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="CS" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/cs.png" width="20px" height="auto"> コスメ/美容</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="KD" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/kd.png" width="20px" height="auto">
                    キッズ/ベビー/マタニティ</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="HB" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/hb.png" width="20px" height="auto">
                    エンタメ/ホビー</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="IM" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/im.png" width="20px" height="auto"> 楽器</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="TC" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/tc.png" width="20px" height="auto"> チケット</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="IN" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/in.png" width="20px" height="auto">
                    インテリア/住まい/日用品</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="El" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/el.png" width="20px" height="auto">
                    スマホ/家電/カメラ</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="HD" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/hm.png" width="20px" height="auto"> ハンドメイド</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="LM" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/fd.png" width="20px" height="auto"> 食料/飲料/酒</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="SP" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/sp.png" width="20px" height="auto">
                    スポーツ/アウトドア</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="BK" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/bk.png" width="20px" height="auto"> 自転車/バイク</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="radio" name="category" value="OT" class="checkbox-input">
                  <span class="checkbox-parts">　<img src="./images/ot.png" width="20px" height="auto"> その他</span>
                </label>
              </li>


            </ul>
          </div>

        </nav>

        <nav id="price-nav" class="contents-box">
          <div class="content-wrap">
            <h4>価格帯</h4>
            <p><input type="text" name="min-price" class="txt-box"> 円　～　
              <input type="text" name="max-price" class="txt-box">
              円</p>

          </div>
        </nav>

        <nav id="condition-nav" class="contents-box">
          <div class="content-wrap">
            <h4>商品の状態</h4>
            <ul class="checkbox">
              <li>
                <label>
                  <input type="checkbox" name="category" value="N" class="checkbox-input">
                  <span class="checkbox-parts">　<strong class="large-word">N</strong>　　新品・未使用</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="checkbox" name="category" value="S" class="checkbox-input">
                  <span class="checkbox-parts">　<strong class="large-word">S</strong>　　未使用に近い</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="checkbox" name="category" value="A" class="checkbox-input">
                  <span class="checkbox-parts">　<strong class="large-word">A</strong>　　目立った傷や汚れなし</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="checkbox" name="category" value="B" class="checkbox-input">
                  <span class="checkbox-parts">　<strong class="large-word">B</strong>　　やや傷や汚れあり</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="checkbox" name="category" value="C" class="checkbox-input">
                  <span class="checkbox-parts">　<strong class="large-word">C</strong>　　傷や汚れあり</span>
                </label>
              </li>
              <li>
                <label>
                  <input type="checkbox" name="category" value="N" class="checkbox-input">
                  <span class="checkbox-parts">　<strong class="large-word">N</strong>　　全体的に状態が悪い</span>
                </label>
              </li>
            </ul>

            <button id="search-btn">検索する</button>
          </div>
        </nav>
      </div>
      <!--ローカルナビ-->

      <!--メインページ-->

      <section id="main-page">
        <div id="main-contents" class="contents-box">
          <div class="content-wrap">
            <h2>ピックアップカテゴリー</h2>
            <div class="side2 space2">
              <ul>
                <li><img src="./images/category/ld.jpg" width="150px" height="150px"></li>
                <li>レディース</li>
              </ul>
              <ul>
                <li><img src="./images/category/mn.jpg" width="150px" height="150px"></li>
                <li>メンズ</li>
              </ul>
              <ul>
                <li><img src="./images/category/cs.jpg" width="150px" height="150px"></li>
                <li>コスメ/美容</li>
              </ul>
              <ul>
                <li><img src="./images/category/kd.jpg" width="150px" height="150px"></li>
                <li>キッズ/ベビー/マタニティ</li>
              </ul>
            </div>
            <div class="side2 space2">
              <ul>
                <li><img src="./images/category/hb.jpg" width="150px" height="150px"></li>
                <li>エンタメ/ホビー</li>
              </ul>
              <ul>
                <li><img src="./images/category/im.jpg" width="150px" height="150px"></li>
                <li>楽器</li>
              </ul>
              <ul>
                <li><img src="./images/category/in.jpg" width="150px" height="150px"></li>
                <li>インテリア/住まい/日用品</li>
              </ul>
              <ul>
                <li><img src="./images/category/el.jpg" width="150px" height="150px"></li>
                <li>スマホ/家電/カメラ</li>
              </ul>
            </div>
            <div class="side2 space2">
              <ul>
                <li><img src="./images/category/hm.jpg" width="150px" height="150px"></li>
                <li>ハンドメイド</li>
              </ul>
              <ul>
                <li><img src="./images/category/fd.jpg" width="150px" height="150px"></li>
                <li>食料/飲料/酒</li>
              </ul>
              <ul>
                <li><img src="./images/category/sp.jpg" width="150px" height="150px"></li>
                <li>スポーツ/アウトドア</li>
              </ul>
              <ul>
                <li><img src="./images/category/bk.jpg" width="150px" height="150px"></li>
                <li>自転車/バイク</li>
              </ul>
            </div>

          </div>
        </div>
      </section>

    </div>
    <!--side2-->



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

  <div id="monkey">
    <p><img src="./images/saru2.png" width="80px" height="auto"></p>
  </div>

  <div id="exhibit">
    <p><a href="./php/index01.php"><img src="./images/camera.png" width="50px" height="auto"></a></p>
    <p><a href="./php/index01.php">出品</a></p>
  </div>

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

    var buy = document.getElementById('buy');
    var sell = document.getElementById('sell');

    buy.addEventListener('mouseover', buyhb, false);
    buy.addEventListener('mouseout', buymo, false);
    sell.addEventListener('mouseover', sellhb, false);
    sell.addEventListener('mouseout', sellmo, false);

    function buyhb() {
      buy.classList.remove('basic');
      buy.classList.add('large2');
      sell.classList.remove('basic');
      sell.classList.add('small');
      console.log('aaa!');
    }

    function buymo() {
      buy.classList.remove('large2');
      buy.classList.add('basic');
      sell.classList.remove('small');
      sell.classList.add('basic');
    }

    function sellhb() {
      sell.classList.remove('basic');
      sell.classList.add('large2');
      buy.classList.remove('basic');
      buy.classList.add('small');
      console.log('bbb!');
    }

    function sellmo() {
      sell.classList.remove('large2');
      sell.classList.add('basic');
      buy.classList.remove('small');
      buy.classList.add('basic');
    }

    // ログイン・新規登録画面
  </script>
</body>

</html>