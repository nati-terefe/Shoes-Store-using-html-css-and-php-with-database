<?php 
    session_start(); // Starting Session
    function remove($id)
    { // Function to register an admin
        $con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
        if ($con) { // Connection successfully established
            $existorderquery = "SELECT * FROM accounts WHERE id=$id"; // Query to select rows with matching credentials
            $numofexisting= mysqli_num_rows(mysqli_query($con, $existorderquery)); // Executing query and storing number or rows of returned result
            if (!$numofexisting > 0) { // Selecting if theres no an already existing admin match
                echo 'No Account with that ID.'; // Notifying that admin doesn't exists
                return false;
            } else { // Selecting if theres an already existing admin match
                $rmvloginhisofusr= "Update loginhistory SET user=NULL WHERE user=$id";
                mysqli_query($con, $rmvloginhisofusr); // Executing query
                $removequery = "delete from accounts WHERE id=$id"; 
                // Query to remove admin info and credentials 
                mysqli_query($con, $removequery); // Executing query
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
            $_SESSION['accountid'] = htmlspecialchars($data['accountid']); //Using Session variable to store username
            if (
                !empty($_SESSION['accountid']) && remove($_SESSION['accountid'])
            ) {
                // Selection for correct removal
                echo "Removal of Account is successful. Refresh Page to see change"; // Notifying Sign Up went successfully
            } else { //Selection for no matching credential and invalid inputs
                echo 'Please Enter valid info'; 
            }
    }
    else{
        echo 'Error with Request Method. Request Method is: '.$_SERVER['REQUEST_METHOD']; // Displaying Request method
    }
?>