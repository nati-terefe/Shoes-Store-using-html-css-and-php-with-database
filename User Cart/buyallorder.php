<?php 
    session_start(); // Starting Session
    function buyall($id)
    { // Function to register an admin
        $con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
        if ($con) { // Connection successfully established
            $i=1;
            while($i<sizeof($id)){
                $existorderquery = "SELECT * FROM orders WHERE Num=$id[$i] and status='Pending'"; // Query to select rows with matching credentials
                $numofexisting= mysqli_num_rows(mysqli_query($con, $existorderquery)); // Executing query and storing number or rows of returned result
                if (!$numofexisting > 0) { // Selecting if theres no an already existing admin match
                    echo "No Pending Order with ID; $id[$i] in your cart."; // Notifying that admin doesn't exists
                    return false;
                } else { // Selecting if theres an already matching pending order
                    $buypenquery = "UPDATE orders SET Status = 'Purchased' WHERE Num=$id[$i]"; 
                    // Query to remove admin info and credentials 
                    mysqli_query($con, $buypenquery); // Executing query
                }
                $i=$i+1;
            }
            return true;
        } else if (!$con) // Connection not successfully established
        {
            die('Could not connect: ' . mysqli_connect_error()); // Closing Cnnection
        }
        return false;
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") { // Checking for and POST Request to server
            $data = json_decode(file_get_contents("php://input"), true); // Decoding the recieved JSON Data
            $ordersids = $data['orderid']; //Using Session variable to store username
            if ( !empty($ordersids) && buyall($ordersids))
            {
                // Selection for correct removal
                echo "Purchasing of Pending order is successful."; // Notifying Sign Up went successfully
            } else { //Selection for no matching credential and invalid inputs
                echo 'No Pending Orders to Buy'; 
            }
    }
    else{
        echo 'Error with Request Method. Request Method is: '.$_SERVER['REQUEST_METHOD']; // Displaying Request method
    }
?>