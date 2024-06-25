<?php
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!file_exists('counter.txt')) {
            $file = fopen('counter.txt', 'w+');
            fwrite($file, '0');
            fclose($file);
        }
        $file = fopen('counter.txt', 'r');
        flock($file, LOCK_SH);
        $content = fread($file, filesize('counter.txt'));
        $counter = strlen($content)>0 ? intval($content) : 0;
        $counter += 1;
        flock($file, LOCK_UN);
        fclose($file);
        $file = fopen('counter.txt', 'w+');
        fwrite($file, strval($counter));
        fclose($file);
        echo $counter;
    }
    else {
        echo file_get_contents('counter.txt');
    }
?>