<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "../config/db.php";
$message = "";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = md5($_POST['password']);

    $s = "SELECT * FROM admin WHERE username = '$username'";
    $result = $conn->query($s);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['password'] == $pass) {
            $_SESSION['login'] = true;
            $_SESSION['loginmessage'] = "Login Successfull";
            header("location: index.php");
        } else {
            $message = "<div class='danger text-center'><strong>Oops..!</strong> Password Not Match</div>";
        }
    } else {
        $message = "<div class='danger text-center'><strong>Oops..!</strong> Account Not Found</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Ordaring System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <?php
    if (isset($_SESSION['not-login-message'])) {
        echo '<div style=" width: 60%; margin: 2% auto;" class="danger"><strong>Oops..!</strong> ' . $_SESSION['not-login-message'] . '</div>';
        unset($_SESSION['not-login-message']);
    }
    ?>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <!-- login From Start -->
        <form action="" method="POST">
            <br>
            <?php echo $message ?>

            <br>
            Username:
            <input type="text" name="username" placeholder="Enter Your Username"><br><br>
            Password:
            <input type="password" name="password" placeholder="Enter Password"><br><br>
            <input class="btn-primary" type="submit" value="Login" name="submit">
        </form>
        <br>


        <!-- login From end -->
        <p class="text-center">Created By <a href="#">Jobaed</a></p>
    </div>

</body>

</html>

<?php





?>