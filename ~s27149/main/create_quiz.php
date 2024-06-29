<?php
require_once '../shared/utils/entryCheck.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './logic/create.php';
}

require_once './views/wrappers/create_quiz_page.php'
?>