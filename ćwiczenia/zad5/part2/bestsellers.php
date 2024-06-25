<?php
if (!$db = mysqli_connect('localhost', 'root')) {
    exit('Błąd połączenia z serwerem MySQL...');
}
if (!mysqli_select_db($db, 'mojaBaza')) {
    exit('Błąd wyboru bazy danych...');
}
$query = 'SELECT * FROM samochody ORDER BY cena ASC LIMIT 5';
if (!$result = mysqli_query($db, $query)) {
    exit('Błąd zapytania...');
}
echo '<h2>TOP 5 samochodów</h2>';
echo '<table>';
echo '<tr><th>Marka</th><th>Model</th><th>Cena</th><th>Rok</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['marka'] . '</td>';
    echo '<td>' . $row['model'] . '</td>';
    echo '<td>' . $row['cena'] . '</td>';
    echo '<td>' . $row['rok'] . '</td>';
    echo '</tr>';
}
echo '</table>';
mysqli_close($db);
?>