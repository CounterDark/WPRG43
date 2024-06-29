<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__.'/'.'../../../shared/utils/getRelativePathString.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<?php
require_once getRelativePath(__DIR__ ,'../../../shared/views/elements/global_head.html');
echo "<link rel=\"stylesheet\" href=\"/~s27149/shared/views/css/global.css\">";
echo "<link rel=\"stylesheet\" href=\"./views/css/navbar.css\">";
echo "<link rel=\"stylesheet\" href=\"./views/css/create_quiz.css\">";
?>
</head>
<body>
    <navbar>
        <ul>
            <li><a href="main_menu.php">Strona główna</a></li>
            <li><a href="../../~s27149/user/profile.php">Profil</a></li>
            <li><a href="../../~s27149/user/logout.php">Wyloguj</a></li>
        </ul>
    </navbar>
    <?php
    if (isset($_SESSION['error'])) {
        error_log("Error: ".$_SESSION['error']);
        require_once getRelativePath(__DIR__ ,'/../elements/create_quiz_error.php');
        unset($_SESSION['error']);
    } else if (isset($_SESSION['success'])) {
        error_log("Success: ".$_SESSION['success']);
        require_once getRelativePath(__DIR__ ,'/../elements/create_quiz_success.php');
        unset($_SESSION['success']);
    } else {
        require_once getRelativePath(__DIR__ ,'/../elements/create_quiz_body.php');
    }
    ?>
</body>
</html>