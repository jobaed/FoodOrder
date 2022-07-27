<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "partials/menu.php";
require "../config/db.php";
$s = "SELECT * FROM admin WHERE 1";
$res = $conn->query($s);

?>

<!-- Main Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>
        <?php
        if (isset($_SESSION['add'])) {
            echo '<div class="success"><strong>Added..!</strong> ' . $_SESSION['add'] . '</div>';
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['delete'])) {
            echo '<div class="danger"><strong >Deleted..!</strong> ' . $_SESSION['delete'] . '</div>';
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['update'])) {
            echo '<div class="success"><strong >Updated..!</strong> ' . $_SESSION['update'] . '</div>';
            unset($_SESSION['update']);
        }
        if (isset($_SESSION['passupdate'])) {
            echo '<div class="success"><strong >Updated..!</strong> ' . $_SESSION['passupdate'] . '</div>';
            unset($_SESSION['passupdate']);
        }

        ?>
        <br>
        <br>
        <!-- button for add admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br><br><br>


        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <?php
            $sn = 0;
            while ($row = $res->fetch_assoc()) {
                $sn++
            ?>
                <tr>
                    <td><?php echo $sn ?></td>
                    <td><?php echo $row['fullname'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><a href="update-admin.php?id=<?php echo $row['id'] ?>" class="btn-secondary">Update</a> <a href="delete-admin.php?id=<?php echo $row['id'] ?>" class="btn-danger">Delete</a> <a href="varify-pass.php?id=<?php echo $row['id'] ?>" class="btn-primary">Change Password</a></td>
                </tr>
            <?php  } ?>
        </table>
    </div>
</div>
<!-- main Section end -->

<?php
require "partials/footer.php";
?>
</body>

</html>