<?php
function initTables($mysqli) {
    $mysqli->query('CREATE TABLE IF NOT EXISTS `s27149`.`users` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `login` VARCHAR(45) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `name` VARCHAR(45) NOT NULL,
        `role` VARCHAR(45) NOT NULL,
        PRIMARY KEY (`id`))');
    
    //set polish signs
    $mysqli->query('ALTER TABLE `s27149`.`users` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci');


    $mysqli->query('CREATE TABLE IF NOT EXISTS `s27149`.`quiz` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(45) NOT NULL,
        `questions` JSON NOT NULL,
        `author_uid` VARCHAR(45) NOT NULL,
        `author_name` VARCHAR(45) NOT NULL,
        PRIMARY KEY (`id`))');

    //set polish signs
    $mysqli->query('ALTER TABLE `s27149`.`quiz` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }
?>