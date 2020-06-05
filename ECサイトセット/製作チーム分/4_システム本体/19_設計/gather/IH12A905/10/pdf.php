<?php
require_once('./../../config.php');
require_once('./func/func.php');

$get_information = get_information2(DB_HOST,DB_USER,DB_PASS,DB);

require_once './'.PDF_PATH.'vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
	'data' => [
		'font' => [
			'R' =>'jpag.ttf'
		]
	],
	'format' => 'A4-L',
	'mode' => 'ja',
]);

$mpdf -> writeHTML('<h1>'.$get_information[$_GET['id']]['title'].'</h1><p>'.$get_information[$_GET['id']]['content'].'</p><p>'.$get_information[$_GET['id']]['created_at'].'</p>');
$mpdf -> Output(date(Ymdhis).'.pdf','D');

header('Location:information.php');
?>