<?php require("partials/header.php");
$page = "food-search";
?>
<?php
$foodsearch = $conn->escape_string($_POST['search']);
$select_search = "SELECT * FROM food WHERE title LIKE '%$foodsearch%'";
$search_result = $conn->query($select_search);


?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $foodsearch ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->




<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        if ($search_result->num_rows > 0) {
            while ($search_row = $search_result->fetch_assoc()) {


        ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/food/<?php echo $search_row['image'] ?>" alt="<?php echo $search_row['title'] ?>" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $search_row['title'] ?></h4>
                        <p class="food-price"><?php echo $search_row['price'] ?> <img width="12px" src="images/icons/taka.svg" alt=""></p>
                        <p class="food-detail">
                            <?php echo $search_row['discription'] ?>
                        </p>
                        <br>

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
        <?php }
        } else {
            echo "<div style='background-color: #f74d4d; padding: 2%; margin-top: 70px; color: white;' class='text-center'> <strong>Oops..!</strong> ' " . $foodsearch . " ' This Food Not Found </div>";
        }
        ?>

        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php require("partials/footer.php") ?>

</body>

</html>