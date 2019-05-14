<?php
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) &&
   (time() - $_SESSION['LAST_ACTIVITY'] > 43200)) {
    session_unset();
    session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();

$hostname = "localhost";
$dbname = "herebuy";
$charset = "utf8";
$dbusername = "root";
$dbpassword = "";

$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=$charset", $dbusername, $dbpassword);