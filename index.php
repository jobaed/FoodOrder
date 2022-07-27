<?php require("partials/header.php");
$page = "index";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<?php

$s = "SELECT * FROM category WHERE active='Yes' limit 3";
$res = $conn->query($s);





?>
<strong>
    <?php
    if (isset($_SESSION['order'])) {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    ?>
</strong>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php
        while ($row = $res->fetch_assoc()) {

        ?>
            <a href="category-foods.php?category_id=<?php echo $row['id'] ?>">
                <div class="box-3 float-container">
                    <img src="images/category/<?php echo $row['image'] ?>" alt="<?php echo $row['title'] ?>" class="img-responsive img-curve">

                    <h3 class="float-text text-white"><?php echo $row['title'] ?></h3>
                </div>
            </a>
        <?php } ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php

        $foodselect = "SELECT * FROM food WHERE active='Yes' limit 6";
        $foodres = $conn->query($foodselect);
        while ($foodrow = $foodres->fetch_assoc()) {

        ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/food/<?php echo $foodrow['image'] ?>" alt="<?php echo $foodrow['title'] ?>" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $foodrow['title'] ?></h4>
                    <p class="food-price"><?php echo $foodrow['price'] ?> <img width="12px" src="images/icons/taka.svg" alt=""></p>
                    <p class="food-detail">
                        <?php echo $foodrow['discription'] ?>
                    </p>
                    <br>

                    <a href="order.php?id=<?php echo $foodrow['id'] ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        <?php } ?>

        <div class="clearfix"></div>



    </div>

    <p class="text-center">
        <a href="foods.php">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->

<?php require("partials/footer.php") ?>

<script src="https://kit.fontawesome.com/0e5659ef6a.js" crossorigin="anonymous"></script>
</body>

</html>