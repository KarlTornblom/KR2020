<?php
    include '../controller/dbConnect.php';
    $con = dbConnect();

    $revision_id = $_GET['id'];
    
    $sql = "UPDATE `revisions` SET  
    `active`='0'
    WHERE `revision_id`='$revision_id'";

    if (mysql_query($sql, $con)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysql_error($con);
    }

    mysql_close($con);

?>