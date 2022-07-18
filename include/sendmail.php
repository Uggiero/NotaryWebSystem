<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "../PHPMailer/src/Exception.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";

require "./connect.php";

$result = $mysql->query("SELECT * FROM `phpmailer`");
$row = $result->fetch_assoc();

$username = $row['username'];
$password = $row['password'];
$host = $row['host'];
$port = $row['port'];

require "./reconnect.php";

$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = $host; //smtp.mailtrap.io
$mail->SMTPAuth = true;
$mail->Username = $username; //614c2de0d92b85
$mail->Password = $password; //c76ec16852f69a
$mail->SMTPSecure = 'tls'; //0
$mail->Port = $port; //2525 
$mail->CharSet = 'UTF-8';

$mail->setLanguage('uk', '../PHPMailer/language/');
$mail->isHTML(true);

$body_message = '<h1>Інформація від клієнта</h1>';

if (trim(!empty($_POST['name']))) {
	$body_message .= '<p><strong>Ім\'я:</strong> ' . $_POST['name'] . '</p>';
}
if (trim(!empty($_POST['phone']))) {
	$phone = ltrim($_POST['phone'], "+");
	$body_message .= '<p><strong>Номер телефону:</strong> <a href="tel:+' . $phone . '">+' . $phone . '</a></p>';
}
if (trim(!empty($_POST['email']))) {
	$body_message .= '<p><strong>Електронна пошта:</strong> ' . $_POST['email'] . '</p>';
}
if (trim(!empty($_POST['text']))) {
	$body_message .= '<p><strong>Прикріплений текст:</strong> ' . $_POST['text'] . '</p>';
}

$mail->setFrom($_POST['email'], 'Клієнт');
$mail->addAddress('notaryodessa39@gmail.com');
$mail->Subject = "Запитання від клієнта!";

$mail->Body = $body_message;

if (!$mail->send()) {
	$message = "Помилка при відпраленні!";
} else {
	$message = "Відпралення успішне!";
}

$response = ['message' => $message];

echo json_encode($response);
