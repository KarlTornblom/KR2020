<?php
    include 'dbConnect.php';      
    $con = dbConnect();
    
    $id = $_GET['customer_id'];
    $customers = mysql_query("SELECT * FROM customers WHERE customer_id = '$id'",$con);
    $customer = mysql_fetch_array($customers);
    echo "
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Namn klinik: <input value='" . $customer['clinic_name'] . "' autocomplete='off' type='text' class='form-control' id='clinicName' style='width:100%;'> 
        </div>
        <div class='col-sm-4 offset-sm-1' style='text-align: left;'>
            Datum: <input value='" . $customer['date'] . "' autocomplete='off' readonly type='text' class='form-control' id='date' style='width:100%;'>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Adress: <input value='" . $customer['adress'] . "' autocomplete='off' type='text' class='form-control' id='adress' style='width:100%;'> 
        </div>
        <div class='col-sm-4 offset-sm-1' style='text-align: left;'>
            Version: <input value='" . $customer['version'] . "' autocomplete='off' type='number' class='form-control' id='version' style='width:100%;'>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Postadress: <input value='" . $customer['postadress'] . "' autocomplete='off' type='text' class='form-control' id='postadress' style='width:100%;'> 
        </div>
        <div class='col-sm-4 offset-sm-1' style='text-align: left;'>
            Arbetsnamn: <input value='" . $customer['workname'] . "' autocomplete='off' type='text' class='form-control' id='workname' style='width:100%;'>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            E-post: <input value='" . $customer['email'] . "' autocomplete='off' type='text' class='form-control' id='email' style='width:100%;'> 
        </div>
        <div class='col-sm-4 offset-sm-1' style='text-align: left;'>
            Antal anställda: <input value='" . $customer['number_of_employees'] . "' autocomplete='off' type='number' class='form-control' id='number_of_employees' style='width:100%;'>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Telefon: <input value='" . $customer['phone'] . "' autocomplete='off' type='text' class='form-control' id='phone' style='width:100%;'> 
        </div>
        
        <div class='col-sm-4 offset-sm-1' style='text-align: left;'>
            <div class='row'>
                <div class='col-sm-9' style='text-align: left;'>
                    Filialer:
                </div>
                <div class='col-sm-3' style='text-align: left;'>
                    Kundnr:
                </div>
            </div>";
    
    $affiliates = mysql_query("SELECT * FROM affiliates WHERE customer_id = '$id'", $con);
    $affcount = 1;
    while($row = mysql_fetch_array($affiliates)){
    echo "  <div class='row' value='" . $row['affiliate_id'] . "' id='affiliateid" . $affcount . "'>
                <div class='col-sm-9' style='text-align: left;'>";
           echo"    <input value='" . $row['affiliate_name'] . "' autocomplete='off' type='text' class='form-control' id='affiliatename" . $affcount . "' style='width:100%;'>
                </div>
                <div class='col-sm-3' style='text-align: left;'>
                    <input value='" . $row['affiliate_customer_id'] . "' autocomplete='off' type='text' class='form-control' id='affiliatenumber" . $affcount . "' autocomplete='off' style='width:100%;'>
                </div>
            </div>";
        $affcount++;
    };
    echo"    </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Webbsida: <input value='" . $customer['website'] . "' autocomplete='off' type='text' class='form-control' id='website' style='width:100%;'> 
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            KIV länk: <input value='" . $customer['kiv_link'] . "' autocomplete='off' type='text' class='form-control' id='kiv_link' style='width:100%;'> 
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Användarnamn: <input value='" . $customer['username'] . "' autocomplete='off' type='text' class='form-control' id='username' style='width:100%;'> 
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Lösenord: <input value='" . $customer['password'] . "' autocomplete='off' type='text' class='form-control' id='password' style='width:100%;'> 
        </div>
    </div>
    <div id='contactsContainer'>
        <div id='contacts'>
            <div class='row'>
                <div class='col-md-2 offset-md-2' style='text-align: left;'>
                    Kontakter:
                </div>
            </div>";

    $contacts = mysql_query("SELECT * FROM contacts WHERE customer_id = '$id'", $con);
    $conCount = 1;
    while($row = mysql_fetch_array($contacts)){
    echo"   <div class='row' value='" . $row['contacts_id'] . "' id='contactid" . $conCount . "'>
                <div class='col-md-2 offset-md-2' style='text-align: left;'>
                    <input value='" . $row['contact_name'] . "' autocomplete='off' type='text' class='form-control' id='contact" . $conCount . "_name' placeholder='Namn' style='width:100%;'> 
                </div>
                <div class='col-md-2' style='text-align: left;'>
                    <input value='" . $row['contact_title'] . "' autocomplete='off' type='text' class='form-control' id='contact" . $conCount . "_title' placeholder='Titel' style='width:100%;'>                              
                </div>
                <div class='col-md-2' style='text-align: left;'>
                    <input value='" . $row['contact_mobile'] . "' autocomplete='off' type='number' class='form-control' id='contact" . $conCount . "_mobile' placeholder='Mobil' style='width:100%;'>
                </div>
                <div class='col-md-3' style='text-align: left;'>
                    <input value='" . $row['contact_email'] . "' autocomplete='off' type='text' class='form-control' id='contact" . $conCount . "_email' placeholder='Email' style='width:100%;'>
                </div>
                <div class='col-md-2' style='text-align: left;'>
                    <i class='fas fa-times fa-2x' style='display:none;'></i>
                </div>
            </div>";
            $conCount++;
    };
    echo"</div>
        <div class='row'>
            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                <i onclick='addContact()' class='fas fa-plus-square fa-2x' style='display: none;'></i>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-1 offset-sm-2' style='text-align: left;'>
            Revision: <select class='form-control' id='revision' style='width:fit-content;'>";
    if($customer['revision'] === 'Ja'){
        echo"   <option selected>Ja</option>
                <option>Nej</option>";
    }else{
        echo"   <option>Ja</option>
                <option selected>Nej</option>";
    };
    echo"  
            </select>
        </div>
        <div class='col-sm-2' style='text-align: left;'>
            Revisionsdatum: <input value='" . $customer['revisiondate'] . "' autocomplete='off' type='text' class='form-control' id='revisiondate' style='width:100%;' readonly>
        </div>
        <div class='col-sm-4' style='text-align: left;'>
            Revisor: <input value='" . $customer['revisor'] . "' autocomplete='off' type='text' class='form-control' id='revisor' style='width:100%;'>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Genomförd: <input value='" . $customer['completed'] . "' autocomplete='off' type='text' class='form-control' id='completed' style='width:100%;'>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Certifiering/Licens: <input value='" . $customer['certification'] . "' autocomplete='off' type='text' class='form-control' id='certification' style='width:100%;'>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Genomförda uppdrag: <input value='" . $customer['completed_assignments'] . "' autocomplete='off' type='text' class='form-control' id='completed_assignments' style='width:100%;'>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Övrgiga produkter: <input value='" . $customer['products'] . "' autocomplete='off' type='text' class='form-control' id='products' style='width:100%;'>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-7 offset-sm-2' style='text-align: left;'>
            Noteringar: <textarea value=". $customer['notes'] . "' class='form-control' rows='5' id='comment' style='width:100%;'></textarea>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Kundansvarig: <input value='" . $customer['customer_manager'] . "' autocomplete='off' type='text' class='form-control' id='customer_manager' style='width:100%;'>
        </div>
    </div></br>
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            <button id='" . $id . "'type='button' onclick='setUpdateData(this.id, 1)' class='btn btn-primary'>Uppdatera</button>
        </div>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            <button id='" . $id . "'type='button' onclick='setUpdateData(this.id, 0)' class='btn btn-danger'>Ta bort kund</button>
        </div>
    </div>";

    mysql_close($con);
?>