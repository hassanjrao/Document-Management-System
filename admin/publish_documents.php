<?php

include('../database/db.php');
session_start();
if (empty($_SESSION['admin_id'])) {

    header('location:../index.php');
}

if(isset($_POST["value"]) && $_POST["value"]!=""){

    $value=$_POST["value"];
    $id=$_POST["id"];
    
    $user=$_SESSION["admin_id"];

    $stmt = $conn->prepare("SELECT * from users where id='$user'");

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $name=$result["name"];

    $date=date("Y-m-d");




    
    $stmt = $conn->prepare("UPDATE `documents` SET publish='$value', published_by='$name', published_date='$date' where id='$id'");

    $stmt->execute();

    echo "success";


}


?>