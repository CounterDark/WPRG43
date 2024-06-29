<?php
if (!isset($_SESSION)) {
    session_start();
    error_log(print_r(session_id(), true));
}
require_once __DIR__.'/'.'shared/logic/init_tables.php';

$_SESSION['db_host'] = 'localhost';
$_SESSION['db_user'] = 's27149';
$_SESSION['db_pass'] = 'Ale.Kunk';

$dbhost = $_SESSION['db_host'];
$dbuser = $_SESSION['db_user'];
$dbpass = $_SESSION['db_pass'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, 's27149');

$mysqli->set_charset('utf8mb4');
//init tables
error_log('init tables');
initTables($mysqli);
error_log('init tables done');
$mysqli->close();

if (!isset($_SESSION['logged_in']) || (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == false)) {
    header('Location: user/login.php');
    exit();
}

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header('Location: main/main_menu.php');
    exit();
}
?>