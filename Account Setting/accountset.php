<?php
session_start(); // Starting Session
$con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
if ($con) { // Connection successfully established
    $retriveusrname = "SELECT * FROM loginhistory ORDER BY id DESC LIMIT 1;"; // Query to select all orders
    $userid = mysqli_fetch_array(mysqli_query($con, $retriveusrname)); // Executing query and storing result
    $_SESSION['usrid'] = $userid[1];
    $id = $userid[3];
    $retriveaccount = "SELECT * FROM accounts where id=$id";
    $account = mysqli_query($con, $retriveaccount); // Executing query and storing result
    $rows = $account->fetch_assoc();
} else if (!$con) // Connection not successfully established
{
    die('Could not connect: ' . mysqli_connect_error()); // Closing Cnnection
}
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Account Setting</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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

        .logo {
            background-image: url(../logo.png);
            background-repeat: no-repeat;
            background-size: contain;
            height: 10%;
            width: 10%;
            display: flex;
            margin-top: 5%;
            margin-left: 5%;
            /* horizontal, vertical */
        }

        .btnwrapper {
            display: flex;
            justify-content: center;
            align-content: center;
            margin-top: 20%;
        }

        .rmvbtn {
            width: 150px;
            height: 40px;
            border: none;
            border-radius: 50px;
            background: blue;
            color: #fff;
            font-weight: 600;
            margin: 10px 10px;
            text-transform: uppercase;
            cursor: pointer;
        }

        .rmvbtn:hover {
            background: lightblue;
            color: black;
        }

        .formwrapper {
            display: flex;
            align-items: center;
            width: 50%;
            min-width: 238px;
            padding: 0 40%;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 40%;
            min-width: 238px;
            padding: 0 10px;
        }

        .input-field {
            width: 100%;
            height: 50px;
            background: #f0f0f0;
            margin: 10px 0;
            border: 2px solid lightblue;
            border-radius: 50px;
            display: flex;
            align-items: center;
        }

        .input-field i {
            flex: 1;
            text-align: center;
            color: #666;
            font-size: 15px;
        }

        .input-field input {
            flex: 5;
            background: none;
            border: none;
            outline: none;
            width: 100%;
            font-size: 18px;
            font-weight: 600;
            color: #444;
        }
    </style>
</head>

