<?php 
      session_start();
	$user = $_SESSION['yid'];
	$chat_id = $_SESSION['pid'];

      

	const HOST = 'localhost';
	const DB_NAME = 'ec_masaru';
	const DB_USER = 'root';
	const DB_PASS = '';
	
	$cn = mysqli_connect(HOST,DB_USER,DB_PASS,DB_NAME);
	mysqli_set_charset($cn,'utf8');	

	if (isset($_POST['message'])) {//ポストの値が存在し、セッションが存在するとき
	
	if ($_POST['message'] !== ''){//ポストの値が空白じゃないとき
		
			//値をセッションに保存

			$_SESSION['message'] = $_POST['message'];	

			
			if($_SESSION['message'] != ""){
				
				date_default_timezone_set('Asia/Tokyo');//タイムゾーン設定
				
				//メッセージの返信

				$sql="INSERT INTO chat_detail(msg,user_id,chat_id) VALUES ('".$_SESSION['message']."','".$user."','".$chat_id."')";

				mysqli_query($cn,$sql);

				header('Location:message.php');
			}
	}


}

$sql= "SELECT user_id,msg FROM chat_detail WHERE chat_id = '".$chat_id."' ORDER BY post_date desc";//変える必要あり

$result = mysqli_query($cn,$sql);

$msg_list = [];

while($row = mysqli_fetch_assoc($result)){
	$msg_list[] = $row;
}
mysqli_close($cn);


?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>???取引メッセージ　|　まさる堂</title>
  <link rel="stylesheet" type="text/css" href="./css/template.css">
  <link rel="stylesheet" type="text/css" href="./css/message.css ">
</head>
<body>
	<header>
		<div id="header-top">
			<h1><a href=""><img src="./images/masarudo.png" width="200px" height="auto"></a></h1>
			<div class="banana">
				<img src="./images/banana.png" width="20px" height="auto">
			</div>
		</div>

	</header>
    
      <div id="space"></div>
      <!--レイアウト調整用 -->


      <div id="wrapper">
      	<!--メインビジュアル-->
      	<div class="contents-box">
      		<div class="content-wrap">
      			
      				<h2 class="c_title">コメントを書き込む</h2>
      				<form action="message.php" method="post">
      					<textarea name="message" rows="4" cols="30"></textarea><br>
      					<button class="color3_1">コメントする</button>

      				</form>

      				<hr>

                              <?php if(count($msg_list) ==0){ ?>
                              <p class="comno">コメントがありません。</p>
                        <?php }
                        else{ ?>
      				<p class="sub_t">コメント<?php echo count($msg_list) ?>件</p>
                        <?php } ?>


                              <?php foreach ($msg_list as $key => $msg) { ?>

                                <div class="com">
                                     <div class="com_left">
                                          <p><a href="plofile.php">
                                                <?php
                                                $file_path =  './plofile/'.$msg['user_id'].'.jpg';  
                                                if(file_exists($file_path)){ ?>
                                                      <img src="./plofile/<?php echo $msg['user_id'] ?>.jpg">
                                                <?php }
                                                else{ ?>
                                                      <img src="./plofile/default.png">
                                                <?php } ?>
                                          </a></p>
                                    </div>

                                    <div class="com_right">
                                          
                                          <p class="com_user"><?php echo $msg['user_id'] ?></p>
                                          <p class="com_com"><?php echo $msg['msg'] ?></p>
                                    </div>
                                    
                              </div>
                              <?php } ?>
                              
      		</div><!--content-wrap-->
      	</div>

            <p class="btn-circle-flat"><a href="./product.php">戻る</a></p>

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
        
  
  
  
  </body>
</html>