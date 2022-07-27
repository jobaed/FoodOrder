<?php
require "partials/menu.php";
require "../config/db.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['match']) && $_SESSION['match'] == true) {
} else {
    header("location: manage-admin.php");
}

$uid = $_GET['id'];

if (isset($_POST['submit'])) {
    $pass = md5($_POST['newpass']);
    $cpass = md5($_POST['cpass']);

    if ($pass == $cpass) {
        $u = "UPDATE admin SET password ='$cpass' WHERE id = '$uid'";

        $update = $conn->query($u);
        if ($update) {
            $_SESSION['passupdate'] = "Password Successfully Updated";
            header("location: manage-admin.php");
        }
    } else {
        echo "<div class='danger text-center'><strong>Oops..!</strong> Your Password Not Match</div>";
    }
}


?>



<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="newpass" placeholder="Enter New Password" required></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="cpass" placeholder="Enter Confirm Password" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn-primary" name="submit" value="Change">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>




<?php
require "partials/footer.php";


?>