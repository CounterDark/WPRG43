<?php
include "./header.html";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $guestsAmount = 0;
    if (isset($_SESSION["guestsAmount"])) {
        $guestsAmount = $_SESSION["guestsAmount"];
    }
    if ($guestsAmount > 0) {
        echo "<h2>Rezerwacja</h2>";
        echo "<form action='dane.php' method='post'>";
        for ($i = 1; $i <= $guestsAmount; $i++) {
            echo "<label for='name{$i}'>Imię {$i}:</label>";
            echo "<input type='text' id='name{$i}' name='name$i' required><br>";
            echo "<label for='surname{$i}'>Nazwisko {$i}:</label>";
            echo "<input type='text' id='surname{$i}' name='surname{$i}' required><br>";
            echo "<label for='age{$i}'>Wiek {$i}:</label>";
            echo "<input type='number' id='age$i' name='age$i' required><br>";
        }
        echo "<input type='submit' value='Wyślij'>";
        echo "</form>";
    } else {
        echo "<h2>Brak gości</h2>";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
    }
}
include "./footer.html";
?>