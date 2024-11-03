<?php
session_start(); // Starting Session
$con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
if ($con) { // Connection successfully established
    // Retriving all orders
    $usrname = $_SESSION['usrname'];
    // Retriving all orders
    $retriveorders = "SELECT * FROM orders where Username='$usrname' and status='Pending'"; // Query to select all orders
    $orders = mysqli_query($con, $retriveorders); // Executing query and storing result
}
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Your Cart</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <style>
        html,
        body {
            width: 100%;
            min-width: 500px;
        }

        body {
            background-image: url("../database/back17.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .tablewrapper {
            display: flex;
            justify-content: center;
            align-content: center;
        }

        .btnwrapper {
            display: flex;
            justify-content: center;
            align-content: center;
        }

        .orders {
            border-collapse: collapse;
            margin: 0 25px;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            background-color: rgba(39, 200, 245, 0.7);
        }

        .orders thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .orders th,
        .orders td {
            padding: 12px 15px;
        }

        .orders tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        .rmvbtn {
            width: 150px;
            height: 40px;
            border: none;
            border-radius: 50px;
            background: blue;
            color: #fff;
            font-weight: 600;
            margin: 10px 0;
            text-transform: uppercase;
            cursor: pointer;
        }

        .rmvbtn:hover {
            background: lightblue;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h3 id="title" style="display: absolute; margin-left: 25%; width: 50%; font-family: Andale Mono">Here are all your Pending Orders</h3>
        <div class="tablewrapper">
            <!-- TABLE CONSTRUCTION -->
            <table id="usrordertable" class="orders" border="solid black 0.7px">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rows = $orders->fetch_assoc()) {
                    ?>
                        <tr>
                            <!-- FETCHING DATA FROM EACH   ROW OF EVERY COLUMN -->
                            <td class="<?php echo $rows['Num']; ?>"><?php echo $rows['Num']; ?></td>
                            <td class="<?php echo $rows['Num']; ?>" id="productdata" name="<?php echo $rows['Product']; ?>"><img src="<?php echo $rows['Product']; ?>" alt="ProductImage" width="50" height="60"></td>
                            <td class="<?php echo $rows['Num']; ?>" id="sizedata"><?php echo $rows['Size']; ?></td>
                            <td class="<?php echo $rows['Num']; ?>" id="quantitydata"><?php echo $rows['Quantity']; ?></td>
                            <td class="<?php echo $rows['Num']; ?>" id="statusdata"><?php echo $rows['status']; ?></td>
                            <td class="<?php echo $rows['Num']; ?>" id="datedata"><?php echo $rows['Date']; ?></td>
                            <td class="<?php echo $rows['Num']; ?>" id="pricedata"><?php echo $rows['Price']; ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="btnwrapper">
            <button id="buypenorder-btn" class="rmvbtn" onclick=buypenorder()>Buy Pend Order</button>
            <button id="editorder-btn" class="rmvbtn" onclick=editorder()>Edit Order</button>
            <button id="rmvorder-btn" class="rmvbtn" onclick=rmvorder()>Delete Order</button>
            <button id="buypenorder-btn" class="rmvbtn" onclick=buyallorder()>Buy All</button>
            <button id="reloadpage-btn" class="rmvbtn" onClick="window.location.reload(true)">Reload Page</button>
        </div>
    </div>
    <script>
        function rmvorder() {
            document.title = "Remove Order";
            var order = prompt("Please Enter ID of Order to remove", "Order ID");
            if (order != null && !isNaN(order)) { // If ID is selected
                var found = false;
                var table = document.getElementById("usrordertable");
                var tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText || td.value;
                        if (txtValue.toUpperCase().indexOf(order) > -1) {
                            found = true;
                        }
                    }
                }
                if (!found) {
                    alert("No Order with that ID in your cart.");
                    window.location.reload(true);
                } else {
                    let confi = confirm("Are you sure you want to Delete Order");
                    // Declaring variable that will hold the prompt values
                    if (confi) {
                        var data = {
                            orderid: order,
                        }
                        // Declaring HTTP Request Variable
                        var xhr = new XMLHttpRequest();
                        // Set the PHP page you want to send data to
                        xhr.open("POST", "removeorder.php", true);
                        xhr.setRequestHeader("Content-Type", "application/json");
                        // What to do when you receive a response
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == XMLHttpRequest.DONE) {
                                alert(xhr.responseText); // Alerting any echo from the php as it is
                            }
                        };
                        // Send the data
                        xhr.send(JSON.stringify(data));
                    } else {
                        alert("Order Removal Cancelled");
                    }
                }
            } else {
                alert("Order Not Entered");
                document.title = "Your Cart";
            }
        }

        function buypenorder() {
            document.title = "Purchase Pending Order";
            var order = prompt("Please Enter ID of Pending Order to Purchase", "Order ID");
            if (order != null && !isNaN(order)) { // If ID is selected
                var found = false;
                var table = document.getElementById("usrordertable");
                var tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText || td.value;
                        if (txtValue.toUpperCase().indexOf(order) > -1) {
                            found = true;
                        }
                    }
                }
                if (!found) {
                    alert("No Order with that ID in your cart.");
                    window.location.reload(true);
                } else {
                    // Declaring variable that will hold the prompt values
                    var data = {
                        orderid: order,
                    }
                    // Declaring HTTP Request Variable
                    var xhr = new XMLHttpRequest();
                    // Set the PHP page you want to send data to
                    xhr.open("POST", "buypenorder.php", true);
                    xhr.setRequestHeader("Content-Type", "application/json");
                    // What to do when you receive a response
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == XMLHttpRequest.DONE) {
                            alert(xhr.responseText); // Alerting any echo from the php as it is
                            // alert(document.querySelector("#sizedata."+String(order)).value);
                            if (xhr.responseText == "Purchasing of Pending order is successful.") {
                                let confi = confirm("Do you want to print Order Receipt.");
                                // Declaring variable that will hold the prompt values
                                if (confi) {
                                    printPage(order);
                                }
                            }
                        }
                    };
                    // Send the data
                    xhr.send(JSON.stringify(data));
                }
            } else {
                alert('Invalid Order ID Input');
                document.title = "Your Cart";
            }
        }
        var order;

        function editorder() {
            document.title = "Edit Order";
            if (document.getElementById("editorder-btn").innerHTML == "Edit Order") {
                //document.getElementById("usrordertable").style.display = "none";
                var table = document.getElementById("usrordertable");
                order = prompt("Please Enter ID of Pending Order to Purchase", "Order ID");
                if (order != null && !isNaN(order)) { // If ID is selected
                    document.getElementById("editorder-btn").innerHTML = "You can Edit Size or Quantity of Selected Order"
                    document.getElementById("editorder-btn").innerHTML = "Save Edit";
                    document.getElementById("rmvorder-btn").style.display = "none";
                    document.getElementById("buypenorder-btn").style.display = "none";
                    document.getElementById("reloadpage-btn").style.display = "none";
                    document.getElementById("editorder-btn").style.display = "absolute";
                    document.getElementById("editorder-btn").style.marginLeft = "30%";
                    // Display form
                    var table = document.getElementById("usrordertable");
                    var tr = table.getElementsByTagName("tr");
                    var selectedproductimage, Size, Quantity;
                    // Loop through all table rows, and hide those who don't match the search query
                    var found = false;
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            txtValue = td.textContent || td.innerText || td.value;
                            if (txtValue.toUpperCase().indexOf(order) > -1) {
                                tr[i].style.display = "";
                                tr[i].getElementsByTagName("td")[2].contentEditable = true;
                                tr[i].getElementsByTagName("td")[3].contentEditable = true;
                                tr[i].getElementsByTagName("td")[2].style.backgroundColor = "rgba(39, 200, 245, 1)";
                                tr[i].getElementsByTagName("td")[3].style.backgroundColor = "rgba(39, 200, 245, 1)";
                                found = true;
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                    if (!found) {
                        alert("No Order with that ID in your cart.");
                        window.location.reload(true);
                    }
                } else {
                    alert('Invalid Order ID Input');
                    document.title = "Your Cart";
                }
            } else if (document.getElementById("editorder-btn").innerHTML == "Save Edit") {
                let confi = confirm("Do you want to Save Edit Order.");
                // Declaring variable that will hold the prompt values
                if (confi) {
                    var table = document.getElementById("usrordertable");
                    var tr = table.getElementsByTagName("tr");
                    var size, quantity;
                    // Loop through all table rows, and hide those who don't match the search query

                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            txtValue = td.textContent || td.innerText || td.value;
                            if (txtValue.toUpperCase().indexOf(order) > -1) {
                                size = tr[i].getElementsByTagName("td")[2].value || tr[i].getElementsByTagName("td")[2].innerText;
                                quantity = tr[i].getElementsByTagName("td")[3].value || tr[i].getElementsByTagName("td")[3].innerText;
                            }
                        }
                    }
                    var data = {
                        orderid: order,
                        Size: size,
                        Quantity: quantity,
                    };
                    // Declaring HTTP Request Variable
                    var xhr = new XMLHttpRequest();
                    // Set the PHP page you want to send data to
                    xhr.open("POST", "editorder.php", true);
                    xhr.setRequestHeader("Content-Type", "application/json");
                    // What to do when you receive a response
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == XMLHttpRequest.DONE) {
                            alert(xhr.responseText); // Alerting any echo from the php as it is
                        }
                    };
                    // Send the data
                    xhr.send(JSON.stringify(data));
                }
                document.getElementById("editorder-btn").innerHTML = "Here are all your Pending Orders"
                document.getElementById("editorder-btn").innerHTML = "Edit Order";
                document.getElementById("rmvorder-btn").style.display = "inline"
                document.getElementById("buypenorder-btn").style.display = "inline";
                document.getElementById("reloadpage-btn").style.display = "inline";
                document.getElementById("editorder-btn").style.display = "absolute";
                document.getElementById("editorder-btn").style.marginLeft = "0%";
                window.location.reload(true);
                document.title = "Your Cart";
            }
        }
        var arrayid = new Array();

        function buyallorder() {
            document.title = "Purchase All Pending Order";
            var confi = confirm("Are you sure you want to buy all Pending Orders?");
            if (confi) { // If ID is selected
                var found = false;
                var table = document.getElementById("usrordertable");
                var tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText || td.value;
                        arrayid[i] = txtValue;
                        found = true;
                    }
                }
                if (!found) {
                    alert("You Have No Pending Order");
                    window.location.reload(true);
                } else {
                    var data = {
                        orderid: arrayid,
                    }
                    // Declaring HTTP Request Variable
                    var xhr = new XMLHttpRequest();
                    // Set the PHP page you want to send data to
                    xhr.open("POST", "buyallorder.php", true);
                    xhr.setRequestHeader("Content-Type", "application/json");
                    // What to do when you receive a response
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == XMLHttpRequest.DONE) {
                            alert(xhr.responseText); // Alerting any echo from the php as it is
                            // alert(document.querySelector("#sizedata."+String(order)).value);
                            if (xhr.responseText == "Purchasing of Pending order is successful.") {
                                window.location.reload(true);
                                let confi = confirm("Do you want to Print Purchasing Receipt.");
                                // Declaring variable that will hold the prompt values
                                if (confi) {
                                    printPageall(arrayid);
                                }
                            }
                        }
                    };
                    // Send the data
                    xhr.send(JSON.stringify(data));
                }
            } else {
                alert('Purchasing of all Pending Orders Cancelled');
                document.title = "Your Cart";
            }
        }

        function printPage(orderid) {
            var table = document.getElementById("usrordertable");
            var tr = table.getElementsByTagName("tr");
            var selectedproductimage, Size, Quantity;
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText || td.value;
                    if (txtValue.toUpperCase().indexOf(orderid) > -1) {
                        selectedproductimage = tr[i].getElementsByTagName("td")[1].getAttribute("name");
                        Size = tr[i].getElementsByTagName("td")[2].textContent;
                        Quantity = tr[i].getElementsByTagName("td")[3].textContent;
                    }
                }
            }
            var w = window.open();
            var heading = "<h1>Purchase Receipt</h1>";
            //const date = new Date();
            var usrcartdate = "Date: " + new Date();
            var usrcartimg = "<h2>Product: </h2><img src='" + selectedproductimage + "' alt='ProductImage' width='100' height='120'><br>"
            var usrcartsize = "<h2>Size: </h2>" + Size + "<br>";
            var usrcartquantity = "<h2>Quantity: </h2>" + Quantity + "<br>";
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
            if (usrcartshoex != null) html += usrcartshoex + "<br/><br/>";
            html += "</body>";
            w.document.write(html);
            w.window.print();
            w.document.close();
        };

        function printPageall(arrayid) {
            var w = window.open();
            var heading = "<h1>Purchase Receipt</h1>";
            var usrcartdate = "<h2>Date: " + new Date();
            var usrcartimg="<h2>Products: </h2>";
            var usrcartsize="<h2>Size: </h2>";
            var usrcartquantity="<h2>Quantity: </h2>";
            var usrcartshoex = "<h3>Copyright all reserved to Shoex.Co </h3>";
            for (j = 1; j < arrayid.length; j++) {
                var table = document.getElementById("usrordertable");
                var tr = table.getElementsByTagName("tr");
                var selectedproductimage, Size, Quantity;
                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText || td.value;
                        if (txtValue.toUpperCase().indexOf(arrayid[j]) > -1) {
                            selectedproductimage = tr[i].getElementsByTagName("td")[1].getAttribute("name");
                            Size = tr[i].getElementsByTagName("td")[2].textContent;
                            Quantity = tr[i].getElementsByTagName("td")[3].textContent;
                        }
                    }
                }
                //const date = new Date();
                usrcartimg = usrcartimg+"Item: "+j+"<img src='" + selectedproductimage + "' alt='ProductImage' width='100' height='120'>"
                if(j>=4&&j%4==0){
                    usrcartimg=usrcartimg+"<br>";
                }
                usrcartsize = usrcartsize+"<p>Size of Item: "+j +": "+ Size + "</p><br>";
                usrcartquantity = usrcartquantity+"<p>Quantity of Item "+j +": "+ Quantity + "</p><br>";
                
            }
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
                if (usrcartshoex != null) html += usrcartshoex;
                html += "</body>";
                w.document.write(html);
            w.window.print();
            w.document.close();
        };
    </script>
</body>

</html>