<?php
include_once './utils/initial_login.php';

if (!isset($_COOKIE['registered_once'])) {
    header('Location: register.php');
    exit();
}

if (!isset($_SESSION['db_host']) || !isset($_SESSION['db_user']) || !isset($_SESSION['db_pass'])) {
    header('Location: ../index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once './logic/login_user.php';
}

include_once './views/wrappers/login_page.php';
?>