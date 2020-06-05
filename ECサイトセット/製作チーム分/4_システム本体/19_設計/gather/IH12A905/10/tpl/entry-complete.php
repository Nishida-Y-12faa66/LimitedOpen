<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	
	<title>会員登録完了　|　まさる堂</title>
	<link href="./style.css" rel="stylesheet">
</head>
<body>
	
	<header>
		<h1><img src="./images/site/masarudo.png" width="230px" height="auto"></h1>
	</header>
	<div class="wrapper">
		<div class="content-box">
			<div class="content-wrap">
				<h2>登録完了しました<br>
					ご登録のメールアドレスにメールを送信しました
				</h2>
			</div>
		</div>

		<div class="content-box">
			<div class="content-wrap">
				<h2>メール画面</h2>

				<div class="center">
					<form action="entry.php" method="post">
						<table>
							<tr>
								<td>
									TO
								</td>
								<td>
									<?php echo $_SESSION['name'] ?>
								</td>
							</tr>
							<tr>
								<td>
									FROM
								</td>
								<td>
									まさる堂
								</td>
							</tr>
							<tr>
								<td>
									件名
								</td>
								<td>
									登録完了
								</td>
							</tr>
							<tr>
								<td>
									内容
								</td>
								<td>
									<p>登録完了しました</p>
									<p>以下のリンクから会員本登録へ</p>
									<a href="<?php echo $url ?>"><?php echo $url ?></a>
								</td>
							</tr>
						</table>
						</table>				
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