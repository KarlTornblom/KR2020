function onload(){
    authenticate();
    getData();
    onKeyUp();
}

function authenticate(){
    $.get("../controller/authentication.php", function(result) {
        if(result == "failed"){
            location.replace("../login/login.html");
        }
    });
}

function logout(){
    $.get("../login/logout.php",
        function (result) {
            location.replace("../login/login.html");
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

function getData(){
    var userInput = {
        search:$("#search").val(),
    };
    $.get("getData.php", {userInput: userInput}, 
        function (result) {
            $('#data').html(result);
        }
    );
}

// Sort functions
function sortNumber(n) {
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
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
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
    $('#date, #internalrevision, #externalrevision').datepicker({
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

function nyKund(){
    $.get("newCustomer.php",
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
        revisionmonth:$("#revisionmonth").val(),
        revisor:$("#revisor").val(),
        internalrevision:$("#internalrevision").val(),
        externalrevision:$("#externalrevision").val(),
        chargemonth:$("#chargemonth").val(),
        completed:$("#completed").val(),
        certification:$("#certification").val(),
        completed_assignments:$("#completed_assignments").val(),
        products:$("#products").val(),
        comment:$("#comment").val(),
        post_number:$("#post_number").val(),
        location:$("#location").val(),
        customer_manager:$("#customer_manager").val(),
        active:active
    };
    $.get("../model/setUpdateData.php", {userInfo: userInfo},
        function () {
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
        revisionmonth:$("#revisionmonth").val(),
        revisor:$("#revisor").val(),
        internalrevision:$("#internalrevision").val(),
        externalrevision:$("#externalrevision").val(),
        chargemonth:$("#chargemonth").val(),
        completed:$("#completed").val(),
        certification:$("#certification").val(),
        completed_assignments:$("#completed_assignments").val(),
        products:$("#products").val(),
        comment:$("#comment").val(),
        post_number:$("#post_number").val(),
        location:$("#location").val(),
        customer_manager:$("#customer_manager").val()
    };
    
    $.get("../model/insertData.php", {userInfo: userInfo},
        function () {
            getData();
        }
    );
}



