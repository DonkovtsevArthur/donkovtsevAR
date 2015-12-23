<?php
$tov = 	$_SESSION['tov'];
$submit_zakaz .= '<input type="submit" name="mail" class="buttom1-2" value="ЗАКАЗАТЬ">';
$mail = $_POST['mail'];	
if(isset($mail)) {		
	$html_mail .= '<input type="email" class="buttom3" name="email" placeholder="введите свой email"> ';	
}		
if(isset($mail) and !empty($_POST['email'])) {		
	$email = $_POST['email'];		
		//почта
	$to= $email . ", " ; //обратите внимание на запятую
	/* тема/subject */
	$subject = "Заказ с donkovtsetarthur.ru";
	/* сообщение */
	$message = '
		<html>
		<head>
		 <title></title>
		</head>
		<body>
		<p>Спасибо за заказ</p>
		<div>'.$tov.'</div>
		</body>
		</html>
		';
	/* Для отправки HTML-почты вы можете установить шапку Content-type. */
	$headers= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";
	/* дополнительные шапки */
	$headers .= "From: <info@donkovtsevarthur.ru>\r\n";
	$headers .= "Cc: info@donkovtsevarthur.ru\r\n";
	$headers .= "Bcc: info@donkovtsevarthur.ru\r\n";
	/* и теперь отправим из */
	$send = mail($to, $subject, $message, $headers);
	if(isset($send) && isset($_POST['email'])) {		
		$spasibo .='<h2 class="kor text-center">Cпасибо за заказ! Проверьте почту</h2>
		<h4 class="text-center"><a href="index.php" class="buttom4">Назад</a></h4>
		';
		unset($tov);
		unset($_SESSION['tov']);
		unset($html_mail);
		unset($submit_zakaz);
		unset($_SESSION['pages']);		
	} 
}	

?>