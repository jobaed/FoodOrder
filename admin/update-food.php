<?php
require "partials/menu.php";
require "../config/db.php";
$message = '';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['id'])) {
} else {
    header("location: manage-food.php");
}

// Fetch Data for Update

$gid = $_GET['id'];
$s = "SELECT * FROM food WHERE id = '$gid'";
$res = $conn->query($s);
$row = $res->fetch_assoc();

// Update Data
if (isset($_POST['update'])) {
    if ($row['image'] !== '') {



        $title = $_POST['title'];


        $image = $_FILES['image'];
        $imgname = $image['name'];
        $ext = explode(".", $imgname);
        $ext2 = end($ext);
        $img_tmp =  $image['tmp_name'];
        $imagename = "Food_item-" . time() . '.' . $ext2;
        $upath = "../images/food/" . $imagename;

        $c_id = $_POST['cid'];
        $discription = $_POST['discription'];
        $price = $_POST['price'];
        $featured = isset($_POST['featured']) ? $_POST['featured'] : "NO";
        $active = isset($_POST['active']) ? $_POST['active'] : "NO";
        if ($imgname == '') {
            $u = "UPDATE food SET title='$title',discription='$discription',price='$price',category_id='$c_id',featured='$featured',active='$active' WHERE  id='$gid'";
        } else {
            $u = "UPDATE food SET title='$title',discription='$discription',price='$price',image='$imagename',category_id='$c_id',featured='$featured',active='$active' WHERE  id='$gid'";
            $path = $row['image'];
            $remove = unlink($path);
            move_uploaded_file($img_tmp, $upath);
        }

        $update = $conn->query($u);
        if ($update) {
            $_SESSION['food_update'] = "Food Update Successfull";
            // $message = '<div class="success"><strong>Congress..!</strong> ' . $_SESSION['food_update'] . '</div>';
            header("location: manage-food.php");
        } else {
            echo "Update Faild";
        }
    } else {
        echo "Image Not Found";
    }
}


?>

<div class="main-content">
    <div class="wrapper">
        <h1>Edit Admin</h1>
        <br>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <?php echo $message ?>
                <tr>
                    <td>ID:</td>
                    <td><input type="text" name="id" value="<?php echo $row['id'] ?>" disabled name="id"></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input type="text" value="<?php echo $row['title'] ?>" name="title"></td>
                </tr>
                <tr>
                    <td>Discription:</td>
                    <td><textarea type="text" cols="22" rows="5" name="discription" placeholder="Food Discription" required><?php echo $row['discription'] ?></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" value="<?php echo $row['price'] ?>" name="price"></td>
                </tr>
                <tr>
                    <td>Current Image</td>
                    <td> <img class='backup_picture' width="180px" height="90px" src="../images/food/<?php echo $row['image'] ?>" alt=""> </td>
                </tr>
                <tr>
                    <td>image</td>
                    <td><input type="file" accept="image/png, image/gif, image/jpeg" name="image"></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td><select name="cid" required>
                            <option value="">Select</option>
                            <?php
                            $sc = "SELECT * FROM category WHERE 1";
                            $res = $conn->query($sc);

                            while ($rowc = $res->fetch_assoc()) {

                            ?>
                                <option <?php
                                        if ($row['category_id'] == $rowc['id']) {
                                            echo "selected";
                                        }
                                        ?> value="<?php echo $rowc['id']; ?>"><?php echo $rowc['title']; ?></option>

                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if ($row['featured'] == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if ($row['featured'] == "No") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if ($row['featured'] == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if ($row['featured'] == "No") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="No"> No
                    </td>
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