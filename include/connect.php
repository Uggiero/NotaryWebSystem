<?php
session_start();

$mysql = new mysqli("localhost", "root", "", "notary");

if (!$mysql)
	die('Database connecting error!');

$mysql->query("SET NAMES 'utf8'");
