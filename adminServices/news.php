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
		<?php
		require_once '../include/connect.php';
		?>
		<main class="main__question">
			<div class="container">
				<div class="main__title">
					<h2>Нотаріус консультує (новини)</h2>
				</div>
				<div class="main__news" id="news">
					<div class="news__title">Новини</div>
					<div class="news__items">
						<?php
						$result = $mysql->query("SELECT * FROM news");
						while ($row = $result->fetch_assoc()) {
						?>
							<div class="news__item">
								<div class="news__image"><img src="../img/News/<?php echo $row['news_image'] ?>" alt="">
								</div>
								<div class="news__subtitle"><span><?php echo $row['news_title'] ?></span> </div>
								<div class="news__buttons">
									<a href="../img/News/<?php echo $row['news__file'] ?>" class="news__link" target="_blank">
										<div class="news__click">Переглянути</div>
									</a>
									<a href="../img/News/<?php echo $row['news__file'] ?>" class="news__link" download="1">
										<div class="news__click">Завантажити</div>
									</a>
								</div>
								<div class="news__buttons" style="margin-top: 10px;">
									<form action="./newsView.php" method="post" class="news__link">
										<button class="news__click" value="<?php echo $row['id_news'] ?>" name="newsRed" style="	background-color: rgb(138, 228, 138);">Редагувати</button>
									</form>
									<form action="./newsDelete.php" method="post" class="news__link">
										<button class="news__click" value="<?php echo $row['id_news'] ?>" name="newsDelete" style="	background-color: rgb(247, 144, 144);">Видалити</button>
									</form>
								</div>
							</div>
						<?php
						} ?>
					</div>
					<div class="questions__btn">
						<a href="../adminPanel.php">
							<div class="questions__btn-back">На головну</div>
						</a>
						<a href="./newsAdd.php">
							<div class="questions__btn-back">Додати новини</div>
						</a>
					</div>
				</div>
			</div>
		</main>


		<?php
		require_once '../include/reconnect.php';
		?>

	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/mapscript.js"></script>
</body>

</html>