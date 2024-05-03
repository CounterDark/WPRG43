<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    error_reporting(E_ERROR);

    $locale = array('pl_PL.utf8', 'pl_PL.UTF-8','pl.utf8');
    setlocale(LC_ALL, $locale);
    $birthday = explode('-', $_GET['birthday']);
    $year = $birthday[0];
    $month = $birthday[1];
    $day = $birthday[2];
    $timestamp = mktime(0, 0, 0, $month, $day, $year);
    $weekday = strftime('%A', $timestamp);
    $age = getAge($timestamp);
    echo 'Urodziłeś się w '.$weekday.'. Masz '.$age.' lat. Dni do następnych urodzin: '.daysTillNextBirthday($timestamp);
}

function getAge($timestamp) {
    $now = time();
    $currentDate = getdate($now);
    $birthDate = getdate($timestamp);
    if ($currentDate['mon'] > $birthDate['mon'] || ($currentDate['mon'] == $birthDate['mon'] && $currentDate['mday'] >= $birthDate['mday'])) {
        $age = $currentDate['year'] - $birthDate['year'];
    } else {
        $age = $currentDate['year'] - $birthDate['year'] - 1;
    }
    return $age;
}

function daysTillNextBirthday($birthdayTimestamp) {
    $now = time();
    $currentDate = getdate($now);
    $birthDate = getdate($birthdayTimestamp);
    $nextBirthday = mktime(0, 0, 0, $birthDate['mon'], $birthDate['mday'], $currentDate['year']);
    if ($nextBirthday < $now) {
        $nextBirthday = mktime(0, 0, 0, $birthDate['mon'], $birthDate['mday'], $currentDate['year'] + 1);
    }
    $days = abs(ceil(($nextBirthday - $now) / 86400));
    return $days;
}
?>