<?php
include('../database/db.php');
ob_start();
session_start();
if (empty($_SESSION['user_id'])) {

    header('location:sign-in.php');
}


$order_id = $_GET['id'];




$stmt = $conn->prepare("DELETE FROM orders WHERE order_id='$order_id'");


$stmt->execute();

header("location:orders.php");
