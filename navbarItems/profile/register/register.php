<?php
require_once "../../../app.php";

$_SESSION['message']='';
$_SESSION['messageFormError']='';

if (isset($_POST['submitReg']))
{
    if (!empty($_POST['firstName'])&& !empty($_POST['lastName'])&& !empty($_POST['password'])&& !empty($_POST['confirm'])&& !empty($_POST['email'])&& !empty($_POST['phone'])&& !empty($_POST['address']))
    {
        if ($_POST['password'] == $_POST['confirm'])
        {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {

                //applying POST information
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                include_once "dbRegister.php";


            }else{
                $_SESSION['messageFormError'] = "Invalid email type";
            }
        }else
        {
            $_SESSION['messageFormError'] = "Passwords mismatch";
        }
    }else{
        $_SESSION['messageFormError'] = "NULL/Zero Value not allowed !";
    }
}












include_once "register_frontend.php";