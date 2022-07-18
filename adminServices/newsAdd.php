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
					<h2>Додати новину</h2>
				</div>
				<div class="questions__column">
					<form action="./newsAdd.php" method="post" class="question__form" enctype="multipart/form-data">
						<label for="titleServices" class="question__label">Заголовок:</label>
						<input type="text" name="titleNews" class="question__title" required>

						<label for="fileServices">Зображення (формат .webm або .jpg/.jpeg)</label>
						<?php
						if (isset($_SESSION['error_validata_image_news'])) {
							echo '<div class="invalidate__message"><p>' . $_SESSION['error_validata_image_news'] . '</p></div>';
							unset($_SESSION['error_validata_image_news']);
						}
						?>
						<input type="file" name="imageNews" required>

						<label for="fileMainServices" class="question__label">Файл (формату .pdf):</label>
						<?php
						if (isset($_SESSION['error_validata_pdf_news'])) {
							echo '<div class="invalidate__message"><p>' . $_SESSION['error_validata_pdf_news'] . '</p></div>';
							unset($_SESSION['error_validata_pdf_news']);
						}
						?>
						<input type="file" name="fileNews" required>

						<button class="questions__button" name="btnAdd" value="1">Додати</button>
					</form>
					<div class="question__row">
						<a href="../adminPanel.php">
							<div class="questions__button questions__btn-back">На головну</div>
						</a>
						<a href="../adminServices/news.php">
							<div class="questions__button questions__btn-back">Назад</div>
						</a>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>

</html>
<?php
require_once '../include/connect.php';

$result = $mysql->query("SELECT count(*) FROM news");
$row = $result->fetch_row();
$count = $row[0] + 1;
if (isset($_POST['titleNews'])) {
	$title = $_POST['titleNews'];
	$image = $_FILES['imageNews']['name'];
	$file = $_FILES['fileNews']['name'];

	if ($_FILES['imageNews']['type'] != 'image/webp' && $_FILES['imageNews']['type'] != 'image/jpeg') {
		$_SESSION['error_validata_image_news'] = "Не вірний формат файлу!";
	} else {
		move_uploaded_file($_FILES['imageNews']['tmp_name'], '../img/News/' . $image);
	}


	if ($_FILES['fileNews']['type'] != 'application/pdf') {
		$_SESSION['error_validata_pdf_news'] = "Не вірний формат файлу!";
	} else {
		move_uploaded_file($_FILES['fileNews']['tmp_name'], '../img/News/' . $file);
	}
	if ($_FILES['imageNews']['type'] != 'image/webp' && $_FILES['imageNews']['type'] != 'image/jpeg' || $_FILES['fileNews']['type'] != 'application/pdf')
		return header("Location: ./newsAdd.php");

	if ($count > $row[0] && $title) {
		$mysql->query("INSERT INTO `news` (`id_news`, `news_image`,`news_title`, `news__file`) VALUES ('$count', '$image','$title', '$file');");
		header("Location: ./news.php");
	}
}
require_once '../include/reconnect.php';
?>