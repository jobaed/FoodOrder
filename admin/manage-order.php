<?php

require "partials/menu.php";
require "../config/db.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$s = "SELECT * FROM `order` ORDER BY id DESC";
$result = $conn->query($s);

?>

<!-- Main Section Start -->
<div class="main-content">
    <div class="wrapper">
        <div class="">
            <h1>Manage Order</h1>
        </div>
        <br>
        <?php
        if (isset($_SESSION['update-order'])) {
            echo $_SESSION['update-order'];
            unset($_SESSION['update-order']);
        }
        ?>
        <br><br>


        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Food</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Order Time</th>
                <th>Status</th>
                <th>C_Name</th>
                <th>C_Contact</th>
                <th>C_Email</th>
                <th>C_Address</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['food'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td class="text-center"><?php echo $row['qty'] ?></td>
                    <td><?php echo $row['total'] ?></td>
                    <td><?php echo $row['order_date'] ?></td>
                    <td class="text-center">
                        <?php
                        $status = $row['status'];
                        if ($status == "Ordered") {
                            echo "<label class='btn-primary' style=' padding: 10%; color:white'>$status</label>";
                        } elseif ($status == "OnDelevary") {
                            echo "<label class='btn-secondary' style='margin-right:40px; padding: 10%; color:white' >$status</label>";
                        } elseif ($status == "Deleverd") {
                            echo "<label  style='background-color:#563D7C; padding: 10%; color:white' >$status</label>";
                        } else {
                            echo "<label class='btn-danger' style='padding: 10%; color:white'>$status</label>";
                        }
                        ?>
                    </td>
                    <td><?php echo $row['customer_name'] ?></td>
                    <td><?php echo $row['customer_contact'] ?></td>
                    <td><?php echo $row['customer_email'] ?></td>
                    <td><?php echo $row['customer_address'] ?></td>
                    <td><a style="padding: 5px; border-radius: 5px; margin-top: 50px;" href="update-order.php?id=<?php echo $row['id'] ?>" class="btn-secondary">Update</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<!-- main Section end -->

<?php
require "partials/footer.php";
?>
</body>

</html>