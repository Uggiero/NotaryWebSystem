<?php
require_once '../include/connect.php';

$id_news = $_POST['newsDelete'];

$result = $mysql->query("SELECT * FROM news WHERE `id_news` = $id_news");
$row = $result->fetch_assoc();
unlink("../img/News/" . $row['news_image']);
unlink("../img/News/" . $row['news__file']);

$mysql->query("DELETE FROM `news` WHERE `id_news` = '$id_news'");

require_once '../include/reconnect.php';
header("Location: ./news.php");
