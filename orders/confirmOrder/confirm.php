<?php
require_once "../../app.php";



    $orderIds = $_SESSION['orderIds'];
    $totalPrice = $_SESSION['totalPrice'];
    $_SESSION['messageFormError']='';


if($_SESSION['userId']!=''){
    $userId = $_SESSION['userId'];
    $orderData = $db->query("SELECT * FROM users WHERE id = $userId;", PDO::FETCH_ASSOC);
    $value = $orderData->fetchAll(PDO::FETCH_ASSOC)[0];
}

if (isset($_POST['submit']))
{
    if (!empty($_POST['firstName'])&& !empty($_POST['lastName'])&& !empty($_POST['email'])&& !empty($_POST['phone'])&& !empty($_POST['address']))
    {




            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                //applying POST information
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                require_once "validateOrder.php";
            }else{
                $_SESSION['messageFormError'] = "Invalid email type !";
            }



    }else{
        $_SESSION['messageFormError'] = "NULL/Zero Value not allowed !";
    }
}














include_once "confirm_frontend.php";