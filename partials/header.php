<?php require("config/db.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .active {
            background-color: #ff6b81;
            color: white;
            padding: 7px 12px;
            border-radius: 5px;
        }

        .active:hover {
            background-color: #ff4757;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a class="<?php if ($page == "index") {
                                        echo "active";
                                    } ?>" href="index.php">Home</a>
                    </li>
                    <li>
                        <a class="" href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a class="" href="foods.php">Foods</a>
                    </li>
                    <li>
                        <a class="" href="#">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->