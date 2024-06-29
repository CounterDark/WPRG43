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
echo "<link rel=\"stylesheet\" href=\"./views/css/main_menu.css\">";
?>
</head>
<body>
    <?php
    if (isset($_SESSION['game_ended'])) {
        require_once getRelativePath(__DIR__ ,'/../elements/game_ended.php');
    } else {
        require_once getRelativePath(__DIR__ ,'/../elements/game_body.php');
    }
    ?>
</body>
</html>