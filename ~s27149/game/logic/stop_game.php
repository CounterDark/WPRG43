<?php
if (!isset($_SESSION)) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once __DIR__.'/'.'../components/game.php';

Game::endGame();
header('Location: ../game.php');
exit();
?>