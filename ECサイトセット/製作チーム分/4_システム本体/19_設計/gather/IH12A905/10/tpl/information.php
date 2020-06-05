<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	
	<title>マイページ　|　まさる堂</title>
	<link href="./style.css" rel="stylesheet">
</head>
<body>
	
	<header>
		<h1><img src="./images/site/masarudo.png" width="230px" height="auto"></h1>
		<p><img src="<?php echo $file_dir ?>"><span id="name"><?php echo $get_user[0]['name'] ?></span></p>
		<p class="btn5"><a href="./index.php?flg=1">ログアウト</a></p>
	</header>
	<div class="wrapper">
		<div class="content-box">
			<div class="content-wrap">
				<h2>マイページ</h2>
				<div class="center">
					<h3>新着情報</h3>
					<div id="info">
						<?php
						for ($i=0; $i < 5; $i++) { 
							if(isset($get_information[$i]['title'])){
							?>
							
							<table>
								<tr>
									<td>
										<a href="pdf.php?id=<?php echo $i; ?>">
											<?php echo  $get_information[$i]['title']; ?>
										</a>
									</td>
								</tr>
								<tr>
									<td class="date">
										<?php echo  $get_information[$i]['created_at']; ?>
									</td>
								</tr>

							</table>

						<?php }
					} ?>
					</div>
					
				</div>
			</div>

		</div>
		<div class="side width">
<?php
			if($_GET['page'] == $MIN){

?>
				<p>前へ/</p>
<?php 		
			}
			else{
?>

				<p><a href="information.php?page=<?php echo $prev; ?>">前へ</a>/</p>

<?php 
			}
			for ($i=1; $i <=$info_num ; $i++) {
				//if (isset($_GET['page'])) {
			 	
					if($i == $_GET['page']){
?>
						<p><?php echo $i ?>/</p>
<?php 
					}
					else{ 
?>
					<p><a href="information.php?page=<?php echo $i ?>"><?php echo $i ?></a>/</p>
			
<?php 
					}
			}
?>
<?php
			if($_GET['page'] == $MAX){

?>
				<p>次へ</p>
<?php 		
			}
			else{
?>

				<p><a href="information.php?page=<?php echo $next;?>">次へ</a></p>

<?php 
			}

?>
		</div>

		<footer>
			<small>🄫2019 masarudo</small>
		</footer>
	</div>
</body>
</html>