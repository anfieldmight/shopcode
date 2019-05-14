<?php
require_once "../../app.php";



    //get last Id
    $data = $db->query("SELECT MAX(id) FROM orders;", PDO::FETCH_ASSOC);
    $lastId = $data->fetchAll(PDO::FETCH_ASSOC)[0]['MAX(id)'];

    //get order info about last id

    $orderData = $db->query("SELECT * FROM orders WHERE id = $lastId;", PDO::FETCH_ASSOC);
    $value = $orderData->fetchAll(PDO::FETCH_ASSOC)[0];
    $orderId = $value['id'];

    if (isset($_SESSION['userId']) && $_SESSION['userId']!=''){
        $userId = $_SESSION['userId'];

        $orderData = $db->query("SELECT * FROM users WHERE id = $userId;", PDO::FETCH_ASSOC);
        $thevalue = $orderData->fetchAll(PDO::FETCH_ASSOC)[0];
        $updateOrders = $thevalue['orders'];
        $updateOrders = $orderId. ", " . $updateOrders;
        //print_r($updateOrders);

        $sql="UPDATE users SET orders='".$updateOrders."' WHERE id = $userId";

        if ($db->query($sql)){


        }else{
            echo "ne stana";
        }
    }

    //print_r($value);

    $elements = explode(", ", $value['product_ids']);
    array_pop($elements);
    //print_r($elements);

    $orderedProductsForPrint = [];

    foreach ($elements as $value1){
        $data = explode("-", $value1);
        $category = $data[0];
        $id = $data[1];

        $data = $db->query("SELECT type FROM categories WHERE id = $category", PDO::FETCH_ASSOC);
        $categoryProduct = $data->fetchAll(PDO::FETCH_ASSOC)[0]['type'];

        $data = $db->query("SELECT * FROM $categoryProduct WHERE id = $id", PDO::FETCH_ASSOC);
        $theProductData = $data->fetchAll(PDO::FETCH_ASSOC)[0];

        $orderedProductsForPrint[] = $theProductData;




    }








include_once "confirmed_frontend.php";