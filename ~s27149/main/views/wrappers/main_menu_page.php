<?php
include_once __DIR__.'/'.'../../../shared/utils/getRelativePathString.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<?php
include_once getRelativePath(__DIR__ ,'../../../shared/views/elements/global_head.html');
echo "<link rel=\"stylesheet\" href=\"/~s27149/shared/views/css/global.css\">";
echo "<link rel=\"stylesheet\" href=\"./views/css/main_menu.css\">";
?>
</head>
<body>
    <?php
    include_once getRelativePath(__DIR__ ,'/../elements/main_menu_body.php');
    ?>
</body>
</html>