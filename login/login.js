function loadLogin(){
    $('#exampleModalCenter').modal();
}

$(document).ready(
    function(){
        $("button").click(
            function(){
                var username = $("#username").val();
                var password = $("#password").val();
                $.get("login.php", {username: username, password: password}, 
                    function (result) {
                        if(result == "pass"){
                            sessionStorage.setItem("login", true);
                            location.replace("../index.html");
                        }else{
                            $('span').html(result);
                        }
                    }
                );
            }
        );
    }
);

var input = document.getElementsByTagName("input");
input[0].addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
      document.getElementById("login").click();
    }
});
input[1].addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
      document.getElementById("login").click();
    }
});