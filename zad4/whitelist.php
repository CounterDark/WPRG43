<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!file_exists('whitelist.txt')) {
        echo "File not found.";
        return;
    }
    $whitelist = explode(";" ,file_get_contents('whitelist.txt'));
    if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
        include 'admin.php';
    } else {
        include 'guest.php';
    }
} else {
    echo "Invalid request method.";
}
?>