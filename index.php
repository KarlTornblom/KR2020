<?php
    session_start();

    //funktion för att logga in endast genom url, inte särskilt säkert men martin insisterade
    if($_GET["dlogin"]){
        setcookie("Authentication", $_GET["dlogin"], time() + (10 * 365 * 24 * 60 * 60), "/");
    }

    //direktlänk http://localhost/KR2020/index.php?dlogin=9Yws8g6rA9VwAF7ELAJVSrEunhhXDpQpvJVRmj3eQSTweqVcAXx2kHUEmTYFL26NwamVF5CzLs9L84MCRgR2hvY9tuKLutfRDvgcrD7nRzJh
    //för skarpt http://kundregister2.kvalprak.se/index.php?dlogin=9Yws8g6rA9VwAF7ELAJVSrEunhhXDpQpvJVRmj3eQSTweqVcAXx2kHUEmTYFL26NwamVF5CzLs9L84MCRgR2hvY9tuKLutfRDvgcrD7nRzJh

    if($_COOKIE["Authentication"] == "9Yws8g6rA9VwAF7ELAJVSrEunhhXDpQpvJVRmj3eQSTweqVcAXx2kHUEmTYFL26NwamVF5CzLs9L84MCRgR2hvY9tuKLutfRDvgcrD7nRzJh"){
        header('Location: view/index.html');
    } else {
        header('Location: login/login.html');
    };
?>
