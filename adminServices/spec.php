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
					<h2>Спеціалізація</h2>
				</div>
				<?php
				$result = $mysql->query("SELECT `employee`.`name_employee`, `employee`.`image_employee`, `services`.`title`, `services`.`logo_image`,`employee_services`.`id_employee`, `services`.`id_services` FROM `employee_services` , `employee`, `services` WHERE `employee`.`id_employee` = `employee_services`.`id_employee` AND `services`.`id_services` = `employee_services`.`id_services` ORDER BY `employee`.`name_employee` ASC");
				if (isset($_GET['sort__select-employee'])) {
					$sort_name = $_GET['sort__select-employee'];
					if ($sort_name === "down") {
						$result = $mysql->query("SELECT `employee`.`name_employee`, `employee`.`image_employee`, `services`.`title`, `services`.`logo_image`,`employee_services`.`id_employee`, `services`.`id_services` FROM `employee_services` , `employee`, `services` WHERE `employee`.`id_employee` = `employee_services`.`id_employee` AND `services`.`id_services` = `employee_services`.`id_services` ORDER BY `employee`.`name_employee` DESC");
					}
				}
				if (isset($_GET['sort__select-services'])) {
					$sort_services = $_GET['sort__select-services'];
					if ($sort_services === "up") {
						$result = $mysql->query("SELECT `employee`.`name_employee`, `employee`.`image_employee`, `services`.`title`, `services`.`logo_image`,`employee_services`.`id_employee`, `services`.`id_services` FROM `employee_services` , `employee`, `services` WHERE `employee`.`id_employee` = `employee_services`.`id_employee` AND `services`.`id_services` = `employee_services`.`id_services` ORDER BY `services`.`title` ASC");
					}
					if ($sort_services === "down") {
						$result = $mysql->query("SELECT `employee`.`name_employee`, `employee`.`image_employee`, `services`.`title`, `services`.`logo_image`,`employee_services`.`id_employee`, `services`.`id_services` FROM `employee_services` , `employee`, `services` WHERE `employee`.`id_employee` = `employee_services`.`id_employee` AND `services`.`id_services` = `employee_services`.`id_services` ORDER BY `services`.`title` DESC");
					}
				}
				?>

				<div class="main__spec">
					<div class="spec__row">
						<form class="spec__sort" method="GET" action="./spec.php">
							<select name="sort__select-employee" class="sort_select">
								<option value="up">По алфавіту</option>
								<option value="down">Проти алфавіту</option>
							</select>
							<button class="sort_button">Сортувати</button>
						</form>
						<form class="spec__sort" method="GET" action="./spec.php">
							<select name="sort__select-services" class="sort_select">
								<option value="none"></option>
								<option value="up">По алфавіту</option>
								<option value="down">Проти алфавіту</option>
							</select>
							<button class="sort_button">Сортувати</button>
						</form>
					</div>
					<?php while ($row = $result->fetch_assoc()) { ?>
						<div class="spec__row">
							<div class="spec__image">
								<img src="../img/employee/<?php echo $row['image_employee']; ?>" alt="">
							</div>
							<div class="spec_name"><?php echo $row['name_employee']; ?></div>
							<div class="spec__sybol"></div>
							<div class="spec__logo services__image">
								<img src="../img/<?php echo $row['logo_image']; ?>" alt="">
							</div>
							<div class="spec_title"><?php echo $row['title']; ?></div>
						</div>
						<div class="news__buttons spec__buttons" style="margin-top: 10px;">
							<form action="./specView.php" method="post" class="news__link spec__form" style="display: flex; justify-content: end;">
								<input type="text" style="display: none;" value="<?php echo $row['id_services']; ?>" name="oldServices">
								<button class="spec__button" value="<?php echo $row['id_employee']; ?>" name="specRed" style=" background-color: rgb(138, 228, 138); ">Редагувати</button>
							</form>
							<form action="./specDelete.php" method="post" class="news__link spec__form">
								<input type="text" style="display: none;" value="<?php echo $row['id_services']; ?>" name="oldServices">
								<button class="spec__button " value="<?php echo $row['id_employee']; ?>" name="specDelete" style="	background-color: rgb(247, 144, 144);">Видалити</button>
							</form>
						</div>
					<?php
					}
					?>
				</div>
				<div class="questions__btn">
					<a href="../adminPanel.php">
						<div class="questions__btn-back">На головну</div>
					</a>
					<a href="./specAdd.php">
						<div class="questions__btn-back">Задати зв'язок</div>
					</a>
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