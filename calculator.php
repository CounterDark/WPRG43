<?php 
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];
    switch ($operator) {
        case 'add':
            echo $num1 + $num2;
            break;
        case 'subtract':
            echo $num1 - $num2;
            break;
        case 'multiply':
            echo $num1 * $num2;
            break;
        case 'divide':
            if($num2 == 0){
                echo "Cannot divide by zero";
                break;
            }
            echo $num1 / $num2;
            break;
        default:
            echo "Invalid operator";
            break;
    }
?>