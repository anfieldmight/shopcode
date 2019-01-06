<?php
require_once "../../../app.php";

$userId = $_SESSION['userId'];

$orderData = $db->query("SELECT * FROM users WHERE id = $userId;", PDO::FETCH_ASSOC);
$value = $orderData->fetchAll(PDO::FETCH_ASSOC)[0];



if(isset($_POST['submit'])){
  if (!empty($_POST['phone']) && !empty($_POST['address'])) {
    $sql="UPDATE users SET phone='".$_POST['phone']."', address='".$_POST['address']."' WHERE id='".$_SESSION['userId']."'";

    if ($db->query($sql)){
      $_SESSION['saveChanges']="Successfully saved changes";

      $orderData = $db->query("SELECT * FROM users WHERE id = $userId;", PDO::FETCH_ASSOC);
      $value = $orderData->fetchAll(PDO::FETCH_ASSOC)[0];
    }else{
      $_SESSION['saveChanges']="Can not save tasks";
    }
  } else {
    $_SESSION['saveChanges']="NULL/Zero Value not allowed !";
  }

}

$orderIds = explode(", ", $value['orders']) ;
array_pop($orderIds);

include_once "profilepage_frontend.php";
