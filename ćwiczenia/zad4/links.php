<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!file_exists('links.txt')) {
        echo "File not found.";
        return;
    }
    $file = fopen("links.txt", "r");
    if ($file) {
        $content = "<ul>";
        while (($line = fgets($file)) !== false) {
            $data = explode(";", $line);
            $address = trim($data[0]);
            $description = trim($data[1]);

            $content .= "<li><a href=\"$address\">$description</a></li>";
        }
        $content .= "</ul>";
        fclose($file);
        echo $content;
    } else {
        echo "Failed to open the file.";
    }
} else {
    echo "Invalid request method.";
}
?>