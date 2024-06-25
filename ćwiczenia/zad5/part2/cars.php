<?php
include 'header.html';

if (!$db = mysqli_connect('localhost', 'root')) {
    exit('Błąd połączenia z serwerem MySQL...');
}
if (!mysqli_select_db($db, 'mojaBaza')) {
    exit('Błąd wyboru bazy danych...');
}
$query = 'SELECT * FROM samochody ORDER BY rok DESC';
if (!$result = mysqli_query($db, $query)) {
    exit('Błąd zapytania...');
}
echo '<h2>Samochody</h2>';
echo '<table>';
echo '<tr><th>Id</th><th>Marka</th><th>Model</th><th>Cena</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'. "<a href=\"get_car.php/?id={$row['id']}\">" . $row['id'] . '</td>';
    echo '<td>' . $row['marka'] . '</td>';
    echo '<td>' . $row['model'] . '</td>';
    echo '<td>' . $row['cena'] . '</td>';
    echo '</tr>';
}
echo '</table>';
mysqli_close($db);

include 'footer.html';
?>