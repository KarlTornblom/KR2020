<?php
    include 'dbConnect.php';      
    $con = dbConnect();
    
    $userInput = $_GET['userInput'];
    if($userInput['search'] == "alla"){
        $result = mysql_query($con,"SELECT * FROM customers");
    } 
    $sort = $userInput['sort'];
    $search = "%" . $userInput['search'] . "%";
    $result = mysql_query($con,"SELECT * FROM customers WHERE clinic_name LIKE '$search' ORDER BY '$sort' DESC");
    
    if(mysqli_num_rows($result) > 0){
        echo "
        <table class='table table-bordered' id='kundregister-rad'>
            <thead>
                <tr>
                    <th class='kundregisterHead' scope='col' onclick='sort(this.id)' id='clinic_name'>Namn klinik</th>
                    <th class='kundregisterHead' scope='col' onclick='sort(this.id)' id='email'>E-post</th>
                    <th class='kundregisterHead' scope='col' onclick='sort(this.id)' id='phone'>Telefon</th>
                    <th class='kundregisterHead' scope='col' onclick='sort(this.id)' id='link'>KIV länk</th>
                    <th class='kundregisterHead' scope='col' onclick='sort(this.id)' id='number_of_employees'>Anställda</th>
                    <th class='kundregisterHead' scope='col' onclick='sort(this.id)' id='revision'>Revision</th>
                    <th class='kundregisterHead' scope='col' onclick='sort(this.id)' id='revisiondate'>Revisionsdatum</th>
                    <th class='kundregisterHead' scope='col' onclick='sort(this.id)' id='revisor'>Revisor</th>
                    <th class='kundregisterHead' scope='col' onclick='sort(this.id)' id='completed'>Genomförd</th>
                    <th class='kundregisterHead' scope='col' onclick='sort(this.id)' id='customer_manager'>Kundansvarig</th>
                </tr>
            </thead>
            <tbody>";
            while($row = mysqli_fetch_array($result)){
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
        
    mysqli_close($con);
?>