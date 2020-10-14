<?php
    session_start();
    if(isset($_COOKIE["Authentication"])){
        if($_COOKIE["Authentication"] == "9Yws8g6rA9VwAF7ELAJVSrEunhhXDpQpvJVRmj3eQSTweqVcAXx2kHUEmTYFL26NwamVF5CzLs9L84MCRgR2hvY9tuKLutfRDvgcrD7nRzJh"){
            echo "authenticated";
        } else {
            echo "failed";
        };
    }else{
        echo "failed";
    }
?>