<?php
include "./header.html";
include "./reservation.html";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
    }
}
include "./footer.html";
?>