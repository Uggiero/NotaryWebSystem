

<?php
require_once '../include/connect.php';

$id_employee = $_POST['specView'];
$id_services = $_POST['title__services'];
$id_services_old = $_POST['oldServices'];
echo $id_employee . "<br>" . $id_services;

$result = $mysql->query("UPDATE `employee_services` SET `id_services` = '$id_services' WHERE `id_services` = '$id_services_old' and `id_employee` = $id_employee");

require_once '../include/reconnect.php';
header("Location: ./spec.php");
