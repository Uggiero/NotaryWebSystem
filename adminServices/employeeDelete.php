<?php
require_once '../include/connect.php';

$id_employee = $_POST['newsDelete'];

$result = $mysql->query("SELECT * FROM `employee`,`employee_contacts`  WHERE `employee`.`id_employee` = `employee_contacts`. `id_employee` and `employee`.`id_employee` = $id_employee");
$row = $result->fetch_assoc();

unlink("../img/employee/" . $row['image_employee']);

$mysql->query("DELETE FROM `employee_services` WHERE `id_employee` = $id_employee");
$mysql->query("DELETE FROM `employee_contacts` WHERE `id_employee` = $id_employee");
$mysql->query("DELETE FROM `employee` WHERE `id_employee` = $id_employee");

require_once '../include/reconnect.php';
header("Location: ./employee.php");
