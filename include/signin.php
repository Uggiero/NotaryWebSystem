<?php
session_start();
require_once 'connect.php';
$login = $_POST['login'];
$password = md5($_POST['password']);

$check_admin = $mysql->query("SELECT * FROM authorization WHERE `login` = '$login' AND `password` = '$password'");
$admin = $check_admin->fetch_assoc();

if (mysqli_num_rows($check_admin)) {
	header('Location: ../adminPanel.php');
	$_SESSION['admin'] = [
		"login" => $admin['login'],
	];
} else {
	$_SESSION['message_error_ath'] = 'Не вірно вказаний логін або пароль.';
	header('Location: ../adminAth.php');
}

require_once 'reconnect.php';
