<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
if ($con) { // Connection successfully established
    // Retriving all orders
    $retriveorders = "SELECT * FROM orders"; // Query to select all orders
    $orders = mysqli_query($con, $retriveorders); // Executing query and storing result
    // Retriving all accounts
    $retriveaccounts = "SELECT * FROM accounts"; // Query to select all accounts
    $accounts = mysqli_query($con, $retriveaccounts); // Executing query and storing result
    // Retriving all login history
    $retriveloginhis = "SELECT * FROM loginhistory"; // Query to select all accounts
    $loginhis = mysqli_query($con, $retriveloginhis); // Executing query and storing result
    // Retriving all messages
    $retrivemsgs = "SELECT * FROM messages"; // Query to select all accounts
    $msgs = mysqli_query($con, $retrivemsgs); // Executing query and storing result
    // Retriving all admins
    $retriveadmins = "SELECT * FROM admins"; // Query to select all accounts
    $admins = mysqli_query($con, $retriveadmins); // Executing query and storing result
} else if (!$con) // Connection not successfully established
{
    die('Could not connect: ' . mysqli_connect_error()); // Closing Cnnection
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="index.css">
    <title>Shoe X Orders</title>
</head>

<body>
    <div class="container">
        <div class="tableTitle" style="position: absolute; top: 10%; left: 5%;">
            <h2 id="h2tabletitle" style="align-self: left;">List of Active Orders</h2>
        </div>
        <div class="signin-signup">
            <!-- TABLE CONSTRUCTION -->
            <table class="orders" id="usrordertable" border="solid black 0.7px" style="padding: 0;">
                <tr>
                    <th>Num</th>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Username</th>
                    <th>Order Date</th>
                    <th>Price</th>
                    <th>Modify Order</th>
                </tr>
                <?php
                while ($rows = $orders->fetch_assoc()) {
                ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH   ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['Num']; ?></td>
                        <td><img src="<?php echo $rows['Product']; ?>" alt="ProductImage" width="50" height="60"></td>
                        <td><?php echo $rows['Size']; ?></td>
                        <td><?php echo $rows['Quantity']; ?></td>
                        <td><?php echo $rows['status']; ?></td>
                        <td><?php echo $rows['Username']; ?></td>
                        <td><?php echo $rows['Date']; ?></td>
                        <td><?php echo $rows['Price']; ?></td>
                        <td>
                            <button class="tablebtn" id="editorder-btn" onclick="editorder(<?php echo $rows['Num']; ?>)">Edit</button>
                            <button class="tablebtn" onclick="rmvorder(<?php echo $rows['Num']; ?>)" style="background-color: red">Delete</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <p class="account-text">Want to See List of Accounts? <a href="#" id="sign-up-btn2">Accounts</a></p>
            <table class="accounts" id="accountstbl" border="solid black 0.7px" style="padding: 0;">
                <tr>
                    <th>Number</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>E-mail</th>
                    <th>Modify Accounts</th>
                </tr>
                <?php
                while ($rows = $accounts->fetch_assoc()) {
                ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH   ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['fullname']; ?></td>
                        <td><?php echo $rows['username']; ?></td>
                        <td><?php echo $rows['password']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td>
                            <button class="tablebtn" id="editaccount-btn" onclick="editaccount(<?php echo $rows['id']; ?>)">Edit</button>
                            <button class="tablebtn" onclick="rmvaccount(<?php echo $rows['id']; ?>)" style="background-color: red">Delete</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <table id="loginhistable" class="accounts" border="solid black 0.7px" style="padding: 0; display: none;">
                <tr>
                    <th>Num</th>
                    <th>Username</th>
                    <th>Time of Login</th>
                    <th>UserID</th>
                </tr>
                <?php
                while ($rows = $loginhis->fetch_assoc()) {
                ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH   ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['username']; ?></td>
                        <td><?php echo $rows['timeoflogin']; ?></td>
                        <td><?php echo $rows['user']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <table id="msgtable" class="accounts" border="solid black 0.7px" style="padding: 0; display: none; Overflow-y:scroll;">
                <tr>
                    <th>Num</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Message</th>
                </tr>
                <?php
                while ($rows = $msgs->fetch_assoc()) {
                ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH   ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['num']; ?></td>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['message']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <table id="adminstable" class="accounts" border="solid black 0.7px" style="padding: 0; display: none;">
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Date of Registration</th>
                    <th>Modify Admins</th>
                </tr>
                <?php
                while ($rows = $admins->fetch_assoc()) {
                ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH   ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['fullname']; ?></td>
                        <td><?php echo $rows['username']; ?></td>
                        <td><?php echo $rows['password']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['dateofregistration']; ?></td>
                        <td>
                            <button class="tablebtn" id="editadmin-btn" onclick="editadmin(<?php echo $rows['id']; ?>, <?php echo $_SESSION['isadmin']; ?>)">Edit</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <button class="btn" id="addadmin1-btn" style="display: none;" onclick="addingadmin(<?php echo $_SESSION['isadmin']; ?>)">Add Admin</button>
                <button class="btn" id="removeadmin-btn" style="display: none;" onclick="removingadmin(<?php echo $_SESSION['isadmin']; ?>)">Remove Admin</button>
            </table>
            <p class="order-text"><br><br>Want to See List of Orders? <a href="#" id="sign-in-btn2">Orders</a><br>
                Want to See List of Login History? <a href="#" id="loginhis-btn2">Login History</a><br>
                Want to See List of Messages? <a href="#" id="msg-btn2">Messages</a><br>
                Want to Add admin? <a href="#" id="addadmin-btn2">Admins</a><br>
            </p>
        </div>
        <div style="margin-top: 3%; margin-left: 25%; width: 30%; height: 40%;">
            <form action="" id="addadminform" class=".addadminform" method="POST" style="display: none;">
                <h2 class="title">Fill Admin Form</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Full name" name="fullname" id="fullname">
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="username" id="username">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email" name="email" id="email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" id="password">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder=" Confirm Password" name="confirmpassword">
                </div>
                <input type="submit" value="Add Admin" class="btn">
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <button class="btn" id="sign-in-btn">Back to Orders</button>
                </div>
                <div class="panel left-panel">
                    <div class="content">
                        <button class="btn" id="loginhis-btn">Login History</button>
                    </div>
                </div>
                <div class="panel left-panel">
                    <div class="content">
                        <button class="btn" id="msg-btn">Messages</button>
                    </div>
                </div>
                <div class="panel left-panel">
                    <div class="content">
                        <button class="btn" id="addadmin-btn">Admins</button>
                    </div>
                </div>
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <button class="btn" id="accounts-btn">Accounts & More</button>
                </div>
            </div>
        </div>
    </div>
    <script src="app.js">    </script>
</body>

</html>