<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = $_POST['number'];
    
    if (is_numeric($number) && $number > 0 && $number == round($number)) {
        $isPrimeData = isPrime($number);
        if ($isPrimeData['isPrime']) {
            echo "Liczba $number jest pierwsza. Ilość sprawdzeń: " . $isPrimeData['amount'];
        } else {
            echo "Liczba $number nie jest pierwsza. Ilość sprawdzeń: " . $isPrimeData['amount'];
        }
    } else {
        echo "Liczba ma być dodatnia.";
    }
}

function isPrime($number) {
    if ($number <= 1) {
        return false;
    }
    $amount = 0;
    for ($i = 2; $i <= sqrt($number); $i++) {
        $amount++;
        if ($number % $i === 0) {
            return [ 'amount' => $amount, 'isPrime' => false];
        }
    }
    
    return [ 'amount' => $amount, 'isPrime' => true];
}
?>