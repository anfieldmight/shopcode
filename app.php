<?php
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 43200)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


$dbname = "herebuy";
$dbusername = "root";
$dbpassword = "";

$db = new PDO("mysql:host=localhost;dbname=$dbname;charset =utf8", $dbusername, $dbpassword);