<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['db_host']) || !isset($_SESSION['db_user']) || !isset($_SESSION['db_pass'])) {
    header('Location: ../index.php');
    exit();
}

if (!isset($_SESSION['logged_in']) || (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == false)) {
    header('Location: ../index.php');
    exit();
}

require_once './logic/logout_user.php';
?>