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
				$result_employee = $mysql->query("SELECT * FROM `employee`");
				$result_services = $mysql->query("SELECT * FROM `services`");
				?>
				<div class="main__spec">
					<form class="spec__row" method="POST" action="./specAdd.php">
						<select class="spec_name " name="name__employee">
							<?php while ($row_employee = $result_employee->fetch_assoc()) { ?>
								<option value="<?php echo $row_employee['id_employee']; ?>" class="spec__option"><?php echo $row_employee['name_employee']; ?></option>
							<?php } ?>
						</select>
						<div class="select__sybol"></div>
						<select class="spec_title" name="title__services">
							<?php while ($row_services = $result_services->fetch_assoc()) { ?>
								<option value="<?php echo $row_services['id_services']; ?>"><?php echo $row_services['title']; ?></option>
							<?php } ?>
						</select>
						<button class="questions__button" name="specView">Додати</button>
					</form>
				</div>

				<div class="questions__btn">
					<a href="./spec.php">
						<div class="questions__btn-back">Назад</div>
					</a>
					<a href="../adminPanel.php">
						<div class="questions__btn-back">На головну</div>
					</a>
				</div>
			</div>
		</main>


		<?php
		if (isset($_POST['name__employee'])) {
			$id_employee = $_POST['name__employee'];
			$id_services = $_POST['title__services'];

			$result = $mysql->query("INSERT INTO `employee_services` (`id_services`, `id_employee`) VALUES ('$id_services', '$id_employee');");
			header("Location: ./spec.php");
		}
		require_once '../include/reconnect.php';

		?>

	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/mapscript.js"></script>
</body>

</html>

<?php
// require_once '../include/connect.php';

// $id_employee = $_POST['specView'];
// $id_services = $_POST['title__services'];

// $result = $mysql->query("INSERT INTO `employee_services` (`id_services`, `id_employee`) VALUES ('$id_services', '$id_employee');");

// require_once '../include/reconnect.php';
// header("Location: ./spec.php");
