<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	
	<title>会員情報本登録　|　まさる堂</title>
	<link href="./style.css" rel="stylesheet">
</head>
<body>
	
	<header>
		<h1><img src="./images/site/masarudo.png" width="230px" height="auto"></h1>
	</header>
	<div class="wrapper">
		<div class="content-box">
			<div class="content-wrap">
				<h2>会員情報本登録</h2>
				<div class="center">
					<form action="./upload.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
						<table>
							<tr>
								<td>
									氏名
								</td>
								<td>
									<?php echo $get_user[0]['name']; ?>
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
							</tr>
								<td>
									パスワード
								</td>
								<td>
									<input type="password" name="password">
								</td>
							</tr>
							<tr>
								<td></td>
								<td class="red">
									<?php if(isset($msg1)){ echo $msg1; }?>
								</td>
							</tr>
							<tr>
								<td>
									画像
								</td>
								<td>
									<input type="file" name="file">
								</td>
							</tr>
							<tr>
								<td></td>
								<td class="red">
									<?php if(isset($msg2)){ echo $msg2; } ?>
								</td>
							</tr>
						</table>
						<button class="btn3" type="submit">登録</button>					
					</form>
				</div>
			</div>
		</div>

		<footer>
			<small>🄫2019 masarudo</small>
		</footer>
	</div>
</body>
</html>