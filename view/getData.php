<?php
    include '../controller/dbConnect.php';
    $con = dbConnect();
    
    $userInput = $_GET['userInput'];
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
                    <th class='headCell' scope='col'  onclick='sortNumber(3)' id='number_of_employees'>Anställda</th>
                    <th class='headCell' scope='col'  onclick='sortTable(4)' id='revision'>Revision</th>
                    <th class='headCell' scope='col'  onclick='sortTable(5)' id='revisionmonth'>Revisionsmånad</th>
                    <th class='headCell' scope='col'  onclick='sortTable(6)' id='revisor'>Revisor</th>
                    <th class='headCell' scope='col'  onclick='sortDate(7)' id='completed'>Genomförd</th>
                    <th class='headCell' scope='col'  onclick='sortTable(8)' id='customer_manager'>Kundansvarig</th>
                    <th class='headCell' scope='col'  onclick='sortDate(9)' id='internalrevision'>Internrevision</th>
                    <th class='headCell' scope='col'  onclick='sortDate(10)' id='externalrevision'>Externrevision</th>
                    <th class='headCell' scope='col'  onclick='sortNumber(11)' id='chargemonth'>Avgiftsmånad</th>
                </tr>
            </thead>
            <tbody id='tbody'>";
            while($row = mysql_fetch_array($result)){

                $id = $row['customer_id'];
                $test = "
                <tr>
                    <td class='displayCell' id='" . $id . "' style='cursor:pointer' onclick='updateData(this.id)'>" . $row['clinic_name'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td><a href='https://" . $row['kiv_link'] . "'>" . $row['kiv_link'] . "</a></td>
                    <td>" . $row['number_of_employees'] . "</td>
                    <td>" . $row['revision'] . "</td>
                    <td>" . $row['revisionmonth'] . "</td>
                    <td>" . $row['revisor'] . "</td>
                    <td>" . $row['completed'] . "</td>
                    <td>" . $row['customer_manager'] . "</td>
                    <td>" . $row['internalrevision'] . "</td>
                    <td>" . $row['externalrevision'] . "</td>
                    <td>" . $row['chargemonth'] . "</td>
                </tr>";
                echo $test;
            }
            echo "</tbody>";
        echo "</table>";
    }
        
    mysql_close($con);
?>