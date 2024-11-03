<?php 
    session_start(); // Starting Session
    function remove($id, $usrname)
    { // Function to register an admin
        $con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
        if ($con) { // Connection successfully established
            $existorderquery = "SELECT * FROM orders WHERE Num=$id and Username='$usrname' and status='Pending'"; // Query to select rows with matching credentials
            $numofexisting= mysqli_num_rows(mysqli_query($con, $existorderquery)); // Executing query and storing number or rows of returned result
            if (!$numofexisting > 0) { // Selecting if theres no an already existing admin match
                echo 'No Pending Order with that ID in your cart.'; // Notifying that admin doesn't exists
                return false;
            } else { // Selecting if theres an already matching pending order
                $buypenquery = "UPDATE orders SET Status = 'Purchased' WHERE Num=$id"; 
                // Query to remove admin info and credentials 
                mysqli_query($con, $buypenquery); // Executing query
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
            if (
                !empty($_SESSION['orderid']) && remove($_SESSION['orderid'], $_SESSION['usrname'])
            ) {
                // Selection for correct removal
                echo "Purchasing of Pending order is successful."; // Notifying Sign Up went successfully
            } else { //Selection for no matching credential and invalid inputs
                echo 'Please Enter valid info'; 
            }
    }
    else{
        echo 'Error with Request Method. Request Method is: '.$_SERVER['REQUEST_METHOD']; // Displaying Request method
    }
?>