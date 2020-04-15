function onload(){
    authenticate();
    setDefaultSort();
    getData();
    onKeyUp();
}

function authenticate(){
    $.get("authentication.php", function(result) {
        if(result == "failed"){
            location.replace("login/login.html");
        }
    });
}

function logout(){
    $.get("logout.php",
        function (result) {
            location.replace("login/login.html");
        }
    );
}

function onKeyUp(){
    $("#search").keyup( 
        function (){
            getData();
                
        }
    );
}

function sort(sortValue){
    sessionStorage.setItem('sortValue', sortValue);
    getData();
}

function setDefaultSort(){
    sessionStorage.setItem('sortValue', 'clinic_name');
}

function reload_js(src) {
    $('script[src="' + src + '"]').remove();
    $('<script>').attr('src', src).appendTo('head');
}
function getData(){
    var userInput = {
        search:$("#search").val(),
        sort:sessionStorage.getItem('sortValue')
    };
    $.get("getData.php", {userInput: userInput}, 
        function (result) {
            $('#data').html(result);
        }
    );
}
// Sort functions
function sortNumber() {
    var table, rows, switching, i, x, y, dir, shouldSwitch, switchcount = 0;
    table = document.getElementById("kundregister-rad");
    switching = true;
    dir = "asc";
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /*Loop through all table rows (except the
      first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[3];
        y = rows[i + 1].getElementsByTagName("TD")[3];
        if(dir == "asc"){
            //check if the two rows should switch place:
            if (Number(x.innerHTML) > Number(y.innerHTML)) {
              //if so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
        }else if (dir == "desc") {
            if (Number(x.innerHTML) < Number(y.innerHTML)) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
        }
      }
      if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;
      }else {
        /*If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again.*/
        if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
        }
      }
    }
}
function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("kundregister-rad");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc"; 
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch= true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount ++;      
        } else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

function loadDatepicker(){
    $('#date, #revisiondate').datepicker({
        format: "dd-mm-yyyy",
        todayBtn: "linked",
        language: "sv",
        autoclose: true,
        todayHighlight: true
    });
}

function updateData(ele){
    var customer_id = ele;
    $.get("updateData.php", {customer_id: customer_id}, 
        function (result) {
            $('#data').html(result);
            loadDatepicker();
        }
    );
}

function setUpdateData(id, active){
    if($("#number_of_employees").val()){
        var employees = $("#number_of_employees").val();
    } else {
        var employees = 0;
    }
    var userInfo = {
        customer_id:id,
        clinicName:$("#clinicName").val(), 
        date:$("#date").val(),
        adress:$("#adress").val(),
        version:$("#version").val(),
        postadress:$("#postadress").val(),
        workname:$("#workname").val(),
        email:$("#email").val(),
        phone:$("#phone").val(),
        number_of_employees:employees,
        website:$("#website").val(),
        affiliate_id1:document.getElementById('affiliateid1').getAttribute('value'),
        affiliate_id2:document.getElementById('affiliateid2').getAttribute('value'),
        affiliate_id3:document.getElementById('affiliateid3').getAttribute('value'),
        affiliate_id4:document.getElementById('affiliateid4').getAttribute('value'),
        affiliate_id5:document.getElementById('affiliateid5').getAttribute('value'),
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
        contacts_id1:document.getElementById('contactid1').getAttribute('value'),
        contacts_id2:document.getElementById('contactid2').getAttribute('value'),
        contacts_id3:document.getElementById('contactid3').getAttribute('value'),
        contact1name:$("#contact1_name").val(),
        contact2name:$("#contact2_name").val(),
        contact3name:$("#contact3_name").val(),
        contact1title:$("#contact1_title").val(),
        contact2title:$("#contact2_title").val(),
        contact3title:$("#contact3_title").val(),
        contact1mobile:$("#contact1_mobile").val(),
        contact2mobile:$("#contact2_mobile").val(),
        contact3mobile:$("#contact3_mobile").val(),
        contact1email:$("#contact1_email").val(),
        contact2email:$("#contact2_email").val(),
        contact3email:$("#contact3_email").val(),
        revision:$("#revision").val(),
        revisiondate:$("#revisiondate").val(),
        revisor:$("#revisor").val(),
        completed:$("#completed").val(),
        certification:$("#certification").val(),
        completed_assignments:$("#completed_assignments").val(),
        products:$("#products").val(),
        comment:$("#comment").val(),
        customer_manager:$("#customer_manager").val(),
        active:active
    };
    $.get("setUpdateData.php", {userInfo: userInfo},
        function (result) {
            getData();
        }
    );
}

