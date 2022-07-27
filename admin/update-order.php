<?php
require "partials/menu.php";
require "../config/db.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetch Data for Update

$order_item_id = $_GET['id'];
$s = "SELECT * FROM `order` WHERE id = '$order_item_id'";
$res = $conn->query($s);
$row = $res->fetch_assoc();




?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br>
        <br>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Food Name:</td>
                    <td><b><?php echo $row['food']; ?></b></td>
                </tr>
                <tr>
                    <td>Food Price:</td>
                    <td><?php echo $row['price']; ?> <img width="11px" src="../images/icons/taka.svg" alt=""></td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td><input type="number" value="<?php echo $row['qty'] ?>" name="qty"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td> <select name="status">
                            <option <?php if ($row['status'] == "Ordered") echo "selected" ?> value="Ordered">Ordered</option>
                            <option <?php if ($row['status'] == "OnDelevary") echo "selected" ?> value="OnDelevary">On Delevary</option>
                            <option <?php if ($row['status'] == "Deleverd") echo "selected" ?> value="Deleverd">Deleverd</option>
                            <option <?php if ($row['status'] == "Canclled") echo "selected" ?> value="Canclled">Canclled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td><input type="text" value="<?php echo $row['customer_name'] ?>" name="c_name"></td>
                </tr>
                <tr>
                    <td>Customer Contact</td>
                    <td><input type="text" value="<?php echo $row['customer_contact'] ?>" name="c_contact"></td>
                </tr>
                <tr>
                    <td>Customer Email</td>
                    <td><input type="text" value="<?php echo $row['customer_email'] ?>" name="c_email"></td>
                </tr>
                <tr>
                    <td>Customer Address</td>
                    <td><textarea style="text-align: left;" name="c_address" cols="30" rows="5">
                        <?php echo $row['customer_address'] ?>
                    </textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $order_item_id ?>">
                        <input type="hidden" name="price" value="<?php echo $row['price'] ?>">

                        <input style="padding: 10px; border-radius: 5px;" type="submit" class="btn-primary" name="update" value="Update">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>


<?php
// Update Data
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $quantity = $_POST['qty'];
    $price = $_POST['price'];
    $total = $quantity * $price;

    $status = $_POST['status'];

    $c_name = $_POST['c_name'];
    $c_contact = $_POST['c_contact'];
    $c_email = $_POST['c_email'];
    $c_address = $_POST['c_address'];

    $u = "UPDATE `order` SET qty='$quantity',total='$total',status='$status',customer_name='$c_name',customer_contact='$c_contact',customer_email='$c_email',customer_address='$c_address' WHERE id=$id";
    $update = $conn->query($u);
    if ($update) {
        $_SESSION['update-order'] = "<div class='success'><strong>Updated..!</strong> Successfull</div>";
        header("location: manage-order.php");
    } else {
        $_SESSION['update-order'] = "<div class='danger'><strong>Oops..!</strong> Faild</div>";
        header("location: manage-order.php");
    }
}



require "partials/footer.php";


?>