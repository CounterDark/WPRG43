<?php
require_once './utils/initial_login.php';

if (!isset($_COOKIE['registered_once'])) {
    setcookie('registered_once', 'true', 2147483640);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './logic/register_user.php';
}

require_once './views/wrappers/register_page.php';
?>