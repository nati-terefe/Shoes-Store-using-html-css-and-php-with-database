<?php
    session_start(); // Starting Session
    function edit($id, $fullname, $usrname, $passwd, $email)
    { // Function to register an admin
        $con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
        if ($con) { // Connection successfully established
            $existadminquery = "SELECT * FROM admins WHERE id=$id"; // Query to select rows with matching credentials
            $numofexisting = mysqli_num_rows(mysqli_query($con, $existadminquery)); // Executing query and storing number or rows of returned result
            if (!$numofexisting > 0) { // Selecting if theres no an already existing admin match
                echo 'No Admin with that ID.'; // Notifying that admin doesn't exists
                return false;
            } else { // Selecting if theres an already existing admin match
                $matchquery = "SELECT * FROM admins WHERE username='$usrname' or password='$passwd' or email='$email'"; // Query to select rows with matching credentials
                $numofmatching = mysqli_num_rows(mysqli_query($con, $matchquery)); // Executing query and storing number or rows of returned result
                if ($numofmatching > 1) {
                    echo 'Theres an Admin with matching Credential'; // Notifying that admin doesn't exists
                    return false;
                } // Selecting if theres no an already existing admin match
                else {
                    $editadminquery = "UPDATE admins SET fullname='$fullname', username='$usrname', password='$passwd', email='$email' WHERE id=$id";
                    // Query to remove admin info and credentials 
                    mysqli_query($con, $editadminquery); // Executing query
                    return true;
                }
            }
        } else if (!$con) // Connection not successfully established
        {
            die('Could not connect: ' . mysqli_connect_error()); // Closing Cnnection
        }
        return false;
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") { // Checking for and POST Request to server
        $data = json_decode(file_get_contents("php://input"), true); // Decoding the recieved JSON Data
        $_SESSION['adminid'] = htmlspecialchars($data['adminid']); //Using Session variable to store username
        $_SESSION['fullname'] = htmlspecialchars($data['fullname']); //Using Session variable to store username
        $_SESSION['usrname'] = htmlspecialchars($data['usrname']); //Using Session variable to store username
        $_SESSION['passwd'] = htmlspecialchars($data['passwd']); //Using Session variable to store username
        $_SESSION['email'] = htmlspecialchars($data['email']); //Using Session variable to store username
        if (
            !empty($_SESSION['adminid']) && !empty($_SESSION['fullname']) && !empty($_SESSION['usrname'])
            && !empty($_SESSION['passwd']) && !empty($_SESSION['email'])
            && edit($_SESSION['adminid'], $_SESSION['fullname'], $_SESSION['usrname'], $_SESSION['passwd'], $_SESSION['email'])
        ) {
            // Selection for correct removal
            echo "Admin Edit Successful"; // Notifying Sign Up went successfully
        } else { //Selection for no matching credential and invalid inputs
            echo 'Please Enter valid info';
        }
    } else {
        echo 'Error with Request Method. Request Method is: ' . $_SERVER['REQUEST_METHOD']; // Displaying Request method
    }
    
?>