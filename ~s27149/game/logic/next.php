<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__.'/'.'../../shared/utils/getRelativePathString.php';
require_once getRelativePath(__DIR__ ,'../components/game.php');
require_once getRelativePath(__DIR__ ,'../../shared/components/quiz_element.php');

$game = unserialize($_SESSION['game']);

$game->incrementIndex();

unset($_SESSION['answer']);
unset($_SESSION['checked']);

$_SESSION['game'] = serialize($game);

header('Location: ../game.php');
exit();
?>