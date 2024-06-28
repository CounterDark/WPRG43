<?php
include_once './utils/initial_login.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once './logic/register_user.php';
}

include_once './views/wrappers/register_page.php';
?>