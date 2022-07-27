<?php require("partials/header.php");
$page = "categoris-food";
?>

<?php

if (isset($_GET['category_id'])) {
    $cid = $_GET['category_id'];

    $c_select = "SELECT title FROM category WHERE id='$cid' LIMIT 1";
    $c_res = $conn->query($c_select);
    $c_row = $c_res->fetch_assoc();

    $f_select = "SELECT * FROM food WHERE category_id='$cid'";
    $f_res = $conn->query($f_select);
} else {
    header("location: index.php");
}

?>



<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Foods on <a href="#" class="text-white">"<?php echo $c_row['title']; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php

        if ($f_res->num_rows > 0) {

            while ($f_row = $f_res->fetch_assoc()) {

        ?>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/food/<?php echo $f_row['image'] ?>" alt="<?php echo $f_row['title'] ?>" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $f_row['title'] ?></h4>
                        <p class="food-price"><?php echo $f_row['price'] ?> <img width="12px" src="images/icons/taka.svg" alt=""></p>
                        <p class="food-detail">
                            <?php echo $f_row['discription'] ?>
                        </p>
                        <br>

                        <a href="order.php?id=<?php echo $f_row['id'] ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
        <?php  }
        } else {
            echo "<div style='background-color: #f74d4d; padding: 2%; margin-top: 70px; color: white;' class='text-center'> <strong>Oops..!</strong> This Food Not Found </div>";
        }
        ?>



        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<!-- social Section Starts Here -->
<?php require("partials/footer.php") ?>

</body>

</html>