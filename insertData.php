<?php
    include 'dbConnect.php';
    $con = dbConnect();

    //generates a guid
    $customer_id = com_create_guid();
    
    $contacts_id = com_create_guid();

    $userInfo = $_POST['userInfo'];
    mysqli_query($con,"INSERT INTO `customers`(
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
        `customer_manager`) 
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
            '$userInfo[customer_manager]'
        )"
    );

    //contact
    for ($k = 1 ; $k < 2; $k++){ 
        $contacts_id = com_create_guid();
        $name = $userInfo['contact' . $k . 'name'];
        $title = $userInfo['contact' . $k . 'title'];
        $mobile = $userInfo['contact' . $k . 'mobile'];
        $email = $userInfo['contact' . $k . 'email'];
        mysqli_query($con,"INSERT INTO `contacts`(
        `contacts_id`, 
        `contact_name`, 
        `contact_title`, 
        `contact_mobile`, 
        `contact_email`) 
        VALUES (
            '$contacts_id',
            '$name',
            '$title',
            '$mobile',
            '$email')"
        );
    };

    //affiliate
    for ($k = 1 ; $k < 4; $k++){ 
        $affiliate_id = com_create_guid();
        $name = $userInfo['affiliatename'. $k];
        $number = $userInfo['affiliatenumber'. $k];
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
    };

    mysqli_close($con);
?>