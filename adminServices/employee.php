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
					<h2>Спеціалісти</h2>
				</div>
				<div class="main__employee">
					<div class="employee__title title">Наші спеціалісти</div>
					<div class="employee__items">
						<?php
						$result = $mysql->query("SELECT * FROM `employee`, `employee_contacts` WHERE `employee`.`id_employee` = `employee_contacts`.`id_employee`");
						while ($row = $result->fetch_assoc()) {
						?>
							<div class="employee__item">
								<div class="employee__image"><img src="../img/employee/<?php echo $row['image_employee'] ?>" alt=""></div>
								<div class="employee__name"><?php echo $row['name_employee'] ?></div>
								<div class="employee__spec"><?php echo $row['specialization_employee'] ?></div>
								<div class="employee__more">
									<div class="employee__contacts">
										<div class="contacts__phone"><a href="tel:<?php echo $row['contacts_phone'] ?>"><img src="../img/phone.svg" alt=""></a></div>
										<div class="contacts__mail"><a href="mailto:<?php echo $row['contacts_email'] ?>"><img src="../img/mail.svg" alt=""></a></div>
										<div class="contacts__location"><a href="<?php echo $row['contacts_location'] ?>" target="_blank"><img src="../img/location.svg" alt=""></a></div>
									</div>
									<div class="employee__download"><a href="" class="download__link"><img src="../img/ArrowDown.svg" alt=""></a></div>
								</div>
								<div class="news__buttons" style="margin-top: 10px;">
									<form action="./employeeView.php" method="post" class="news__link">
										<button class="news__click" value="<?php echo $row['id_employee'] ?>" name="employeeRed" style="	background-color: rgb(138, 228, 138);">Редагувати</button>
									</form>
									<form action="./employeeDelete.php" method="post" class="news__link">
										<button class="news__click" value="<?php echo $row['id_employee'] ?>" name="newsDelete" style="	background-color: rgb(247, 144, 144);">Видалити</button>
									</form>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
				<div class="questions__btn">
					<a href="../adminPanel.php">
						<div class="questions__btn-back">На головну</div>
					</a>
					<a href="./employeeAdd.php">
						<div class="questions__btn-back">Додати спеціаліста</div>
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