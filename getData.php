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
        <table class='table table-bordered' id='kundregister-rad'>
            <thead id='tableHead'>
                <tr>
                    <th class='headCell' scope='col'  onclick='sortTable(0)' id='clinic_name'>Namn klinik</th>
                    <th class='headCell' scope='col'  onclick='sortTable(1)' id='phone'>Telefon</th>
                    <th class='headCell' scope='col'  onclick='sortTable(2)' id='link'>KIV länk</th>
                    <th class='headCell' scope='col'  onclick='sortNumber()' id='number_of_employees'>Anställda</th>
                    <th class='headCell' scope='col'  onclick='sortTable(4)' id='revision'>Revision</th>
                    <th class='headCell' scope='col'  onclick='sortTable(5)' id='revisiondate'>Revisionsdatum</th>
                    <th class='headCell' scope='col'  onclick='sortTable(6)' id='revisor'>Revisor</th>
                    <th class='headCell' scope='col'  onclick='sortTable(7)' id='completed'>Genomförd</th>
                    <th class='headCell' scope='col'  onclick='sortTable(8)' id='customer_manager'>Kundansvarig</th>
                </tr>
            </thead>
            <tbody id='tbody'>";
            while($row = mysql_fetch_array($result)){
                $id = $row['customer_id'];
                $test = "
                <tr>
                    <td class='displayCell' id='" . $id . "' style='cursor:pointer' onclick='updateData(this.id)'>" . $row['clinic_name'] . "</td>
                    <td test>" . $row['phone'] . "</td>
                    <td><a href='https://" . $row['kiv_link'] . "'>" . $row['kiv_link'] . "</a></td>
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