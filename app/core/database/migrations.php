<?php if(false===defined('QW'))exit;

    $db_name = DB_NAME;
    $link = new db_Mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    $link->insert([
        'sql' => "CREATE TABLE `{$db_name}`.`users`(
            `id` INT NOT NULL AUTO_INCREMENT,
            `firstName` VARCHAR(20) NOT NULL,
            `lastName` VARCHAR(20) NOT NULL,
            `age` TINYINT NOT NULL,
            `floor` BOOLEAN NOT NULL,
            `group_id` TINYINT NOT NULL,
            `faculty_id` TINYINT NOT NULL,
        PRIMARY KEY (`id`)) ENGINE = InnoDB"
    ]);

    $link->insert([
        'sql' => "INSERT INTO `users` (`id`, `firstName`, `lastName`, `age`, `floor`, `group_id`, `faculty_id`) VALUES
            (NULL, 'Anton', 'Qwerty', '19', '1', '1', '2'),
            (NULL, 'Вася', 'Васьович', '18', '1', '2', '1'),
            (NULL, 'Qwerty', 'Zxcvb', '19', '0', '1', '2')
        "
    ]);

    $link->insert([
        'sql' => "CREATE TABLE `{$db_name}`.`group`(
            `id` INT NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(20) NOT NULL,
        PRIMARY KEY (`id`)) ENGINE = InnoDB"
    ]);

    $link->insert([
        'sql' => "INSERT INTO `group` (`id`, `name`) VALUES
            (NULL, '17'),
            (NULL, '17A'),
            (NULL, '18')
        "
    ]);

    $link->insert([
        'sql' => "CREATE TABLE `{$db_name}`.`faculty`(
            `id` INT NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(50) NOT NULL,
            `datetime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)) ENGINE = InnoDB"
    ]);

    $link->insert([
        'sql' => "INSERT INTO `faculty` (`id`, `name`) VALUES
            (NULL, 'Факультет будівництва та архітектури'),
            (NULL, 'Факультет музичного мистецтва'),
            (NULL, 'Факультет інформаційних технологій')
        "
    ]);
