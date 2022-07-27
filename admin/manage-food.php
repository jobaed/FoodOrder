<?php

require "partials/menu.php";
include "../config/db.php";

$s = "SELECT * FROM food WHERE 1";
$res = $conn->query($s);
?>

<!-- Main Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <br>
        <?php

        if (isset($_SESSION['add-food'])) {
            echo '<div class="success"><strong>Added..!</strong> ' . $_SESSION['add-food'] . '</div>';
            unset($_SESSION['add-food']);
        }
        if (isset($_SESSION['delete-food'])) {
            echo '<div class="danger"><strong>Congress..!</strong> ' . $_SESSION['delete-food'] . '</div>';
            unset($_SESSION['delete-food']);
        }
        if (isset($_SESSION['food_update'])) {
            echo '<div class="success"><strong>Congress..!</strong> ' . $_SESSION['food_update'] . '</div>';
            unset($_SESSION['food_update']);
        }

        ?>
        <br>
        <!-- button for add admin -->
        <a href="add-food.php" class="btn-primary">Add Food</a>
        <br>
        <br>
        <br>


        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Discription</th>
                <th>Price</th>
                <th class="text-center">Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            <?php
            $sn = 0;
            while ($row = $res->fetch_assoc()) {
                $sn++;

            ?>
                <tr>
                    <td><?php echo $sn ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['discription'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td class="text-center"><img class='backup_picture' width="120px" height="70px;" src="<?PHP
                                                                                                            $path1 = "../images/food/" . $row['image'];
                                                                                                            $path2 = "../images/notfoundimages.jpg";

                                                                                                            echo file_exists($path1) ? $path1 : $path2;
                                                                                                            ?>" alt=""></td>
                    <td><?php echo $row['featured'] ?></td>
                    <td><?php echo $row['active'] ?></td>
                    <td>
                        <div><a href="update-food.php?id=<?php echo $row['id'] ?>" style="padding: 5px; border-radius: 5px; margin-top: 50px;" class="btn-secondary">Update</a></div> <br>
                        <div><a href="delete-food.php?id=<?php echo $row['id'] ?>" style="padding: 5px; border-radius: 5px;" class="btn-danger">Delete</a></div>
                    </td>
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