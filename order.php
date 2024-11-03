<?php 
    session_start(); // Starting Session
    function order($product, $size, $quantity, $status, $userid, $price)
    { // Function to order
        $con = mysqli_connect("localhost", "root", "", "db_shoex"); // Connecting to Database
        if ($con) { // Connection successfully established
            if($status=="Purchased"){
                $existquery = "SELECT * FROM orders WHERE Product='$product' and Size='$size' 
                            and Quantity='$quantity' and status='Pending' and Username='$userid'"; // Query to select rows with exact order
                $numofexisting= mysqli_num_rows(mysqli_query($con, $existquery)); // Executing query and storing number or rows of returned result
                if (intval($numofexisting)==0) { // Selecting if theres no an already existing exact order by user
                    $orderquery = "insert into orders(Product, Size, Quantity, status, Username, Price) values ('$product',$size,$quantity,'$status','$userid','$price')"; 
                    // Query to add order into orders
                    mysqli_query($con, $orderquery); // Executing query
                } else { // Selecting if theres an already existing exact order by user as pending it is changed to purchased
                    $ordernumquery = "SELECT Num FROM orders WHERE Product='$product' and Size='$size' 
                                and Quantity='$quantity' and status='Pending' and Username='$userid' LIMIT 1;"; // Query to select top order num with exact order
                    $ordernum=mysqli_fetch_array(mysqli_query($con, $ordernumquery)); // Executing query and storing top order num
                    $updatestatusquery = "UPDATE orders SET Status = 'Purchased' WHERE Num=$ordernum[0]"; 
                    // Query to set status of match order from pending to purchased
                    mysqli_query($con, $updatestatusquery); // Executing query
                    echo "Order Purchased from Pending. "; // Notifying that order from cart has been purchased
                }
                return true;
            }
            else if($status=="Pending"){
                $orderquery = "insert into orders(Product, Size, Quantity, status, Username, Price) values ('$product',$size,$quantity,'$status','$userid','$price')"; 
                // Query to add order into orders
                mysqli_query($con, $orderquery); // Executing query
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
        $_SESSION['product'] = htmlspecialchars($data['Product']); //Using Session variable to store product
        $_SESSION['size'] = htmlspecialchars($data['Size']); //Using Session variable to store size
        $_SESSION['quantity'] = htmlspecialchars($data['Quantity']); //Using Session variable to store quantity
        $_SESSION['status'] = htmlspecialchars($data['Status']); //Using Session variable to store status
        $price = htmlspecialchars($data['Price']); //Using Session variable to store status
        $_SESSION['price']= floatval(substr($price,1,strlen($price)));
        if (
            !empty($_SESSION['product']) && !empty($_SESSION['quantity']) && !empty($_SESSION['status']) && !empty($_SESSION['price'])
            && order($_SESSION['product'], $_SESSION['size'], $_SESSION['quantity'], $_SESSION['status'], $_SESSION['usrname'], $_SESSION['price']))
        {
            // Selection for correct order
            $status=$_SESSION['status'];
            echo "$status Order set successfully."; // Notifying Pending/Purchase went successfully
        } else { //Selection for Invalid Order
            echo "Please Enter valid Order"; 
        }
    }
    else{
        echo 'Error with Request Method. Request Method is: '.$_SERVER['REQUEST_METHOD']; // Displaying Request method
    }
?>