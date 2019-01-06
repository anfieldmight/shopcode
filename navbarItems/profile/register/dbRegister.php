<?php
require_once "../../../app.php";


try {
    $dataUsers = $db->query('SELECT email FROM users', PDO::FETCH_ASSOC);
    $arrEmails = [];
    foreach ($dataUsers as $value){
        $arrEmails[]=$value['email'];
    }
    if (in_array($email ,$arrEmails)){
        $_SESSION['messageFormError']= "User with this email Already exist.";



    }else{
        $query = "INSERT INTO users ( first_name, last_name, password, email, phone, address) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $db->prepare($query);
        if ($stmt->execute([$firstName, $lastName, $password, $email, $phone, $address])) {
            $_SESSION['loginMessage']= "Successful registration";

            header("Location: ../login/login.php");

        } else {
            $_SESSION['messageFormError']= "Unsuccessful registration !!!";
        }


    }


} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
}