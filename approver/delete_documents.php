<?php

include('../database/db.php');
session_start();


if (empty($_SESSION['approver_id'])) {

    header('location:../index.php');
}


$delete = $_POST['id'];

$del = $conn->prepare("DELETE FROM documents WHERE id='$delete'");

$del->execute();

echo "success";