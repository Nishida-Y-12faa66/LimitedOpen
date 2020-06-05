<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>マイページ</title>
  <link rel="stylesheet" type="text/css" href="./css/mypage.css">
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
    </script>

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

    <div class="content">

      <div class="contents-box height">
        <div class="list">
          <section>
            <h2>マイページメニュー</h2>
            <div class="mypglist">
              <a href="">
                <p>お知らせ</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
              <a href="">
                <p>いいねした商品</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
            </div>
          </section>
          <section>
            <h2>商品を出品する</h2>
            <div class="mypglist">
              <a href="">
                <p>商品を出品する</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
              <a href="">
                <p>出品した商品</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
              <a href="">
                <p>自分のショップを見る</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
            </div>
          </section>
          <section>
            <h2>商品を購入する</h2>
            <div class="mypglist">
              <a href="">
                <p>購入した商品</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
              <a href="">
                <p>最近見た商品</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
              <a href="">
                <p>コメントした商品</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
            </div>
          </section>
          <section>
            <h2>設定・ヘルプ・その他</h2>
            <div class="mypglist">
              <a href="">
                <p>売上管理</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
              <a href="">
                <p>プロフィール設定</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
              <a href="">
                <p>お問い合わせ</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
              <a href="">
                <p>まさる堂公式ガイド</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
              <a href="">
                <p>はじめての方へ</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
              <a href="./logout.php" class="maru">
                <p>ログアウト</p><img src="./images/arrows.png" width="14px" height="14px">
              </a>
            </div>
          </section>
        </div>
      </div>

      <div class="mytop">
        <div class="contents-box">
          <section class="plofile">
            <div class="image">
              <img src="./images/human.png" width="90px" height="90px">
            </div>
            <div class="my">
              <h2><?php echo $yid; ?></h2>
              <div class="icon">
                <div class="ch"><img src="./images/nice.png" width="19px" height="19px">
                  <p>評価 : 2</p>
                </div>
                <div class="ch"><img src="./images/bcamera.png" width="19px" height="19px">
                  <p>出品数 : 10</p>
                </div>
              </div>
            </div>
          </section>
          <div class="contents-box">
            <div class="news-detail">
              <h2><?php echo $row['name']; ?>に関する値下げ交渉一覧</h2>
              <table border="0" class="tbl">
                <?php if (empty($karrays)) : ?>
                  <tr>
                    <td class="zp">現在、値下げ交渉件数０件です。</td>
                  </tr>
                <?php else : ?>
                  <?php foreach ($karrays as $karray) : ?>
                    <tr class="bd">
                      <form action="./purchaser.php" method="get">
                        <td>交渉者：<?php echo $karray['user_id']; ?></td>
                        <td>希望価格：<?php echo number_format($karray['price']); ?>円</td>
                        <td><a href="./plofile.php?user_id=<?php echo $karray['user_id']; ?>" class="button k">プロフィール詳細</a></td>
                        <td><a href="./purchaser-check.php?user_id=<?php echo $karray['user_id']; ?>&kid=<?php echo $kid ?>" class="button n">承認</a></td>
                      </form>
                    <?php endforeach ?>
                  <?php endif ?>
                    <tr>
                      <td colspan="3"><a href="./my-page.php" class="button">マイページへ戻る</a></td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>