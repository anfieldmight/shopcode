<?php
require_once "../../../app.php";

$_SESSION['saveChanges2']='';

if (isset($_POST['loginLog'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $db->prepare($query);
        if ($stmt->execute([$email])){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user){
                $passwordHash = $user['password'];
                if (password_verify($password,$passwordHash)){
                    $_SESSION['userId']=$user['id'];
                    header("Location: ../profilepage/profilepage.php");
                    exit;
                }else{
                    $_SESSION['loginMessage']="Грешна парола!!";
                }
            }else{
                $_SESSION['loginMessage']="Не съществуващ имейл!";
            }

        }else{
            $_SESSION['loginMessage']="Опитай отново!";
        }



    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
    }
}

include_once "login_frontend.php";

$_SESSION['message'] = '';