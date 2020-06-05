<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>出品　|　まさる堂</title>
  <link rel="stylesheet" type="text/css" href="./../css/template.css">
  <!-- <link rel="stylesheet" type="text/css" href="./../css/exhibit_style01.css"> -->
  <link rel="stylesheet" type="text/css" href="./../css/test01.css">
  <script src="./../js/jquery-3.4.1.min.js"></script>
  <script src="./../js/main.js"></script>
</head>

<body>
  <header>
    <div id="header-top">
      <h1><a href="../top-page.php"><img src="./../images/masarudo.png" width="200px" height="auto"></a></h1>
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
        <li id="notice"><a href=""><img src="./../images/bell.png" width="25px" height="auto"> <span class="word">お知らせ</a></li>
        <li id="my-page"><a href=""><img src="./../images/hito.png" width="25px" height="auto"> <span class="word">マイページ</a></li>
      </ul>
    </nav>
  </header>

  <div id="space"></div>
  <!--レイアウト調整用 -->

  <div id="wrapper">
    <!--メインビジュアル-->
    <div id="main-visual" class="contents-box">
      <div class="content-wrap">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="p-p-photo">
            <div id="input-group">
              <p>商品画像の登録はこちら↓</p>
              <input type="file" id="upload_file" name="upload_file" onchange="$('#fake_text_box').val($(this).val())"><br>
              <label for="upload_file" id="input-label">ファイルを選択してください</label>
            </div>
            <div>
              <input type="text" id="fake_text_box" value="" size="40" disabled onClick="$('#file').click();">
            </div>

          </div>
          <div class="p-p-item">
            <!--商品名と説明-->
            <div class="row">
              <label>商品名</label>
              <input type="text" name="name">
            </div>
            <div class="row item-detail">
              <label>商品説明</label>
              <input type="text" value="文字制限 1000文字" disabled>
            </div>
            <div class="row">
              <textarea id="detail" name="detail" maxlength="1000" rows="15" cols="60" placeholder="&#13;&#10; 閲覧者が質問しやすいように出品商品の詳しい情報、購入(入手)した年月・使用頻度・色・素材・質感・重さ・定価・注意点などを記載しましょう。
    &#13;&#10;例:先月に5,400円で購入したセーターです。着用回数は5回未満です。素材はカシミヤなので着心地がいいです。"></textarea>
            </div>
            <hr>
            <div class="row">
              <label>カテゴリ</label>
              <select name="category">
                <option value="">選択してください</option>
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
            </div>
            <div class="row">
              <label>ブランド名</label>
              <input type="text" name="bland">
            </div>
            <div class="row">
              <label>商品の状態</label>
              <select name="status">
                <option value="1">新品、未使用</option>
                <option value="2">未使用に近い</option>
                <option value="3">目立った傷や汚れなし</option>
                <option value="4">やや傷や汚れあり</option>
                <option value="5">傷や汚れあり</option>
                <option value="6">全体的に状態が悪い</option>
              </select>
            </div>
            <hr>
            <div class="row">
              <label>配送料の負担</label>
              <select name="burden">
                <option selected="" value="1">送料込み（出品者が負担）</option>
                <option value="2">着払い（購入者が負担）</option>
              </select>
            </div>
            <div class="row">
              <label>配送方法</label>
              <select name="method">
                <option selected="" value="1">マサル堂発送</option>
                <option selected="" value="2">出品者発送</option>

              </select>
            </div>
            <div class="row">
              <label>発送日の目安</label>
              <select name="waitting">
                <option value="1" data-reactid=".0.4.e.0.1.0.0">支払い後、1～2日で発送</option>
                <option value="2">支払い後、2～3日で発送</option>
                <option value="3">支払い後、4～7日で発送</option>
              </select>
            </div>
            <div class="row">
              <label>発送元の地域</label>
              <select name="from">
                <option value="1" data-reactid=".0.4.f.0.1.0.0">北海道</option>
                <option value="2" data-reactid=".0.4.f.0.1.0.1">青森県</option>
                <option value="3" data-reactid=".0.4.f.0.1.0.2">岩手県</option>
                <option value="4" data-reactid=".0.4.f.0.1.0.3">宮城県</option>
                <option value="5" data-reactid=".0.4.f.0.1.0.4">秋田県</option>
                <option value="6" data-reactid=".0.4.f.0.1.0.5">山形県</option>
                <option value="7" data-reactid=".0.4.f.0.1.0.6">福島県</option>
                <option value="8" data-reactid=".0.4.f.0.1.0.7">茨城県</option>
                <option value="9" data-reactid=".0.4.f.0.1.0.8">栃木県</option>
                <option value="10" data-reactid=".0.4.f.0.1.0.9">群馬県</option>
                <option value="11" data-reactid=".0.4.f.0.1.0.a">埼玉県</option>
                <option value="12" data-reactid=".0.4.f.0.1.0.b">千葉県</option>
                <option value="13" data-reactid=".0.4.f.0.1.0.c">東京都</option>
                <option value="14" data-reactid=".0.4.f.0.1.0.d">神奈川県</option>
                <option value="15" data-reactid=".0.4.f.0.1.0.e">新潟県</option>
                <option value="16" data-reactid=".0.4.f.0.1.0.f">富山県</option>
                <option value="17" data-reactid=".0.4.f.0.1.0.g">石川県</option>
                <option value="18" data-reactid=".0.4.f.0.1.0.h">福井県</option>
                <option value="19" data-reactid=".0.4.f.0.1.0.i">山梨県</option>
                <option value="20" data-reactid=".0.4.f.0.1.0.j">長野県</option>
                <option value="21" data-reactid=".0.4.f.0.1.0.k">岐阜県</option>
                <option value="22" data-reactid=".0.4.f.0.1.0.l">静岡県</option>
                <option value="23" data-reactid=".0.4.f.0.1.0.m">愛知県</option>
                <option value="24" data-reactid=".0.4.f.0.1.0.n">三重県</option>
                <option value="25" data-reactid=".0.4.f.0.1.0.o">滋賀県</option>
                <option value="26" data-reactid=".0.4.f.0.1.0.p">京都府</option>
                <option value="27" data-reactid=".0.4.f.0.1.0.q">大阪府</option>
                <option value="28" data-reactid=".0.4.f.0.1.0.r">兵庫県</option>
                <option value="29" data-reactid=".0.4.f.0.1.0.s">奈良県</option>
                <option value="30" data-reactid=".0.4.f.0.1.0.t">和歌山県</option>
                <option value="31" data-reactid=".0.4.f.0.1.0.u">鳥取県</option>
                <option value="32" data-reactid=".0.4.f.0.1.0.v">島根県</option>
                <option value="33" data-reactid=".0.4.f.0.1.0.w">岡山県</option>
                <option value="34" data-reactid=".0.4.f.0.1.0.x">広島県</option>
                <option value="35" data-reactid=".0.4.f.0.1.0.y">山口県</option>
                <option value="36" data-reactid=".0.4.f.0.1.0.z">徳島県</option>
                <option value="37" data-reactid=".0.4.f.0.1.0.10">香川県</option>
                <option value="38" data-reactid=".0.4.f.0.1.0.11">愛媛県</option>
                <option value="39" data-reactid=".0.4.f.0.1.0.12">高知県</option>
                <option value="40" data-reactid=".0.4.f.0.1.0.13">福岡県</option>
                <option value="41" data-reactid=".0.4.f.0.1.0.14">佐賀県</option>
                <option value="42" data-reactid=".0.4.f.0.1.0.15">長崎県</option>
                <option value="43" data-reactid=".0.4.f.0.1.0.16">熊本県</option>
                <option value="44" data-reactid=".0.4.f.0.1.0.17">大分県</option>
                <option value="45" data-reactid=".0.4.f.0.1.0.18">宮崎県</option>
                <option value="46" data-reactid=".0.4.f.0.1.0.19">鹿児島県</option>
                <option value="47" data-reactid=".0.4.f.0.1.0.1a">沖縄県</option>
              </select>
            </div>
            <hr>
            <div class="row">
              <label>値下げ申請</label>
              <div class="yes"><input type="radio" name="nego-flg" value="1" id="yes"><label>ありだぜ</label>
              </div>
              <br>
              <div class="no"></div><input type="radio" name="nego-flg" value="0" id="no" checked><label>あかんねん</label>
            </div>
            <div class="row" class="price">
              <label>販売価格</label>
              <input type="text" name="price">
            </div>

            <div class="row" id="min_price">
              <label>値下げ<br>下限値</label>
              <input type="text" name="min-price">
            </div>

            </hr>
            <div class="row">
              <button type="button" class="btn-square-shadow btn-blue">クリア</button>
              <!-- <button type="submit" class="btn-square-shadow btn-red" value="temp" name="temp">一時保存</button> -->
              <input type="submit" class="btn-square-shadow btn-red" name="product" value="確認">
            </div>
          </div>
          <!--p-p-item-->
        </form>
      </div>
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

        <p id="page-top-btn"><a href="#space"><img src="./../images/banana.png" width="20px" height="auto"> <span class="white"> ページTOPへ戻る</span></a></p>
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