<?php 
    session_start(); // Starting Session
    function signup($fullname, $email, $usrname, $password)
    { // Function to register an admin
        $con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
        if ($con) { // Connection successfully established
            $existadminquery = "SELECT * FROM admins WHERE fullname='$fullname' and email='$email' 
                            and username='$usrname' and password='$password'"; // Query to select rows with matching credentials
            $numofexisting= mysqli_num_rows(mysqli_query($con, $existadminquery)); // Executing query and storing number or rows of returned result
            if (!$numofexisting > 0) { // Selecting if theres no an already existing admin match
                $registerquery = "insert into admins(fullname, username, password, email) values ('$fullname','$usrname','$password','$email')"; 
                // Query to add admin info and credentials to admins
                mysqli_query($con, $registerquery); // Executing query
                return true;
            } else { // Selecting if theres an already existing admin match
                echo 'Admin Already Exists'; // Notifying that admin exists
                return false;
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
            $_SESSION['usrname'] = htmlspecialchars($data['username']); //Using Session variable to store username
            $_SESSION['password'] = htmlspecialchars($data['password']); //Using Session variable to store password
            $_SESSION['fullname'] = htmlspecialchars($data['fullname']); //Using Session variable to store fullname
            $_SESSION['email'] = htmlspecialchars($data['email']); //Using Session variable to store email
            if (
                !empty($_SESSION['usrname']) && !empty($_SESSION['password'])
                && !empty($_SESSION['fullname']) && !empty($_SESSION['email']
                && signup($_SESSION['fullname'], $_SESSION['email'], $_SESSION['usrname'], $_SESSION['password']))
            ) {
                // Selection for correct login
                echo "Admin Sign up is successful. He/She can Now login as an Admin"; // Notifying Sign Up went successfully
            } else { //Selection for matching credential and invalid inputs
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