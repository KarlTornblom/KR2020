<?php
    include 'dbConnect.php';      
    $con = dbConnect();
    
    $userInput = $_GET['userInput'];
    if($userInput['search'] == "alla"){
        $result = mysql_query($con,"SELECT * FROM customers");
    } 
    $search = "%" . $userInput['search'] . "%";
    $result = mysql_query("SELECT * FROM customers WHERE clinic_name LIKE '$search' AND Active = 1",$con);
    
    if(mysql_num_rows($result) > 0){
        echo "
        <table data-toggle='table' class='table table-bordered' id='kundregister-rad'>
            <thead>
                <tr>
                    <th scope='col'  data-sortable='true' id='clinic_name'>Namn klinik</th>
                    <th scope='col'  data-sortable='true' id='email'>E-post</th>
                    <th scope='col'  data-sortable='true' id='phone'>Telefon</th>
                    <th scope='col'  data-sortable='true' id='link'>KIV länk</th>
                    <th scope='col'  data-sortable='true' id='number_of_employees'>Anställda</th>
                    <th scope='col'  data-sortable='true' id='revision'>Revision</th>
                    <th scope='col'  data-sortable='true' id='revisiondate'>Revisionsdatum</th>
                    <th scope='col'  data-sortable='true' id='revisor'>Revisor</th>
                    <th scope='col'  data-sortable='true' id='completed'>Genomförd</th>
                    <th scope='col'  data-sortable='true' id='customer_manager'>Kundansvarig</th>
                </tr>
            </thead>
            <tbody>";
            while($row = mysql_fetch_array($result)){
                $id = $row['customer_id'];
                $test = "
                <tr>
                    <td id='" . $id . "' style='cursor:pointer' onclick='updateData(this.id)'>" . $row['clinic_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['kiv_link'] . "</td>
                    <td>" . $row['number_of_employees'] . "</td>
                    <td>" . $row['revision'] . "</td>
                    <td>" . $row['revisiondate'] . "</td>
                    <td>" . $row['revisor'] . "</td>
                    <td>" . $row['completed'] . "</td>
                    <td>" . $row['customer_manager'] . "</td>
                </tr>";
                echo $test;
            }
            echo "</tbody>";
        echo "</table>";
    }
        
    mysql_close($con);
?>