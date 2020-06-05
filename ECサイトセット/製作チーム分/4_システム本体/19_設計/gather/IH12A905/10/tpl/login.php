<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	
	<title>ログイン　|　まさる堂</title>
	<link href="./style.css" rel="stylesheet">
</head>
<body>
	
	<header>
		<h1><img src="./images/site/masarudo.png" width="230px" height="auto"></h1>
	</header>
	<div class="wrapper">
		<div class="content-box">
			<div class="content-wrap">
				<h2>ログイン情報を入力</h2>
				<div class="center">
					<form action="login.php" method="post">
						<table>
						
							<tr>
								<td>
									ログインID
								</td>
								<td>
									<input type="text" name="login_id">
								</td>
							</tr>
							<tr>
								<td>
									パスワード
								</td>
								<td>
									<input type="password" name="password">
								</td>
							</tr>							
						</table>
						<p class="red2 center">
							<?php if(isset($msg)){ echo $msg; }?>
						</p>
						<button class="btn3" type="submit">ログイン</button>					
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