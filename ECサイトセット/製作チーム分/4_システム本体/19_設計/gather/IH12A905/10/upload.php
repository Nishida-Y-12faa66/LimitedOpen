<?php
require_once('./../../config.php');
require_once('./func/func.php');

$get_user = get_user(DB_HOST,DB_USER,DB_PASS,DB,$_GET['id']);

if(isset($_FILES['file'])){
	
	if (isset($_POST['password'])) {
			
		if($_POST['password'] != ''){//パスワードのみ入力チェック
			 	//パスワードハッシュ化
			$salt = $get_user[0]['salt'] ;//ソルト値
			$stretch = $get_user[0]['stretch'];//ストレッチング値

			for ($i=0; $i < $stretch ; $i++) { //md5でハッシュ化
				$hash_pass = md5($_POST['password'].$salt);
			}

			if ($get_user[0]['password'] == $hash_pass){
				$msg1 = '';
			}
			
			else{
				$msg1 = 'パスワードが違います';
			}

		}
		else{
			$msg1 = 'パスワードを入力してください';
		}
	}

	if($_FILES['file']['size'] != 0){//画像の有無

		//画像判定

		$upload_file = $_FILES['file'];
		$extension = pathinfo($upload_file['name']);//拡張子を抽出
		
		if($extension['extension'] == 'jpg'){//jpgかどうかの判定
			$msg2 = '';
			
		}

		else{
			$msg2 = 'jpgファイルのみ有効です';
		}
			
	}
	else{
		$msg2 = '画像をアップロードしてください';
	}
	

	if ($msg1 == '' && $msg2 == '') {

		//画像アップロード
		$new_name = 'thumb_'.$_FILES['file']['name'];
		
		$filename = './images/user/'.$get_user[0]['id'];

		if (!file_exists($filename)) {
		    mkdir($filename , 0700);
		}
		

		

		$file = './images/user/'.$get_user[0]['id'].'/'.$new_name;

		move_uploaded_file($upload_file['tmp_name'],$file);

		$data = getimagesize($file);

		$x = $data[0];//横長さ
		$y = $data[1];//縦長さ


		if($x > 60 || $y > 70){//横が100pxより大きい、または縦が200pxより大きいとき

			$x_scale = floor((60 / $x) * 100)/100;//横の比率(少数第3位以下切り捨て)
			
			$y_scale = floor((70 / $y) * 100)/100;//縦の比率(少数第3位以下切り捨て)

			if($x_scale < $y_scale){//横の比が縦の比よりも小さいとき横基準
				
				$y = $y * 60/$x;
				$x = 60;	
				
			}
			else{//縦基準
				
				$x = $x * 70/$y;
				$y = 70;
				
			}
		}

		$image_info = getimagesize($file);

		$img_in = imagecreatefromjpeg($file);

		$img_out = imagecreatetruecolor($x,$y);
		imagealphablending($img_out, false);
		imagesavealpha($img_out , true);
		imagecopyresampled($img_out, $img_in, 0, 0, 0, 0, $x, $y, $data[0],$data[1]);
		
		imagejpeg($img_out , $file);	
		

		imagedestroy($img_in);
		imagedestroy($img_out);

		//仮登録から本登録へ
		state_change(DB_HOST,DB_USER,DB_PASS,DB,$hash_pass);
		//画像保存
		img_name(DB_HOST,DB_USER,DB_PASS,DB,$_FILES['file']['name'],$hash_pass);

		header('Location:upload-complete.php');
	}
	
}

	require_once('./tpl/upload.php');
?>