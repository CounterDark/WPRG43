<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/' . '../components/user.php';

$dbhost = $_SESSION['db_host'];
$dbuser = $_SESSION['db_user'];
$dbpass = $_SESSION['db_pass'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, 's27149');

if (isset($_POST)) {
    $formData = [];
    foreach ($_POST as $key => $value) {
        $formData[$key] = $mysqli->real_escape_string(htmlspecialchars($value));
    }
    error_log(print_r($formData, true));
    if (empty($formData['login']) || empty($formData['password'])) {
        $_SESSION['error'] = 'Wypełnij wszystkie pola';
        header('Location: login.php');
        exit();
    }
    if (strlen($formData['login']) < 3 || strlen($formData['password']) < 3) {
        $_SESSION['error'] = 'Pola muszą zawierać co najmniej 3 znaki';
        header('Location: login.php');
        exit();
    }
    if (strlen($formData['login']) > 45 || strlen($formData['password']) > 45) {
        $_SESSION['error'] = 'Pola nie mogą zawierać więcej niż 45 znaków';
        header('Location: login.php');
        exit();
    }
    $login = $formData['login'];
    $password = password_hash($formData['password'], PASSWORD_DEFAULT);
    error_log('check if user exists');
    $query = "SELECT * FROM users WHERE login = '$login'";
    $result = $mysqli->query($query);
    if ($result->num_rows <= 0) {
        $_SESSION['error'] = 'Użytkownik o podanym loginie nie istnieje';
        header('Location: login.php');
        exit();
    }
    error_log('check password');
    $user_from_db = $result->fetch_assoc();
    if (!password_verify($formData['password'], $user_from_db['password'])) {
        $_SESSION['error'] = 'Nieprawidłowe hasło';
        header('Location: login.php');
        exit();
    }
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = serialize(new User($user_from_db['id'], $user_from_db['login'], $user_from_db['name'], $user_from_db['role']));
    header('Location: ../main/main_menu.php');
}
$mysqli->close();
exit();
?>