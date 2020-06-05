<?php

const HOST = 'localhost';
const DB_NAME = 'ec_masaru';
const DB_USER = 'root';
const DB_PASS = '';
session_start();

if (isset($_SESSION['yid'])) {
  $rcode = 1;
}

if (isset($_FILES['file'])) {

	if ($_FILES['file']['size'] != 0) { //画像の有無

		//画像判定

		$upload_file = $_FILES['file'];
		$extension = pathinfo($upload_file['name']); //拡張子を抽出
		$new_name = $_SESSION['yid'] . '.' . $extension['extension'];

		if ($extension['extension'] == 'jpg') { //jpgかどうかの判定
			$msg2 = '';
		} else {
			$msg2 = 'jpgファイルのみ有効です';
		}
	} else {
		$msg2 = '画像をアップロードしてください';
	}

	if ($msg2 == '') {

		//画像アップロード

		$file = './plofile/' . $new_name;

		move_uploaded_file($upload_file['tmp_name'], $file);

		$data = getimagesize($file);

		$x = $data[0]; //横長さ
		$y = $data[1]; //縦長さ


		if ($x > 150 || $y > 150) { //横が100pxより大きい、または縦が200pxより大きいとき

			$x_scale = floor((150 / $x) * 100) / 100; //横の比率(少数第3位以下切り捨て)

			$y_scale = floor((150 / $y) * 100) / 100; //縦の比率(少数第3位以下切り捨て)

			if ($x_scale < $y_scale) { //横の比が縦の比よりも小さいとき横基準

				$y = $y * 150 / $x;
				$x = 150;
			} else { //縦基準

				$x = $x * 150 / $y;
				$y = 150;
			}
		}

		$image_info = getimagesize($file);

		$img_in = imagecreatefromjpeg($file);

		$img_out = imagecreatetruecolor($x, $y);
		imagealphablending($img_out, false);
		imagesavealpha($img_out, true);
		imagecopyresampled($img_out, $img_in, 0, 0, 0, 0, $x, $y, $data[0], $data[1]);

		imagejpeg($img_out, $file);

		imagedestroy($img_in);
		imagedestroy($img_out);

		$cn = mysqli_connect(HOST, DB_USER, DB_PASS, DB_NAME);
		mysqli_set_charset($cn, 'utf8');
		$sql = "UPDATE shop SET shop_info = '" . $_POST['intro'] . "' WHERE user_id = '" . $_SESSION['yid'] . "'";

		mysqli_query($cn, $sql);


		header('Location:message.php');

		header('Location:my-page.php');
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">

	<title>会員情報本登録　|　まさる堂</title>
	<link rel="stylesheet" type="text/css" href="./css/template.css">
	<link rel="stylesheet" type="text/css" href="./css/plofile_edit.css ">
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
	<div class="wrapper">
		<div class="contents-box">
			<div class="content-wrap">
				<h2 class="c_title">プロフィールアップロード</h2>
				<div class="center">
					<form action="./plofile_edit.php" method="post" enctype="multipart/form-data">
						<table>
							<tr>
								<td>
									ユーザーID
								</td>
								<td>
									　　　　　　<?php echo $_SESSION['yid']; ?>
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
							</tr>
							<td>
								ショップ紹介
							</td>
							<td>
								<textarea name="intro" rows="4" cols="25"></textarea>
							</td>
							</tr>
							<tr>
								<td></td>
								<td class="red">
									<?php if (isset($msg1)) {
										echo $msg1;
									} ?>
								</td>
							</tr>
							<tr>
								<td>
									プロフィール画像
								</td>
								<td>
									<input type="file" name="file">
								</td>
							</tr>
							<tr>
								<td></td>
								<td class="red">
									<?php if (isset($msg2)) {
										echo $msg2;
									} ?>
								</td>
							</tr>
						</table>

						<button class="color3_1" type="submit">登録</button>
					</form>
				</div>
			</div>
		</div>

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
	</div>
</body>

</html>