<body>
    <a href="../index.php"><img src="../logo.png" alt="Shoe X Logo" class="logo"></a>
    <div class="wrapper">
        <h3 id="title" style="display: absolute; margin-top: -2%; margin-left: 45%; width: 100%; font-family: Andale Mono; font-size: 20px;">Account Settings</h3>
        <div class="formwrapper">
            <form action="" id="accountform" class="sign-up-form" method="POST" style="display: none; width: 50%">
                <h3 style="font-family: monospace">User ID: <span id="spanid"><?php echo $rows['id']; ?></span></h3>
                <div class="input-field">
                    <i class="fas fa-user">Name:</i>
                    <input type="text" placeholder="Full name" name="fullname" id="fullname" value="<?php echo $rows['fullname']; ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-user">Username</i>
                    <input type="text" placeholder="Username" name="username" id="username" value="<?php echo $rows['username']; ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope">Email</i>
                    <input type="text" placeholder="Email" name="email" id="email" value="<?php echo $rows['email']; ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock">Password</i>
                    <input type="password" placeholder="Password" name="password" id="password" value="<?php echo $rows['password']; ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock">Confirm</i>
                    <input type="password" placeholder=" Confirm Password" name="confirmpassword" value="<?php echo $rows['password']; ?>">
                </div>
                <input type="submit" value="Save Edit" class="rmvbtn">
                <input type="button" value="Cancel" id="cancel-btn" class="rmvbtn" onClick="window.location.reload(true)">
            </form>
        </div>
        <div class="btnwrapper">
            <button id="editacc-btn" class="rmvbtn" onclick="accountedit(<?php echo $userid[3]; ?>)">Edit Account</button>
            <button id="deleteacc-btn" class="rmvbtn" onclick="accountdelete(<?php echo $userid[3]; ?>)">Delete Account</button>
            <button id="logout-btn" class="rmvbtn" onclick="window.location.href='../Log-in soe - Copy/index.php'">Log Out</button>
        </div>
    </div>
    <script>
        function accountedit(num) {
            document.title = "Edit Account";
            var form = document.getElementById("accountform");
            form.style.display = "inline";
            if (num != null && !isNaN(num)) { // If ID is selected
                document.getElementById("title").innerHTML = "You can Edit Account"
                document.getElementById("editacc-btn").style.display = "none";
                document.getElementById("deleteacc-btn").style.display = "none";
                document.getElementById("logout-btn").style.display = "none";
                document.getElementById("reloadpage-btn").style.display = "none";
            }
        }
        var form = document.getElementById("accountform");
        const fullNameInput = form.querySelector('input[type="text"][placeholder="Full name"]');
        const emailInput = form.querySelector('input[type="text"][placeholder="Email"]');
        const passwordInput = form.querySelector('input[type="password"][placeholder="Password"]');
        const confirmPasswordInput = form.querySelector('input[type="password"][placeholder=" Confirm Password"]');
        const usernameInput = form.querySelector('input[type="text"][placeholder="Username"]');
        const userid = document.getElementById("spanid").innerhtml || document.getElementById("spanid").value || document.getElementById("spanid").textContent;
        form.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the form from submitting
            if (!validateFullName(fullNameInput.value)) {
                alert('Please enter a valid full name.');
                return;
            }

            if (!validateEmail(emailInput.value)) {
                alert('Please enter a valid email address.');
                return;
            }

            if (!validatePassword(passwordInput.value)) {
                alert('Password must be 8 - 15 characters long.');
                return;
            }

            if (passwordInput.value !== confirmPasswordInput.value) {
                alert('Password and Confirm Password must match.');
                return;
            }

            if (!validateUsername(usernameInput.value)) {
                alert('Username must be at 4 - 15 characters long and can only contain letters, numbers, and underscores.');
                return;
            }
            let confi = confirm("Are you sure you want to Save Edit");
            if (confi) {
                var data = {
                    accountid: parseInt(userid),
                    fullname: fullNameInput.value,
                    email: emailInput.value,
                    usrname: usernameInput.value,
                    passwd: passwordInput.value,
                }
                // Declaring HTTP Request Variable
                var xhr = new XMLHttpRequest();
                // Set the PHP page you want to send data to
                xhr.open("POST", "../Admin Panel/editaccount.php", true);
                xhr.setRequestHeader("Content-Type", "application/json");
                // What to do when you receive a response
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        alert(xhr.responseText); // Alerting any echo from the php as it is
                    }
                };
                // Send the data
                xhr.send(JSON.stringify(data));
                form.reset();
                window.location.reload(true);
            }
        });
        // Full name validation function
        function validateFullName(fullName) {
            // Regular expression pattern for full name validation
            // Allows letters, hyphens, apostrophes, spaces, and periods
            const fullNamePattern = /^[A-Za-z-'\s.]+$/;
            return fullNamePattern.test(fullName) && fullName.length <= 30;
        }

        // Email validation function
        function validateEmail(email) {
            // Regular expression pattern for email validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email) && email.length <= 30;
        }

        // Password validation function
        function validatePassword(password) {
            return password.length >= 8 && password.length <= 15;
        }

        // Username validation function
        function validateUsername(username) {
            // Regular expression pattern for username validation
            const usernamePattern = /^[A-Za-z0-9_]{4,}$/;
            return usernamePattern.test(username) && username.length <= 15;
        }

        function accountdelete(num) {
            document.title = "Delete Account";
            let confi = confirm("Are you sure you want to delete you account");
            if (confi) {
                var data = {
                    accountid: num,
                }
                // Declaring HTTP Request Variable
                var xhr = new XMLHttpRequest();
                // Set the PHP page you want to send data to
                xhr.open("POST", "../Admin Panel/rmvaccount.php", true);
                xhr.setRequestHeader("Content-Type", "application/json");
                // What to do when you receive a response
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        alert(xhr.responseText); // Alerting any echo from the php as it is
                        if (xhr.responseText == "Removal of Account is successful. Refresh Page to see change") {
                            window.location.href = '../index.php'
                        }
                    }
                };
                // Send the data
                xhr.send(JSON.stringify(data));
            } else {
                alert("Account Deletion Cancelled.");
            }
        }
    </script>
</body>

</html>