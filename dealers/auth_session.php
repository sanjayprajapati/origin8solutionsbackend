<?php
    session_start();
    if(!isset($_SESSION["dealer_name"])) {
        header("Location: login.php");
        exit();
    }
?>
