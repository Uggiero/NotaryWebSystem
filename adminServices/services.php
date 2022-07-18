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
					<h2>Послуги</h2>
				</div>

				<div class="questions__column">
					<?php
					require_once '../include/connect.php';

					$result = $mysql->query("SELECT * FROM services");
					while ($row = $result->fetch_assoc()) {
					?>
						<div class="services__row">
							<div class="services__column">
								<div class="services__item">
									<div class="services__image"><img src="../img/<?php echo $row['logo_image'] ?>" alt=""></div>
									<form action="../services/maketServices.php" method="post">
										<button class="services__label" value="<?php echo $row['id_services'] ?>" name="servicesButton" style="background-color: #ffd7ac;"><?php echo $row['title'] ?></button>
									</form>
								</div>
							</div>
							<div class="services__column">
								<div class="services__delete">
									<form action="./servicesDelete.php" method="POST">
										<button name="servicesDeleteBtn" value="<?php echo $row['id_services'] ?>" class="services__button">Видалити пункт</button>
									</form>
								</div>
							</div>
							<div class="services__column">
								<div class="services__edit">
									<form action="./servicesView.php" method="POST">
										<button name="servicesEditBtn" value="<?php echo $row['id_services'] ?>" class="services__button">Редагувати пункт</button>
									</form>
								</div>
							</div>
						</div>
					<?php
					}
					require_once '../include/reconnect.php';
					?>
					<div class="questions__btn">
						<a href="../adminPanel.php">
							<div class="questions__btn-back">На головну</div>
						</a>
						<a href="./servicesAdd.php">
							<div class="questions__btn-back">Додати</div>
						</a>
					</div>
				</div>
			</div>
		</main>
	</div>
	<script src="../js/questionscript.js"></script>
</body>

</html>