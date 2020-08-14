<?php

include('../database/db.php');
session_start();
if (empty($_SESSION['admin_id'])) {

    header('location:../index.php');
}

if(isset($_POST["value"]) && $_POST["value"]!=""){

    $value=$_POST["value"];
    $id=$_POST["id"];

    
    $stmt = $conn->prepare("UPDATE `documents` SET feedback='$value' where id='$id'");

    $stmt->execute();

    echo "success";


}


?>