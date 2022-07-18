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
		$idRed = $_POST['red'];
		?>

		<main class="main__question">
			<div class="container">
				<div class="main__title">
					<h2>Редагування питання</h2>
				</div>
				<div class="questions__column">
					<?php
					$result = $mysql->query("SELECT * FROM questions WHERE `id_question` = '$idRed'");
					$row = $result->fetch_assoc()
					?>
					<div class="questions__item">
						<div class="questions__subtitle subtitle"><?php echo $row['title'] ?></div>
						<div class="questions__text "><?php echo $row['text'] ?></div>
					</div>
					<form action="./questionRed.php" method="post" class="question__form">
						<label for="title" class="question__label">Заголовок(питання):</label>
						<input type="text" name="title" class="question__title" value='<?php echo $row['title'] ?>'>
						<label for="text" class="question__label">Текст(відповідь на питання):</label>
						<textarea name="text" id="text" cols="30" rows="10" class="question__title"><?php echo $row['text'] ?></textarea>
						<button class="questions__button" name="btnReplace" value="<?php echo $idRed ?>">Замінити</button>
					</form>
					<div class="question__row">
						<a href="../adminServices/question.php">
							<div class="questions__button questions__btn-back">Назад</div>
						</a>
						<a href="../adminPanel.php">
							<div class="questions__button questions__btn-back">На головну</div>
						</a>
					</div>
				</div>
			</div>
		</main>

		<?php
		require_once '../include/reconnect.php';
		?>


		<script src="../js/questionscript.js"></script>
	</div>
</body>

</html>