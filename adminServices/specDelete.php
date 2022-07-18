<?php
require_once '../include/connect.php';

$id_spec = $_POST['specDelete'];
$id_services = $_POST['oldServices'];

$mysql->query("DELETE FROM `employee_services` WHERE `id_services` = '$id_services' and `id_employee` = $id_spec");

require_once '../include/reconnect.php';
header("Location: ./spec.php");
