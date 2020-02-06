<?php
session_start();

$host = "";
$user = "";
$password = "";
$database = "";
$port = "3306";
$charset = "utf8";

$db = mysqli_connect($host, $user, $password, $database, $port);

if (!$db) {
    die();
}

mysqli_set_charset($db, $charset);
