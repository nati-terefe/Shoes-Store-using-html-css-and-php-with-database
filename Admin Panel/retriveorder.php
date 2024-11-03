<?php
  session_start(); // Starting Session
  function login($usrname, $password) { // Function to check for matching credentials and add to login history
    $con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
    if($con){ // Connection successfully established
      // Checking if theres a matching login information in database
      $passquery="SELECT * FROM accounts WHERE username='$usrname' and password='$password'"; // Query to select rows with matching credentials
      $numofmatch=mysqli_num_rows(mysqli_query($con, $passquery)); // Executing query and storing number or rows of returned result
      if($numofmatch==1){ // Selecting if theres a match
        // Finding the ID of the user from database
        $usridquery="SELECT * FROM accounts WHERE username='$usrname' and password='$password'"; // Query to select all matching values from accounts
        $sqlid= mysqli_fetch_array(mysqli_query($con, $usridquery)); // Executing Query and fetching values as array
        $_SESSION['id']= $sqlid['id']; // Storing fetched ID as session variable
        $userid=$sqlid['id']; // Storing fetched ID
        //add to login history
        $loginhisquery="insert into loginhistory(username, user) values ('$usrname', '$userid')"; // Query to add in to login history
        mysqli_query($con, $loginhisquery); // Executing Query
        return true;
      }
      else{ // Selecting if theres no match for credentials
        return false;
      }
    }
    else if (!$con) // Connection not successfully established
    {
      die('Could not connect: ' . mysqli_connect_error()); // Closing Cnnection
    }
    return false;
  } 
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION['usrname']=htmlspecialchars($_POST['username']); //Using Session variable to store username
    $_SESSION['password']=htmlspecialchars($_POST['password']); //Using Session variable to store password
    if (!empty($_SESSION['usrname']) && !empty($_SESSION['password']) && login($_SESSION['usrname'], $_SESSION['password'])){ 
      // Selection for correct login
      header("Location: /Final Project/index.php"); // Opening homepage
    }
    else{ //Selection for username or password field is empty or no matching credential
      echo '<script>alert("Please Enter Valid Credentials")
      window.location.href="index.php" </script>';
    }
  }
?>

