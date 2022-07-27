<?php
require "../config/db.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$id =  $_GET['id'];
$d = "DELETE FROM admin WHERE id = '$id'";
// echo $d;
// exit;
$delete = $conn->query($d);

if ($delete) {
    $_SESSION['delete'] = "Admin Deleted Successfull";
    header("location: manage-admin.php");
}
