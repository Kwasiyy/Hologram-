<?php

session_start();
function checkForLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location:../login/login.php");
        die();
    }
}

checkForLogin();