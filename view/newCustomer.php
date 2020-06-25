<?php
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
                <button type='button' onclick='insertData()' class='btn btn-primary'>Spara</button>
            </div>
        </div>

        <div class='row'>
                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    Namn klinik: <input autocomplete='off' type='text' class='form-control' id='clinicName' style='width:100%;'>
                </div>

                <div class='col-sm-4 offset-sm-1' style='text-align: left;'>
                    Datum: <input autocomplete='off' readonly type='text' class='form-control' id='date' style='width:100%;'>
                </div>
        </div>

        <div class='row'>     
                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    Adress: <input autocomplete='off' type='text' class='form-control' id='adress' style='width:100%;'>
                </div>                            
                
                <div class='col-sm-4 offset-sm-1' style='text-align: left;'>
                    Version: <input autocomplete='off' type='number' class='form-control' id='version' style='width:100%;'>
                </div>               
        </div>
        
        <div class='row'>           
                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    Postadress: <input autocomplete='off' type='text' class='form-control' id='postadress' style='width:100%;'>
                </div>
                
                <div class='col-sm-4 offset-sm-1' style='text-align: left;'>
                    Arbetsnamn: <input autocomplete='off' type='text' class='form-control' id='workname' style='width:100%;'>
                </div>               
        </div>
        
        <div class='row'>           
                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    Postnummer: <input autocomplete='off' type='text' class='form-control' id='post_number' style='width:100%;'>
                </div>
                
                <div class='col-sm-4 offset-sm-1' style='text-align: left;'>
                    Ort: <input autocomplete='off' type='text' class='form-control' id='location' style='width:100%;'>
                </div>               
        </div>

        <div class='row'>           
                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    E-post: <input autocomplete='off' type='text' class='form-control' id='email' style='width:100%;'>
                </div>
                
                <div class='col-sm-4 offset-sm-1' style='text-align: left;'>
                    Antal anställda: <input autocomplete='off' type='number' class='form-control' id='number_of_employees' style='width:100%;'>
                </div>
        </div>
        
        <div class='row'>

                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    Telefon: <input autocomplete='off' type='text' class='form-control' id='phone' style='width:100%;'>
                </div>
                
                <div class='col-sm-4 offset-sm-1' style='text-align: left;'>
                    <div class='row'>
                        
                        <div class='col-sm-9' style='text-align: left;'>
                            Filialer:
                            <input autocomplete='off' type='text' class='form-control' id='affiliatename1' style='width:100%;'>
                        </div>

                        <div class='col-sm-3' style='text-align: left;'>
                            Kundnr:
                            <input autocomplete='off' type='text' class='form-control' id='affiliatenumber1' autocomplete='off' style='width:100%;'>
                        </div>                                
                    </div>                               
                    
                    <div class='row'>                                    
                        
                        <div class='col-sm-9' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='affiliatename2' style='width:100%;'>
                        </div>                                    
                        
                        <div class='col-sm-3' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='affiliatenumber2' autocomplete='off' style='width:100%;'>
                        </div>

                    </div>
                    
                    <div class='row'>
                    
                        <div class='col-sm-9' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='affiliatename3' style='width:100%;'>
                        </div>                                    
                        
                        <div class='col-sm-3' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='affiliatenumber3' autocomplete='off' style='width:100%;'>
                        </div>
                        
                    </div>                                
                    
                    <div class='row'>                                    
                    
                        <div class='col-sm-9' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='affiliatename4' style='width:100%;'>
                        </div>
                        
                        <div class='col-sm-3' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='affiliatenumber4' autocomplete='off' style='width:100%;'>
                        </div>
                        
                    </div>
                    
                    <div class='row'>
                    
                        <div class='col-sm-9' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='affiliatename5' style='width:100%;'>
                        </div>
                        
                        <div class='col-sm-3' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='affiliatenumber5' autocomplete='off' style='width:100%;'>
                        </div>
                        
                    </div>

                </div>

        </div>
        
        <div class='row'>
            
                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    Webbsida: <input autocomplete='off' type='text' class='form-control' id='website' style='width:100%;'>
                </div>
                
        </div>
        
        <div class='row'>
            
                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    KIV länk: <input autocomplete='off' type='text' class='form-control' id='kiv_link' style='width:100%;'>
                </div>
                
        </div>
        
        <div class='row'>
            
                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    Användarnamn: <input autocomplete='off' type='text' class='form-control' id='username' style='width:100%;'>
                </div>
                
        </div>
        
        <div class='row'>
                
                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    Lösenord: <input autocomplete='off' type='text' class='form-control' id='password' style='width:100%;'>
                </div>
                
        </div>
        
        <div id='contactsContainer'>
            
                <div id='contacts'>
                
                    <div class='row'>
                    
                        <div class='col-md-2 offset-md-2' style='text-align: left;'>
                            Kontakter:
                        </div>
                    
                    </div>
                    
                    <div class='row'>
                    
                        <div class='col-md-2 offset-md-2' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='contact1_name' placeholder='Namn' style='width:100%;'>
                        </div>
                        
                        <div class='col-md-2' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='contact1_title' placeholder='Titel' style='width:100%;'>
                        </div>                                    
                        
                        <div class='col-md-2' style='text-align: left;'>
                            <input autocomplete='off' type='number' class='form-control' id='contact1_mobile' placeholder='Mobil' style='width:100%;'>
                        </div>                                    
                        
                        <div class='col-md-3' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='contact1_email' placeholder='Email' style='width:100%;'>
                        </div>
                        
                        <div class='col-md-2' style='text-align: left;'>
                            <i class='fas fa-times fa-2x' style='display:none;'></i>
                        </div>
                    
                    </div>
                    
                    <div class='row'>
                    
                        <div class='col-md-2 offset-md-2' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='contact2_name' placeholder='Namn' style='width:100%;'>
                        </div>
                        
                        <div class='col-md-2' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='contact2_title' placeholder='Titel' style='width:100%;'>
                        </div>
                        
                        <div class='col-md-2' style='text-align: left;'>
                            <input autocomplete='off' type='number' class='form-control' id='contact2_mobile' placeholder='Mobil' style='width:100%;'>
                        </div>
                        
                        <div class='col-md-3' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='contact2_email' placeholder='Email' style='width:100%;'>
                        </div>
                        
                        <div class='col-md-2' style='text-align: left;'>
                            <i class='fas fa-times fa-2x' style='display:none;'></i>
                        </div>
                        
                    </div>
                    
                    <div class='row'>
                    
                        <div class='col-md-2 offset-md-2' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='contact3_name' placeholder='Namn' style='width:100%;'>
                        </div>
                        
                        <div class='col-md-2' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='contact3_title' placeholder='Titel' style='width:100%;'>
                        </div>
                        
                        <div class='col-md-2' style='text-align: left;'>
                            <input autocomplete='off' type='number' class='form-control' id='contact3_mobile' placeholder='Mobil' style='width:100%;'>
                        </div>
                        
                        <div class='col-md-3' style='text-align: left;'>
                            <input autocomplete='off' type='text' class='form-control' id='contact3_email' placeholder='Email' style='width:100%;'>
                        </div>
                        
                        <div class='col-md-2' style='text-align: left;'>
                            <i class='fas fa-times fa-2x' style='display:none;'></i>
                        </div>
                    
                    </div>
                
                </div>
                
                <div class='row'>
                
                    <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                        <i onclick='addContact()' class='fas fa-plus-square fa-2x' style='display: none;'></i>
                    </div>
                
                </div>
                
        </div>
        
        <div class='row'>
            
                <div class='col-sm-1 offset-sm-2' style='text-align: left;'>
                    Revision: <select class='form-control' id='revision' style='width:fit-content;'>
                        <option selected>Ja</option>
                        <option>Nej</option>
                    </select>
                </div>
                
                <div class='col-sm-2' style='text-align: left;'>
                    Revisionsmånad: 
                    <select class='form-control' id='revisionmonth' style='width:100%;'>
                        option value='01' selected>Januari</option>
                        option value='02'>Februari</option>
                        option value='03'>Mars</option>
                        option value='04'>April</option>
                        option value='05'>Maj</option>
                        option value='06'>Juni</option>
                        option value='07'>Juli</option>
                        option value='08'>Augusti</option>
                        option value='09'>September</option>
                        option value='10'>Oktober</option>
                        option value='11'>November</option>
                        option value='12'>December</option>
                    </select>
                </div>
                
                <div class='col-sm-4' style='text-align: left;'>
                    Revisor: <input autocomplete='off' type='text' class='form-control' id='revisor' style='width:100%;'>
                </div>
                
        </div>
        
        <div class='row'>
    
            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                Internrevision: <input autocomplete='off' type='text' class='form-control' id='internalrevision' style='width:100%;' readonly>
            </div>

            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                Externrevision: <input autocomplete='off' type='text' class='form-control' id='externalrevision' style='width:100%;' readonly>
            </div>

        </div>

        <div class='row'>
            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                Avgiftssmånad: 
                <select class='form-control' id='chargemonth' style='width:100%;'>
                    <option value='01' selected>Januari</option>
                    <option value='02'>Februari</option>
                    <option value='03'>Mars</option>
                    <option value='04'>April</option>
                    <option value='05'>Maj</option>
                    <option value='06'>Juni</option>
                    <option value='07'>Juli</option>
                    <option value='08'>Augusti</option>
                    <option value='09'>September</option>
                    <option value='10'>Oktober</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>
                </select>
            </div>
        </div>
            
        <div class='row'>
            
                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    Genomförd: <input autocomplete='off' type='text' class='form-control' id='completed' style='width:100%;'>
                </div>
                
        </div>
        
        <div class='row'>
                
                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    Certifiering/Licens: <input autocomplete='off' type='text' class='form-control' id='certification' style='width:100%;'>
                </div>
            
        </div>
        
        <div class='row'>
                
                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                    Genomförda uppdrag: <input autocomplete='off' type='text' class='form-control' id='completed_assignments' style='width:100%;'>
                </div>
                
        </div>
        
        <div class='row'>
        
            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                Övriga produkter: <input autocomplete='off' type='text' class='form-control' id='products' style='width:100%;'>
            </div>
            
        </div>
        
        <div class='row'>
        
            <div class='col-sm-7 offset-sm-2' style='text-align: left;'>
                Noteringar: <textarea class='form-control' rows='5' id='comment' style='width:100%;'></textarea>
            </div>
        
        </div>
        
        <div class='row'>
        
            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>
                Kundansvarig: <input autocomplete='off' type='text' class='form-control' id='customer_manager' style='width:100%;'>
            </div>
        
        </div></br>

        <button type='button' onclick='insertData()' class='btn btn-primary'>Spara</button>";
?>
