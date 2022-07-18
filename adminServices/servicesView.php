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
<?php
require_once '../include/connect.php';
$idRed = $_POST['servicesEditBtn'];
$result = $mysql->query("SELECT * FROM services WHERE `id_services` = $idRed");
$row = $result->fetch_assoc();
?>

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
					<h2>Редагування послуги</h2>
				</div>
				<div class="questions__column">
					<form action="./servicesRed.php" method="post" class="question__form" enctype="multipart/form-data">
						<label class="services__coment" style="margin-top: 0px;">Пункт послуги, на головній сторінці.</label>

						<label for="titleServices" class="question__label">Заголовок(назва послуги):</label>
						<input type="text" name="titleServices" class="question__title" value="<?php echo $row['title']; ?>">

						<label for="fileServices">Зображення(формату .svg)</label>
						<img src="../img/<?php echo $row['logo_image']; ?>" alt="" style="max-width: 100px; margin-bottom: 10px;">
						<input type="file" name="fileServices">


						<label class="services__coment">Сотрінка послуги.</label>

						<label for="subtitleMainServices" class="question__label">Допис ло заголовку:</label>
						<textarea name="subtitleMainServices" cols="30" rows="7" class="question__title"><?php echo $row['subtitle']; ?></textarea>

						<label for="titleMainServices" class="question__label">Основний текст(про що послуга):</label>
						<textarea name="titleMainServices" cols="30" rows="10" class="question__title"><?php echo $row['text']; ?></textarea>

						<label for="documnetMainServices" class="question__label">Необхідні документи:</label>
						<textarea name="documnetMainServices" cols="30" rows="7" class="question__title"><?php echo $row['document']; ?></textarea>

						<label for="fileMainServices" class="question__label">Фонове зображення(формат .webm або .jpg/.jpeg):</label>
						<img src="../img/servicesImage/<?php echo $row['main_image']; ?>" alt="" style="max-width: 200px; margin-bottom: 10px;">
						<input type="file" name="fileMainServices">

						<button class="questions__button" name="btnReplace" value="<?php echo $_POST['servicesEditBtn']; ?>">Замінити</button>
					</form>
					<div class="question__row">
						<a href="../adminServices/services.php">
							<div class="questions__button questions__btn-back">Назад</div>
						</a>
						<a href="../adminPanel.php">
							<div class="questions__button questions__btn-back">На головну</div>
						</a>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>
<?php require_once '../include/reconnect.php'; ?>

</html>