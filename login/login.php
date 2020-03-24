<?php
                
    $con=mysqli_connect("127.0.0.1","root","","kundregister2");
    // Check con
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    };
    $con->set_charset('utf8mb4');

    //user input
    $username = $_POST['username'];
    $password = crypt($_POST['password'], '$1$kvalprakkundregister$');
    $storedUsers = mysqli_query($con,"SELECT password FROM users WHERE username = '$username'");
    $storedPassword = mysqli_fetch_array($storedUsers);
    
    if($storedPassword['password'] != $password){
        echo "Fel användarnamn eller lösenord";
    }else{
        echo "pass";
    };


    // $result = mysqli_query($con,"SELECT * FROM  WHERE clinic_name LIKE '$userInput'");
    mysqli_close($con);
?>