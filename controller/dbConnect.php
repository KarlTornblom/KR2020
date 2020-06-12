<?php
    function dbConnect(){
        $con=mysql_connect("localhost","root","","kundregister2");
        $db=mysql_select_db("kundregister2", $con);
        // Check con
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        mysql_set_charset('utf8mb4',$con);
        return $con;
    }
?>