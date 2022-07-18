<?php
require_once '../include/connect.php';

$id_services = $_POST['servicesDeleteBtn'];

$result = $mysql->query("SELECT * FROM `services` WHERE `id_services` = $id_services");
$row = $result->fetch_assoc();
unlink("../img/" . $row['logo_image']);

$mysql->query("DELETE FROM `employee_services` WHERE `id_services` = '$id_services'");
$mysql->query("DELETE FROM `services` WHERE `id_services` = '$id_services'");

require_once '../include/reconnect.php';
header("Location: ./services.php");
