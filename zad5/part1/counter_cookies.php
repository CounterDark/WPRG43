<?php
if (!isset($_COOKIE["counter"])) {
    setcookie("counter", 0);
}
$counter = $_COOKIE["counter"] + 1;
setcookie("counter" , $counter);
if ($counter == 1) {
    echo "<br>Witaj pierwszy raz na naszej stronie!";
}
if ($counter > 2) {
    echo "<br>Witaj po ra kolejny na naszej stronie!";
}
echo "<br>";
echo "Liczba odwiedzin: {$counter}";
?>