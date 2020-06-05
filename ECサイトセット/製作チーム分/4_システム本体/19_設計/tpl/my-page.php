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
              <a href="./plofile_edit.php">
                <p>プロフィール編集</p><img src="./images/arrows.png" width="14px" height="14px">
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
                  <p>評価 : <?php echo $hcnt; ?></p>
                </div>
                <div class="ch"><img src="./images/bcamera.png" width="19px" height="19px">
                  <p>出品数 : <?php echo $scnt; ?></p>
                </div>
              </div>
            </div>
          </section>

          <section class="newsall">
            <input id="newss" type="radio" name="tab_item" checked>
            <label class="tab_item" for="newss">
              <img src="./images/news.png" width="26px" height="26px">
              <p>お知らせ</p>
            </label>
            <input id="do" type="radio" name="tab_item">
            <label class="tab_item" for="do">
              <img src="./images/memo.png" width="26px" height="26px">
              <p>やることリスト</p>
            </label>

            <!-- お知らせ -->
            <div class="tab_content" id="newss_content">
              <ul>
                <li>
                  <?php $i = 0; ?>
                  <?php foreach ($narrays as $narray) : ?>
                    <?php if ($i >= 3) : ?>
                      <?php break; ?>
                    <?php endif ?>
                    <form action="./news-detail.php" method="GET">
                      <?php if ($narray['news_type'] == 2) : ?>
                        <?php foreach ($karrays as $karray) : ?>
                          <?php if ($narray['nego_id'] == $karray['id']) : ?>
                            <a href="./news-detail.php?id=<?php echo $narray['id']; ?>" class="detail">
                              <div class="cont">
                                <img src="./images/saru1.png" width="48px" height="48px">
                              </div>
                              <div class="cont">
                                <div class="conttext"><?php echo $narray['title']; ?></div>
                                <time>
                                  <span><img src="./images/clock.png" width="16px" height="16px"></span>
                                  <span><?php echo $narray['update_time']; ?></span>
                                </time>
                              </div>
                              <div class="conti">
                                <img src="./images/arrows.png" width="14px" height="14px">
                              </div>
                            </a>
                          <?php endif ?>
                        <?php endforeach ?>
                      <?php else : ?>
                        <a href="./news-detail.php?id=<?php echo $narray['id']; ?>" class="detail">
                          <div class="cont">
                            <img src="./images/saru1.png" width="48px" height="48px">
                          </div>
                          <div class="cont">
                            <div class="conttext"><?php echo $narray['title']; ?></div>
                            <time>
                              <span><img src="./images/clock.png" width="16px" height="16px"></span>
                              <span><?php echo $narray['update_time']; ?></span>
                            </time>
                          </div>
                          <div class="conti">
                            <img src="./images/arrows.png" width="14px" height="14px">
                          </div>
                        </a>
                      <?php endif ?>
                    </form>
                    <?php $i++; ?>
                  <?php endforeach ?>
                </li>
                <li class="all">
                  <a href="./news-all.php">一覧を見る</a>
                </li>
              </ul>
            </div>

            <!-- やることリスト -->
            <div class="tab_content" id="do_content">
              <ul>
                <li class="ntitle">値下げ交渉一覧</li>
                <li>
                  <?php foreach ($nkarrays as $nkarray) : ?>
                    <form action="" method="GET">
                      <a href="kosho.php?kid=<?php echo $nkarray['id']; ?>" class="detail">
                        <div class="cont">
                          <img src="./images/saru1.png" width="48px" height="48px">
                        </div>
                        <div class="cont">
                          <p class="conttext c"><?php echo $nkarray['name']; ?>に関する値下げ交渉一覧</p>
                        </div>
                        <div class="conti">
                          <img src="./images/arrows.png" width="14px" height="14px">
                        </div>
                      </a>
                    </form>
                  <?php endforeach ?>
                </li>
                <li class="ntitle">取引でのやることリスト</li>
                <li>
                  <?php foreach ($tarrays as $tarray) : ?>
                    <form action="./news-detail.php" method="GET">
                      <?php if ($tarray['status'] == 1) : ?>
                        <a href="" class="detail">
                          <div class="cont">
                            <img src="./images/saru1.png" width="48px" height="48px">
                          </div>
                          <div class="cont">
                            <p class="conttext">購入した <?php echo $tarray['name']; ?> への入金</p>
                            <time>
                              <span><img src="./images/clock.png" width="16px" height="16px"></span>
                              <span><?php echo $tarray['date']; ?></span>
                            </time>
                          </div>
                          <div class="conti">
                            <img src="./images/arrows.png" width="14px" height="14px">
                          </div>
                        </a>
                      <?php endif ?>
                      <?php if ($tarray['status'] == 2) : ?>
                        <a href="./do-detail.php?id=<?php echo $tarray['id']; ?>" class="detail">
                          <div class="cont">
                            <img src="./images/saru1.png" width="48px" height="48px">
                          </div>
                          <div class="cont">
                            <p class="conttext"><?php echo $tarray['name']; ?> の発送</p>
                            <time>
                              <span><img src="./images/clock.png" width="16px" height="16px"></span>
                              <span><?php echo $tarray['date']; ?></span>
                            </time>
                          </div>
                          <div class="conti">
                            <img src="./images/arrows.png" width="14px" height="14px">
                          </div>
                        </a>
                      <?php endif ?>
                    </form>
                  <?php endforeach ?>
                </li>
                <li class="all">
                  <a href="">一覧を見る</a>
                </li>
              </ul>
            </div>
          </section>

          <section class="buy">
            <h3><img src="./images/cart.png" width="26px" height="26px">
              <p>購入した商品</p>
            </h3>

            <input id="nbuy" type="radio" name="tab_items" checked>
            <label class="tab_items" for="nbuy">
              <p>取引中</p>
            </label>
            <input id="fbuy" type="radio" name="tab_items">
            <label class="tab_items" for="fbuy">
              <p>過去の取引</p>
            </label>

            <div class="tab_contents" id="nbuy_content">
              <ul>
                <li>
                  <?php foreach ($harrays as $harray) : ?>
                      <form action="./pay_01.php" method="GET">
                      <?php if ($harray['status'] == 1) : ?>
                        <a href="./pay_01.php?prid=<?php echo $harray['id']; ?>" class="detail">
                          <div class="cont">
                            <img src="./images/saru1.png" width="48px" height="48px">
                          </div>
                          <div class="cont">
                            <div class="conttext"><?php echo $harray['name']; ?></div>
                            <input type="submit" value="入金求ム" class="ok hblue">
                          </div>
                          <div class="conti">
                            <img src="./images/arrows.png" width="14px" height="14px">
                          </div>
                        </a>
                      </form>
                      <?php elseif ($harray['status'] == 2) : ?>
                        <a href="" class="detail">
                          <div class="cont">
                            <img src="./images/saru1.png" width="48px" height="48px">
                          </div>
                          <div class="cont">
                            <div class="conttext"><?php echo $harray['name']; ?></div>
                            <div class="ok hblue">発送待ち</div>
                          </div>
                          <div class="conti">
                            <img src="./images/arrows.png" width="14px" height="14px">
                          </div>
                        </a>
                      <?php elseif ($harray['status'] == 3) : ?>
                        <a href="" class="detail">
                          <div class="cont">
                            <img src="./images/saru1.png" width="48px" height="48px">
                          </div>
                          <div class="cont">
                            <div class="conttext"><?php echo $harray['name']; ?></div>
                            <div class="ok hgreen">商品到着待ち</div>
                          </div>
                          <div class="conti">
                            <img src="./images/arrows.png" width="14px" height="14px">
                          </div>
                        </a>
                      <?php elseif ($harray['status'] == 4) : ?>
                        <a href="" class="detail">
                          <div class="cont">
                            <img src="./images/saru1.png" width="48px" height="48px">
                          </div>
                          <div class="cont">
                            <div class="conttext"><?php echo $harray['name']; ?></div>
                            <div class="ok hred">評価待ち</div>
                          </div>
                          <div class="conti">
                            <img src="./images/arrows.png" width="14px" height="14px">
                          </div>
                        </a>
                      <?php endif ?>
                  <?php endforeach ?>
                </li>
                <li class="all last">
                  <a href="./news-buy-all.php">一覧を見る</a>
                </li>
              </ul>
            </div>

            <div class="tab_contents" id="fbuy_content">
            </div>
          </section>

        </div>

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

  <div id="monkey">
    <p><img src="./images/saru2.png" width="80px" height="auto"></p>
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
</body>

</html>