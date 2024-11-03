<?php
session_start(); // Starting Session
$con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
if ($con) { // Connection successfully established
    if ($_SESSION['login'] == 1) {
        // Retriving all orders
        $usrname = $_SESSION['usrname'];
        // Retriving all orders
        $retriveorders = "SELECT * FROM orders where Username='$usrname' and status='Pending'"; // Query to select all orders
        $numorder = mysqli_num_rows(mysqli_query($con, $retriveorders)); // Executing query and storing result
        $_SESSION['cartnum'] = $numorder;
    } else {
        $_SESSION['cartnum'] = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeX Women</title>
    <link rel="stylesheet" href="women.css">
</head>

<body>
    <div class="wrapper">
        <a href="index.php" class="logo"></a>
        <div class="emptydiv"></div>
        <div class="top">
            <a href="showcase.html">Showcase</a>
            <a href="about.html">About US</a>
            <a href="contact.php">Contact US</a>
            <a href="FAQ.html" style="margin-right: 10px;">FAQ</a>
        </div>
        <div class="header">

            <img src="vectors/menu (1).png" class="menu" alt="">
            <div class="menulink">
                <a href="men.php">Men</a>
                <a href="women.php">Women</a>
                <a href="accessories.php">Accessories</a>
            </div>
            <img src="vectors/shopping-cart.png" class="cart" id="carty" alt="" onclick="cart(<?php 
                                                                                                echo $_SESSION['login']; ?>)">
            <span class="cart-counter"><?php 
                                        echo $_SESSION['cartnum'] ?></span>
            <img src="vectors/user.png" class="user" alt="" onclick="settingaccount(<?php 
                                                                                    echo $_SESSION['login']; ?>)">

            <h1></h1>
        </div>
        <div class="sidebar">

            <h2>Shoe Category</h2>
            <button class="filter-button active" data-category="all">All</button>
            <button class="filter-button" data-category="tennis">Tennis</button>
            <button class="filter-button" data-category="running">Running</button>

            <h2>Color Category</h2>
            <button class="color-button active" data-color="all">All</button>
            <button class="color-button" data-color="black" style="background-color: black;">.</button>
            <button class="color-button" data-color="white" style="background-color: white;">.</button>
            <button class="color-button" data-color="pink" style="background-color: pink;">.</button>

        </div>
        <div class="main"></div>

        <!-- ////////////////////////////////////// female running /////////////////////// -->
        <div class="body1" data-category="female running" data-color="white">
            <div class="price">$150</div>
            <div class="name">Mercurial_Veloce</div>
        </div>
        <div class="body2" data-category="female running" data-color="white">
            <div class="price">$150</div>
            <div class="name">Hypervenom_Phinish</div>
        </div>
        <div class="body3" data-category="female running" data-color="pink">
            <div class="price">$150</div>
            <div class="name">Superfly_7</div>
        </div>
        <div class="body4" data-category="female running" data-color="pink">
            <div class="price">$150</div>
            <div class="name">Tiempo_Legend_VI</div>
        </div>
        <div class="body5" data-category="female running" data-color="pink">
            <div class="price">$150</div>
            <div class="name">Mercurial_Superfly_VI</div>
        </div>
        <!-- ////////////////////////////////// female tennis ////////////////// -->
        <div class="body6" data-category="female tennis" data-color="black">
            <div class="price">$150</div>
            <div class="name">Hypervenom_Phantom_II</div>
        </div>
        <div class="body7" data-category="female tennis" data-color="black">
            <div class="price">$150</div>
            <div class="name">Zoom_Freak_2</div>
        </div>
        <div class="body8" data-category="female tennis" data-color="black">
            <div class="price">$150</div>
            <div class="name">Renew_Run</div>
        </div>
        <div class="body9" data-category="female tennis" data-color="pink">
            <div class="price">$150</div>
            <div class="name">React_Infinity_Run</div>
        </div>
        <div class="body10" data-category="female tennis" data-color="pink">
            <div class="price">$150</div>
            <div class="name">Blazer_Mid</div>
        </div>

        <div class="footer">
            <!-- line -->
            <hr>

            <!--  social's for the footer -->
            <a href="https://www.instagram.com"><img src="vectors/instagram.png" class="in" alt=""></a>
            <a href="https://www.linkedin.com"><img src="vectors/linkedin.png" class="lin" alt=""></a>
            <a href="https://www.twitter.com"><img src="vectors/twitter.png" class="tw" alt=""></a>
            <!-- payment method img -->
            <a href="https://www.americanexpress.com/"><img src="vectors/amex.png" class="amex" alt=""></a>
            <a href="https://www.paypal.com/"><img src="vectors/paypal.png" class="paypal" alt=""></a>
            <a href="https://usa.visa.com/about-visa.html"><img src="vectors/visa.png" class="visa" alt=""></a>

            <div class="buttom">
            <h1>Help</h1>
                    <a href="showcase.html">Showcase</a>
                    <a href="about.html">About US</a>
                    <a href="contact.php">Contact US</a>
                    <a href="FAQ.html">FAQ</a>
                    <h1 class="sws">shopping_with_Shoex</h1>
                    <a href="" class="shoppingpolicy">shopping_policy</a>
                    <a href="" class="Pm">Payment_Methods</a>
                    <a href="" class="sg">Size_Guide</a>

                    <h1 class="h2">My Account</h1>
                    <a href="Log-in soe - Copy/index.php" class="link2">Login</a>
            </div>
        </div>
</body>

</html>
<script src="jquery.js"></script>
<script src="main.js"></script>