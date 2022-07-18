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
$idRed = $_POST['newsRed'];
$result = $mysql->query("SELECT * FROM news WHERE `id_news` = '$idRed'");
$row = $result->fetch_assoc()
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
					<h2>Редагування новин</h2>
				</div>
				<div class="questions__column">
					<form action="./newsRed.php" method="post" class="question__form" enctype="multipart/form-data">
						<label for="titleServices" class="question__label">Заголовок:</label>
						<input type="text" name="titleNews" class="question__title" value="<?php echo $row['news_title']; ?>">

						<label for="fileServices">Зображення формат (.webm або .jpg/.jpeg)</label>
						<img src="../img/News/<?php echo $row['news_image']; ?>" alt="" style="max-width: 200px; margin-bottom: 10px;">
						<input type="file" name="imageNews">

						<label for="fileMainServices" class="question__label" style="margin-top: 20px">Файл (формату .pdf):</label>
						<div class="news__buttons" style="width: 200px; margin-bottom: 10px">
							<a href="../img/News/<?php echo $row['news__file'] ?>" class="news__link" target="_blank">
								<div class="news__click">Переглянути</div>
							</a>
						</div>
						<input type="file" name="fileNews">

						<button class="questions__button" name="btnReplace" value="<?php echo $_POST['newsRed']; ?>">Замінити</button>
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
require_once '../include/reconnect.php';
?>