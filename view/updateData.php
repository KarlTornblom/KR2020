<?php
    include '../controller/dbConnect.php';      
    $con = dbConnect();
    
    $id = $_GET['customer_id'];
    $customers = mysql_query("SELECT * FROM customers WHERE customer_id = '$id'",$con);
    $customer = mysql_fetch_array($customers);
    echo "
    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            <button type='button' onclick='getData()' class='btn btn-secondary' id='back-button' style='padding: 0;'>
                <svg class='bi bi-arrow-left' width='4em' height='36px' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                    <path fill-rule='evenodd' d='M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z'/>
                    <path fill-rule='evenodd' d='M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z'/>
                </svg>
            </button>
        </div>

        <div class='col-sm-4' style='text-align: left;'>
            <button id='" . $id . "'type='button' onclick='setUpdateData(this.id, 1)' class='btn btn-primary'>Spara</button>
        </div>
    </div>

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
            Postnummer: <input value='" . $customer['post_number'] . "' autocomplete='off' type='text' class='form-control' id='post_number' style='width:100%;'>
        </div>
                
        <div class='col-sm-4 offset-sm-1' style='text-align: left;'>
            Ort: <input value='" . $customer['location'] . "' autocomplete='off' type='text' class='form-control' id='location' style='width:100%;'>
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
            Revision: <select class='form-control' id='revision' style='width:fit-content;'>
            <option" . ($customer['revision'] == "Ja" ?     "selected": "") . ">Ja</option>
            <option" . ($customer['revision'] == "Nej" ?    "selected": "") . ">Nej</option> 
            </select>
        </div>

        <div class='col-sm-2' style='text-align: left;'>
            Revisionsmånad: <select class='form-control' id='revisionmonth' style='width:100%;'>
            <option" . ($customer['revisionmonth'] == "Januari" ?  "selected" : "")     . ">Januari</option>
            <option" . ($customer['revisionmonth'] == "Februari" ? "selected" : "")    . ">Februari</option>
            <option" . ($customer['revisionmonth'] == "Mars" ?     "selected" : "")        . ">Mars</option>
            <option" . ($customer['revisionmonth'] == "April" ?    "selected" : "")       . ">April</option>
            <option" . ($customer['revisionmonth'] == "Maj" ?      "selected" : "")         . ">Maj</option>
            <option" . ($customer['revisionmonth'] == "Juni" ?     "selected" : "")        . ">Juni</option>
            <option" . ($customer['revisionmonth'] == "Juli" ?     "selected" : "")        . ">Juli</option>
            <option" . ($customer['revisionmonth'] == "Augusti" ?  "selected" : "")     . ">Augusti</option>
            <option" . ($customer['revisionmonth'] == "September" ?"selected" : "")   . ">September</option>
            <option" . ($customer['revisionmonth'] == "Oktober" ?  "selected" : "")     . ">Oktober</option>
            <option" . ($customer['revisionmonth'] == "November" ? "selected" : "")    . ">November</option>
            <option" . ($customer['revisionmonth'] == "December" ? "selected" : "")    . ">December</option>
            </select>
        </div>

        <div class='col-sm-4' style='text-align: left;'>
            Revisor: <input value='" . $customer['revisor'] . "' autocomplete='off' type='text' class='form-control' id='revisor' style='width:fit-content;'>
        </div>

    </div>

    <div class='row'>       
            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                Internrevision: <input value='" . $customer['internalrevision'] . "' autocomplete='off' type='text' class='form-control' id='internalrevision' style='width:100%;' readonly>
            </div>
            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                Externrevision: <input value='" . $customer['externalrevision'] . "' autocomplete='off' type='text' class='form-control' id='externalrevision' style='width:100%;' readonly>
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
            Noteringar: <textarea class='form-control' rows='5' id='comment' style='width:100%;'>". $customer['notes'] . "</textarea>
        </div>
    </div>

    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            Kundansvarig: <input value='" . $customer['customer_manager'] . "' autocomplete='off' type='text' class='form-control' id='customer_manager' style='width:100%;'>
        </div>
    </div></br>

    <div class='row'>
        <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
            <button id='" . $id . "'type='button' onclick='setUpdateData(this.id, 0)' class='btn btn-danger'>Ta bort kund</button>
        </div>
        <div class='col-sm-4' style='text-align: left;'>
            <button id='" . $id . "'type='button' onclick='setUpdateData(this.id, 1)' class='btn btn-primary'>Spara</button>
        </div>
    </div>";

    mysql_close($con);
?>