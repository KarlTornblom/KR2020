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
        $_SESSION["login"] = "?q9d$+\9YHFzb;(m2-QfH582kPH[>U-4-Z=_x.apQT3T_AjHa24#vvXf2tM:Wr8zgeCxzXV6qKzcx8B\u;!f>SZ,JS5Tp\d]#;BEY^Cd[Gb2XY<A`Czeu&E#j";
        echo "pass";
    };
    
    mysql_close($con);
?>