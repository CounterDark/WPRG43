<?php
session_start();
$counter = 0;
if (isset($_COOKIE["counter"])) {
    $counter = $_COOKIE["counter"];
}
if (!isset($_SESSION["counter"])) {
    $counter++;
    $_SESSION["counter"] = $counter;
}
setcookie("counter" , $counter, time() + 60*60*24*365);
if ($counter == 1) {
    echo "<br>Witaj pierwszy raz na naszej stronie!";
}
if ($counter > 2) {
    echo "<br>Witaj po ra kolejny na naszej stronie!";
}
echo "<br>";
echo "Liczba odwiedzin: {$counter}";
?>