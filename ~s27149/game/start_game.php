<?php
require_once '../shared/utils/entryCheck.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    require_once './logic/start_game.php';
}
?>