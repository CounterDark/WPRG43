<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__.'/'.'../../shared/utils/getRelativePathString.php';
require_once getRelativePath(__DIR__ ,'../components/game.php');
require_once getRelativePath(__DIR__ ,'../../shared/components/quiz_element.php');

$game = unserialize($_SESSION['game']);

if (!isset($_POST['answer'])) {
    header('Location: ./game.php');
    exit();
}
$answer = intval($_POST['answer']);
$isCorrect = $game->checkAnswer($answer);

if ($isCorrect) {
    $_SESSION['checked'] = true;
} else {
    $_SESSION['checked'] = false;
}

$_SESSION['game'] = serialize($game);

header('Location: ./game.php');
exit();
?>