<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = $_POST['number'];
    $time_start = microtime(true);
    $resultRecursive = fibonacciRecursive($n);
    $time_end = microtime(true);
    $execution_time_recursive = ($time_end - $time_start)*10000;
    $time_start = microtime(true);
    $resultIterative = fibonacciIterative($n);
    $time_end = microtime(true);
    $execution_time_iterative = ($time_end - $time_start)*10000;
    echo 'Wynik rekurencyjnie: ' . $resultRecursive .' Czas działania: '.$execution_time_recursive. '<br>';
    echo 'Wynik iteracyjnie: ' . $resultIterative .' Czas działania: '.$execution_time_iterative. '<br>';
}

function fibonacciRecursive($n) {
    if($n == 0) {
        return 0;
    } else if($n == 1) {
        return 1;
    } else {
        return fibonacciRecursive($n - 1) + fibonacciRecursive($n - 2);
    }
}

function fibonacciIterative($n) {
    $a = 0;
    $b = 1;
    $c = 0;
    for($i = 2; $i <= $n; $i++) {
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
    return $c;
}
?>