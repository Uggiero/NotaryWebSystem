<?php
require_once '../include/connect.php';
$title = $_POST['title'];
$text = $_POST['text'];
$id = $_POST['btnReplace'];
echo $title . " -- " . $text . "--" . $id;
$mysql->query("UPDATE questions SET `title` = '$title', `text` = '$text' WHERE `id_question` = '$id'");
require_once '../include/reconnect.php';
header("Location: ./question.php");
