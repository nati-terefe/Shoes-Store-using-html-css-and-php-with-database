<?php
  session_start(); // Starting Session
  $_SESSION['isadmin']=0;
  $_SESSION['login']=0;
  function login($usrname, $password) { // Function to check for matching credentials and add to login history
    $con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
    if($con){ // Connection successfully established
      // Checking if theres a matching login information in accounts database
      $passquery="SELECT * FROM accounts WHERE username='$usrname' and password='$password'"; // Query to select rows with matching credentials
      $numofmatch=mysqli_num_rows(mysqli_query($con, $passquery)); // Executing query and storing number or rows of returned result
      if($numofmatch!=0){ // Selecting if theres a match
        // Finding the ID of the user from database
        $usridquery="SELECT * FROM accounts WHERE username='$usrname' and password='$password'"; // Query to select all matching values from accounts
        $sqlid= mysqli_fetch_array(mysqli_query($con, $usridquery)); // Executing Query and fetching values as array
        $_SESSION['id']= $sqlid['id']; // Storing fetched ID as session variable
        $userid=$sqlid['id']; // Storing fetched ID
        //add to login history
        $loginhisquery="insert into loginhistory(username, user) values ('$usrname', '$userid')"; // Query to add in to login history
        mysqli_query($con, $loginhisquery); // Executing Query
        $_SESSION['isadmin']=0;
        $_SESSION['usrname']=$usrname; //Using Session variable to store username
        return true;
      }
      else if($usrname=="superadmin" && $password=="superadmin"){
        $_SESSION['isadmin']=1;
        $_SESSION['usrname']=$usrname;
        return true;
      }
      else{ // Selecting if theres no match for credentials
        $passadminquery="SELECT * FROM admins WHERE username='$usrname' and password='$password'"; // Query to select rows with matching credentials
        $numofadminmatch=mysqli_num_rows(mysqli_query($con, $passadminquery)); // Executing query and storing number or rows of returned result
        if($numofadminmatch!=0){ // Selecting if theres a match
          // Finding the ID of the user from database
          $adminidquery="SELECT * FROM admins WHERE username='$usrname' and password='$password'"; // Query to select all matching values from accounts
          $sqladminid= mysqli_fetch_array(mysqli_query($con, $adminidquery)); // Executing Query and fetching values as array
          $_SESSION['id']= $sqladminid['id']; // Storing fetched ID as session variable
          $adminid=$sqladminid['id']; // Storing fetched ID
          //add to login history
          $loginhisquery="insert into loginhistory(username) values ('$usrname')"; // Query to add in to login history
          mysqli_query($con, $loginhisquery); // Executing Query
          $_SESSION['isadmin']=2;
          $_SESSION['usrname']=$usrname;
          return true;
        }
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
    $usr=htmlspecialchars($_POST['username']); //Using Session variable to store username
    $_SESSION['usrname1']=htmlspecialchars($_POST['username']);
    $_SESSION['password']=htmlspecialchars($_POST['password']); //Using Session variable to store password
    if (!empty($usr) && !empty($_SESSION['password']) && login($usr, $_SESSION['password'])){ 
      // Selection for correct login
      if($_SESSION['isadmin']==1 || $_SESSION['isadmin']==2){
        header("Location: /Final Project/Admin Panel/index.php"); // Opening Admin homepage
      }
      else{
        $_SESSION['login']=1;
        header("Location: /Final Project/index.php"); // Opening homepage
      }
      
    }
    else{ //Selection for username or password field is empty or no matching credential
      echo '<script>alert("Please Enter Valid Credentials")
      window.location.href = " /Final Project/Log-in soe - Copy/index.php"</script>';
    }
  }
?>

