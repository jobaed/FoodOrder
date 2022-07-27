<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "partials/menu.php";
require "../config/db.php";

if (isset($_POST['submit'])) {
    $full_name = $conn->escape_string($_POST['full_name']);
    $username = $conn->escape_string($_POST['username']);
    $password = md5($_POST['pass']);

    $q = "INSERT INTO admin(fullname, username, password) VALUES ('$full_name','$username','$password')";
    $insert = $conn->query($q);
    if ($insert) {
        $_SESSION['add'] = "Admin Added Successfully";

        header("location: manage-admin.php");
    } else {
        echo "Faild";
    }
}

?>

<!-- Main Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name" required></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="username" placeholder="Enter Your Username" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="pass" placeholder="Enter Your Password" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add Admin" name="submit" class="btn-primary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>
<!-- main Section end -->

<?php
require "partials/footer.php";
?>
</body>

</html>