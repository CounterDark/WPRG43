<?php
//This should be included in every page that requires being logged in
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['logged_in']) || (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == false)) {
    header('Location: index.php');
    exit();
}
?>