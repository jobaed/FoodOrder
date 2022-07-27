<?php
require "partials/menu.php";
require "../config/db.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetch Data for Update

$gid = $_GET['id'];
$s = "SELECT * FROM admin WHERE id = '$gid'";
$res = $conn->query($s);
$row = $res->fetch_assoc();




?>

<div class="main-content">
    <div class="wrapper">
        <h1>Edit Admin</h1>
        <br>
        <br>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>ID:</td>
                    <td><input type="text" name="id" value="<?php echo $row['id'] ?>" disabled name="id"></td>
                </tr>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" value="<?php echo $row['fullname'] ?>" name="full_name"></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" value="<?php echo $row['username'] ?>" name="username"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn-primary" name="update" value="Update">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>


<?php
// Update Data
if (isset($_POST['update'])) {
    $fullname = $_POST['full_name'];
    $username = $_POST['username'];

    $u = "UPDATE admin SET fullname ='$fullname', username = '$username' WHERE id = '$gid'";
    $update = $conn->query($u);
    if ($update) {
        $_SESSION['update'] = "Updated Successfull";
        header("location: manage-admin.php");
    } else {
        echo "Update Faild";
    }
}



require "partials/footer.php";


?>