<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "partials/menu.php";
require "../config/db.php";

// Select Category.
$s_categoy = "SELECT * FROM category WHERE 1";
$category = $conn->query($s_categoy);
$count_category = $category->num_rows;

// Select Food.
$s_food = "SELECT * FROM food WHERE 1";
$foods = $conn->query($s_food);
$count_foods = $foods->num_rows;

// Select order.
$s_orders = "SELECT * FROM `order` WHERE 1";
$orders = $conn->query($s_orders);
$count_orders = $orders->num_rows;

// Total Revinew.
$s_total = "SELECT SUM(total) AS Total FROM `order` WHERE status='Deleverd'";
$r_total = $conn->query($s_total);
$total_row = $r_total->fetch_assoc();


?>

<!-- Main Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>DASHBOARD</h1>

        <?php
        if (isset($_SESSION['loginmessage'])) {
            echo '<div class="success"><strong>Success..!</strong> ' . $_SESSION['loginmessage'] . '</div>';
            unset($_SESSION['loginmessage']);
        }

        ?>

        <div class="col-4 text-center">
            <h1><?php echo $count_category; ?></h1>
            <br>
            Categorys
        </div>
        <div class="col-4 text-center">
            <h1><?php echo $count_foods; ?></h1>
            <br>
            Foods
        </div>
        <div class="col-4 text-center">
            <h1><?php echo $count_orders; ?></h1>
            <br>
            Total Order
        </div>
        <div class="col-4 text-center">
            <h1><?php echo $total_row['Total']; ?> <img width="20px" src="../images/icons/taka.svg" alt=""></h1>
            <br>
            Revenew Generator
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- main Section end -->

<?php
require "partials/footer.php";
?>
</body>

</html>