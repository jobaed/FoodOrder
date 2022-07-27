<?php
//mysqli extension properties and methods
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_order";
$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
$conn->set_charset("utf8");
