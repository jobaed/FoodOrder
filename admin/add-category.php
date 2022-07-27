<?php include "partials/menu.php"; ?>
<?php include "../config/db.php"; ?>

<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $image = $_FILES['image'];
    $imgname = $image['name'];
    $ext = explode('.', $imgname);
    $ext2 = end($ext);
    $img_tmp =  $image['tmp_name'];
    $imagename = "Food_catagory-" . time() . '.' . $ext2;
    $pat = "../images/category/" . $imagename;
    if (move_uploaded_file($img_tmp, $pat)) {
        $featured = isset($_POST['featured']) ? $_POST['featured'] : "NO";
        $active = isset($_POST['active']) ? $_POST['active'] : "NO";
        $q = "INSERT INTO category(title, image, featured, active) VALUES ('$title', '$imagename', '$featured','$active')";
        $insert = $conn->query($q);
        if ($insert) {
            $_SESSION['add-category'] = "Catagory Added Successfull";
            header("location: manage-category.php");
        }
    } else {
        echo 'Upload Faild';
    }
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br>
        <br>

        <!-- add category Form -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" placeholder="Enter Category Title" required></td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td><input type="file" name="image" accept="image/png, image/gif, image/jpeg" required></td>
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