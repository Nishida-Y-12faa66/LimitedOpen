<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	
	<title>会員情報入力　|　まさる堂</title>
	<link href="./style.css" rel="stylesheet">
</head>
<body>
	
	<header>
		<h1><img src="./images/site/masarudo.png" width="230px" height="auto"></h1>
	</header>
	<div class="wrapper">
		<div class="content-box">
			<div class="content-wrap">
				<h2>会員情報入力</h2>
				<div class="center">
					<form action="entry.php" method="post">
						<table>
							<tr>
								<td>
									氏名
								</td>
								<td>
									<input type="text" name="name" value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name']; } ?>">
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
									ログインID
								</td>
								<td>
									<input type="text" name="id" value="<?php if(isset($_SESSION['id'])){echo $_SESSION['id']; } ?>">
								</td>
							</tr>
							<tr>
								<td></td>
								<td class="red">
									<?php if(isset($msg2)){ echo $msg2; }?>
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
							<tr>
								<td></td>
								<td class="red">
									<?php if(isset($msg3)){ echo $msg3; }?>
								</td>
							</tr>
							<tr>
								<td>
									メールアドレス
								</td>
								<td>
									<input type="text" name="mail" value="<?php if(isset($_SESSION['mail'])){echo $_SESSION['mail']; } ?>">
								</td>
							</tr>
							<tr>
								<td></td>
								<td  class="red">
									<?php if(isset($msg4)){ echo $msg4; }?>
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