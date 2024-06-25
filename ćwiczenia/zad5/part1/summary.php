<?php
include "./header.html";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "<h2>Podsumowanie</h2>";
    echo "<h4>Dane rezerwacji:</h4>";
    foreach ($_SESSION as $key => $value) {
        if (str_starts_with($key, "name") || str_starts_with($key, "surname") || str_starts_with($key, "age")) {
            continue;
        }
        echo "<p>{$key}: {$value}</p>";
    }
    echo "<h4>Dane gości:</h4>";
    $guestsAmount = 0;
    if (isset($_SESSION["guestsAmount"])) {
        $guestsAmount = $_SESSION["guestsAmount"];
    }
    for ($i = 1; $i <= $guestsAmount; $i++) {
        echo "<h5>Gość {$i}:</h5>";
        echo "<p>Imię: {$_SESSION["name$i"]}</p>";
        echo "<p>Nazwisko: {$_SESSION["surname$i"]}</p>";
        echo "<p>Wiek: {$_SESSION["age$i"]}</p>";
    }
}
include "./footer.html";
?>