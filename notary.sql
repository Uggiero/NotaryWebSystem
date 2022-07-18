-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 14 2022 г., 14:15
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `notary`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addres`
--

CREATE TABLE `addres` (
  `id_address` int NOT NULL,
  `value_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `addres`
--

INSERT INTO `addres` (`id_address`, `value_address`) VALUES
(1, 'https://www.google.com/maps/place/%D1%83%D0%BB.+%D0%90%D0%BA%D0%B0%D0%B4%D0%B5%D0%BC%D0%B8%D0%BA%D0%B0+%D0%97%D0%B0%D0%B1%D0%BE%D0%BB%D0%BE%D1%82%D0%BD%D0%BE%D0%B3%D0%BE,+39,+%D0%9E%D0%B4%D0%B5%D1%81%D1%81%D0%B0,+%D0%9E%D0%B4%D0%B5%D1%81%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+65000/@46.5784043,30.7940837,1650m/data=!3m1!1e3!4m5!3m4!1s0x40c624d4ef9b5053:0xa732b3fb0105046!8m2!3d46.5780939!4d30.7939441'),
(2, '65050, м. Одеса'),
(3, 'вул. Ак. Заболотного,'),
(4, 'буд. 39, кв. 2'),
(5, 'зупинка: вул. Заболотного');

-- --------------------------------------------------------

--
-- Структура таблицы `authorization`
--

CREATE TABLE `authorization` (
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `authorization`
--

INSERT INTO `authorization` (`login`, `password`) VALUES
('admin', '200ceb26807d6bf99fd6f4f0d1ca54d4');

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `id_employee` int NOT NULL,
  `name_employee` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_employee` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `specialization_employee` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id_employee`, `name_employee`, `image_employee`, `specialization_employee`) VALUES
(1, 'ПАВЛО ЛОГІНОВ', 'employee01.jpg', 'Партнер, керівник практики вирішення судових спорів, адвокат '),
(2, 'СЕРГІЙ ОБЕРКОВИЧ', 'employee02.jpg', 'Партнер, керівник практики кримінального права, адвокат'),
(3, 'ВАЛЕНТИН ГВОЗДІЙ', 'employee03.jpg', 'Старший партнер, адвокат'),
(4, 'ІРИНА КАЛЬНИЦЬКА', 'employee04.jpg', 'Партнер, керівник практики податкового права, практики реструктуризації та врегулювання проблемної заборгованості, адвокат');

-- --------------------------------------------------------

--
-- Структура таблицы `employee_contacts`
--

