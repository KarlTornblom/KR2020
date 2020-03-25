<?php
    include 'dbConnect.php';      
    $con = dbConnect();
    

    if($_POST['userInput'] == "alla"){
        $result = mysqli_query($con,"SELECT * FROM customers");
    } 
    $userInput = "%" . $_POST['userInput'] . "%";
    $result = mysqli_query($con,"SELECT * FROM customers WHERE clinic_name LIKE '$userInput'");
    
    //if(!empty($_POST['userInput'])){
        if(mysqli_num_rows($result) > 0){
            echo "
            <table class='table table-bordered' id='kundregister-rad'>
                <thead>
                    <tr>
                        <th class='kundregisterHead' scope='col'>Namn klinik</th>
                        <th class='kundregisterHead' scope='col'>E-post</th>
                        <th class='kundregisterHead' scope='col'>Telefon</th>
                        <th class='kundregisterHead' scope='col'>KIV länk</th>
                        <th class='kundregisterHead' scope='col'>Antal anställda</th>
                        <th class='kundregisterHead' scope='col'>Revision</th>
                        <th class='kundregisterHead' scope='col'>Revisionsdatum</th>
                        <th class='kundregisterHead' scope='col'>Revisor</th>
                        <th class='kundregisterHead' scope='col'>Genomförd</th>
                        <th class='kundregisterHead' scope='col'>Kundansvarig</th>
                    </tr>
                </thead>
                <tbody>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr value=" . $row['customer_id'] . ">";
                    echo "<td>" . $row['clinic_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['kiv_link'] . "</td>";
                    echo "<td>" . $row['number_of_employees'] . "</td>";
                    echo "<td>" . $row['revision'] . "</td>";
                    echo "<td>" . $row['revisiondate'] . "</td>";
                    echo "<td>" . $row['revisor'] . "</td>";
                    echo "<td>" . $row['completed'] . "</td>";
                    echo "<td>" . $row['customer_manager'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
            echo "</table>";
        }
    //}    
    mysqli_close($con);
?>