<?php
require_once "app.php";


function resetID()
{
    $_SESSION['userId']='';

}

if (isset($_GET['resetid'])) {
    resetID();
}


//lastOffers
$lastOffers = [];
function getLastProducts ($category, $db){
    $twoItems = [];
    $data = $db->query("SELECT MAX(id) FROM $category;", PDO::FETCH_ASSOC);
    $lastId = $data->fetchAll(PDO::FETCH_ASSOC)[0]['MAX(id)'];
    $beforeLast = $lastId - 1;
    $query = $db->query("SELECT * FROM $category WHERE id = $lastId;", PDO::FETCH_ASSOC);
    $value = $query->fetchAll(PDO::FETCH_ASSOC)[0];
    $twoItems[] = $value;
    $query = $db->query("SELECT * FROM $category WHERE id = $beforeLast;", PDO::FETCH_ASSOC);
    $value = $query->fetchAll(PDO::FETCH_ASSOC)[0];
    $twoItems[] = $value;
    return $twoItems;
}
$lastOffers[] = getLastProducts("personal_computers", $db);
$lastOffers[] = getLastProducts("monitors", $db);
$lastOffers[] = getLastProducts("phones", $db);
$lastOffers[] = getLastProducts("laptops", $db);






include_once "index_frontend.php";
