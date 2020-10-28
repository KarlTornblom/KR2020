<?php
    include '../controller/dbConnect.php';
    $con = dbConnect();
    
    $userInput = $_GET['userInput'];
    $search = "%" . $userInput['search'] . "%";
    //TODO: this sql seems to be inconsistent for certain worknames, not sure why
    $result = mysql_query("SELECT * FROM customers WHERE clinic_name LIKE '$search' AND Active = 1 OR workname LIKE '$search' AND Active = 1 ORDER BY clinic_name",$con);
    
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
                    <th class='headCell' scope='col'  onclick='sortMonth(5)' id='revisionmonth'>Revisionsmånad</th>
                    <th class='headCell' scope='col'  onclick='sortMonth(6)' id='chargemonth'>Avgiftsmånad</th>
                    <th class='headCell' scope='col'  onclick='sortTable(7)' id='revisor'>Revisor</th>
                    <th class='headCell' scope='col'  onclick='sortDate(8)' id='nextcontact'>Nästa kontakt</th>
                    <th class='headCell' scope='col'  onclick='sortDate(9)' id='internalrevision'>Internrevision</th>
                    <th class='headCell' scope='col'  onclick='sortDate(10)' id='externalrevision'>Externrevision</th>
                </tr>
            </thead>
            <tbody id='tbody'>";
            while($row = mysql_fetch_array($result)){

                $id = $row['customer_id'];

                switch ($row['revisionmonth']) {
                    case 1:
                        $revisionMonthName = "Januari";
                        break;
                    case 2:
                        $revisionMonthName = "Februari";
                        break;
                    case 3:
                        $revisionMonthName = "Mars";
                        break;
                    case 4:
                        $revisionMonthName = "April";
                        break;
                    case 5:
                        $revisionMonthName = "Maj";
                        break;
                    case 6:
                        $revisionMonthName = "Juni";
                        break;
                    case 7:
                        $revisionMonthName = "Juli";
                        break;
                    case 8:
                        $revisionMonthName = "Augusti";
                        break;
                    case 9:
                        $revisionMonthName = "September";
                        break;
                    case 10:
                        $revisionMonthName = "Oktober";
                        break;
                    case 11:
                        $revisionMonthName = "November";
                        break;
                    case 12:
                        $revisionMonthName = "December";
                        break;
                    case 13:
                        $revisionMonthName = "Accepterar ej revision";
                }

                switch ($row['chargemonth']) {
                    case 1:
                        $chargeMonthName = "Januari";
                        break;
                    case 2:
                        $chargeMonthName = "Februari";
                        break;
                    case 3:
                        $chargeMonthName = "Mars";
                        break;
                    case 4:
                        $chargeMonthName = "April";
                        break;
                    case 5:
                        $chargeMonthName = "Maj";
                        break;
                    case 6:
                        $chargeMonthName = "Juni";
                        break;
                    case 7:
                        $chargeMonthName = "Juli";
                        break;
                    case 8:
                        $chargeMonthName = "Augusti";
                        break;
                    case 9:
                        $chargeMonthName = "September";
                        break;
                    case 10:
                        $chargeMonthName = "Oktober";
                        break;
                    case 11:
                        $chargeMonthName = "November";
                        break;
                    case 12:
                        $chargeMonthName = "December";
                        break;
                }

                $test = "
                <tr>
                    <td class='displayCell' id='" . $id . "' style='cursor:pointer' onclick='updateData(this.id)'>" . $row['clinic_name'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td><a href='https://" . $row['kiv_link'] . "'>" . $row['kiv_link'] . "</a></td>
                    <td>" . $row['number_of_employees'] . "</td>
                    <td>" . $row['revision'] . "</td>
                    <td data-month=" . $row['revisionmonth'] . ">" . $revisionMonthName . "</td>
                    <td data-month=" . $row['chargemonth'] . ">" . $chargeMonthName . "</td>
                    <td>" . $row['revisor'] . "</td>
                    <td>" . $row['nextcontact'] . "</td>
                    <td>" . $row['internalrevision'] . "</td>
                    <td>" . $row['externalrevision'] . "</td>
                </tr>";
                echo $test;
            }
            echo "</tbody>";
        echo "</table>";
    }
        
    mysql_close($con);
?>