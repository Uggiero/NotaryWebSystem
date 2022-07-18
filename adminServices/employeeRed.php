<?php
require_once '../include/connect.php';
$id_red = $_POST['employeeRed'];

$result_employee = $mysql->query("SELECT * FROM `employee` WHERE `id_employee` = $id_red");
$row_employee = $result_employee->fetch_assoc();

$image = $_FILES['image']['name'];
if (!$image) {
	$image = $row_employee['image_employee'];
} else {
	unlink("../img/employee/" . $row_employee['image_employee']);
	$image = $_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], '../img/employee/' . $image);
}
$name = $_POST['name'];
$spec = $_POST['spec'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$address = $_POST['address'];
$map = $_POST['map'];
$link = $_POST['link'];

$mysql->query("UPDATE `employee` SET `name_employee` = '$name', `image_employee` = '$image',`specialization_employee` = '$spec' WHERE `employee`.`id_employee` = $id_red;");

$mysql->query("UPDATE `employee_contacts` SET `contacts_phone` = '$phone', `contacts_email` = '$mail',`contacts_address` = '$address', `contacts_location` = '$map', `employee_link` = '$link' WHERE `employee_contacts`.`id_employee` = $id_red;");

require_once '../include/reconnect.php';
header("Location: ./employee.php");
