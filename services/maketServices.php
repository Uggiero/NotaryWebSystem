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
	<link rel="stylesheet" href="../css/adaptiv.css">
	<link rel="shortcut icon" href="../img/logo.jpg" type="image/x-icon">
	<title>Приватний Нотаріус</title>
</head>

<body>
	<div class="wrapper">
		<?php
		$mysql = new mysqli("localhost", "root", "", "notary");
		$mysql->query("SET NAMES 'utf8'");
		?>
		<header class="header">
			<div class="container">
				<div class="header__body">
					<div class="header__logo">Юридичні послуги</div>
					<div class="header__burger"><span></span></div>
					<div class="header__information">
						<div class="header__top">
							<div class="header__phone">
								<?php
								$result = $mysql->query("SELECT * FROM phone");
								while ($row = $result->fetch_assoc()) {
									$char = ["!", " ", "(", ")", "-", "+"];
									$number = str_replace($char, "", $row['phone_number']);
								?>
									<a href="tel:+<?php echo $number ?>"><?php echo $row['phone_number'] ?></a>
								<?php
								}
								?>
							</div>
							<div class="header__jobtime">
								<?php
								$n = 0;
								$result = $mysql->query("SELECT * FROM `jobtime`");
								while ($row = $result->fetch_assoc()) {
									if ($n < 2) {
										echo "<span>" . $row['jobtime'] . "</span>";
										$n++;
									}
								}
								?>
							</div>
							<div class="header__mail">
								<?php
								$result = $mysql->query("SELECT * FROM `mail` WHERE `id_mail` = 3");
								while ($row = $result->fetch_assoc()) {
								?>
									<a href="mailto:<?php echo $row['address_mail'] ?>" target="_blank"><?php echo $row['address_mail'] ?></a>
								<?php
								}
								?>
							</div>
							<div class="header__location">
								<?php
								$result = $mysql->query("SELECT * FROM `addres`");
								while ($row = $result->fetch_assoc()) {
									if ($row["id_address"] == 1)
										$link = $row["value_address"];
								?>
									<a href='<?php echo $link; ?>' target="_blank">
										<span><?php if ($row['id_address'] == 3) echo $row['value_address']; ?></span>
										<span><?php if ($row['id_address'] == 4) echo $row['value_address']; ?></span>
									</a>
								<?php
								}
								?>
							</div>
						</div>
						<div class="header__nav">
							<li class="header__list"><a href="../index.php" class="nav__link">Головна</a></li>
							<li class="header__list"><a href="../index.php#employee" class="nav__link">Спеціалісти</a></li>
							<li class="header__list active"><a href="../index.php#services" class="yakor nav__link">Послуги</a></li>
							<li class="header__list"><a href="../index.php#news" class="yakor nav__link">Нотаріус Консультує</a></li>
							<li class="header__list"><a href="../index.php#conatcts" class="yakor nav__link">Контакти</a></li>
						</div>
					</div>
				</div>
			</div>
		</header>
		<main class="main">
			<?php
			$id = $_POST['servicesButton'];
			if ($mysql->connect_error) {
				echo 'Помилка, номер помилки - ' . $mysql->connect_errno . '<br>';
			} else {
				$result = $mysql->query("SELECT * FROM services WHERE `id_services` = $id");
				$row = $result->fetch_assoc()
			?>
				<div class="main__top " style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('../img/servicesImage/<?php echo $row['main_image'] ?>') center center/cover no-repeat;">
					<div class="container">
						<div class="top__title "><?php echo $row['title'] ?></div>
						<div class="top__subtitle "><?php echo $row['subtitle'] ?></div>
					</div>
				</div>
				<div class="container">
					<div class="main__article">
						<div class="article__text "><?php echo $row['text'] ?>
						</div>
						<div class="article__documnet">
							<div class="documnet__title">Перелік необхідних для оформлення документів:</div>
							<div class="documnet__text">
								<?php echo $row['document'] ?>
							</div>
						</div>
					</div>
				</div>
			<?php
			} ?>
			<div class="main__employee">
				<div class="container">
					<div class="documnet__title">Перелік спеціаліств, які надають данну послугу:</div>
					<div class="employee__items">
						<?php
						$result = $mysql->query("SELECT * FROM `employee`, `employee_contacts`, `employee_services` WHERE `employee`.`id_employee` = `employee_contacts`.`id_employee` AND `employee_services`.`id_employee` = `employee`.`id_employee` AND `employee_services`.`id_services` = '$id'");
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
									<div class="employee__download"><a href="<?php echo $row['employee_link'] ?>" class="download__link"><img src="../img/ArrowDown.svg" alt=""></a></div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</main>

		<footer class="footer">
			<div class="container">
				<div class="footer__body">
					<div class="footer__logo">
						<span>Юридичні послуги</span>
					</div>
					<div class="footer__information">
						<div class="footer__column">
							<div class="header__location footer__location">

								<?php
								$link = '#';
								$result = $mysql->query("SELECT * FROM `addres`");
								if ($result->num_rows < 1) {
									echo "В таблиці немає даних!";
								} else {
									while ($row = $result->fetch_assoc()) {
										if ($row['id_address'] == 1) {
											$link = $row['value_address'];
										}
										echo '<a href="' . $link . '" target="_blank">';
										if ($row['id_address'] > 1 && $row['id_address'] < 5) {
											echo '<span>' . $row['value_address'] . '</span>';
										}
										echo "</a>";
									}
								}
								?>
							</div>
							<div class="header__phone footer__phone">
								<?php
								$result = $mysql->query("SELECT * FROM phone");
								if ($result->num_rows < 1) {
									echo "В таблиці немає даних!";
								} else {
									while ($row = $result->fetch_assoc()) {
										$char = ["!", " ", "(", ")", "-", "+"];
										$number = str_replace($char, "", $row['phone_number']);
								?>
										<a href="tel:+<?php echo $number ?>"><?php echo $row['phone_number'] ?></a>
								<?php
									}
								}
								?>
							</div>
						</div>
						<div class="footer__column">
							<div class="footer__jobtime">
								<?php
								$result = $mysql->query("SELECT * FROM `jobtime`");
								if ($result->num_rows < 1) {
									echo "В таблиці немає даних!";
								} else {
									while ($row = $result->fetch_assoc()) {
								?>
										<span><?php echo $row['jobtime'] ?></span>
								<?php }
								} ?>
							</div>
							<div class="header__mail footer__mail">
								<?php
								$n = 0;
								$result = $mysql->query("SELECT * FROM `mail` WHERE `id_mail` = 3");
								if ($result->num_rows < 1) {
									echo "В таблиці немає даних!";
								} else {
									while ($row = $result->fetch_assoc()) {
								?>
										<a href="mailto:<?php echo $row['address_mail'] ?>" target="_blank"><?php echo $row['address_mail'] ?></a>
								<?php
									}
								} ?>
							</div>
						</div>

					</div>
				</div>
				<div class="footer__copyright">
					<div class="copyright__politic"> Використання матеріалів даного сайту дозволяється лише за
						згдою власника сайта.</div>
					<div class="copyright__copy">Copyright <span class="copyright__span"></span> © Усі права захищено.</div>
				</div>
			</div>
		</footer>
		<div class="link__top"><img src="../img/arrow-link.svg" alt=""></div>
		<?php
		$mysql->close();
		?>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/burger.js"></script>
</body>

</html>