CREATE TABLE `employee_contacts` (
  `id_contacts` int NOT NULL,
  `id_employee` int NOT NULL,
  `contacts_phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contacts_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contacts_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contacts_location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `employee_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `employee_coord_x` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `employee_coord_y` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `employee_contacts`
--

INSERT INTO `employee_contacts` (`id_contacts`, `id_employee`, `contacts_phone`, `contacts_email`, `contacts_address`, `contacts_location`, `employee_link`, `employee_coord_x`, `employee_coord_y`) VALUES
(1, 1, '+380661012157', 'vasiliyivanchuk@gmail.com', 'Instytutska Street, 19B Kyiv, Ukraine 01021', 'https://www.google.com/maps?q=Instytutska+Street,+19B+Kyiv,+Ukraine+01021&um=1&ie=UTF-8&sa=X&ved=2ahUKEwjJio3G_Y74AhWEyYsKHeyqCuoQ_AUoAXoECAEQAw', 'https://golaw.ua/wp-content/uploads/2015/06/valentyn-gvozdiy.vcf', '50.4455468', '30.5306706'),
(2, 2, '+380993247865', 's.oberkovich@gamil.com', 'Starokozatska Street, 69 Dnipro oblast, Ukraine 49000', 'https://www.google.com/maps/place/Starokozatska+St,+69,+%D0%94%D0%BD%D1%96%D0%BF%D1%80%D0%BE%CC%81,+Dnipropetrovs`ka+oblast,+49000/@48.4691402,35.0218935,17z/data=!3m1!4b1!4m5!3m4!1s0x40dbe2fbf785bd0f:0x719b2626484ef7ed!8m2!3d48.4691402!4d35.0240822', 'https://golaw.ua/wp-content/uploads/2015/06/pavlo-loginov.vcf', '', ''),
(3, 3, '+380661022258', 'v.gvozdiy@gmail.com', 'Leonida Bykova Street, 7 Kharkiv, Ukraine 61000', 'https://www.google.com/maps/place/Leonida+Bykova+St,+7,+Kharkiv,+Kharkivs\'ka+oblast,+61000/@49.9847568,36.3025578,17z/data=!3m1!4b1!4m5!3m4!1s0x41270a12078a0831:0x863e5a786cd12e2e!8m2!3d49.9847568!4d36.3047465', 'https://golaw.ua/wp-content/uploads/2015/06/max-lebedev.vcf', '', ''),
(4, 4, '+380993332222', 'i.kallnicka@gmail.com', 'Bohdana Khmel\'nyts\'koho Street, 10 Odesa, Ukraine 65000', 'https://www.google.com/maps/place/Bohdana+Khmel\'nyts\'koho+St,+10,+Odesa,+Odes\'ka+oblast,+65000/@46.4704717,30.723751,17z/data=!3m1!4b1!4m5!3m4!1s0x40c63186528b782d:0x49a7d447b105d8bc!8m2!3d46.4704717!4d30.7259397', 'https://golaw.ua/wp-content/uploads/2015/06/kateryna-manoylenko.vcf', '46.4704717', '30.7259397');

-- --------------------------------------------------------

--
-- Структура таблицы `employee_services`
--

CREATE TABLE `employee_services` (
  `id_services` int NOT NULL,
  `id_employee` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `employee_services`
--

INSERT INTO `employee_services` (`id_services`, `id_employee`) VALUES
(1, 1),
(6, 1),
(6, 2),
(2, 2),
(6, 3),
(1, 3),
(2, 4),
(3, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `jobtime`
--

CREATE TABLE `jobtime` (
  `id_jobtime` int NOT NULL,
  `jobtime` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `jobtime`
--

INSERT INTO `jobtime` (`id_jobtime`, `jobtime`) VALUES
(1, 'пн-пт 9:00 - 18:00'),
(2, 'сб-нд 10:00 - 16:00');

-- --------------------------------------------------------

--
-- Структура таблицы `location`
--

CREATE TABLE `location` (
  `id_location` int NOT NULL,
  `location_index` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location_sreet` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location_apartment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location_busstop` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `locaton_link` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `location`
--

INSERT INTO `location` (`id_location`, `location_index`, `location_sreet`, `location_apartment`, `location_busstop`, `locaton_link`) VALUES
(1, '65050, м. Одеса', 'вул. Ак. Заболотного,', 'буд. 39, кв. 2', 'зупинка: вул. Заболотного', 'https://www.google.com/maps/place/%D1%83%D0%BB.+%D0%90%D0%BA%D0%B0%D0%B4%D0%B5%D0%BC%D0%B8%D0%BA%D0%B0+%D0%97%D0%B0%D0%B1%D0%BE%D0%BB%D0%BE%D1%82%D0%BD%D0%BE%D0%B3%D0%BE,+39,+%D0%9E%D0%B4%D0%B5%D1%81%D1%81%D0%B0,+%D0%9E%D0%B4%D0%B5%D1%81%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+65000/@46.5784043,30.7940837,1650m/data=!3m1!1e3!4m5!3m4!1s0x40c624d4ef9b5053:0xa732b3fb0105046!8m2!3d46.5780939!4d30.7939441');

-- --------------------------------------------------------

--
-- Структура таблицы `mail`
--

CREATE TABLE `mail` (
  `id_mail` int NOT NULL,
  `name_mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo_mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address_mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `mail`
--

INSERT INTO `mail` (`id_mail`, `name_mail`, `logo_mail`, `address_mail`) VALUES
(1, 'Facebook', 'face.svg', 'https://www.facebook.com/'),
(2, 'Viber', 'viber_hover.svg', 'https://www.viber.com/en/'),
(3, 'Email', 'post_hover.svg', 'notaryodessa39@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id_news` int NOT NULL,
  `news_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_title` varchar(555) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `news__file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_news`, `news_image`, `news_title`, `news__file`) VALUES
(1, 'notarialnyj-pereklad-dokumentiv.jpg', 'Все, що потрібно занати про, засвідчення вірності перекладу', 'pereklad_n.pdf'),
(2, 'shutterstock_237226525-1-920x600.jpg', 'Усе що потрібно знати, про спільне проживання.', 'спільне проживання.pdf'),
(3, '3.jpg', 'Як розпорядитися нерухомістю за життя.', 'Розпорядження житлом за життя.pdf'),
(4, '4.jpg', 'Договір позики грошей.', 'Позика.pdf');

-- --------------------------------------------------------

--
-- Структура таблицы `phone`
--

CREATE TABLE `phone` (
  `id_phone` int NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `phone`
--

INSERT INTO `phone` (`id_phone`, `phone_number`) VALUES
(1, '+38 066-666-66-66'),
(2, '+38 (099)-999-99-99');

-- --------------------------------------------------------

--
-- Структура таблицы `phpmailer`
--

CREATE TABLE `phpmailer` (
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `host` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `port` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `phpmailer`
--

INSERT INTO `phpmailer` (`username`, `password`, `host`, `port`) VALUES
('614c2de0d92b85', 'c76ec16852f69a', 'smtp.mailtrap.io', 2525);

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id_question` int NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id_question`, `title`, `text`) VALUES
(1, 'Які документи необхідно пред’явити для вчинення нотаріальних дій?', 'Для встановлення особи громадянина нотаріусу необхідно пред’явити <span>паспорт</span> у вигляді книжечки (з вклеєними фотографіями 25 та 45 років) або у вигляді ID картки, <span>довідку про присвоєння реєстраційного номера облікової картки платника податків, витяг (довідку) про реєстрацію місця проживання</span>. Крім того, для різних видів нотаріальних дій необхідно надавати різний перелік документів: \r\n<li><span>свідоцтво про народження дитини</span> – для засвідчення справжності підпису на заяві про згоди на виїзд дитини за кордон;</li> \r\n<li><span>документи, що посвідчують право власності на майно</span> – для посвідчення договорів відчуження нерухомого або рухомого майна;</li>\r\n<li><span>свідоцтво про шлюб</span> – для посвідчення договорів між подружжям;</li>\r\n<li><span>свідоцтво про смерть та документи</span>, що підтверджують родинні відносини, – для оформлення спадкових прав.</li>'),
(2, 'Чи приймає нотаріус документи через застосунок «ДІЯ»?', 'Законом України «Про нотаріат» передбачено встановлення особи громадянина, який звернувся для вчинення нотаріальної дії, за паспортом або іншим документом, що унеможливлює виникнення будь-яких сумнівів щодо особи громадянина. Е-паспорт, в свою чергу, є електронним відображенням інформації, яка міститься у паспорті. <span>Отже, е-паспорт, наданий через застосунок «ДІЯ», не може бути використаний нотаріусом для встановлення особи громадянина, який звернувся для вчинення нотаріальної дії.</span>\r\n'),
(3, 'Чи можна продовжити термін дії довіреності?', 'Згідно чинного законодавства строк довіреності встановлюється довірителем та зазначається безпосередньо в тексті довіреності. Після спливу строку довіреності представництво за довіреністю припиняється. <span>В разі необхідності довіритель може видати представнику нову довіреність на новий строк.</span>\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id_services` int NOT NULL,
  `logo_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `main_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `document` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id_services`, `logo_image`, `title`, `subtitle`, `main_image`, `text`, `document`) VALUES
(1, 'family.svg', 'Складання та посвідчення заповіту', 'Заповіт – це одностороння угода, в якій фізична особа розпоряджається щодо переходу прав на належне йому майно до інших осіб у разі його смерті. Обов\'язковими елементами цієї угоди є час та місце його укладення, а також підпис заповідача. У заповіті не повинно бути суперечливих розпоряджень або таких, які суперечать чинному законодавству', 'domovenist.webp', '<p>Заповіт складається у письмовій формі і підлягає обов\'язковому посвідченню нотаріусом або посадовими особами, які мають право посвідчувати заповіти відповідно до законодавства України.</p>\r\n<p>Для посвідчення заповіту необхідно встановити повну дієздатність громадянина. Тільки в цьому випадку особа має право заповідати своє майно або його частини одному або декільком фізичним або юридичним особам, державі, позбавляти права спадкоємства одного або декількох спадкоємців за законом, а також змінювати або скасовувати складений заповіт.</p>\r\n<p>Крім того, до заповітів, посвідчення яких прирівнюється до нотаріального, відносять заповіти військовослужбовців та інших громадян, які перебувають на лікуванні в лікарнях, санаторіях та інших стаціонарних лікувально-профілактичних установах, а також проживають у будинках для престарілих; заповіти учасників арктичних та інших розвідувальних експедицій; заповіти громадян, які перебувають на морських суднах; заповіти осіб, які перебувають у місцях позбавлення волі і т. д. Право посвідчувати такі заповіти мають головні лікарі, їх заступники по медичній частині, лікарі цих лікувально-профілактичних установ, командири військових частин, капітани суден, начальники місць позбавлення волі і т. д.</p>', '<li>Паспорт та довідка про присвоєння ідентифікаційного номеру заповідача.</li>'),
(2, 'contract.svg', 'Договір дарування земельної ділянки', 'У системі цивільно-правових договорів існує такий вид договірної конструкції, який опосередковує передачу майна у власність, а момент виникнення цього найбільш повного речового права у набувача визначається за правилом, яке також відрізняється від загальних положень про момент набуття права власності за договором. Ця конструкція має назву - договір дарування.', 'domovenist.webp', '<p>Особливий порядок передбачений щодо дарування нерухомих речей. Так, відповідно до частини другої статті 719 Цивільного кодексу України договір дарування нерухомої речі укладається у письмовій формі і підлягає нотаріальному посвідченню.\r\n</p>\r\n<p>При посвідченні договору дарування нотаріус встановлює особу учасників цивільних відносин, які звернулися за вчиненням нотаріальної дії, та визначається обсяг їх цивільної дієздатності.</p>\r\n<p>Договір дарування посвідчується за умови подання документів, що підтверджують право власності на майно, що відчужується.</p>\r\n<p>Крім того, при посвідченні договору дарування жилого будинку, квартири, дачі, садового будинку, гаража, земельної ділянки, іншого нерухомого майна нотаріусом перевіряється відсутність заборони відчуження або арешту майна.\r\n</p>\r\n<p>Водночас слід зазначити, що при укладенні договорів дарування нерухомості необхідно дотримуватись спеціальних правил при даруванні майна, що є спільною власністю (майно подружжя, набуте ними під час шлюбу). Відповідно до частини другої статті 369 Цивільного кодексу України розпоряджання таким майном здійснюється лише за згодою всіх співвласників. Така згода, у випадку вчинення правочину шляхом дарування нерухомого майна щодо розпорядження спільним майном має бути висловлена письмово і нотаріально посвідчена (стаття 65 Сімейного кодексу України).</p>\r\n<p>Якщо у згоді на відчуження спільного майна вказано, кому персонально (прізвище, ім\'я, по батькові фізичної особи, найменування юридичної особи) він погоджується подарувати спільно набуте майно, чи інші умови укладення договору, нотаріус при посвідченні такого договору зобов\'язаний перевірити додержання умов, зазначених у такій згоді.</p>', '<li>Паспорта сторін, довідки про присвоєння ідентифікаційного номеру;</li>\r\n<li>Документ, що підтверджує право власності на відчужуване майно;</li>\r\n<li>Витяг з технічної документації про визначення нормативної грошової оцінки земельної ділянки, виданий управлінням земельних ресурсів;</li>\r\n<li>Витяг з бази даних автоматизованої системи ведення державного земельного кадастру (для відчуження земельної ділянки</li>\r\n<li>Заява про згоду дружини (чоловіка) \"Дарувальника\" на відчуження земельної ділянки, якщо вона була придбана в період зареєстрованого шлюбу (оформлюється нотаріально)</li>\r\n<li>Свідоцтво про реєстрацію шлюб.</li>'),
(3, 'ring.svg', 'Шлюбний договір', 'Шлюбний договір може включати низку різних питань, але в основному передбачає визначення майнових прав подружжя в разі розірвання шлюбу.', 'domovenist.webp', '<p>Поняття шлюбного договору у світі існує дуже давно. В нашій країні інститут шлюбного контракту з\'явився в 1992 році з внесенням доповнень до Кодексу про шлюб та сім\'ю статтею 271.</p>\r\n<p>Сьогодні понятті, зміст, правила укладання шлюбного договору визначені главою 10 Сімейного кодексу України, який набув чинності 1 січня 2004 року.Великого поширення в Україні такі договори поки не набули. Так, у 2004 році було посвідчено 476 шлюбних договорів, у 2005 році їх кількість збільшилась до 687. Найбільше шлюбних договорів (218) у 2005 році посвідчено в місті Києві.Чому не має великого інтересу до таких договорів? Можливо менталітет наш такий. Певно, в нас переважають почуття над розумом - так велось з діда-прадіда. Наречені або подружжя, можливо, остерігаються образити почуття менкартильними питаннями.Необхідно розуміти, що шлюбний договір – це, перш за все, договір про вирішення спірних питань життя сім\'ї, укладений між особами які вступають у шлюб, або подружжям.</p>', ''),
(4, 'house.svg', 'Договір дарування будинку', 'За договором дарування дарувальник передає або зобов`язується передати в майбутньому обдаровуваному безоплатно майно (дарунок) у власність. Як оформити договір дарування будинку читайте нижче.', 'sliderImage.webp', '<p>Договір дарування, як і договір купівлі-продажу, спрямований на припинення права власності у дарувальника й виникнення права власності в обдарованої особи з тією лише різницею, що договір дарування завжди є безоплатним, а тому дарувальник не має права вимагати від обдарованої особи зустрічних дій. Тому чинне законодавство чітко обумовлює, що договір, який встановлює обов`язок обдаровуваного вчинити на користь дарувальника будь-яку дію майнового або немайнового характеру, не є договором дарування.</p>', '<li>Паспорта сторін, довідки про присвоєння ідентифікаційного номеру;</li>\r\n<li>Документ, що підтверджує право власності на відчужуване майно (Свідоцтво про право власності, договір купівлі-продажу, договір дарування, свідоцтво про право на спадщину, тощо);</li>\r\n<li>Витяг з реєстру прав власності на нерухоме майно, виданий державним бюро технiчної інвентаризації (для відчуження);</li>'),
(5, 'Layer_9.svg', 'Засвідчення підпису на заявах', 'Засвідчення справжності підпису на документах – дія, поширена в нотаріальної практиці. Суть цієї нотаріальної дії полягає в тому, що нотаріус лише підтверджує, що підпис на певному документі зроблено саме тією особою, яка звернулась до нотаріуса.', 'domovenist.webp', '<p>Нотаріус, посадова особа органу місцевого самоврядування засвідчують справжність підпису на документах, зміст яких не суперечить законові і які не мають характеру угод та не містять у собі відомостей, що порочать честь і гідність людини.\r\n\r\nНа угоді може бути засвідчена справжність підпису особи, що підписалась за іншу особу, яка не могла це зробити власноручно внаслідок фізичної вади, хвороби або з інших поважних причин.\r\n\r\nНотаріус засвідчуючи справжність підпису, не посвідчують факти, викладені у документі, а лише підтверджує, що підпис зроблено певною особою.</p>', ''),
(6, 'Tilda_Icons_28_law_fine.svg', 'Договір купівлі-продажу земельної ділянки', 'Договір купівлі-продажу землі — це цивільно-правова угода, за якою од­на сторона (продавець) передає або зобов`язується передати земельну ділян­ку у власність іншій стороні (покупцеві), а покупець приймає або зобов`язу­ється прийняти земельну ділянку і сплатити за неї певну грошову суму.', 'sliderImage02.webp', '<p>Право власності на землю - це право володіти, користуватися і розпоряджатися земельними ділянками.\r\n\r\nПраво власності на землю набувається та реалізується на підставі Конституції України, цього Кодексу, а також інших законів, що видаються відповідно до них.\r\n\r\nЗемля в Україні може перебувати у приватній, комунальній та державній власності.\r\n\r\nЗемельна ділянка як об`єкт права власності\r\n\r\nЗемельна ділянка - це частина земної поверхні з установленими межами, певним місцем розташування, з визначеними щодо неї правами.\r\n\r\nПраво власності на земельну ділянку поширюється в її межах на поверхневий (ґрунтовий) шар, а також на водні об`єкти, ліси і багаторічні насадження, які на ній знаходяться, якщо інше не встановлено законом та не порушує прав інших осіб.\r\n\r\nПраво власності на земельну ділянку розповсюджується на простір, що знаходиться над та під поверхнею ділянки на висоту і на глибину, необхідні для зведення житлових, виробничих та інших будівель і споруд.</p>', '<li>Паспорта сторін, довідки про присвоєння ідентифікаційного номеру</li>\r\n<li>Экспертно-грошова оцінка (для відчуження земельної ділянки);</li>\r\n<li>Заява про згоду дружини (чоловіка) \"Продавця\" на відчуження земельної ділянки, якщо вона була придбана в період зареєстрованого шлюбу(оформлюється нотаріально)</li>');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Индексы таблицы `employee_contacts`
--
ALTER TABLE `employee_contacts`
  ADD PRIMARY KEY (`id_contacts`),
  ADD UNIQUE KEY `contacts_phone` (`contacts_phone`),
  ADD UNIQUE KEY `contacts_email` (`contacts_email`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Индексы таблицы `employee_services`
--
ALTER TABLE `employee_services`
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_services` (`id_services`);

--
-- Индексы таблицы `jobtime`
--
ALTER TABLE `jobtime`
  ADD PRIMARY KEY (`id_jobtime`);

--
-- Индексы таблицы `location`
--
ALTER TABLE `location`
  ADD KEY `id_location` (`id_location`);

--
-- Индексы таблицы `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id_mail`);

--
-- Индексы таблицы `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id_phone`),
  ADD KEY `id_phone` (`id_phone`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `employee_contacts`
--
ALTER TABLE `employee_contacts`
  MODIFY `id_contacts` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `jobtime`
--
ALTER TABLE `jobtime`
  MODIFY `id_jobtime` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `mail`
--
ALTER TABLE `mail`
  MODIFY `id_mail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employee_contacts`
--
ALTER TABLE `employee_contacts`
  ADD CONSTRAINT `employee_contacts_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `employee_services`
--
ALTER TABLE `employee_services`
  ADD CONSTRAINT `employee_services_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `employee_services_ibfk_2` FOREIGN KEY (`id_services`) REFERENCES `services` (`id_services`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
