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
					<h3>Додати послугу</h3>
				</div>
				<div class="questions__column">
					<form action="./servicesAdd.php" method="POST" class="question__form" enctype="multipart/form-data">
						<label class="services__coment" style="margin-top: 0px;">Пункт послуги, на головній сторінці.</label>

						<label for="titleServices" class="question__label">Заголовок(назва послуги):</label>
						<input type="text" name="titleServices" class="question__title" required>

						<label for="fileServices">Зображення(формату .svg)</label>
						<?php
						if (isset($_SESSION['invalid_file_format_logo'])) {
							echo '<div class="invalidate__message"><p>' . $_SESSION['invalid_file_format_logo'] . '</p></div>';
							unset($_SESSION['invalid_file_format_logo']);
						}
						?>
						<input type="file" name="fileServices" required>


						<label class="services__coment">Сотрінка послуги.</label>

						<label for="subtitleMainServices" class="question__label">Допис ло заголовку:</label>
						<textarea name="subtitleMainServices" cols="30" rows="7" required class="question__title"></textarea>

						<label for="titleMainServices" class="question__label">Основний текст(про що послуга):</label>
						<textarea name="titleMainServices" cols="30" rows="10" required class="question__title"></textarea>

						<label for="documnetMainServices" class="question__label">Необхідні документи:</label>
						<textarea name="documnetMainServices" cols="30" rows="7" class="question__title"></textarea>

						<label for="fileMainServices" class="question__label">Фонове зображення(формат .webm або .jpg/.jpeg):</label>
						<?php
						if (isset($_SESSION['invalid_file_format_image'])) {
							echo '<div class="invalidate__message"><p>' . $_SESSION['invalid_file_format_image'] . '</p></div>';
							unset($_SESSION['invalid_file_format_image']);
						}
						?>
						<input type="file" name="fileMainServices" required>

						<button class="questions__button" name="add" value="1">Додати</button>
					</form>
					<div class="question__row">
						<a href="../adminPanel.php">
							<div class="questions__button questions__btn-back">На головну</div>
						</a>
						<a href="../adminServices/services.php">
							<div class="questions__button questions__btn-back">Назад</div>
						</a>
					</div>
				</div>
			</div>
		</main>

		<script src="../js/questionscript.js"></script>
	</div>
</body>

</html>
<?php
require_once '../include/connect.php';

$result = $mysql->query("SELECT count(*) FROM services");
$row = $result->fetch_row();
$countServices = $row[0] + 1;

if (isset($_POST['titleServices'])) {

	$title = $_POST['titleServices'];
	$image = $_FILES['fileServices']['name'];
	$subtitle = $_POST['subtitleMainServices'];
	$text = $_POST['titleMainServices'];
	$documnet = $_POST['documnetMainServices'];
	$mainImage = $_FILES['fileMainServices']['name'];

	if ($_FILES['fileServices']['type'] != 'image/svg+xml') {
		$_SESSION['invalid_file_format_logo'] = "Не вірний формат файлу!";
	} else {
		move_uploaded_file($_FILES['fileServices']['tmp_name'], '../img/' . $_FILES['fileServices']['name']);
	}

	if ($_FILES['fileMainServices']['type'] != 'image/webp' && $_FILES['fileMainServices']['type'] != 'image/jpeg') {
		$_SESSION['invalid_file_format_image'] = "Не вірний формат файлу!";
	} else {
		move_uploaded_file($_FILES['fileMainServices']['tmp_name'], '../img/servicesImage/' . $_FILES['fileMainServices']['name']);
	}

	if ($_FILES['fileServices']['type'] != 'image/svg+xml' || $_FILES['fileMainServices']['type'] != 'image/webp' && $_FILES['fileMainServices']['type'] != 'image/jpeg') {
		return header("Location: ./servicesAdd.php");
	}

	if ($countServices > $row[0] && $title) {
		$mysql->query("INSERT INTO `services` (`id_services`,`logo_image`,`title`,`subtitle`,`main_image`,`text`,`document`) VALUES ('$countServices', '$image', '$title','$subtitle','$mainImage','$text','$documnet');");
		header("Location: ./services.php");
	}
}

require_once '../include/reconnect.php';
?>