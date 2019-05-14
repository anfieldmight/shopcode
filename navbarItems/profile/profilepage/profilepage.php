<?php
require_once "../../../app.php";

if (empty($_SESSION['userId'])) {
  header("Location: ../../../index.php");
}

$userId = $_SESSION['userId'];

$orderData = $db->query("SELECT * FROM users WHERE id = $userId;", PDO::FETCH_ASSOC);
$value = $orderData->fetchAll(PDO::FETCH_ASSOC)[0];



if(isset($_POST['submit'])){
  if (!empty($_POST['phone']) && !empty($_POST['address'])) {
    $sql="UPDATE users SET phone='".$_POST['phone']."', address='".$_POST['address']."' WHERE id='".$_SESSION['userId']."'";
    if ($db->query($sql)){
      $_SESSION['saveChanges']="Промените запазени";
      $orderData = $db->query("SELECT * FROM users WHERE id = $userId;", PDO::FETCH_ASSOC);
      $value = $orderData->fetchAll(PDO::FETCH_ASSOC)[0];
    }else{
      $_SESSION['saveChanges']="Не успешно запазване";
    }
  } else {
    $_SESSION['saveChanges']="Нулеви стойности не са позволени !";
  }

}

$orderIds = explode(", ", $value['orders']) ;
$orderIds = array_unique($orderIds);
array_pop($orderIds);

include_once "profilepage_frontend.php";
