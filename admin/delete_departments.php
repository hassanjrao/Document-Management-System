<?php

include('../database/db.php');
session_start();


if (empty($_SESSION['admin_id'])) {

    header('location:../index.php');
}


$delete = $_GET['id'];

$del = $conn->prepare("DELETE FROM departments WHERE id='$delete'");

$del->execute();

header("location:all_departments.php");
