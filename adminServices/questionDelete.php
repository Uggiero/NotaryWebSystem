<?php
require_once '../include/connect.php';

$id_question = $_POST['questionDelete'];
$mysql->query("DELETE FROM `questions` WHERE `id_question` = '$id_question'");

require_once '../include/reconnect.php';
header("Location: ./question.php");
