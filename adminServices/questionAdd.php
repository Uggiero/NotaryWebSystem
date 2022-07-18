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
					<h3>Додати питання</h3>
				</div>
				<?php
				$result = $mysql->query("SELECT count(*) FROM questions");
				$row = $result->fetch_row();
				$count = $row[0] + 1;
				if (isset($_POST['title'])) {
					$title = $_POST['title'];
					$text = $_POST['text'];

					if ($count > $row[0] && $text && $title) {
						$mysql->query("INSERT INTO `questions` (`id_question`, `title`, `text`) VALUES ('$count', '$title', '$text');");
						header("Location: ./question.php");
					}
				}
				?>

				<div class="questions__column">
					<form action="./questionAdd.php" method="post" class="question__form">
						<label for="title" class="question__label">Заголовок(питання):</label>
						<input type="text" name="title" class="question__title" required>
						<label for="text" class="question__label">Текст(відповідь на питання):</label>
						<textarea name="text" id="text" cols="30" rows="10" class="question__title" required></textarea>
						<button class="questions__button">Додати</button>
					</form>
					<?php
					require_once '../include/reconnect.php';
					?>

					<div class="question__row">
						<a href="../adminPanel.php">
							<div class="questions__button questions__btn-back">На головну</div>
						</a>
						<a href="../adminServices/question.php">
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