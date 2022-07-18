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

<?php
require_once '../include/connect.php';

if (isset($_POST['map'])) {
	$image = $_FILES['image']['name'];
	if ($_FILES['image']['type'] != 'image/webp' && $_FILES['image']['type'] != 'image/jpeg') {
		$_SESSION['error_validata_image_employee'] = "Не вірний формат файлу!";
		return header("Location: ./employeeAdd.php");
	} else {
		move_uploaded_file($_FILES['image']['tmp_name'], '../img/employee/' . $image);
	}
	$name = $_POST['name'];
	$spec = $_POST['spec'];
	$phone = $_POST['phone'];
	$mail = $_POST['mail'];
	$address = $_POST['address'];
	$map = $_POST['map'];
	$link = $_POST['link'];


	$mysql->query("INSERT INTO `employee` (`id_employee`, `name_employee`, `image_employee`, `specialization_employee`) VALUES (NULL, '$name', '$image', '$spec');");

	$result = $mysql->query("SELECT * FROM `employee` ORDER BY `employee`.`id_employee` DESC");
	$row = $result->fetch_assoc();
	$id_employee_last = $row['id_employee'];


	$mysql->query("INSERT INTO `employee_contacts` (`id_contacts`, `id_employee`, `contacts_phone`, `contacts_email`, `contacts_address`, `contacts_location`, `employee_link`) VALUES (NULL, '$id_employee_last', '$phone', '$mail', '$address', '$map', '$link');");

	header("Location: ./employee.php");
}

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
					<h3>Додати спеціаліста</h3>
				</div>

				<div class="questions__column">
					<form action="./employeeAdd.php" method="post" class="question__form" enctype="multipart/form-data">
						<label for="fileServices">Зображення (формат .webm або .jpg/.jpeg)</label>
						<?php
						if (isset($_SESSION['error_validata_image_employee'])) {
							echo '<div class="invalidate__message"><p>' . $_SESSION['error_validata_image_employee'] . '</p></div>';
							unset($_SESSION['error_validata_image_employee']);
						}
						?>
						<input type="file" name="image" required>

						<label for="text" class="question__label">ФИО:</label>
						<input type="text" name="name" class="question__title" required>

						<label for="text" class="question__label">Спеціалізація:</label>
						<input type="text" name="spec" class="question__title" required>

						<label for="text" class="question__label">Номер телефону:</label>
						<input type="text" name="phone" class="question__title" required>

						<label for="text" class="question__label">Елктрона скринька:</label>
						<input type="text" name="mail" class="question__title" required>

						<label for="text" class="question__label">Місце роботи:</label>
						<input type="text" name="address" class="question__title" required>

						<label for="text" class="question__label">Гіперпосилання на Google Map:</label>
						<input type="text" name="map" class="question__title" required>

						<label for="text" class="question__label">Гіперпосилання на Golaw:</label>
						<input type="text" name="link" class="question__title" required>

						<button class="questions__button">Додати</button>
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