<?php
    $userInfo = $_POST['userInfo'];
    $result = mysqli_query($con,"INSERT INTO `customers`(
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
        `number_of_affiliates`, 
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
        VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21],[value-22],[value-23],[value-24],[value-25],[value-26])");
    include 'dbConnect.php';      
    $con = dbConnect();


    mysqli_close($con);
?>