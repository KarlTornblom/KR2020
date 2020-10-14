<?php
    include '../controller/dbConnect.php';      
    $con = dbConnect();   

    session_start();
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
        setcookie("Authentication", "9Yws8g6rA9VwAF7ELAJVSrEunhhXDpQpvJVRmj3eQSTweqVcAXx2kHUEmTYFL26NwamVF5CzLs9L84MCRgR2hvY9tuKLutfRDvgcrD7nRzJh", time() + (10 * 365 * 24 * 60 * 60), "/");
        echo "pass";
    };
    
    mysql_close($con);
?>