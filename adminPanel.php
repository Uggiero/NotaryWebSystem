<?php
session_start();

if (!isset($_SESSION['admin'])) {
	header("Location: ./adminAth.php");
}
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
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/adminPanel.css">
	<link rel="stylesheet" href="./css/adaptiv.css">
	<link rel="shortcut icon" href="./img/logo.jpg" type="image/x-icon">
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
		<main class="main">
			<div class="container">
				<div class="main__row">
					<div class="main__column">
						<a href="./adminServices/question.php">
							<div class="main__item">Питання</div>
						</a>
					</div>
					<div class="main__column">
						<a href="./adminServices/services.php">
							<div class="main__item">Послуги</div>
						</a>
					</div>
					<div class="main__column">
						<a href="./adminServices/news.php">
							<div class="main__item">Нотаріус консультує</div>
						</a>
					</div>
					<div class="main__column">
						<a href="./adminServices/employee.php">
							<div class="main__item">Спеціалісти</div>
						</a>
					</div>
					<div class="main__column">
						<a href="./adminServices/spec.php">
							<div class="main__item">Спеціалізація</div>
						</a>
					</div>
					<div class="main__column">
						<a href="./adminServices/editEmail.php">
							<div class="main__item">Зміна почти, для зворотнього зв'язку</div>
						</a>
					</div>
				</div>
				<div class="main__exit">
					<a href="./include/logout.php">
						Вихід
					</a>
				</div>
			</div>
		</main>
	</div>
</body>

</html>