<?php
    include '../controller/dbConnect.php';
    $con = dbConnect();

    $userInfo = $_GET['userInfo'];
    $sql = "UPDATE `customers` SET 
    `clinic_name`='$userInfo[clinicName]',
    `adress`='$userInfo[adress]',
    `postadress`='$userInfo[postadress]',
    `email`='$userInfo[email]',
    `phone`='$userInfo[phone]',
    `date`='$userInfo[date]',
    `version`='$userInfo[version]',
    `workname`='$userInfo[workname]',
    `number_of_employees`='$userInfo[number_of_employees]',
    `website`='$userInfo[website]',
    `kiv_link`='$userInfo[kiv_link]',
    `username`='$userInfo[username]',
    `password`='$userInfo[password]',
    `revision`='$userInfo[revision]',
    `revisionmonth`='$userInfo[revisionmonth]',
    `internalrevision`='$userInfo[internalrevision]',
    `externalrevision`='$userInfo[externalrevision]',
    `revisor`='$userInfo[revisor]',
    `completed`='$userInfo[completed]',
    `certification`='$userInfo[certification]',
    `completed_assignments`='$userInfo[completed_assignments]',
    `products`='$userInfo[products]',
    `notes`='$userInfo[comment]',
    `customer_manager`='$userInfo[customer_manager]', 
    `location`='$userInfo[location]',
    `post_number`='$userInfo[post_number]',  
    `Active`='$userInfo[active]'
    WHERE `customer_id`='$userInfo[customer_id]'";
    if (mysql_query($sql, $con)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysql_error($con);
    }

    //contact
    for ($k = 1 ; $k < 4; $k++){ 
        $contacts_id = $userInfo['contacts_id' . $k .''];
        $name = $userInfo['contact' . $k . 'name'];
        $title = $userInfo['contact' . $k . 'title'];
        $mobile = $userInfo['contact' . $k . 'mobile'];
        $email = $userInfo['contact' . $k . 'email'];
        $sql = "UPDATE `contacts` SET 
        `contact_name`='$name', 
        `contact_title`='$title', 
        `contact_mobile`='$mobile', 
        `contact_email`='$email'
        WHERE `contacts_id`='$contacts_id'";
        if (mysql_query($sql, $con)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysql_error($con);
        }
    };

    //affiliate
    for ($k = 1 ; $k < 6; $k++){ 
        $affiliate_id = $userInfo['affiliate_id'. $k . ''];
        $name = $userInfo['affiliatename'. $k . ''];
        $number = $userInfo['affiliatenumber'. $k . ''];
        $sql = "UPDATE `affiliates` SET 
        `affiliate_name`='$name', 
        `affiliate_customer_id`='$number'
        WHERE `affiliate_id`='$affiliate_id'";
        if (mysql_query($sql, $con)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysql_error($con);
        }
    };

    mysql_close($con);

?>