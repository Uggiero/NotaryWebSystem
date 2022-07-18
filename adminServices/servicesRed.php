<?php
require_once '../include/connect.php';

$idRed = $_POST['btnReplace'];
$logoImage = $_FILES['fileServices']['name'];
$title = $_POST['titleServices'];
$subtitle = $_POST['subtitleMainServices'];
$text = $_POST['titleMainServices'];
$document = $_POST['documnetMainServices'];
$mainImage = $_FILES['fileMainServices']['name'];

$result = $mysql->query("SELECT * FROM services WHERE `id_services` = $idRed");
$row = $result->fetch_assoc();

if (!$logoImage) {
	$logoImage = $row['logo_image'];
} else if ($_FILES['fileServices']['type'] == 'image/svg+xml') {
	move_uploaded_file($_FILES['fileServices']['tmp_name'], '../img/' . $_FILES['fileServices']['name']);
}
if (!$mainImage) {
	$mainImage = $row['main_image'];
} else if ($_FILES['fileMainServices']['type'] == 'image/webp' || $_FILES['fileMainServices']['type'] == 'image/jpeg') {
	move_uploaded_file($_FILES['fileMainServices']['tmp_name'], '../img/servicesImage/' . $_FILES['fileMainServices']['name']);
}

$mysql->query("UPDATE services SET `logo_image` = '$logoImage', `title` = '$title',`subtitle`='$subtitle',`main_image`='$mainImage',`text`='$text',`document`='$document' WHERE `id_services` = '$idRed'");
header("Location: ./services.php");

require_once '../include/reconnect.php';