function insertData(){
    if($("#number_of_employees").val()){
        var employees = $("#number_of_employees").val();
    } else {
        var employees = 0;
    }
    var userInfo = {
        clinicName:$("#clinicName").val(), 
        date:$("#date").val(),
        adress:$("#adress").val(),
        version:$("#version").val(),
        postadress:$("#postadress").val(),
        workname:$("#workname").val(),
        email:$("#email").val(),
        phone:$("#phone").val(),
        number_of_employees:employees,
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
        contact1name:$("#contact1_name").val(),
        contact2name:$("#contact2_name").val(),
        contact3name:$("#contact3_name").val(),
        contact1title:$("#contact1_title").val(),
        contact2title:$("#contact2_title").val(),
        contact3title:$("#contact3_title").val(),
        contact1mobile:$("#contact1_mobile").val(),
        contact2mobile:$("#contact2_mobile").val(),
        contact3mobile:$("#contact3_mobile").val(),
        contact1email:$("#contact1_email").val(),
        contact2email:$("#contact2_email").val(),
        contact3email:$("#contact3_email").val(),
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
    $.get("insertData.php", {userInfo: userInfo},
        function () {
            getData();
        }
    );
    getData();
}



function nyKund(){
    document.getElementById("data").innerHTML = "<button type='button' onclick='insertData()' class='btn btn-primary'>Spara</button>    <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                Namn klinik: <input autocomplete='off' type='text' class='form-control' id='clinicName' style='width:100%;'>                             </div>                            <div class='col-sm-4 offset-sm-1' style='text-align: left;'>                                Datum: <input autocomplete='off' readonly type='text' class='form-control' id='date' style='width:100%;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                Adress: <input autocomplete='off' type='text' class='form-control' id='adress' style='width:100%;'>                             </div>                            <div class='col-sm-4 offset-sm-1' style='text-align: left;'>                                Version: <input autocomplete='off' type='number' class='form-control' id='version' style='width:100%;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                Postadress: <input autocomplete='off' type='text' class='form-control' id='postadress' style='width:100%;'>                             </div>                            <div class='col-sm-4 offset-sm-1' style='text-align: left;'>                                Arbetsnamn: <input autocomplete='off' type='text' class='form-control' id='workname' style='width:100%;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                E-post: <input autocomplete='off' type='text' class='form-control' id='email' style='width:100%;'>                             </div>                            <div class='col-sm-4 offset-sm-1' style='text-align: left;'>                                Antal anställda: <input autocomplete='off' type='number' class='form-control' id='number_of_employees' style='width:100%;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                Telefon: <input autocomplete='off' type='text' class='form-control' id='phone' style='width:100%;'>                             </div>                                                        <div class='col-sm-4 offset-sm-1' style='text-align: left;'>                                <div class='row'>                                    <div class='col-sm-9' style='text-align: left;'>                                        Filialer:                                        <input autocomplete='off' type='text' class='form-control' id='affiliatename1' style='width:100%;'>                                    </div>                                    <div class='col-sm-3' style='text-align: left;'>                                        Kundnr:                                        <input autocomplete='off' type='text' class='form-control' id='affiliatenumber1' autocomplete='off' style='width:100%;'>                                    </div>                                </div>                                <div class='row'>                                    <div class='col-sm-9' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatename2' style='width:100%;'>                                    </div>                                    <div class='col-sm-3' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatenumber2' autocomplete='off' style='width:100%;'>                                    </div>                                </div>                                <div class='row'>                                    <div class='col-sm-9' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatename3' style='width:100%;'>                                    </div>                                    <div class='col-sm-3' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatenumber3' autocomplete='off' style='width:100%;'>                                    </div>                                </div>                                <div class='row'>                                    <div class='col-sm-9' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatename4' style='width:100%;'>                                    </div>                                    <div class='col-sm-3' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatenumber4' autocomplete='off' style='width:100%;'>                                    </div>                                </div>                                <div class='row'>                                    <div class='col-sm-9' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatename5' style='width:100%;'>                                    </div>                                    <div class='col-sm-3' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='affiliatenumber5' autocomplete='off' style='width:100%;'>                                    </div>                                </div>                                                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                Webbsida: <input autocomplete='off' type='text' class='form-control' id='website' style='width:100%;'>                             </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                KIV länk: <input autocomplete='off' type='text' class='form-control' id='kiv_link' style='width:100%;'>                             </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                Användarnamn: <input autocomplete='off' type='text' class='form-control' id='username' style='width:100%;'>                             </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                Lösenord: <input autocomplete='off' type='text' class='form-control' id='password' style='width:100%;'>                             </div>                        </div>                        <div id='contactsContainer'>                            <div id='contacts'>                                <div class='row'>                                    <div class='col-md-2 offset-md-2' style='text-align: left;'>                                        Kontakter:                                    </div>                                </div>                                <div class='row'>                                    <div class='col-md-2 offset-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact1_name' placeholder='Namn' style='width:100%;'>                                     </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact1_title' placeholder='Titel' style='width:100%;'>                                                                  </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='number' class='form-control' id='contact1_mobile' placeholder='Mobil' style='width:100%;'>                                    </div>                                    <div class='col-md-3' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact1_email' placeholder='Email' style='width:100%;'>                                    </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <i class='fas fa-times fa-2x' style='display:none;'></i>                                    </div>                                </div>                                <div class='row'>                                    <div class='col-md-2 offset-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact2_name' placeholder='Namn' style='width:100%;'>                                     </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact2_title' placeholder='Titel' style='width:100%;'>                                                                  </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='number' class='form-control' id='contact2_mobile' placeholder='Mobil' style='width:100%;'>                                    </div>                                    <div class='col-md-3' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact2_email' placeholder='Email' style='width:100%;'>                                    </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <i class='fas fa-times fa-2x' style='display:none;'></i>                                    </div>                                </div>                                <div class='row'>                                    <div class='col-md-2 offset-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact3_name' placeholder='Namn' style='width:100%;'>                                     </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact3_title' placeholder='Titel' style='width:100%;'>                                                                  </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <input autocomplete='off' type='number' class='form-control' id='contact3_mobile' placeholder='Mobil' style='width:100%;'>                                    </div>                                    <div class='col-md-3' style='text-align: left;'>                                        <input autocomplete='off' type='text' class='form-control' id='contact3_email' placeholder='Email' style='width:100%;'>                                    </div>                                    <div class='col-md-2' style='text-align: left;'>                                        <i class='fas fa-times fa-2x' style='display:none;'></i>                                    </div>                                </div>                            </div>                            <div class='row'>                                <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                    <i onclick='addContact()' class='fas fa-plus-square fa-2x' style='display: none;'></i>                                </div>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-1 offset-sm-2' style='text-align: left;'>                                Revision: <select class='form-control' id='revision' style='width:fit-content;'>                                    <option>Ja</option>                                    <option>Nej</option>                                </select>                            </div>                            <div class='col-sm-2' style='text-align: left;'>                                Revisionsdatum: <input autocomplete='off' type='text' class='form-control' id='revisiondate' style='width:100%;' readonly>                            </div>                            <div class='col-sm-4' style='text-align: left;'>                                Revisor: <input autocomplete='off' type='text' class='form-control' id='revisor' style='width:100%;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                Genomförd: <input autocomplete='off' type='text' class='form-control' id='completed' style='width:100%;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                Certifiering/Licens: <input autocomplete='off' type='text' class='form-control' id='certification' style='width:100%;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                Genomförda uppdrag: <input autocomplete='off' type='text' class='form-control' id='completed_assignments' style='width:100%;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                Övriga produkter: <input autocomplete='off' type='text' class='form-control' id='products' style='width:100%;'>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-7 offset-sm-2' style='text-align: left;'>                                Noteringar: <textarea class='form-control' rows='5' id='comment' style='width:100%;'></textarea>                            </div>                        </div>                        <div class='row'>                            <div class='col-sm-4 offset-sm-2' style='text-align: left;'>                                Kundansvarig: <input autocomplete='off' type='text' class='form-control' id='customer_manager' style='width:100%;'>                            </div>                        </div></br>                        <button type='button' onclick='insertData()' class='btn btn-primary'>Spara</button>"
    // $.get("setData.php", {userInput: userInput}, 
    //     function (result) {
    //         $('#data').html(result);
    //     }
    // );
    loadDatepicker();
}