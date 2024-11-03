<?php
session_start(); // Starting Session
$con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
if ($con) { // Connection successfully established
    if($_SESSION['login']==1){
        // Retriving all orders
    $usrname = $_SESSION['usrname'];
    // Retriving all orders
    $retriveorders = "SELECT * FROM orders where Username='$usrname' and status='Pending'"; // Query to select all orders
    $numorder = mysqli_num_rows(mysqli_query($con, $retriveorders)); // Executing query and storing result
    $_SESSION['cartnum']=$numorder;
    }else{
        $_SESSION['cartnum']=0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ShoeX</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div class="wrapper">

        <div class="upper">

            <a href="index.php" class="logo">
            </a>

            <div class="top">
                <a href="showcase.html">Showcase</a>
                <a href="about.html">About US</a>
                <a href="contact.php">Contact US</a>
                <a href="FAQ.html">FAQ</a>
            </div>
            <div class="header">

                <img src="vectors/menu (1).png" class="menu" alt="">
                <div class="menulink">
                    <a href="men.php">Men</a>
                    <a href="women.php">Women</a>
                    <a href="accessories.php">Accessories</a>
                </div>
                <img src="vectors/shopping-cart.png" class="cart" id="carty" alt="" onclick="cart(<?php  echo $_SESSION['login']; ?>)">
                <span class="cart-counter"><?php echo $_SESSION['cartnum'] ?></span>
                <img src="vectors/user.png" class="user" alt="" onclick="settingaccount(<?php ; echo $_SESSION['login']; ?>)">
                <h1></h1>
            </div>
        </div>
        <!-- <div class="sidebar">sidebar</div> -->
        <div class="middle">
            <div class="body1">
                <button class="btnshop">SHOP</button>
                <div class="video-container">
                    <p id="shoexdesc">Step into happiness with our smile-inducing shoes! <br>
                        Experience the joy of every stride.</p>
                    <video autoplay muted loop id="myVideo">
                        <source src="Untitled design.mp4" type="video/mp4">
                    </video>
                </div>
                <h1 class="toppicks">Top Picks</h1>
            </div>
            <div class="body2">
                <h1 class="title_body2">Air_Jordan_11_Retro</h1>
                <div class="shoe-price2">$220</div>
            </div>
            <div class="body3">
                <h1 class="title_body3">Renew_Run</h1>
                <div class="shoe-price">$99.99</div>
            </div>
            <div class="body4">
                <h1 class="title_body4">Air_Jordan_4_Retroo</h1>
                <div class="shoe-price4">$180</div>
            </div>
            <div class="body5">
                <h1 class="title_body5"> Dunk_Low</h1>
                <div class="shoe-price5">$120</div>
            </div>
            <div class="body6">
                <button class="btnshowcase"> SHOW-CASE</button>
            </div>

        </div>
        <div class="sub">
            <div class="body7">
                <button class="btnmen"> SHOP MEN</button>
            </div>
            <div class="body8">
                <button class="btnfemale"> SHOP WOMEN </button>
            </div>
            <div class="body9">
                <button class="btnaccessories"> SHOP ACCESSORIES </button>
            </div>

        </div>
        <!-- line -->
        <hr>

        <div class="lower">

            <div class="footer">
                <!--  social's for the body -->
                <a href="https://www.instagram.com"><img src="vectors/instagram.png" class="insta" alt=""></a>
                <a href="https://www.linkedin.com"><img src="vectors/linkedin.png" class="link" alt=""></a>
                <a href="https://www.twitter.com"><img src="vectors/twitter.png" class="twit" alt=""></a>
                <!--  social's for the footer -->
                <a href="https://www.instagram.com"><img src="vectors/instagram.png" class="insta" alt=""></a>
                <a href="https://www.linkedin.com"><img src="vectors/linkedin.png" class="link" alt=""></a>
                <a href="https://www.twitter.com"><img src="vectors/twitter.png" class="twit" alt=""></a>
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

                    <h1 class="h2">My_Account</h1>
                    <a href="Log-in soe - Copy/index.php" class="link2">Login</a>
                </div>

            </div>

        </div>

</body>

</html>
<script>
    // code to make the menu items stay when clicked
    const menu = document.querySelector('.menu');
    const menuLinks = document.querySelectorAll('.menulink');

    menu.addEventListener('click', function() {
        menuLinks.forEach(link => link.classList.toggle('active'));
    });
    ///////////////////////////////////////////////////////////////
    /// video speed 
    document.addEventListener("DOMContentLoaded", function() {
        var video = document.getElementById("myVideo");
        video.playbackRate = 0.4;
    });
    //////////// product page loader /////////////////////////////////
    document.addEventListener("DOMContentLoaded", function() {
        var grids = document.querySelectorAll(" .body2, .body3, .body4, .body5");

        for (var i = 0; i < grids.length; i++) {
            grids[i].addEventListener("click", function() {
                var className = this.className;
                var backgroundImage = getComputedStyle(this).getPropertyValue("background-image");

                if (backgroundImage !== "none") {
                    var bgImage = backgroundImage.match(/url\(["']?(.*?)["']?\)/)[1];
                    localStorage.setItem("selectedBgImage", bgImage);
                    window.open("product.php", "_self");
                }
            });
        }
    });


    // Get references to the buttons
    var shopButton = document.querySelector(".btnshop");
    var showcaseButton = document.querySelector(".btnshowcase");
    var menButton = document.querySelector(".btnmen");
    var femaleButton = document.querySelector(".btnfemale");
    var accessoriesButton = document.querySelector(".btnaccessories");

    shopButton.addEventListener("click", function() {
        // Navigate to main.html when "Shop" button is clicked
        window.location.href = "main.php";
    });
    // Add event listeners to the buttons
    showcaseButton.addEventListener("click", function() {
        // Navigate to showcase.html when "SHOW-CASE" button is clicked
        window.location.href = "showcase.html";
    });

    menButton.addEventListener("click", function() {
        // Navigate to main.html when "SHOP MEN" button is clicked
        window.location.href = "men.php";
    });

    femaleButton.addEventListener("click", function() {
        // Navigate to main.html when "SHOP FEMALE" button is clicked
        window.location.href = "women.php";
    });

    accessoriesButton.addEventListener("click", function() {
        // Navigate to main.html when "SHOP ACCESSORIES" button is clicked
        window.location.href = "accessories.php";
    });

    function cart(num) {
        if(num==1){
            let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
                        width=779.429px,height=321px,left=300%,top=200%%`;
        window.open('http://localhost/Final%20Project/User%20Cart/usercart.php', 'Your Cart', params);
        }
        else{
            alert("Login Required");
            window.location.href = "Log-in soe - Copy/index.php";
        }
    }
    function settingaccount(num) {
        if(num==1){
            window.location.href = "Account%20Setting/accountset.php";
        }
        else{
            alert("Login Required");
            window.location.href = "Log-in soe - Copy/index.php";
        }
    }
// img silde for body 6 (showcase)
document.addEventListener("DOMContentLoaded", function() {
      var images = [
        "bg2.jpg",
        "show.png",
        "show3.png",
        "show4.png",
        "show5.png",
        "show2.png"
      ];
      var currentIndex = 0;
      var body6 = document.querySelector(".body6");

      function changeBackground() {
        body6.style.backgroundImage = "url(" + images[currentIndex] + ")";
        currentIndex = (currentIndex + 1) % images.length;
      }

      setInterval(changeBackground, 3000); // Change background every 3 seconds
    }); 




</script>