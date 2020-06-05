<?php
session_start();

if (isset($_SESSION['yid'])) {
	$rcode = 1;
	$yid = $_SESSION['yid'];
}

$uid = $_SESSION['uid'];

if(isset($_GET['user_id'])){
	$uid = $_GET['user_id'];
}

const HOST = 'localhost';
const DB_NAME = 'ec_masaru';
const DB_USER = 'root';
const DB_PASS = '';

$cn = mysqli_connect(HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($cn, 'utf8');

/* チャット */
if(isset($_GET['pid'])){
	$sql= "SELECT shop_info FROM shop WHERE user_id = '".$_GET['pid']."'";
	$result = mysqli_query($cn,$sql);
	$row = mysqli_fetch_assoc($result);
}else{
	$sql= "SELECT shop_info FROM shop WHERE user_id = '$uid';";
	$result = mysqli_query($cn,$sql);
	$row = mysqli_fetch_assoc($result);
}

/** 評価数に関するSQL抽出 */
$harrays = [];
$hcnt = 0;
$sql5 = "SELECT * FROM assessment INNER JOIN login ON assessment.re_valuer = login.id WHERE login.user_id = '$uid';";
$hresult = mysqli_query($cn, $sql5);
while ($hrows = mysqli_fetch_assoc($hresult)) {
  $harrays[] = $hrows;
  $hcnt++;
}

/** 出品数に関するSQL抽出 */
$sarrays = [];
$scnt = 0;
$sql4 = "SELECT * FROM product INNER JOIN login ON product.exhibitor = login.id WHERE login.user_id = '$uid';";
$sresult = mysqli_query($cn, $sql4);
while ($srows = mysqli_fetch_assoc($sresult)) {
  $sarrays[] = $srows;
  $scnt++;
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	
	<title><?php echo $_GET['pid'] ?>のプロフィール　|　まさる堂</title>
	<link rel="stylesheet" type="text/css" href="./css/template.css">
  <link rel="stylesheet" type="text/css" href="./css/plofile2.css ">
</head>
<body>
	
	<header>
		<div id="header-top">
			<h1><a href="./top-page.php"><img src="./images/masarudo.png" width="200px" height="auto"></a></h1>
			<div class="banana">
				<img src="./images/banana.png" width="20px" height="auto">
			</div>
		</div>

	</header>
    
      <div id="space"></div>
      <!--レイアウト調整用 -->
	<div class="wrapper">
		<div class="contents-box">
			<div class="content-wrap">
				<div class="plo_bg">
					<h2 class="c_title"><?php if(isset($_GET['id'])){ echo $_GET['pid']; }else{ echo $uid; } ?>さんのプロフィール</h2>

					<p class="pl_img"><img src="./plofile/<?php if(isset($_GET['id'])){ echo $_GET['pid']; }else{ echo $uid; } ?>.jpg"></p>
					<p class="pl_nm"><?php if(isset($_GET['id'])){ echo $_GET['pid']; }else{ echo $uid; } ?></p>

					<div class="side">
						<p>評価 : <?php echo $hcnt; ?>　</p>
						<p>出品数 : <?php echo $scnt; ?></p>
					</div>
					
				</div>

				<div class="intro_s">
           <ul class="si">
            <li><img src="./assesment/5.png" width="40px" height="auto">　0</li>
            <li><img src="./assesment/4.png" width="40px" height="auto">　0</li>
            <li><img src="./assesment/3.png" width="40px" height="auto">　0</li>
            <li><img src="./assesment/2.png" width="40px" height="auto">　0</li>
            <li><img src="./assesment/1.png" width="40px" height="auto">　0</li>
          </ul><br><br>
					<p><?php echo $row['shop_info'] ?></p>


				</div>
			</div>
		</div>
		<p class="btn-circle-flat"><a href="./product.php">戻る</a></p>


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
	</div>
</body>
</html>
