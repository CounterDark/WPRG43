<?php
require_once __DIR__.'/'.'../../../shared/utils/getRelativePathString.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<?php
require_once getRelativePath(__DIR__ ,'../../../shared/views/elements/global_head.html');
echo "<link rel=\"stylesheet\" href=\"/~s27149/shared/views/css/global.css\">";
echo "<link rel=\"stylesheet\" href=\"./views/css/register.css\">";
?>
</head>
<body>
    <?php
    require_once getRelativePath(__DIR__ ,'/../elements/register_body.php');
    ?>
</body>
</html>