<?php
require "../include/connect.php";


$sort_services = $_POST['sort__select-services'];

if (isset($_POST['sort__select-employee'])) {
	$sort_name = $_POST['sort__select-employee'];
	if ($sort_name === "up") {
	}
}


require "../include/reconnect.php";
