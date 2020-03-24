$(document).ready(
    function(){
        $("#search").keyup(
            function(){
                var userInput = $("#search").val();
                $.post("getData.php", {userInput: userInput}, 
                    function (result) {
                        $('#data').html(result);
                    }
                );
            }
        );
    }
);



function insertData(){
    var userInfo = {
        clinicName:$("#clinicName").val(), 
        date:$("#date").val(),
        adress:$("#adress").val(),
        version:$("#version").val(),
        postadress:$("#postadress").val(),
        workname:$("#workname").val(),
        email:$("#email").val(),
        phone:$("#phone").val(),
        number_of_employees:$("#number_of_employees").val(),
        website:$("#website").val(),
        affiliatename1:$("#affiliatename1").val(),
        affiliatename2:$("#affiliatename2").val(),
        affiliatename3:$("#affiliatename3").val(),
        affiliatename4:$("#affiliatename4").val(),
        affiliatename5:$("#affiliatename5").val(),
        affiliatenumber1:$("#affiliatenumber1").val(),
        affiliatenumber2:$("#affiliatenumber2").val(),
        affiliatenumber3:$("#affiliatenumber3").val(),
        affiliatenumber4:$("#affiliatenumber4").val(),
        affiliatenumber5:$("#affiliatenumber5").val(),
        kiv_link:$("#kiv_link").val(),
        username:$("#username").val(),
        password:$("#password").val(),
        contact1_name:$("#contact1_name").val(),
        contact2_name:$("#contact2_name").val(),
        contact3_name:$("#contact3_name").val(),
        contact1_title:$("#contact1_title").val(),
        contact2_title:$("#contact2_title").val(),
        contact3_title:$("#contact3_title").val(),
        contact1_mobile:$("#contact1_mobile").val(),
        contact2_mobile:$("#contact2_mobile").val(),
        contact3_mobile:$("#contact3_mobile").val(),
        contact1_email:$("#contact1_email").val(),
        contact2_email:$("#contact2_email").val(),
        contact3_email:$("#contact3_email").val(),
        revision:$("#revision").val(),
        revisiondate:$("#revisiondate").val(),
        revisor:$("#revisor").val(),
        completed:$("#completed").val(),
        certification:$("#certification").val(),
        completed_assignments:$("#completed_assignments").val(),
        products:$("#products").val(),
        comment:$("#comment").val(),
        customer_manager:$("#customer_manager").val()
    };
    $.post("insertData.php", {userInfo: userInfo}, 
        function (result) {
            $('#data').html(result);
        }
    );
}

var affiliates = 0;
function addContact(){
    if(affiliates < 2){
        document.getElementById('contacts').innerHTML += "<div class='row' style='padding-top: 5px;'>    <div class='col-md-2 offset-md-2' style='text-align: left;'>        <input type='text' class='form-control' id='contact_name " + affiliates + "' placeholder='Namn' style='width:fit-content;'>     </div>    <div class='col-md-2' style='text-align: left;'>        <input type='text' class='form-control' id='contact_title" + affiliates + "' placeholder='Titel' style='width:fit-content;'>                                  </div>    <div class='col-md-2' style='text-align: left;'>        <input type='text' class='form-control' id='contact_mobile" + affiliates + "' placeholder='Mobil' style='width:fit-content;'>    </div>    <div class='col-md-2' style='text-align: left;'>        <input type='text' class='form-control' id='contact_email" + affiliates + "' placeholder='Email' style='width:fit-content;'>    </div>    <div class='col-md-2' style='text-align: left;'>        <i class='fas fa-times fa-2x'></i>    </div></div>";
        affiliates ++;
    }
    console.log(affiliates);
}

function log(){
    console.log("test");
}

$('#date, #revisiondate').datepicker({
    format: "dd-mm-yyyy",
    todayBtn: "linked",
    language: "sv",
    autoclose: true,
    todayHighlight: true
});

function authenticate(){
    if(sessionStorage.getItem("login") != 'true'){
        location.replace("login/login.html");
    };
}

