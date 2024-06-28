<?php
//Code to include for initialization
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header('Location: ../main/main_menu.php');
    exit();
}
?>