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
  <title>Product</title>
  <style>
    .wrapper {
      display: grid;
      /* increased it more than 100 to accommodate the grids */
      height: 5vh;
      grid-template-columns: 0.3fr 0.3fr 0.3fr 0.3fr;
      grid-template-rows: 1fr 1fr 1fr;
      grid-gap: 10px;
      grid-template-areas:
        "top top top top"
        "logo header header header"

    }

    .header {
      grid-area: header;
      /* background-color: rgb(255, 102, 0); */

      justify-items: center;
      align-items: center;
      height: 0.1vh;
    }

    .logo {
      grid-area: logo;
      background-color: transparent;
      background-image: url(logo.png);
      background-repeat: no-repeat;
      background-size: contain;
      height: 70%;
      width: 70%;
      background-position: 20% 55%;

      /* horizontal, vertical */
    }

    .top {
      grid-area: top;
      background-color: rgba(211, 211, 211, 0.74);
    }

    .header {
      grid-area: header;
      /* background-color: rgb(255, 102, 0); */
      background-color: transparent;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px;
      font-size: 20px;
      font-weight: bolder;
      margin-left: 150px;

    }

    .header a {
      color: black;
      text-decoration: none;
      margin-right: 15px;
    }

    .cart {
      max-width: 35px;
      /* Adjust the width as needed */
      max-height: 35px;
      /* Adjust the height as needed */
      text-decoration: none;


    }

    .user {
      max-width: 35px;
      /* Adjust the width as needed */
      max-height: 35px;
      /* Adjust the height as needed */
      position: relative;
      top: 5px;
      right: 140px;

    }

    .top {


      display: flex;
      align-items: end;
      justify-content: flex-end;
      /* padding: 20px; */
      font-size: 18px;
      font-weight: lighter;
      /* margin-left: 200px; */
    }

    .top a {
      color: black;
      text-decoration: none;
      margin-right: 40px;
      /* margin-left: 12px;   */
    }

    /* footer social icon */
    .lin {
      height: 30px;
      width: 30px;
      display: flex;
      flex: 1;
      flex-direction: column;
      position: absolute;
      top: 90%;
      right: 80px;



    }

    .in {
      height: 30px;
      width: 30px;
      display: flex;
      flex: 1;
      position: absolute;
      flex-direction: column;
      position: absolute;
      top: 90%;
      right: 139px;



    }

    .tw {
      height: 30px;
      width: 30px;
      display: flex;
      flex: 1;
      position: absolute;
      flex-direction: column;

      position: absolute;
      top: 90%;
      right: 30px;


    }

    /* footer payment icon */
    .amex {
      height: 50px;
      width: 50px;
      display: flex;
      flex: 1;
      flex-direction: column;
      position: absolute;
      top: 90%;
      right: 1290px;



    }

    .visa {
      height: 50px;
      width: 50px;
      display: flex;
      flex: 1;
      position: absolute;
      flex-direction: column;
      position: absolute;
      top: 90%;
      right: 1230px;

    }

    .paypal {
      height: 50px;
      width: 50px;
      display: flex;
      flex: 1;
      position: absolute;
      flex-direction: column;

      position: absolute;
      top: 90%;
      right: 1160px;
    }



    /* Customize the buttons */

    .custom-button {
      position: relative;
      /* to position the picture after the image */
      bottom: 350px;
      left: 15%;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      color: #ffffff;
      background-color: #007bff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;

    }

    .custom-button:hover {
      background-color: #0056b3;
    }

    a:hover {
      background-color: wheat;
    }

    /* Customize the dropdown menus */
    .custom-dropdown {
      display: inline-block;
      padding: 5px 10px;
      font-size: 14px;
      font-weight: bold;
      color: #ffffff;
      background-color: #007bff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      position: relative;
      /* to position the picture after the image */
      position: relative;
      /* to position the picture after the image */
      bottom: 350px;
      left: 50%;

    }

    .custom-dropdown:hover {
      background-color: #0056b3;
    }

    /* Customize the dropdown arrow */
    .custom-dropdown::after {
      content: '\25BE';
      margin-left: 5px;
    }

    /* Customize the dropdown options */
    .custom-dropdown option {
      background-color: #007bff;
      color: #ffffff;
    }

    /* Customize the description dropdown */
    .custom-description-dropdown {
      display: inline-block;
      padding: 5px 10px;
      font-size: 14px;
      font-weight: bold;
      color: #ffffff;
      background-color: #007bff;
      border: none;
      border-radius: 4px;
      cursor: pointer;


    }

    .custom-description-dropdown:hover {
      background-color: #0056b3;
    }

    /* Customize the description dropdown arrow */
    .custom-description-dropdown::after {
      content: '\25BE';
      margin-left: 5px;
    }

    /* Customize the description dropdown options */
    .custom-description-dropdown option {
      background-color: #007bff;
      color: #ffffff;
    }

    h3 {
      position: relative;
      /* to position the picture after the image */
      bottom: 350px;
      left: 50%;
    }

    /* ////////////////////////////////////// code for collapsible ///////////////// */
    .collapsible {
      background-color: #007bff;
      ;
      color: white;
      cursor: pointer;
      padding: 18px;
      width: 50%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
      position: relative;
      /* to position the picture after the image */
      bottom: 350px;
      left: 50%;
    }

    .active,
    .collapsible:hover {
      background-color: #555;
    }

    .content {
      padding: 0 18px;
      display: none;
      overflow: hidden;
      background-color: #f1f1f1;
      width: 47%;
      position: relative;
      /* to position the picture after the image */
      bottom: 350px;
      left: 50%;
    }

    .collapsible:after {
      content: '\02795';
      /* Unicode character for "plus" sign (+) */
      font-size: 13px;
      color: white;
      float: right;
      margin-left: 5px;
    }

    .active:after {
      content: "\2796";
      /* Unicode character for "minus" sign (-) */
    }

    /* cart system */
    .cart-counter {
      position: absolute;
      top: 65px;
      right: 300px;
      background-color: red;
      color: white;
      font-size: 12px;
      font-weight: bold;
      padding: 3px 6px;
      border-radius: 50%;
    }

    .menu {
      display: none;
    }

    .menulink {
      justify-content: space-between;
    }

    /* /////////////////////////////// price  ////////////////////////*/
    .price-value {
      background-color: #007bff;
      font-size: 30px;
      font-weight: bold;
      color: white;
      position: relative;
      top: -395px;
      right: -720px;

    }

    @media (max-width: 768px) {
      .wrapper {
        grid-template-columns: repeat(4, 1fr);
        grid-template-areas:
          "logo header header header"
          "top top top top";
      }

      .header {
        justify-content: flex-start;
        margin-left: 0;
      }

      .top {
        align-items: end;
        justify-content: flex-end;
        padding: 0;
      }

      .lin {
        top: 170%;
        right: 80px;
      }

      .in {
        top: 170%;
        right: 139px;
      }

      .tw {
        top: 170%;
        right: 30px;
      }


      /* ////////////////////////////////menu ////////////////////////// */
      /* Menu icon */
      .menu {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: transparent;
        color: white;
        font-size: 17px;
        cursor: pointer;
        max-width: 50px;
        max-height: 50px;
        position: relative;
        top: 90px;
        right: 100px;
      }

      /* Links in header */
      .header .menulink {
        display: none;
        flex-direction: column;
        border-top: 10px solid black;
        list-style-type: none;
        background-color: gray;
        color: white;
        gap: 10px;
        padding-top: 1px;
        align-items: center;
        position: absolute;
        top: 150px;
        width: 45%;
        left: -10px;
        border: none;
      }

      /* Hover effect on menu icon */

      .menu:hover+.menulink,
      .menulink.active {
        display: flex;
      }

      /* Hover effect on menu icon */
      .menu:hover {
        flex-grow: 1;
        border: 1px solid cyan;
        background-color: #007bff;
      }

      .top {
        display: none;
      }

      .cart-counter {
        position: absolute;
        top: 120px;
        right: 105px;
        background-color: red;
        color: white;
        font-size: 12px;
        font-weight: bold;
        padding: 3px 5px;
        border-radius: 50%;
      }

      .cart {
        max-width: 35px;
        /* Adjust the width as needed */
        max-height: 35px;
        /* Adjust the height as needed */
        position: relative;
        top: 85px;
        right: -50px;

      }

      .user {
        max-width: 35px;
        /* Adjust the width as needed */
        max-height: 35px;
        /* Adjust the height as needed */
        position: relative;
        top: 85px;
        right: -60px;

      }

      .collapsible {
        background-color: #007bff;
        ;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 50%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        position: relative;
        /* to position the picture after the image */
        bottom: 100px;
        left: 25%;
      }



      .content {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        background-color: #f1f1f1;
        width: 47%;
        position: relative;
        /* to position the picture after the image */
        bottom: 100px;
        left: 25%;
      }

      /* ///////////////////////////////////////////////////////////////////////////// */

      /* Customize the buttons */

      .custom-button {
        position: relative;
        /* to position the picture after the image */
        bottom: 50px;
        left: 25%;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        color: #ffffff;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;

      }

      /* Customize the dropdown menus */
      .custom-dropdown {
        display: inline-block;
        padding: 5px 10px;
        font-size: 14px;
        font-weight: bold;
        color: #ffffff;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        position: relative;
        /* to position the picture after the image */
        position: relative;
        /* to position the picture after the image */
        bottom: 100px;
        left: 25%;

      }


      h3 {
        position: relative;
        /* to position the picture after the image */
        bottom: 100px;
        left: 25%;
      }

      @media (min-width: 481px) and (max-width: 1024px) {
      .wrapper {
        grid-template-columns: repeat(4, 1fr);
        grid-template-areas:
          "logo header header header"
          "top top top top";
      }

      .header {
        justify-content: flex-start;
        margin-left: 0;
      }

      .top {
        align-items: end;
        justify-content: flex-end;
        padding: 0;
      }

      .lin {
        top: 170%;
        right: 80px;
      }

      .in {
        top: 170%;
        right: 139px;
      }

      .tw {
        top: 170%;
        right: 30px;
      }


      /* ////////////////////////////////menu ////////////////////////// */
      /* Menu icon */
      .menu {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: transparent;
        color: white;
        font-size: 17px;
        cursor: pointer;
        max-width: 50px;
        max-height: 50px;
        position: relative;
        top: 90px;
        right: 180px;
      }

      /* Links in header */
      .header .menulink {
        display: none;
        flex-direction: column;
        border-top: 10px solid black;
        list-style-type: none;
        background-color: gray;
        color: white;
        gap: 10px;
        padding-top: 1px;
        align-items: center;
        position: absolute;
        top: 150px;
        width: 45%;
        left: -10px;
        border: none;
      }

      /* Hover effect on menu icon */

      .menu:hover+.menulink,
      .menulink.active {
        display: flex;
      }

      /* Hover effect on menu icon */
      .menu:hover {
        flex-grow: 1;
        border: 1px solid cyan;
        background-color: #007bff;
      }

      .top {
        display: none;
      }

      .cart-counter {
        position: absolute;
        top: 120px;
        right: 105px;
        background-color: red;
        color: white;
        font-size: 12px;
        font-weight: bold;
        padding: 3px 5px;
        border-radius: 50%;
      }

      .cart {
        max-width: 35px;
        /* Adjust the width as needed */
        max-height: 35px;
        /* Adjust the height as needed */
        position: relative;
        top: 85px;
        right: -332px;

      }

      .user {
        max-width: 35px;
        /* Adjust the width as needed */
        max-height: 35px;
        /* Adjust the height as needed */
        position: relative;
        top: 85px;
        right: -380px;

      }

      .collapsible {
        background-color: #007bff;
        ;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 50%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        position: relative;
        /* to position the picture after the image */
        bottom: 100px;
        left: 25%;
      }



      .content {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        background-color: #f1f1f1;
        width: 47%;
        position: relative;
        /* to position the picture after the image */
        bottom: 100px;
        left: 25%;
      }

      /* ///////////////////////////////////////////////////////////////////////////// */

      /* Customize the buttons */

      .custom-button {
        position: relative;
        /* to position the picture after the image */
        bottom: 50px;
        left: 25%;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        color: #ffffff;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;

      }

      /* Customize the dropdown menus */
      .custom-dropdown {
        display: inline-block;
        padding: 5px 10px;
        font-size: 14px;
        font-weight: bold;
        color: #ffffff;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        position: relative;
        /* to position the picture after the image */
        position: relative;
        /* to position the picture after the image */
        bottom: 100px;
        left: 25%;

      }


      h3 {
        position: relative;
        /* to position the picture after the image */
        bottom: 100px;
        left: 25%;
      }
      .price-value {
      background-color: #007bff;
      font-size: 30px;
      font-weight: bold;
      color: white;
      position: relative;
      top: -150px;
      right: -230px;

    }
    }
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <a href="index.php" class="logo">

    </a>
    <div class="top">
      <a href="about.html">About </a>

      <a href="FAQ.html">| FAQ</a>
      <a href="contact.php">| Contact US</a>
    </div>
    <div class="header">
      <img src="vectors/menu (1).png" class="menu" alt="">
      <div class="menulink">
        <a href="men.php">MEN</a>
        <a href="women.php">Women</a>
        <a href="accessories.php">Accessories</a>
      </div>
      <img src="vectors/shopping-cart.png" class="cart" id="carty" alt="" onclick="cart(<?php 
                                                                                        echo $_SESSION['login']; ?>)">
      <span class="cart-counter" id="cart-counter"><?php 
                                  echo $_SESSION['cartnum'] ?></span>
      <img src="vectors/user.png" class="user" alt="" onclick="settingaccount(<?php 
                                                                              echo $_SESSION['login']; ?>)">
    </div>



    <div class="footer">
      <!-- line -->
      <hr>
      <!--  social's for the footer -->
      <img src="vectors/instagram.png" class="in" alt="">
    </div>
    <img src="vectors/linkedin.png" class="lin" alt="">
  </div>
  <img src="vectors/twitter.png" class="tw" alt=""></div>
  <!-- payment method img -->
  <img src="vectors/amex.png" class="amex" alt="">
  <img src="vectors/paypal.png" class="paypal" alt="">
  <img src="vectors/visa.png" class="visa" alt="">
  </div>
  </div>

  <h1>Product Page</h1>
  <div id="backgroundImageContainer"></div>

  <h3>Title & Description</h3>
  <!-- <details>
    <summary>Description</summary>
    <p>gfffffffffffffffffffffffffffff</p>
  </details> -->

  <!-- collapsible -->
  <button type="button" class="collapsible">Description</button>
  <div class="content">
    <p>Nike shoes are synonymous with style, comfort, and performance. Designed with precision and crafted with
      innovation, Nike shoes are built to take your athletic endeavors to new heights. Whether you're a professional
      athlete or a fitness enthusiast, Nike offers a wide range of footwear options to suit your needs.</p>
  </div>

  <!-- /////////////////////////////////////////// -->
  <!-- <select id="titleDescriptionDropdown" class="custom-description-dropdown">
    <option value="option1">444</option>
    <option value="option2">Option 2</option>
    <option value="option3">Option 3</option>
  </select> -->

  <h3>Product Quantity</h3>
  <select id="productDropdown" class="custom-dropdown" onchange="quantityselect()">
    <option value="1">1</option>
    <option value="3">3</option>
    <option value="5">5</option>
  </select>

  <h3>Size</h3>
  <select id="sizeDropdown" class="custom-dropdown">
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
  </select>
  <div class="price">
    <h3>Price:</h3>
    <span class="price-value" id="shoeprice">$ <?php echo rand(100, 700); ?>.99</span>
  </div>
  <br><br>
  <button id="addToCartButton" class="custom-button" onclick="addingcart(<?php
                                                                          echo $_SESSION['login']; ?>)">Add to Cart</button>
  <button id="buyButton" class="custom-button" onclick="buyingcart(<?php 
                                                                    echo $_SESSION['login']; ?>)">Buy</button>

  <script>
    var selectedproductimage;
    // image loader code
    document.addEventListener("DOMContentLoaded", function() {
      var selectedBgImage = localStorage.getItem("selectedBgImage");
      if (selectedBgImage) {
        var imgElement = document.createElement("img");
        imgElement.src = selectedBgImage;
        document.getElementById("backgroundImageContainer").appendChild(imgElement);
      }
      selectedproductimage = selectedBgImage;
    });

    function quantityselect() {
      var select = document.querySelector("#productDropdown");
      var output = select.value;
      var pricetemp = document.getElementById("shoeprice").value || document.getElementById("shoeprice").innerhtml || document.getElementById("shoeprice").textContent;
      var priceval = (pricetemp.substr(2,6)) * output;
      document.getElementById("shoeprice").value = "$ " + priceval;
      document.getElementById("shoeprice").innerhtml = "$ " + priceval;
      document.getElementById("shoeprice").textContent = "$ " + priceval;
    }
    // Copy Start from here
    function addingcart(num) {
      if (num == 1) {
        //   var Description = document.getElementById("content").value;
        var product = document.getElementById("productDropdown").value;
        var size = document.getElementById("sizeDropdown").value;
        // Declaring variable that will hold data to be sent
        var data = {
          Product: selectedproductimage,
          Size: document.getElementById("sizeDropdown").value,
          Quantity: document.getElementById("productDropdown").value,
          Status: "Pending",
          Price: document.getElementById("shoeprice").value || document.getElementById("shoeprice").innerhtml || document.getElementById("shoeprice").textContent,
        }
        // Declaring HTTP Request Variable
        var xhr = new XMLHttpRequest();
        // Set the PHP page you want to send data to
        xhr.open("POST", "order.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        // What to do when you receive a response
        xhr.onreadystatechange = function() {
          if (xhr.readyState == XMLHttpRequest.DONE) {
            alert(xhr.responseText); // Alerting any echo from the php as it is
            if(xhr.responseText=="Pending Order set successfully."){
              var current=document.getElementById("cart-counter").textContent || document.getElementById("cart-counter").value || document.getElementById("cart-counter").innerhtml || document.getElementById("cart-counter").innerText;
              document.getElementsByClassName("cart-counter").textContent=current+1;
              document.getElementsByClassName("cart-counter").value=current+1;
              document.getElementsByClassName("cart-counter").innerhtml=current+1;
              document.getElementById("cart-counter").innerText=parseInt(current)+1;
            }
          }
        };
        // Send the data
        xhr.send(JSON.stringify(data));
      } else {
        alert("Login Required");
        window.location.href = "Log-in soe - Copy/index.php";
      }
    }

    function buyingcart(num) {
      if (num == 1) {
        //   var titleDescription = document.getElementById("titleDescriptionDropdown").value;
        var product = document.getElementById("productDropdown").value;
        var size = document.getElementById("sizeDropdown").value;
        var data = {
          Product: selectedproductimage,
          Size: document.getElementById("sizeDropdown").value,
          Quantity: document.getElementById("productDropdown").value,
          Status: "Purchased",
          Price: document.getElementById("shoeprice").value || document.getElementById("shoeprice").innerhtml || document.getElementById("shoeprice").textContent,
        }
        // Declaring HTTP Request Variable
        var xhr = new XMLHttpRequest();
        // Set the PHP page you want to send data to
        xhr.open("POST", "order.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        // What to do when you receive a response
        xhr.onreadystatechange = function() {
          if (xhr.readyState == XMLHttpRequest.DONE) {
            alert(xhr.responseText); // Alerting any echo from the php as it is
            if (xhr.responseText == "Order Purchased from Pending. Purchased Order set successfully.") {
              var cartCounter = document.querySelector(".cart-counter");
              var currentCount = parseInt(cartCounter.textContent);
              cartCounter.textContent = currentCount - 1;
            }
            if (xhr.responseText.includes("Purchased Order set successfully.")) {
              let confi = confirm("Do you want to print Order Receipt.");
              // Declaring variable that will hold the prompt values
              if (confi) {
                printPage();
              }
            }
          }
        };
        // Send the data
        xhr.send(JSON.stringify(data));
      } else {
        alert("Login Required");
        window.location.href = "Log-in soe - Copy/index.php";
      }
    }

    // ////////////////////////////////////// code for collapsible //////////////////////
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }
    ///////////////////////////////////// cart system code /////////////////////////////

    function printPage() {
      var w = window.open();
      var Size = document.getElementById("sizeDropdown").value;
      var Quantity = document.getElementById("productDropdown").value;
      var Price = document.getElementById("shoeprice").value || document.getElementById("shoeprice").innerhtml || document.getElementById("shoeprice").textContent;
      var heading = "<h1>Purchase Receipt</h1>";
      //const date = new Date();
      var usrcartdate = "Date: " + new Date();
      var usrcartimg = "<h2>Product: </h2><img src='" + selectedproductimage + "' alt='ProductImage' width='100' height='120'><br>"
      var usrcartsize = "<h2>Size: </h2>" + Size + "<br>";
      var usrcartquantity = "<h2>Quantity: </h2>" + Quantity + "<br>";
      var usrcartprice = "<h2>Price: " + Price + "</h2> <br>";
      var usrcartshoex = "<h3>Copyright all reserved to Shoex.Co </h3>"
      var html = "<!DOCTYPE HTML>";
      html += '<html lang="en-us">';
      html += '<head><style></style></head>';
      html += "<body>";

      //check to see if they are null so "undefined" doesnt print on the page. <br>s optional, just to give space
      if (heading != null) html += heading + "<br/><br/>";
      if (usrcartdate != null) html += usrcartdate + "<br/><br/>";
      if (usrcartimg != null) html += usrcartimg + "<br/><br/>";
      if (usrcartsize != null) html += usrcartsize + "<br/><br/>";
      if (usrcartquantity != null) html += usrcartquantity + "<br/><br/>";
      if (usrcartprice != null) html += usrcartprice;
      if (usrcartshoex != null) html += usrcartshoex + "<br/><br/>";
      html += "</body>";
      w.document.write(html);
      w.window.print();
      w.document.close();
    };

    function cart(num) {
      if (num == 1) {
        let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
                        width=779.429px,height=321px,left=100px,top=200%%`;
        window.open('http://localhost/Final%20Project/User%20Cart/usercart.php', 'Your Cart', params);
      } else {
        alert("Login Required");
        window.location.href = "Log-in soe - Copy/index.php";
      }
    }

    function settingaccount(num) {
      if (num == 1) {
        window.location.href = "Account%20Setting/accountset.php";
      } else {
        alert("Login Required");
        window.location.href = "Log-in soe - Copy/index.php";
      }
    }
  </script>
</body>

</html>