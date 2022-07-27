<?php include "partials/menu.php"; ?>
<?php include "../config/db.php"; ?>

<?php

$s = "SELECT * FROM category WHERE 1";
$res = $conn->query($s);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $discription = $_POST['discription'];
    $price = $_POST['price'];

    $image = $_FILES['image'];
    $imgname = $image['name'];
    $ext = explode('.', $imgname);
    $ext2 = end($ext);
    $img_tmp =  $image['tmp_name'];
    $imagename = "Food_item-" . time() . '.' . $ext2;
    $pat = "../images/food/" . $imagename;


    $cid = $_POST['cid'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    if (move_uploaded_file($img_tmp, $pat)) {
        $i = "INSERT INTO food(title, discription, price, image, category_id, featured, active) VALUES ('$title','$discription','$price','$imagename','$cid','$featured','$active')";
        $insert = $conn->query($i);
        if ($insert) {
            $_SESSION['add-food'] = "Food Added Successfull";
            header("location: manage-food.php");
        } else {
            echo "<div class='danger'><strong>Oops..!</strong> Food Add Faild </div>";
        }
    } else {
        echo "File Uploaded Faild";
    }
}


?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br>
        <br>

        <!-- add category Form -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" placeholder="Enter Food Title" required></td>
                </tr>
                <tr>
                    <td>Discription:</td>
                    <td><textarea type="text" cols="22" rows="5" name="discription" placeholder="Food Discription" required></textarea></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="text" name="price" placeholder="Food Price" required></td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td><input type="file" name="image" accept="image/png, image/gif, image/jpeg" required></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td><select name="cid" required>
                            <option value="">Select</option>
                            <?php
                            while ($row = $res->fetch_assoc()) {

                            ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>

                            <?php } ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <input type="submit" value="Add Category" name="submit" class="btn-primary">
                    </td>
                </tr>
            </table>

        </form>

    </div>
</div>


<?php include "partials/footer.php"; ?>