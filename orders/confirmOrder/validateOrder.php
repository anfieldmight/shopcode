<?php
require_once "../../app.php";



$query = "INSERT INTO `orders` (
                    `first_name`, 
                    `last_name`,  
                    `email`,
                    `phone`,
                    `address`,
                    `product_ids`,
                    `total_price`) 
                  VALUES (
                    ?,
                    ?,
                    ?, 
                    ?, 
                    ?,
                    ?,
                    ?);";

$stmt = $db->prepare($query);
if ($stmt->execute([$firstName, $lastName, $email, $phone, $address, $orderIds, $totalPrice])) {
    $_SESSION['message']= "Регистрацията успешна";
    $_SESSION['orderIds'] = [];
    $_SESSION['totalPrice'] = [];
    $_SESSION['allCartItems'] = [];
    header("Location: ../orderConfirmed/confirmed.php");

} else {
    $_SESSION['messageFormError']= "Unsuccessful order registration !!!";
}

