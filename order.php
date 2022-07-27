<?php require("partials/header.php");
$page = "order";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['id'])) {

    $order_id = $_GET['id'];
    $s = "SELECT * FROM food WHERE id='$order_id' LIMIT 1";
    $food_result = $conn->query($s);
    $row = $food_result->fetch_assoc();
    $quantity = 1;
} else {
    header("location: index.php");
}


if (isset($_POST['submit'])) {
    $name = $_POST['full-name'];
    $phone = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $quantity = $_POST['qty'];
    $food = $_POST['food'];
    $price = $_POST['price'];
    $total = $quantity * $price;
    $status = "Ordered";

    if ($quantity > 0) {
        $i = "INSERT INTO `order`(food, price, qty, total, status, customer_name, customer_contact, customer_email, customer_address) VALUES ('$food','$price','$quantity','$total','$status','$name','$phone','$email','$address')";
        // echo $i;
        $insert = $conn->query($i);
        if ($insert) {
            $_SESSION['order'] = "<div style='background-color: #60f79f; padding: 2%; color: white; text-align: center;' class='success'>Food Ordered Successfully</div>";
            header("location: index.php");
        } else {
            $_SESSION['order'] = "<div style='background-color: #f74d4d; padding: 2%; color: white; text-align: center;' class='error'>Faild Ordered Food</div>";
            header("location: index.php");
        }
    } else {
        echo "<div style='background-color: #f74d4d; padding: 2%; color: white; text-align: center;' class='error'>Oops..! Incorrecto Quantity</div>";
    }
}



?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <img src="images/food/<?php echo $row['image'] ?>" alt="<?php echo $row['title'] ?>" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $row['title'] ?></h3>
                    <input type="hidden" name="food" value="<?php echo $row['title'] ?>">
                    <p class="food-price"><span id="fprice"><?php echo $row['price'] ?></span> <img width="12px" src="images/icons/taka.svg" alt=""></p>
                    <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" id="qty" class="input-responsive" value="<?php echo $quantity ?>" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Jobaed Bhuiyan" <?php if (isset($_POST['submit'])) echo $name ?> class="input-responsive" required>


                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 017XXXXXXXXX" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. ex@gmail.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. House No, Street, City, Country" class="input-responsive" required></textarea>

                <input type="submit" name="submit" id="sub" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php require("partials/footer.php") ?>
<script src="js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#qty").change(function() {
            var qty = $("#qty").val();
            var price = <?php echo $row['price'] ?>;
            var price = price * qty;
            $("#fprice").html(price);
        });


    });
</script>
</body>

</html>