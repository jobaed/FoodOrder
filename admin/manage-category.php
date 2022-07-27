<?php

require "partials/menu.php";
require "../config/db.php";

?>

<!-- Main Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <?php

        if (isset($_SESSION['add-category'])) {
            echo '<div class="success"><strong>Added..!</strong> ' . $_SESSION['add-category'] . '</div>';
            unset($_SESSION['add-category']);
        }

        if (isset($_SESSION['delete-category'])) {
            echo '<div class="danger"><strong>Oops..!</strong> ' . $_SESSION['delete-category'] . '</div>';
            unset($_SESSION['delete-category']);
        }
        if (isset($_SESSION['category-update'])) {
            echo '<div class="success"><strong>Added..!</strong> ' . $_SESSION['category-update'] . '</div>';
            unset($_SESSION['category-update']);
        }

        ?>

        <br>
        <!-- button for add admin -->
        <a href="add-category.php" class="btn-primary">Add Category</a>
        <br>
        <br>
        <br>


        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th class="text-center">Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            <?php

            $s = "SELECT * FROM category WHERE 1";
            $result = $conn->query($s);
            $sn = 0;
            while ($row = $result->fetch_assoc()) {
                $sn++;

            ?>
                <tr>
                    <td><?php echo $sn ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td class="text-center"><img class='backup_picture' width="400px" height="200px;" src="<?PHP
                                                                                                            $path1 = "../images/category/" . $row['image'];
                                                                                                            $path2 = "../images/notfoundimages.jpg";

                                                                                                            echo file_exists($path1) ? $path1 : $path2;
                                                                                                            ?>" alt=""></td>
                    <td><?php echo $row['featured'] ?></td>
                    <td><?php echo $row['active'] ?></td>
                    <td><a style="padding: 5px; border-radius: 5px; margin-top: 50px;" href="update-category.php?id=<?php echo $row['id'] ?>" class="btn-secondary">Update</a> <a style="padding: 5px; border-radius: 5px; margin-top: 50px;" href="delete-category.php?id=<?php echo $row['id'] ?>" class="btn-danger">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<!-- main Section end -->

<?php
require "partials/footer.php";
?>
<script src="../js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        if ($(".backup_picture").attr('src') == "") {
            $(".backup_picture").attr('src') == "../images/not-found.png"
        }
    });
</script>
</body>

</html>