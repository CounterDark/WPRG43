<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['path']) && isset($_POST['dirname'])){
   $path = htmlspecialchars($_POST['path']);
   $dirname = htmlspecialchars($_POST['dirname']);
   $type = htmlspecialchars($_POST['type']);
   if(!str_ends_with($path, '/')) {
        $path .= '/';
   }
   performAction($path, $dirname, $type);
}

function performAction($path, $dirname, $type = 'read') {
    switch($type) {
        case 'read':
            readOperation($path, $dirname);
            break;
        case 'create':
            createOperation($path, $dirname);
            break;
        case 'delete':
            deleteOperation($path, $dirname);
            break;
        default:
            echo 'Invalid operation';
    }
}

function readOperation($path, $dirname) {
    $dir = $path . $dirname;
    if(file_exists($dir) && is_dir($dir)) {
        $content = scandir($dir);
        foreach($content as $c) {
            echo $c . '<br>';
        }
        return;
    }
    echo 'Directory not found';
}

function createOperation($path, $dirname) {
    $dir = $path . $dirname;
    if(!file_exists($dir)) {
        $dir = mkdir($dir, 0777, true);
        if($dir == false) {
            echo 'Error in creating directory';
            return;
        }
        echo 'Directory created successfully';
        return;
    }
    echo 'Directory already exists';
}

function deleteOperation($path, $dirname) {
    $dir = $path . $dirname;
    if(file_exists($dir) && is_dir($dir)) {
        if(count(scandir($dir)) > 2) {
            echo 'Directory is not empty';
            return;
        }
        $dir = rmdir($dir);
        if($dir == false) {
            echo 'Error in deleting directory';
            return;
        }
        echo 'Directory deleted successfully';
        return;
    }
    echo 'Directory not found';
}
?>