<?php
    include 'dbConnect.php';
    $con = dbConnect();

    //generates a guid
    

    $userInfo = $_GET['userInfo'];
    $customer_id = uniqid($userInfo['clinicName']);
    $sql = "INSERT INTO `customers`(
        `customer_id`, 
        `clinic_name`, 
        `adress`, 
        `postadress`, 
        `email`, 
        `phone`, 
        `date`, 
        `version`, 
        `workname`, 
        `number_of_employees`, 
        `website`, 
        `kiv_link`, 
        `username`, 
        `password`, 
        `revision`, 
        `revisiondate`, 
        `revisor`, 
        `completed`, 
        `certification`, 
        `completed_assignments`, 
        `products`, 
        `notes`, 
        `post_number`, 
        `location`, 
        `customer_manager`,
        `Active`) 
        VALUES (
            '$customer_id',
            '$userInfo[clinicName]',
            '$userInfo[adress]',
            '$userInfo[postadress]',
            '$userInfo[email]',
            '$userInfo[phone]',
            '$userInfo[date]',
            '$userInfo[version]',
            '$userInfo[workname]',
            '$userInfo[number_of_employees]',
            '$userInfo[website]',
            '$userInfo[kiv_link]',
            '$userInfo[username]',
            '$userInfo[password]',
            '$userInfo[revision]',
            '$userInfo[revisiondate]',
            '$userInfo[revisor]',
            '$userInfo[completed]',
            '$userInfo[certification]',
            '$userInfo[completed_assignments]',
            '$userInfo[products]',
            '$userInfo[comment]',
            '$userInfo[post_number]',
            '$userInfo[location]',
            '$userInfo[customer_manager]',
            '1'
        )";
    if (mysql_query($sql, $con)) {
        // // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysql_error($con);
    }

    //contact
    for ($k = 1 ; $k < 4; $k++){ 
        
        $name = $userInfo['contact' . $k . 'name'];
        $title = $userInfo['contact' . $k . 'title'];
        $mobile = $userInfo['contact' . $k . 'mobile'];
        $email = $userInfo['contact' . $k . 'email'];
        $contacts_id = uniqid($name);
        $sql = "INSERT INTO `contacts`(
        `customer_id`, 
        `contacts_id`, 
        `contact_name`, 
        `contact_title`, 
        `contact_mobile`, 
        `contact_email`) 
        VALUES (
            '$customer_id',
            '$contacts_id',
            '$name',
            '$title',
            '$mobile',
            '$email')";
        if (mysql_query($sql, $con)) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysql_error($con);
        }
    };

    //affiliate
    for ($k = 1 ; $k < 6; $k++){ 
        
        $name = $userInfo['affiliatename'. $k];
        $number = $userInfo['affiliatenumber'. $k];
        $affiliate_id = uniqid($name);
        $sql = "INSERT INTO `affiliates`(
            `customer_id`,
            `affiliate_id`, 
            `affiliate_name`, 
            `affiliate_customer_id`) 
            VALUES (
                '$customer_id',
                '$affiliate_id',
                '$name',
                '$number')";
        if (mysql_query($sql, $con)) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysql_error($con);
        }
    };

    mysql_close($con);
?>