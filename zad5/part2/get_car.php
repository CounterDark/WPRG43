<?php
include 'header.html';
if ($_SERVER["REQUEST_METHOD"] != "GET" && !isset($_GET['id'])) {
    echo "<h2>Brak danych</h2>";
    exit();
}

if (!$db = mysqli_connect('localhost', 'root')) {
    exit('Błąd połączenia z serwerem MySQL...');
}
if (!mysqli_select_db($db, 'mojaBaza')) {
    exit('Błąd wyboru bazy danych...');
}
$query = 'SELECT * FROM samochody where id=' . $_GET['id'] . ' LIMIT 1';
if (!$result = mysqli_query($db, $query)) {
    exit('Błąd zapytania...');
}
$row = mysqli_fetch_assoc($result);
echo '<h2>Samochód</h2>';
echo '<table>';
echo '<tr><th>Marka</th><th>Model</th><th>Cena</th><th>Rok</th><th>Opis</th></tr>';
echo '<tr>';
echo '<td>' . $row['marka'] . '</td>';
echo '<td>' . $row['model'] . '</td>';
echo '<td>' . $row['cena'] . '</td>';
echo '<td>' . $row['rok'] . '</td>';
echo '<td>' . $row['opis'] . '</td>';
echo '</tr>';
echo '</table>';

include 'footer.html';
?>