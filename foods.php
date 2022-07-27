<?php require("partials/header.php");
$page = "foods";


if (isset($_POST['submit'])) {
    $search_food = $conn->escape_string($_POST['search']);
    $foodselect = "SELECT * FROM food WHERE title LIKE '%$search_food%'";
} else {
    $foodselect = "SELECT * FROM food WHERE active='Yes'";
}
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="" method="POST">
            <input type="search" value="<?php
                                        if (isset($_POST['search'])) {
                                            echo $search_food;
                                        }
                                        ?>" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php

        $foodres = $conn->query($foodselect);
        if ($foodres->num_rows > 0) {
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
        <?php }
        } else {
            echo "<div style='background-color: #f74d4d; padding: 2%; margin-top: 70px; color: white;' class='text-center'> <strong>Oops..!</strong> ' " . $search_food . " ' This Food Not Found </div>";
        }
        ?>


        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php require("partials/footer.php") ?>

</body>

</html>