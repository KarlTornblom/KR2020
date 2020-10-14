<?php
    session_start();
    setcookie("Authentication", "", time() - 3600, "/");
?>