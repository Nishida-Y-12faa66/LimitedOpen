<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	
	<title>会員情報入力確認　|　まさる堂</title>
	<link href="./style.css" rel="stylesheet">
</head>
<body>
	
	<header>
		<h1><img src="./images/site/masarudo.png" width="230px" height="auto"></h1>
	</header>
	<div class="wrapper">
		<div class="content-box">
			<div class="content-wrap">
				<h2>会員情報入力確認</h2>
				<div class="center">
					<form action="entry-complete.php" method="post">
						<table>
							<tr>
								<td>
									氏名
								</td>
								<td>
									<?php echo $_SESSION['name'] ?>
								</td>
							</tr>
							<tr>
								<td>
									ログインID
								</td>
								<td>
									<?php echo $_SESSION['id'] ?>
								</td>
							</tr>
							<tr>
								<td>
									パスワード
								</td>
								<td>
									<?php echo $_SESSION['password'] ?>
								</td>
							</tr>
							<tr>
								<td>
									メールアドレス
								</td>
								<td>
									<?php echo $_SESSION['mail'] ?>
								</td>
							</tr>
						</table>
						<div class="side">
							<p class="btn4"><a href="entry.php"> 戻る</a></p>
							<button class="btn3" type="submit">登録</button>
						</div>					
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