<?php
require_once "../../../app.php";



//if (isset($_SESSION['userId'])){
//    header("Location: ../profilepage/profilepage.php");
//    exit;
//}
if (isset($_SESSION['userId'])) {
  if ($_SESSION['userId']!=''){
    header("Location: ../profilepage/profilepage.php");
  }
}


require_once "profileHome_frontend.php";

