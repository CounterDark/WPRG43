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
    $form_data = [];
    foreach ($_POST as $key => $value) {
        $form_data[$key] = $mysqli->real_escape_string(htmlspecialchars($value));
    }
    if (empty($form_data['register']) || empty($form_data['password']) || empty($form_data['name'])) {
        $_SESSION['error'] = 'Wypełnij wszystkie pola';
        header('Location: register.php');
        exit();
    }
    if (strlen($form_data['register']) < 3 || strlen($form_data['password']) < 3 || strlen($form_data['name']) < 3) {
        $_SESSION['error'] = 'Pola muszą zawierać co najmniej 3 znaki';
        header('Location: register.php');
        exit();
    }
    if (strlen($form_data['register']) > 45 || strlen($form_data['password']) > 45 || strlen($form_data['name']) > 45) {
        $_SESSION['error'] = 'Pola nie mogą zawierać więcej niż 45 znaków';
        header('Location: register.php');
        exit();
    }
    $login = $form_data['register'];
    $password = password_hash($form_data['password'], PASSWORD_DEFAULT);
    $name = $form_data['name'];
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
        setcookie('registered_once', 'true');
        header('Location: login.php');
    } else {
        header('Location: register.php');
    }
}
$mysqli->close();
exit();
?>