<?php
require_once '../include/connect.php';

$idRed = $_POST['btnReplace'];
$logoImage = $_FILES['imageNews']['name'];
$title = $_POST['titleNews'];
$file = $_FILES['fileNews']['name'];

$result = $mysql->query("SELECT * FROM news WHERE `id_news` = $idRed");
$row = $result->fetch_assoc();



if (!$logoImage) {
	$logoImage = $row['news_image'];
} else if ($_FILES['imageNews']['type'] == 'image/webp' || $_FILES['imageNews']['type'] == 'image/jpeg') {
	move_uploaded_file($_FILES['imageNews']['tmp_name'], '../img/News/' . $_FILES['imageNews']['name']);
}

//!Что?
if (!$file) {
	$file = $row['news__file'];
} else if ($_FILES['fileNews']['type'] == "application/pdf") {
	move_uploaded_file($_FILES['fileNews']['tmp_name'], '../img/News/' . $_FILES['fileNews']['name']);
}

$mysql->query("UPDATE news SET `news_image` = '$logoImage', `news_title` = '$title', `news__file`='$file' WHERE `id_news` = '$idRed'");
header("Location: ./news.php");

require_once '../include/reconnect.php';
