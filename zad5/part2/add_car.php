<?php
include 'header.html';

if (!$db = mysqli_connect('localhost', 'root')) {
    exit('Błąd połączenia z serwerem MySQL...');
}
if (!mysqli_select_db($db, 'mojaBaza')) {
    exit('Błąd wyboru bazy danych...');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = $_POST['model'];
    $marka = $_POST['marka'];
    $rok = $_POST['rok'];
    $cena = $_POST['cena'];
    $opis = $_POST['opis'];

    $model = mysqli_real_escape_string($db, $model);
    $marka = mysqli_real_escape_string($db, $marka);
    $rok = mysqli_real_escape_string($db, $rok);
    $cena = mysqli_real_escape_string($db, $cena);
    $opis = mysqli_real_escape_string($db, $opis);

    $rok = intval($rok);
    $cena = floatval($cena);

    if (!is_string($model) || !is_string($marka) || !($rok != 0) || !($cena != 0) || !is_string($opis)) {
        exit(gettype($model) . ' ' . gettype($marka) . ' ' . gettype($rok) . ' ' . gettype($cena) . ' ' . gettype($opis) . ' Błąd danych');
    }

    $query = "INSERT INTO samochody (model, marka, rok, cena, opis) VALUES ('$model', '$marka', $rok, $cena, '$opis')";
    if (mysqli_query($db, $query)) {
        echo "Pomyślnie dodano auto!";
    } else {
        echo "Błąd przy dodawaniu auta: " . mysqli_error($db);
    }
    mysqli_close($db);
} else {
    include 'car_form.html';
}
include 'footer.html';
?>