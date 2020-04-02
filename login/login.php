<?php
    include '../dbConnect.php';      
    $con = dbConnect();            

    //user input
    $username = $_GET['username'];
    $password = crypt($_GET['password'], '$1$kvalprakkundregister$');
    $storedUsers = mysqli_query($con,"SELECT password FROM users WHERE username = '$username'");
    $storedPassword = mysqli_fetch_array($storedUsers);
    
    if($storedPassword['password'] != $password){
        echo "Fel användarnamn eller lösenord";
    }else{
        echo "pass";
    };
    
    mysqli_close($con);
?>