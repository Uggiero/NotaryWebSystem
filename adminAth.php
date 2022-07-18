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
	<div class="wrapper">
		<div class="main">
			<div class="container">
				<div class="authorization__body">
					<div class="authorization__title">Авторизація</div>
					<form action="./include/signin.php" method="POST" class="authorization__form">
						<label for="login" class="authorization__label">Логін:</label>
						<input type="text" name="login" required class="authorization__input">
						<label for="password" class="authorization__label">Пароль(administrator):</label>
						<input type="password" name="password" require class="authorization__input">
						<?php
						if (isset($_SESSION['message_error_ath'])) {
							echo '<div class="authorization__message"><p>' . $_SESSION['message_error_ath'] . '</p></div>';
							unset($_SESSION['message_error_ath']);
						}
						?>
						<button class="authorization__button" type="submit">Увійти</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>