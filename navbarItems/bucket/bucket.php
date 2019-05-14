<?php

require_once "../../app.php";


    $currentOrderId = $_GET;

    $_SESSION['allCartItems'][] = $currentOrderId;
    foreach ($_SESSION['allCartItems'] as $key => $value) {
      if (count($value) !== 1) {
        unset($_SESSION['allCartItems'][$key]);
      }
    }
    $allCartItems = $_SESSION['allCartItems'];
    //print_r($allCartItems);
    //echo "''''''''''''''''''''";



if (isset($_GET['remove'])){
    $category = $_GET['type'];
    $id = $_GET['number'];
    foreach ($allCartItems as $key1=>$item){
        foreach ($item as $key=>$value){
            if ($key == $category && $value == $id){
                unset($allCartItems[$key1]);
                unset($_SESSION['allCartItems'][$key1]);
                break 2;
            }
        }
    }
}
    $totalPrice = 0;
    $orderIds = '';
    foreach ($allCartItems as $item){
        foreach ($item as $key=>$value){
            switch ($key){
                case 1 :
                    $key = 'personal_computers';
                    break;
                case 2 :
                    $key = 'monitors';
                    break;
                case 3:
                    $key = "phones";
                    break;
                case 4:
                    $key = 'laptops';
                    break;
            }
            if(($db->query("SELECT * FROM $key WHERE id=$value", PDO::FETCH_ASSOC)) !== false) {
              $data[] = $db->query("SELECT * FROM $key WHERE id=$value", PDO::FETCH_ASSOC);
            }
        }
    }

include_once "bucket_frontend.php";

$_SESSION['orderIds'] = $orderIds;
$_SESSION['totalPrice'] = $totalPrice;
