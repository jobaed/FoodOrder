<?php
require "../config/db.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['id'])) {
    $id =  $_GET['id'];
    $s = "SELECT * FROM category WHERE id = '$id'";
    $res = $conn->query($s);
    $row = $res->fetch_assoc();
    if ($row['image'] !== '') {
        $path = $row['image'];
        $remove = unlink($path);
        $d = "DELETE FROM category WHERE id = '$id'";
        // echo $d;
        // exit;
        $delete = $conn->query($d);

        if ($delete) {
            $_SESSION['delete-category'] = "Category Deleted Successfull";
            header("location: manage-category.php");
        }
    } else {
        $d = "DELETE FROM category WHERE id = '$id'";
        // echo $d;
        // exit;
        $delete = $conn->query($d);

        if ($delete) {
            $_SESSION['delete-category'] = "Category Deleted Successfull";
            header("location: manage-category.php");
        }
    }
} else {
    header("location: manage-category.php");
}
