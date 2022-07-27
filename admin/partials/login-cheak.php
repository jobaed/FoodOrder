<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['login']) && ($_SESSION['login'] == true)) {
} else {
    $_SESSION['not-login-message'] = "Sorry You Need To Login Frist";
    header("location: login.php");
}
