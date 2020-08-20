<?php
    session_start();
    if($_SESSION["login"] == "?q9d$+\9YHFzb;(m2-QfH582kPH[>U-4-Z=_x.apQT3T_AjHa24#vvXf2tM:Wr8zgeCxzXV6qKzcx8B\u;!f>SZ,JS5Tp\d]#;BEY^Cd[Gb2XY<A`Czeu&E#j"){
        header('Location: view/index.html');
    } else {
        header('Location: login/login.html');
    };
?>