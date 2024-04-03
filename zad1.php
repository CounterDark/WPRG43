<?php
function zad1() {
    $array = array("jabłko", "bannan", "pomarańcza", "gruszka", "arbuz");
    foreach($array as $value) {
        $startsWithP = strtolower($value[0]) === "p";
        $newArray = array();
        $j = 0;
        for($i = strlen($value)-1; $i >= 0; --$i) {
            $newArray[$j] = $value[$i];
            $j++;
        }
        if ($startsWithP) {
            $startsWithP = "True";
        } else {
            $startsWithP = "False";
        }
        echo implode($newArray)." Starts with p: ".$startsWithP."\n";
    }
}

function zad2($max) {
    for($i=0;$i<$max;++$i) {
        if (checkPrime($i)) {
            echo $i." ";
        }
    }
}

function checkPrime($n) {
    if ($n<2)
        return false;
    for($i=2;$i*$i<=$n;$i++) {
        if ($n%$i===0)
            return false;
    }
    return true;
}

function zad3($n) {
    $a = 0;
    $b = 1;
    if( $n == 0)
        return;
    $array = array();
    for($i = 2; $i <= $n; $i++) {
        $c = $a + $b;
        $a = $b;
        $b = $c;
        array_push($array, $b);
    }
    $j = 1;
    foreach($array as $value) {
        if($value%2!==0) {
            echo $j.": ".$value."\n";
            ++$j;
        }
    }
}

function zad4() {
    $wordArray = explode(" " ,"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
    galley of type and scrambled it to make a type specimen book. It has survived not only five
    centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
    popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
    and more recently with desktop publishing software like Aldus PageMaker including versions of
    Lorem Ipsum.");
    $j = 0;
    $newArray = array();
    for($i=0;$i<count($wordArray)-1-$j;++$i) {
        if(checkForSpecial($wordArray[$i])) {
            ++$j;
            continue;
        }
        $newArray[$i-$j] = trim($wordArray[$i]);
    }

    $key = "";
    $associativeArray = array();
    foreach($newArray as $value) {
        if(strlen($value)<=0) {
            continue;
        }
        if($key==="") {
            $key = $value;
        } else {
            $associativeArray[$key] = $value;
            echo $key."-->".$value."\n";
            $key = "";
        }
    }
}

function checkForSpecial($value) {
    for($i=0;$i<strlen($value);++$i) {
        if($value[$i] === "," || $value[$i] === "." || $value[$i] === "'") {
            return true;
        }
    }
    return false;
}

zad4();
?>