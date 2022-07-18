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
$id_red = $_POST['employeeRed'];

$result_employee = $mysql->query("SELECT * FROM `employee` WHERE `id_employee` = $id_red");
$row_employee = $result_employee->fetch_assoc();

$result_employee_contacts = $mysql->query("SELECT * FROM `employee_contacts` WHERE `id_employee` = $id_red");
$row_employee_contacts = $result_employee_contacts->fetch_assoc();
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
					<h3>Редагувати спеціаліста</h3>
				</div>

				<div class="questions__column">
					<form action="./employeeRed.php" method="post" class="question__form" enctype="multipart/form-data">
						<label for="fileServices">Зображення</label>
						<img src="../img/employee/<?php echo $row_employee['image_employee'] ?>" alt="" style="max-width: 200px; margin-bottom: 10px;">
						<input type="file" name="image">

						<label for="text" class="question__label">ФИО:</label>
						<input type="text" name="name" class="question__title" value="<?php echo $row_employee['name_employee'] ?>">

						<label for="text" class="question__label">Спеціалізація:</label>
						<input type="text" name="spec" class="question__title" value="<?php echo $row_employee['specialization_employee'] ?>">

						<label for="text" class="question__label">Номер телефону:</label>
						<input type="text" name="phone" class="question__title" value="<?php echo $row_employee_contacts['contacts_phone'] ?>">

						<label for="text" class="question__label">Елктрона скринька:</label>
						<input type="text" name="mail" class="question__title" value="<?php echo $row_employee_contacts['contacts_email'] ?>">

						<label for=" text" class="question__label">Місце роботи:</label>
						<input type="text" name="address" class="question__title" value="<?php echo $row_employee_contacts['contacts_address'] ?>">

						<label for=" text" class="question__label">Гіперпосилання на Google Map:</label>
						<input type="text" name="map" class="question__title" value="<?php echo $row_employee_contacts['contacts_location'] ?>">
						<label for=" text" class="question__label">Гіперпосилання на Google Map:</label>
						<input type="text" name="link" class="question__title" value="<?php echo $row_employee_contacts['employee_link'] ?>">

						<button class=" questions__button" value="<?php echo $id_red ?>" name="employeeRed">Редагувати</button>
					</form>

					<?php
					require_once '../include/reconnect.php';
					?>

					<div class="question__row">
						<a href="../adminPanel.php">
							<div class="questions__button questions__btn-back">На головну</div>
						</a>
						<a href="../adminServices/employee.php">
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