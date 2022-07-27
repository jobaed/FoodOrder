<?php
require "partials/menu.php";
require "../config/db.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetch Old Password

$gid = $_GET['id'];
$s = "SELECT * FROM admin WHERE id = '$gid'";
$res = $conn->query($s);
$row = $res->fetch_assoc();
$dbusername = $row['username'];
$dbpass = $row['password'];
// echo $dbpass;
// password_verify()
if (isset($_POST['submit'])) {
    $oldpass = md5($_POST['oldpass']);
    $username = $_POST['username'];
    // echo "<br>$oldpass";
    if ($dbusername != $username) {
        echo "<div class='danger text-center'><strong>Oops..!</strong> Account Not Found</div>";
    } else {
        if ($oldpass == $dbpass) {
            $_SESSION['match'] = true;
            header("location: changepass.php?id=$gid");
        } else {
            echo "<div class='danger text-center'><strong>Oops..!</strong> Incorrect Password</div>";
        }
    }
}



?>

<div class="main-content">
    <div class="wrapper">
        <h1>Varify Old Password</h1>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter Your Username" required></td>
                </tr>
                <tr>
                    <td>Old Password:</td>
                    <td><input type="password" name="oldpass" placeholder="Enter Your Old Password" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn-primary" name="submit" value="Varify">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>



<?php
require "partials/footer.php";


?>