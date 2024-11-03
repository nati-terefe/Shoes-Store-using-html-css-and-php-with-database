<?php
session_start(); // Starting Session
function edit($orderid, $size, $quantity)
{ // Function to register an admin
    $con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
    if ($con) { // Connection successfully established
        $existorderquery = "SELECT * FROM orders WHERE Num=$orderid"; // Query to select rows with matching credentials
        $numofexisting = mysqli_num_rows(mysqli_query($con, $existorderquery)); // Executing query and storing number or rows of returned result
        if (!$numofexisting > 0) { // Selecting if theres no an already existing admin match
            echo 'No Order with that ID in your cart.'; // Notifying that admin doesn't exists
            return false;
        } else { // Selecting if theres an already existing admin match
            $editorderquery = "UPDATE orders SET Size=$size, Quantity=$quantity WHERE Num=$orderid"; 
            // Query to remove admin info and credentials 
            mysqli_query($con, $editorderquery); // Executing query
            return true;
        }
    } else if (!$con) // Connection not successfully established
    {
        die('Could not connect: ' . mysqli_connect_error()); // Closing Cnnection
    }
    return false;
}
if ($_SERVER['REQUEST_METHOD'] == "POST") { // Checking for and POST Request to server
    $data = json_decode(file_get_contents("php://input"), true); // Decoding the recieved JSON Data
    $_SESSION['orderid'] = htmlspecialchars($data['orderid']); //Using Session variable to store username
    $_SESSION['size'] = htmlspecialchars($data['Size']); //Using Session variable to store username
    $_SESSION['quantity'] = htmlspecialchars($data['Quantity']); //Using Session variable to store username
    if (
        !empty($_SESSION['orderid']) && !empty($_SESSION['size']) &&!empty($_SESSION['quantity'])
        && ($_SESSION['size']==9 || $_SESSION['size']==10 || $_SESSION['size']==11 || $_SESSION['size']==12) 
        && !($_SESSION['quantity']<1 || $_SESSION['quantity']>10) 
        && edit($_SESSION['orderid'], $_SESSION['size'], $_SESSION['quantity'])
    ) {
        // Selection for correct removal
        echo "Order Edit Successful"; // Notifying Sign Up went successfully
    } else { //Selection for no matching credential and invalid inputs
        echo 'Please Enter valid info for Size(9,10,11,12) and Quantity(1-10)';
    }
} else {
    echo 'Error with Request Method. Request Method is: ' . $_SERVER['REQUEST_METHOD']; // Displaying Request method
}
