<?php 

    require_once("Connection.php");
    $query = " select * from trijotech ";
    $result = mysqli_query($con,$query);
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values submitted via the login form
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Assuming you have a database connection established
    // and a query executed to fetch the user details
    
    $flag=false;
    while($row = mysqli_fetch_assoc($result)) {
        $UserID = $row['username'];
        $UserName = $row['password'];
        
        if ($UserID == $username && $UserName == $password) {
            header("Location: Welcome.html?username=".urlencode($username));
            $flag=true;
             exit(); // Terminate the script to prevent further execution
        }

          
    } 

    if($flag==false){
        echo "ACCESS DENIED";
    }

    
/*
    if($row = mysqli_fetch_assoc($result)) {
        $UserID = $row['user'];
        $UserName = $row['password'];
        
        if ($UserID != $username && $UserName != $password) {
            echo "ACCESS DENIED";
            
        }
       
    }  */

}
?>