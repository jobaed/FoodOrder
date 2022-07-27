<?php require("partials/header.php");
$page = "categoris";
?>


<?php

$s = "SELECT * FROM category WHERE active='Yes'";
$res = $conn->query($s);


?>


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


<?php require("partials/footer.php") ?>

</body>

</html>