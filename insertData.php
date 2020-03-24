<?php
    include 'dbConnect.php';
    $con = dbConnect();

    //generates a guid
    $customer_id = com_create_guid();
    $affiliate_id = com_create_guid();
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
        `affiliate_id`, 
        `website`, 
        `kiv_link`, 
        `username`, 
        `password`, 
        `contacts_id`, 
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
            '$userInfo['clinicName']',
            '$userInfo['adress']',
            '$userInfo['postadress']',
            '$userInfo['email']',
            '$userInfo['phone']',
            '$userInfo['date']',
            '$userInfo['version']',
            '$userInfo['workname']',
            '$userInfo['number_of_employees']',
            '$affiliate_id',
            '$userInfo['website']',
            '$userInfo['kiv_link']',
            '$userInfo['username']',
            '$userInfo['password']',
            '$contacts_id',
            '$userInfo['revision']',
            '$userInfo['revisiondate']',
            '$userInfo['revisor']',
            '$userInfo['completed']',
            '$userInfo['certification']',
            '$userInfo['completed_assignments']',
            '$userInfo['products']',
            '$userInfo['comment']',
            '$userInfo['customer_manager']'
        )"
    );

    //contact
    for ($k = 0 ; $k < 2; $k++){ 
        mysqli_query($con,"INSERT INTO `contacts`(
        `contacts_id`, 
        `contact_name`, 
        `contact_title`, 
        `contact_mobile`, 
        `contact_email`) 
        VALUES (
            '$contacts_id',
            '$userInfo['contact"$k"_name']',
            '$userInfo['contact"$k"_title']',
            '$userInfo['contact"$k"_mobile']',
            '$userInfo['contact"$k"_email']')"
        );
    }
    //affiliate
    for ($k = 0 ; $k < 4; $k++){ 
        mysqli_query($con,"INSERT INTO `affiliates`(
            `affiliate_id`, 
            `affiliate_name`, 
            `affiliate_customer_id`) 
            VALUES (
                '$affiliate_id',
                '$userInfo['affiliatename"$k"]',
                '$userInfo['affiliatenumber"$k"]')"
        );
    }
    mysqli_close($con);
?>