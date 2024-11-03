<?php 
    session_start(); // Starting Session
    function remove($id, $password)
    { // Function to register an admin
        $con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
        if ($con) { // Connection successfully established
            $password="superadmin";
            $existadminquery = "SELECT * FROM admins WHERE id='$id'"; // Query to select rows with matching credentials
            $numofexisting= mysqli_num_rows(mysqli_query($con, $existadminquery)); // Executing query and storing number or rows of returned result
            if (!$numofexisting > 0) { // Selecting if theres no an already existing admin match
                echo 'No admin exist with that ID.'; // Notifying that admin doesn't exists
                return false;
            } else { // Selecting if theres an already existing admin match
                $removequery = "delete from admins where id='$id'"; 
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
        if($_SESSION['isadmin']==1){
            $data = json_decode(file_get_contents("php://input"), true); // Decoding the recieved JSON Data
            $_SESSION['id'] = htmlspecialchars($data['id']); //Using Session variable to store username
            $_SESSION['password'] = htmlspecialchars($data['password']); //Using Session variable to store password
            if (
                !empty($_SESSION['id']) && !empty($_SESSION['password']) && remove($_SESSION['id'], $_SESSION['password'])
            ) {
                // Selection for correct removal
                echo "Remove is successful."; // Notifying Sign Up went successfully
            } else { //Selection for no matching credential and invalid inputs
                echo 'Please Enter valid info'; 
            }
        }
        else{
            echo 'This is Super Admin Feature ONLY'; 
        }
    }
    else{
        echo 'Error with Request Method. Request Method is: '.$_SERVER['REQUEST_METHOD']; // Displaying Request method
    }
?>