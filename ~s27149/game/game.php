<?php
require_once '../shared/utils/entryCheck.php';

if (!isset($_SESSION['game'])) {
    //silently redirect to index
    header('Location: ../index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer']) && !isset($_SESSION['checked'])) {
    require_once './logic/check.php';
}

require_once './views/wrappers/game_page.php'
?>