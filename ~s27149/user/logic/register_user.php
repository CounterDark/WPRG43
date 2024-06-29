<?php
if (!isset($_SESSION)) {
    session_start();
}

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
    if (empty($formData['register']) || empty($formData['password']) || empty($formData['name'])) {
        $_SESSION['error'] = 'Wypełnij wszystkie pola';
        header('Location: register.php');
        exit();
    }
    if (strlen($formData['register']) < 3 || strlen($formData['password']) < 3 || strlen($formData['name']) < 3) {
        $_SESSION['error'] = 'Pola muszą zawierać co najmniej 3 znaki';
        header('Location: register.php');
        exit();
    }
    if (strlen($formData['register']) > 45 || strlen($formData['password']) > 45 || strlen($formData['name']) > 45) {
        $_SESSION['error'] = 'Pola nie mogą zawierać więcej niż 45 znaków';
        header('Location: register.php');
        exit();
    }
    $login = $formData['register'];
    $password = password_hash($formData['password'], PASSWORD_DEFAULT);
    $name = $formData['name'];
    $role = 'user';
    error_log('check if user exists');
    $query = "SELECT * FROM users WHERE login = '$login' OR name = '$name'";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        $_SESSION['error'] = 'Użytkownik o podanym loginie lub nazwie już istnieje';
        header('Location: register.php');
        exit();
    }
    error_log('insert user');
    $query = "INSERT INTO users (login, password, name, role) VALUES ('$login', '$password', '$name', '$role')";
    $success = $mysqli->query($query);
    if ($success) {
        setcookie('registered_once', 'true', 2147483640);
        header('Location: login.php');
    } else {
        header('Location: register.php');
    }
}
$mysqli->close();
exit();
?>