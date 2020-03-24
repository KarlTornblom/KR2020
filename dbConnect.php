<?php
    function dbConnect(){
        $con=mysqli_connect("127.0.0.1","root","","kundregister2");
        // Check con
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $con->set_charset('utf8mb4');
        return $con;
    }
?>