<?php
require_once 'PHPMailer/PHPMailerAutoload.php';

$uriParts = explode("?", $_SERVER['REQUEST_URI']);
$uriPartsCount = count($uriParts);
$uri='';
for ($i=1; $i<$uriPartsCount; $i++) { 
	$uri .= $uriParts[$i];
	if ($i<$uriPartsCount-1) {
		$uri.='?';
	}
}

$time = date('YmdHis');

exec('/usr/local/bin/wkhtmltopdf "http://asamahe.com/portfolio/ipserverone/pdf-template.php?'.$uri.'" quotation'.$time.'.pdf', $out, $err);

$email = new PHPMailer();
$email->From      = 'rizkisunaryo@ipserverone.com';
$email->FromName  = 'IP SERVER ONE';
$email->Subject   = 'Quotation';
$email->Body      = 'Loren ipsum';
$email->AddAddress( $_GET['email'] );
$file_to_attach = 'quotation'.$time.'.pdf';
$email->AddAttachment( $file_to_attach , 'quotation.pdf' );
$email->Send();

$urlPrefix = 'http://asamahe.com/portfolio/ipserverone/';
header('Location: '.$urlPrefix);
?>