function nyKund(){
    document.getElementById("data").innerHTML = "<div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Namn klinik: <input autocomplete='off' type='text' class='form-control' id='clinicName' style='width:fit-content;'>                             </div>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Datum: <input autocomplete='off' readonly type='text' class='form-control' id='date' style='width:fit-content;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Adress: <input autocomplete='off' type='text' class='form-control' id='adress' style='width:fit-content;'>                             </div>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Version: <input autocomplete='off' type='number' class='form-control' id='version' style='width:fit-content;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Postadress: <input autocomplete='off' type='text' class='form-control' id='postadress' style='width:fit-content;'>                             </div>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Arbetsnamn: <input autocomplete='off' type='text' class='form-control' id='workname' style='width:fit-content;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                E-post: <input autocomplete='off' type='text' class='form-control' id='email' style='width:fit-content;'>                             </div>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Antal anställda: <input autocomplete='off' type='number' class='form-control' id='number_of_employees' style='width:fit-content;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Telefon: <input autocomplete='off' type='text' class='form-control' id='phone' style='width:fit-content;'>                             </div>                                                        <div class='col-sm-3' style='text-align: left;'>                                <div class='row'>                                    <div class='col-sm-3 offset-sm-3' style='text-align: left;'>                                        Filialer:                                        <input autocomplete='off' type='text' class='form-control' id='affiliatename1' style='width:fit-content;'>                                    </div>                                    <div class='col-sm-2 offset-sm-4' style='text-align: left;'>                                        Kundnr:                                        <input autocomplete='off' type='text' class='form-control' id='affiliatenumber1' autocomplete='off' style='width:fit-content;'>                                    </div>                                </div>                                <div class='row'>                                    <div class='col-sm-3 offset-sm-3' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatename2' style='width:fit-content;'>                                    </div>                                    <div class='col-sm-2 offset-sm-4' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatenumber2' autocomplete='off' style='width:fit-content;'>                                    </div>                                </div>                                <div class='row'>                                    <div class='col-sm-3 offset-sm-3' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatename3' style='width:fit-content;'>                                    </div>                                    <div class='col-sm-2 offset-sm-4' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatenumber3' autocomplete='off' style='width:fit-content;'>                                    </div>                                </div>                                <div class='row'>                                    <div class='col-sm-3 offset-sm-3' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatename4' style='width:fit-content;'>                                    </div>                                    <div class='col-sm-2 offset-sm-4' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatenumber4' autocomplete='off' style='width:fit-content;'>                                    </div>                                </div>                                <div class='row'>                                    <div class='col-sm-3 offset-sm-3' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatename5' style='width:fit-content;'>                                    </div>                                    <div class='col-sm-2 offset-sm-4' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatenumber5' autocomplete='off' style='width:fit-content;'>                                    </div>                                </div>                                                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Webbsida: <input autocomplete='off' type='text' class='form-control' id='website' style='width:fit-content;'>                             </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                KIV länk: <input autocomplete='off' type='text' class='form-control' id='kiv_link' style='width:fit-content;'>                             </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Användarnamn: <input autocomplete='off' type='text' class='form-control' id='username' style='width:fit-content;'>                             </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Lösenord: <input autocomplete='off' type='text' class='form-control' id='password' style='width:fit-content;'>                             </div>                        </div>                        <div id='contactsContainer'>                            <div id='contacts'>                                <div class='row'>                                    <div class='col-md-2 offset-md-2' style='text-align: left;'>                                        Kontakter:                                    </div>                                </div>                                <div class='row'>                                    <div class='col-md-2 offset-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact1_name' placeholder='Namn' style='width:fit-content;'>                                     </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact1_title' placeholder='Titel' style='width:fit-content;'>                                                                  </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='number' class='form-control' id='contact1_mobile' placeholder='Mobil' style='width:fit-content;'>                                    </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact1_email' placeholder='Email' style='width:fit-content;'>                                    </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <i class='fas fa-times fa-2x' style='display:none;'></i>                                    </div>                                </div>                                <div class='row'>                                    <div class='col-md-2 offset-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact2_name' placeholder='Namn' style='width:fit-content;'>                                     </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact2_title' placeholder='Titel' style='width:fit-content;'>                                                                  </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='number' class='form-control' id='contact2_mobile' placeholder='Mobil' style='width:fit-content;'>                                    </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact2_email' placeholder='Email' style='width:fit-content;'>                                    </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <i class='fas fa-times fa-2x' style='display:none;'></i>                                    </div>                                </div>                                <div class='row'>                                    <div class='col-md-2 offset-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact3_name' placeholder='Namn' style='width:fit-content;'>                                     </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact3_title' placeholder='Titel' style='width:fit-content;'>                                                                  </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='number' class='form-control' id='contact3_mobile' placeholder='Mobil' style='width:fit-content;'>                                    </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact3_email' placeholder='Email' style='width:fit-content;'>                                    </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <i class='fas fa-times fa-2x' style='display:none;'></i>                                    </div>                                </div>                            </div>                            <div class='row'>                                <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                    <i onclick='addContact()' class='fas fa-plus-square fa-2x' style='display: none;'></i>                                </div>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Revision: <select class='form-control' id='revision'>                                    <option>Ja</option>                                    <option>Nej</option>                                </select>                            </div>                            <div class='col-sm-3' style='text-align: left;'>                                Revisionsdatum: <input autocomplete='off' type='text' class='form-control' id='revisiondate' style='width:fit-content;' readonly>                            </div>                            <div class='col-sm-3' style='text-align: left;'>                                Revisor: <input autocomplete='off' type='text' class='form-control' id='revisor' style='width:fit-content;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Genomförd: <input autocomplete='off' type='text' class='form-control' id='completed' style='width:fit-content;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Certifiering/Licens: <input autocomplete='off' type='text' class='form-control' id='certification' style='width:fit-content;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Genomförda uppdrag: <input autocomplete='off' type='text' class='form-control' id='completed_assignments' style='width:fit-content;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Övrgiga produkter: <input autocomplete='off' type='text' class='form-control' id='products' style='width:fit-content;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Noteringar: <textarea class='form-control' rows='5' id='comment'></textarea>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-3 offset-sm-2' style='text-align: left;'>                                Kundansvarig: <input autocomplete='off' type='text' class='form-control' id='customer_manager' style='width:fit-content;'>                            </div>                        </div>                        <button type='button' onclick='insertData()' class='btn btn-primary'>Spara</button>"
    // $.post("setData.php", {userInput: userInput}, 
    //     function (result) {
    //         $('#data').html(result);
    //     }
    // );
}