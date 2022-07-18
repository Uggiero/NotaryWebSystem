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
					<h2>Питання</h2>
				</div>

				<div class="questions__column">
					<?php
					$result = $mysql->query("SELECT * FROM questions");
					while ($row = $result->fetch_assoc()) {
					?>
						<div class="questions__item">
							<div class="questions__subtitle subtitle"><?php echo $row['title'] ?></div>
							<div class="questions__text "><?php echo $row['text'] ?></div>
						</div>
						<div class="question__row">
							<form action="./questionView.php" method="POST">
								<button class="questions__button" name="red" value="<?php echo $row['id_question'] ?>">Редагувати</button>
							</form>
							<form action="./questionDelete.php" method="POST">
								<button class="questions__button" name="questionDelete" value="<?php echo $row['id_question'] ?>">Видалити</button>
							</form>
						</div>
					<?php
					}
					require_once('../include/reconnect.php');
					?>
					<div class="questions__btn">
						<a href="../adminPanel.php">
							<div class="questions__btn-back">На головну</div>
						</a>
						<a href="./questionAdd.php">
							<div class="questions__btn-back">Додати</div>
						</a>
					</div>
					<a href="../adminPanel.php">
				</div>
			</div>
		</main>
	</div>
	<script src="../js/questionscript.js"></script>
</body>

</html>