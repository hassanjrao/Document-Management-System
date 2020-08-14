<?php

include('../database/db.php');
session_start();
if (empty($_SESSION['approver_id'])) {

    header('location:../index.php');
}

if(isset($_POST["value"]) && $_POST["value"]!=""){

    $value=$_POST["value"];
    $id=$_POST["id"];
    
    $user=$_SESSION["approver_id"];

    $stmt = $conn->prepare("SELECT * from users where id='$user'");

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $name=$result["name"];


    
    $stmt = $conn->prepare("UPDATE `documents` SET approval='$value', sent_by='$name' where id='$id'");

    $stmt->execute();

    echo "success";


}


?>