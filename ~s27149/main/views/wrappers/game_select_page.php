<?php
require_once __DIR__.'/'.'../../../shared/utils/getRelativePathString.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<?php
require_once getRelativePath(__DIR__ ,'../../../shared/views/elements/global_head.html');
echo "<link rel=\"stylesheet\" href=\"/~s27149/shared/views/css/global.css\">";
echo "<link rel=\"stylesheet\" href=\"./views/css/navbar.css\">";
echo "<link rel=\"stylesheet\" href=\"./views/css/game_select.css\">";
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
    require_once getRelativePath(__DIR__ ,'/../elements/game_select_body.php');
    ?>
</body>
</html>