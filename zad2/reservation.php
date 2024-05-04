<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $summary = "<!DOCTYPE html>
    <html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Podsumowanie Rezerwacji</title>
    </head>
    <body>
        <header>
            <h1>Podsumowanie Twojej Rezerwacji</h1>
        </header>
        <main>
            <p>Dziękujemy za rezerwację w naszym hotelu. Oto szczegóły Twojej rezerwacji:</p>
            <ul>";

    $ammenities = false;
    foreach ($_POST as $key => $value) {
        if ($key == "childBed" || $key == "ashtray" || $key == "airConditioning") {
            $value = $value == "on" ? "Tak" : "Nie";
        }
        if ($key == "airConditioning" || $key == "ashtray") {
            $ammenities = true;
            $summary .= "<li>Udogodnienia: <ul>";
        }
        if ($key == "firstName1") {
            $summary .= "<li>Dane gości: <ul>";
        }
        if ($key == "firstName") {
            $summary .= "</ul></li>";
        }
        $summary .= "<li>" . htmlspecialchars(getNameForKey($key)) . ": " . htmlspecialchars($value) . "</li>";
    }

    if ($ammenities) {
        $summary .= "</ul></li>";
    }

    $summary .= "</ul>
        </main>
    </body>
    </html>";

    echo $summary;
}

function getNameForKey($key) {
    if (str_starts_with($key, "firstName")) {
        return str_ends_with($key,'Name') ? "Imię" : "Imię gościa " . substr($key, 9);
    }
    if (str_starts_with($key, "lastName")) {
        return str_ends_with($key, 'Name') ? "Nazwisko" : "Nazwisko gościa " . substr($key, 8);
    }
    switch ($key) {
        case "guests":
            return "Liczba gości";
        case "firstName":
            return "Imię";
        case "lastName":
            return "Nazwisko";
        case "email":
            return "Email";
        case "phone":
            return "Telefon";
        case "address":
            return "Adres";
        case "stayDate":
            return "Data pobytu";
        case "arrivalTime":
            return "Data przyjazdu";
        case "childBed":
            return "Łóżko dla dziecka";
        case "ashtray":
            return "Popielniczka";
        case "airConditioning":
            return "Klimatyzacja";
        default:
            return $key;
    }
}
?>