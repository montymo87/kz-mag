<?php
error_reporting(85);
date_default_timezone_set("Asia/Almaty");
header("Content-Type: text/html; charset=UTF-8");


$mail_to = "vlad.dreamtrips@yandex.ru"; // E-mail на который будут отправляться уведомления
$mail_from = "mail@".preg_replace("/^www\./ui", "", $_SERVER['HTTP_HOST']); $mail_from_name = $_SERVER['HTTP_HOST']; // E-mail с которого будут отправляться уведомления ($_SERVER['HTTP_HOST'] - домен текущего сайта)
$mail_subject = "Заявка"; // Тема уведомлений

$labels = array(
	"name" => "Имя", 
	"email" => "E-mail", 
	"phone" => "Телефон", 
);


$csv_data = array(
	date("d.m.Y H:i:s"), 
	trim($_POST['name']), 
	trim($_POST['phone']), 
);



$mail_boundary = "boun".md5(uniqid())."dary";
$mail_headers = array("MIME-Version: 1.0", "From: =?UTF-8?B?".base64_encode($mail_from_name)."?= <".$mail_from.">", "Content-Type: multipart/mixed; boundary=\"".$mail_boundary."\"");
if(preg_match("/^[^\n]+\@[^\n]+\.[^\n]+$/ui", trim($_POST['email']))){$mail_headers[] = "Reply-To: ".trim($_POST['email']);}

$mail_message = ""; foreach($_POST as $k=>$v){if($v){$mail_message .= (($labels[trim($k)])?:htmlspecialchars(trim($k))).": <b>".nl2br(htmlspecialchars(trim(is_array($v)?implode(", ", $v):$v)))."</b><br>";}}


$mail_message1 = "--".$mail_boundary."
Content-Type: text/html; charset=\"UTF-8\"
Content-Transfer-Encoding: base64

".chunk_split(base64_encode($mail_message))."

--".$mail_boundary;


foreach($_FILES as $v){
if($v['type']&&$v['tmp_name']){
$mail_message1 .= "
Content-Disposition: attachment; filename=\"=?UTF-8?B?".base64_encode($v['name'])."?=\"
Content-Type: ".$v['type']."; name=\"=?UTF-8?B?".base64_encode($v['name'])."?=\"
Content-Transfer-Encoding: base64

".chunk_split(base64_encode(file_get_contents($v['tmp_name'])))."

--".$mail_boundary;
}
}


if(trim($_POST['phone'])){
	$csv = file_put_contents("send.csv", iconv("UTF-8", "Windows-1251//IGNORE", "\r\n".'"'.implode('";"', str_replace(array('"', "\r\n", "\n"), array('""', " ", " "), $csv_data)).'"'), FILE_APPEND);
	
	$mail = mail($mail_to, "=?UTF-8?B?".base64_encode($mail_subject)."?=", $mail_message1."--", implode("\r\n", $mail_headers), "-f ".$mail_from);
	
	if($csv||$mail){
		header("Location: ok.php?".http_build_query($_POST)); exit;
	}else{echo "Error";}
}else{echo "Phone required";}

?>