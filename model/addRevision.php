<?php
    include '../controller/dbConnect.php';
    $con = dbConnect();
    
    $userInfo = $_GET['userInfo'];
    $revision_id = uniqid("revision" + $userInfo['clinicName']);
    $sql = "INSERT INTO `revisions`(
        `customer_id`, 
        `revision_id`, 
        `revision_date`, 
        `revision_type`, 
        `revision_revisor`, 
        `revision_result`, 
        `active`) 
        VALUES (
            '$userInfo[customer_id]',
            '$revision_id',
            '$userInfo[revision_date]',
            '$userInfo[revision_type]',
            '$userInfo[revision_revisor]',
            '$userInfo[revision_result]',
            '1'
        )";
    if (mysql_query($sql, $con)) {
        // // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysql_error($con);
    }
    echo "
    <div class='row' id='rev" . $revision_id . "'>
        <div class='col-md-2 offset-md-2' style='text-align: left;'>
            <input value='" . $userInfo['revision_date'] . "' autocomplete='off' type='text' class='form-control' style='width:100%;' readonly> 
        </div>
        <div class='col-md-2' style='text-align: left;'>
            <input value='" . $userInfo['revision_type'] . "' autocomplete='off' type='text' class='form-control'  style='width:100%;' readonly>                              
        </div>
        <div class='col-md-2' style='text-align: left;'>
            <input value='" . $userInfo['revision_revisor'] . "' autocomplete='off' type='text' class='form-control'  style='width:100%;' readonly>
        </div>
        <div class='col-md-2' style='text-align: left;'>
            <input value='" . $userInfo['revision_result'] . "' autocomplete='off' type='text' class='form-control'  style='width:100%;' readonly>
        </div>
        <div class='col-md-2' style='text-align: left;'>
            <button id='" . $revision_id . "' type='button' onclick='removeRevision(this.id)' class='btn btn-outline-danger'>-</button>
        </div>
    </div>";

    mysql_close($con);
?>