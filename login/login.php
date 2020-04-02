<?php
    include '../dbConnect.php';      
    $con = dbConnect();            

    //user input
    $username = $_GET['username'];
    $password = crypt($_GET['password'], '$1$kvalprakkundregister$');
    $storedUsers = mysql_query("SELECT password FROM users WHERE username = '$username'",$con);

    if($storedUsers === FALSE) { 
        die(mysql_error()); // TODO: better error handling
    }
    $storedPassword = mysql_fetch_array($storedUsers, MYSQL_ASSOC);
    
    if($storedPassword['password'] != $password){
        echo "Fel användarnamn eller lösenord";
    }else{
        echo "pass";
    };
    
    mysql_close($con);
?>