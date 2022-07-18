<!DOCTYPE html>
<html lang="ua">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Merriweather:wght@700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/adaptiv.css">
	<link rel="shortcut icon" href="./img/logo.jpg" type="image/x-icon">
	<title>Приватний Нотаріус</title>
</head>

<body>
	<div class="wrapper">
		<?php
		require_once './include/connect.php';
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
							<li class="active header__list"><a href="./index.php" class="nav__link">Головна</a></li>
							<li class="header__list"><a href="#employee" class="yakor nav__link">Спеціалісти</a></li>
							<li class="header__list"><a href="#services" class="yakor nav__link">Послуги</a></li>
							<li class="header__list"><a href="#news" class="yakor nav__link">Нотаріус Консультує</a></li>
							<li class="header__list"><a href="#conatcts" class="yakor nav__link">Контакти</a></li>
						</div>
					</div>
				</div>
			</div>
		</header>

		<main class="main">
			<div class="main__slider">
				<div class="slider">
					<div class="slider__item slider__item-first">
						<div class="slider__main first">
							<div class="slider__title">Юридична допомога</div>
							<div class="slider__text ">Ми - провідна українська юридична фірма, що працює за міжнародними стандартами. Фірма неодноразово була високо відмічена провідними українськими та міжнародними рейтингами, серед яких The Legal 500 EMEA, Chambers & Partners, IFLR 1000, Best Lawyers, Who is Who Legal, «Юридична премія» тощо. Протягом останніх восьми років, входим до ТОП-10 кращих юридичних фірм України.
							</div>
						</div>
					</div>
					<div class="slider__item slider__item-second">
						<div class="slider__main second">
							<div class="slider__title">Юридична компанія працює з наступними практиками:</div>
							<div class="slider__text">
								<li>Вирішення судових спорів</li>
								<li>Кримінальне право</li>
								<li>Податкове право</li>
								<li>Корпоративне право та M&A</li>
								<li>Банківське та фінансове право</li>
								<li>Відновлення платоспроможності та банкрутство</li>
								<li>Трудове право</li>
								<li>Реструктуризація та врегулювання проблемної заборгованості</li>
							</div>
						</div>
					</div>
					<div class="slider__item slider__item-third">
						<div class="slider__main second">
							<div class="slider__title">Юридична компанія працює з наступними сеторами економіки:</div>
							<div class="slider__text">
								<li>Авіація</li>
								<li>Агробізнес</li>
								<li>Будівництво і нерухомість</li>
								<li>Виробництво та промисловість</li>
								<li>Енергетика і природні ресурси</li>
								<li>Інформаційні технології</li>
								<li> Медицина та фармацевтика</li>
								<li>Медіа та телекомунікації</li>
								<li>Ритейл та FMCG</li>
								<li>Транспорт та інфраструктура</li>
							</div>
						</div>
					</div>

				</div>
				<div class="slider__dots"></div>
			</div>
			<div class="container">
				<div class="main__employee" id="employee">
					<div class="employee__title title">Наші спеціалісти</div>
					<div class="employee__items">
						<?php
						$result = $mysql->query("SELECT * FROM `employee`, `employee_contacts` WHERE `employee`.`id_employee` = `employee_contacts`.`id_employee`");
						while ($row = $result->fetch_assoc()) {
						?>
							<div class="employee__item">
								<div class="employee__image"><img src="./img/employee/<?php echo $row['image_employee'] ?>" alt=""></div>
								<div class="employee__name"><?php echo $row['name_employee'] ?></div>
								<div class="employee__spec"><?php echo $row['specialization_employee'] ?></div>
								<div class="employee__more">
									<div class="employee__contacts">
										<div class="contacts__phone"><a href="tel:<?php echo $row['contacts_phone'] ?>"><img src="./img/phone.svg" alt=""></a></div>
										<div class="contacts__mail"><a href="mailto:<?php echo $row['contacts_email'] ?>"><img src="./img/mail.svg" alt=""></a></div>
										<div class="contacts__location"><a href="<?php echo $row['contacts_location'] ?>" target="_blank"><img src="./img/location.svg" alt=""></a></div>
									</div>
									<div class="employee__download"><a href="<?php echo $row['employee_link'] ?>" class="download__link"><img src="./img/ArrowDown.svg" alt=""></a></div>
								</div>
								<form action="#services" class="employee__select" method="GET">
									<button type="submit" class="select__button" name="button_search" value="<?php echo $row['id_employee'] ?>">
										<p>Обрати спеціаліста</p>
									</button>
								</form>
							</div>
						<?php
						}
						?>
					</div>
				</div>
				<div class="main__services" id="services">
					<div class="services__title title">ПОСЛУГИ</div>
					<div class="services__search">
						<div class="services__subtitle subtitle">Знайти послугу</div>
						<form action="#services" class="search__row" method="GET">
							<input type="text" placeholder="Введіть назву послуги" class="search__input" name="search">
							<button type="submit" class="search__button"><img src="./img/zoom.svg" alt="Zoom">
							</button>
						</form>
					</div>
					<div class="services__subtitle subtitle">Надаємо всі види юридчних послуг!</div>
					<div class="services__items">
						<?php
						if (isset($_GET['search'])) {
							$like = $_GET['search'];
							$result = $mysql->query("SELECT * FROM `services` WHERE `title` LIKE '%$like%'");
						} else if (isset($_GET['button_search'])) {
							$id_search = $_GET['button_search'];
							$result = $mysql->query("SELECT * FROM `employee`, `employee_services`, `services`, `employee_contacts` WHERE `employee`.`id_employee` = `employee_services`.`id_employee` and `employee_services`.`id_services` = `services`.`id_services`and `employee`.`id_employee` = `employee_contacts`.`id_employee` and`employee`.`id_employee` = $id_search;");
						} else {
							$result = $mysql->query("SELECT * FROM `services`");
						}
						while ($row = $result->fetch_assoc()) {
						?>
							<div class="services__item">
								<div class="services__image"><img src="../img/<?php echo $row['logo_image'] ?>" alt=""></div>
								<form action="./services/maketServices.php" method="post">
									<button class="services__label" value="<?php echo $row['id_services'] ?>" name="servicesButton"><?php echo $row['title'] ?></button>
								</form>
							</div>
						<?php
						}
						?>
					</div>
					<div class="services__order">
						<div class="order__button">Замовити послугу</div>
						<a href="./index.php#services" class="filtr__link">
							<div class="filtr__button"> Прибрати фільтр</div>
						</a>
					</div>
				</div>

				<div class="main__contacts" id="conatcts">
					<div class="contacts__title">Контакти головного офісу</div>
					<div class="contacts__row">
						<div class="contacts__cloumn">
							<div class="contacts__phones">
								<span class="contacts__subtitle">Контактні номери телефонів</span>
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
							<div class="contacts__online">
								<span class="contacts__subtitle">Онлайн контакти головного офісу</span>
								<?php
								$result = $mysql->query("SELECT * FROM mail");
								while ($row = $result->fetch_assoc()) {
								?>
									<div class="social__mail" style='background: url(" ../img/<?php echo $row['logo_mail']; ?>") 0 center no-repeat;'><a href="<?php echo $row['address_mail']; ?>"><?php echo $row['name_mail']; ?></a></div>
								<?php
								}
								?>
							</div>
							<div class="contacts__adress">
								<span class="contacts__subtitle">Адреса головного офісу</span>
								<?php
								$result = $mysql->query("SELECT * FROM `addres`");
								while ($row = $result->fetch_assoc()) {
									if ($row['id_address'] > 1 && $row['id_address'] < 5) {
										echo '<span>' . $row['value_address'] . '</span>';
									}
									if ($row['id_address'] == 5)
										echo '<span class="contacts__busstop">' . $row['value_address'] . '</span>';
								} ?>
							</div>
							<div class="contacts__jobtime">
								<span class="contacts__subtitle">Графік роботи</span>
								<?php
								$result = $mysql->query("SELECT * FROM `jobtime`");
								while ($row = $result->fetch_assoc()) {
								?>
									<span><?php echo $row['jobtime'] ?></span>
								<?php } ?>
							</div>
						</div>
						<div class="contacts__map" id="map">
						</div>
					</div>
				</div>

				<div class="main__questions">
					<div class="questions__title title">Питання - Відповідь</div>
					<div class="questions__items">
						<?php
						$result = $mysql->query("SELECT * FROM questions");
						while ($row = $result->fetch_assoc()) {
						?>
							<div class="questions__item">
								<div class="questions__subtitle subtitle"><?php echo $row['title'] ?></div>
								<div class="questions__image"><img src="img/more.svg" alt=""></div>
								<div class="questions__image-active"><img src="img/moreClick.svg" alt=""></div>
								<div class="questions__text "><?php echo $row['text'] ?>
								</div>
							</div>
						<?php
						} ?>
					</div>
				</div>

				<div class="main__news" id="news">
					<div class="news__title">Новини</div>
					<div class="news__items">
						<?php
						$result = $mysql->query("SELECT * FROM news");
						while ($row = $result->fetch_assoc()) {
						?>
							<div class="news__item">
								<div class="news__image"><img src="./img/News/<?php echo $row['news_image'] ?>" alt="">
								</div>
								<div class="news__subtitle"><span><?php echo $row['news_title'] ?></span> </div>
								<div class="news__buttons">
									<a href="./img/News/<?php echo $row['news__file'] ?>" class="news__link" target="_blank">
										<div class="news__click">Переглянути</div>
									</a>
									<a href="./img/News/<?php echo $row['news__file'] ?>" class="news__link" download="1">
										<div class="news__click">Завантажити</div>
									</a>
								</div>
							</div>
						<?php
						} ?>
					</div>
					<div class="news__more">
						<div class="news__button" onclick="more();">Усі новини</div>
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
								?>
							</div>
							<div class="header__phone footer__phone">
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
						</div>
						<div class="footer__column">
							<div class="footer__jobtime">
								<?php
								$result = $mysql->query("SELECT * FROM `jobtime`");
								while ($row = $result->fetch_assoc()) {
								?>
									<span><?php echo $row['jobtime'] ?></span>
								<?php } ?>
							</div>
							<div class="header__mail footer__mail">
								<?php
								$n = 0;
								$result = $mysql->query("SELECT * FROM `mail` WHERE `id_mail` = 3");
								while ($row = $result->fetch_assoc()) {
								?>
									<a href="mailto:<?php echo $row['address_mail'] ?>" target="_blank"><?php echo $row['address_mail'] ?></a>
								<?php
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

		<div class="link__top"><img src="./img/arrow-link.svg" alt=""></div>

	</div>
	<div id="popup" class="popup">
		<div class="popup__body">
			<div class="popup__content">
				<a href="#" class="popup__close close__popup">X</a>
				<div class="popup__title">Наші спеціалісті Вам допоможуть</div>
				<form action="./include/sendmail.php" method="POST" class="popup__form">
					<input type="text" name="name" placeholder="Ваше Ім'я*" class="_req form__input">
					<input type="text" name="phone" placeholder="Ваш номер телефону">
					<input type="text" name="email" placeholder="Ваш електронна адреса*" class="_req _email form__input">
					<textarea name="text" cols="49" rows="6" placeholder="Ваше повідомлення"></textarea>
					<button type="submit" class="order__button ">Відправити</button>
				</form>
			</div>
		</div>
	</div>

	<?php
	require_once './include/reconnect.php';
	?>


	<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
	<script src="./js/jquery.js"></script>
	<script src="./js/slick.min.js"></script>
	<script src="./js/script.js"></script>
</body>

</html>