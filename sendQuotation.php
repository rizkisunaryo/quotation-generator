<?php
require_once 'PHPMailer/PHPMailerAutoload.php';
require_once 'mysqlCon.php';

$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];
$address = $_GET['address'];
$city = $_GET['city'];
$postal = $_GET['postal'];
$country = $_GET['country'];
$phone = $_GET['phone'];
$businessEmail = $_GET['businessEmail'];
$vEmail = $_GET['email'];

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
if ($businessEmail!='' && !is_null($businessEmail)) $email->AddAddress( $businessEmail );
if ($vEmail!=$businessEmail) $email->AddAddress( $vEmail );
$file_to_attach = 'quotation'.$time.'.pdf';
$email->AddAttachment( $file_to_attach , 'quotation.pdf' );
$email->Send();


$sql = "INSERT INTO tx_customer(firstName,lastName,address,city,postal,country,phone,businessEmail,email) 
				VALUES ('".$firstName."','".$lastName."','".$address."','".$city."','".$postal."','".$country."','".$phone."','".$businessEmail."','".$vEmail."')";
mysqli_query($conn,$sql);


$urlPrefix = 'http://asamahe.com/portfolio/ipserverone/';
header('Location: '.$urlPrefix);
?>