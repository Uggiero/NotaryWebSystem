<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ua">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Merriweather:wght@700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/adminPanel.css">
	<link rel="stylesheet" href="../css/adaptiv.css">
	<link rel="shortcut icon" href="../img/logo.jpg" type="image/x-icon">
	<title>Приватний Нотаріус - адмін панель</title>
</head>

<body>
	<div class="wrapper" style="background-color: #ffd7ac;">
		<header class="header">
			<div class="container">
				<div class="header__title">
					<h2>Адмін панель</h2>
				</div>
			</div>
		</header>
		<main class="main__question">
			<div class="container">
				<div class="main__title">
					<h2>Зміна даних</h2>
				</div>
				<form action="./editEmail.php" class="main__edit" method="POST">
					<input type="text" placeholder="Username" name="username" required class="edit__input">
					<input type="text" placeholder="Password" name="password" required class="edit__input">
					<input type="text" placeholder="Host" name="host" required class="edit__input">
					<input type="number" placeholder="Port" name="port" required class="edit__input">
					<?php
					if (isset($_SESSION['message_edit'])) {
						echo '<div class="authorization__message"><p>' . $_SESSION['message_edit'] . '</p></div>';
						unset($_SESSION['message_edit']);
					}
					?>
					<button class="edit__button">Замінити</button>
				</form>

				<div class="questions__btn">
					<a href="../adminPanel.php">
						<div class="questions__btn-back">Назад</div>
					</a>
				</div>
			</div>
		</main>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/mapscript.js"></script>
</body>

</html>
<?php
if (isset($_POST['port'])) {
	require_once "../include/connect.php";

	$result = $mysql->query("SELECT * FROM services");
	$row = $result->fetch_assoc();

	$username = $_POST['username'];
	$password = $_POST['password'];
	$host = $_POST['host'];
	$port = $_POST['port'];

	if ($mysql->query("UPDATE phpmailer SET `username` = '$username', `password` = '$password', `host`='$host', `port`='$port'")) {
		$_SESSION['message_edit'] = "Дані успішно змінені!";
		header("Location: ./editEmail.php");
	} else {
		$_SESSION['message_edit'] = "Помилка при заміні даних!";
		header("Location: ./editEmail.php");
	}

	require_once "../include/reconnect.php";
}

?>