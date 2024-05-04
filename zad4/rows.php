<?php 
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $filepath = $_FILES['file']['full_path'];
        if(!file_exists($filepath)) {
            echo "File does not exist";
            return;
        }
        $file = fopen($filepath, "r");
        $rows = [];
        while(!feof($file)) {
            array_push($rows, fgets($file));
        }
        fclose($file);
        $rows = array_reverse($rows);
        echo implode("<br>", $rows);
    }
    else {
        echo "Wrong request method";
    }
?>