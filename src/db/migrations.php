<?php
/**
 * TODO
 *  Write DPO statements to create following tables:
 *
 *  # airports
 *   - id (unsigned int, autoincrement)
 *   - name (varchar)
 *   - code (varchar)
 *   - city_id (relation to the cities table)
 *   - state_id (relation to the states table)
 *   - address (varchar)
 *   - timezone (varchar)
 *
 *  # cities
 *   - id (unsigned int, autoincrement)
 *   - name (varchar)
 *
 *  # states
 *   - id (unsigned int, autoincrement)
 *   - name (varchar)
 */

/** @var PDO $pdo */
require_once './pdo_ini.php';

// cities
$sql = <<<'SQL'
CREATE TABLE `cities` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`)
);
SQL;
$pdo->exec($sql);

// states
$sql = <<<'SQL'
CREATE TABLE `states` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`)
);
SQL;
$pdo->exec($sql);

// airports
$sql = <<<'SQL'
CREATE TABLE `airports` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(120) NOT NULL COLLATE 'utf8_general_ci',
	`code` VARCHAR(3) NOT NULL COLLATE 'utf8_general_ci',
	`city_id` INT(10) UNSIGNED NOT NULL,
	`state_id` INT(10) UNSIGNED NOT NULL,
	`address` VARCHAR(120) NOT NULL COLLATE 'utf8_general_ci',
	`timezone` VARCHAR(80) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`),
	INDEX `city_idx` (`city_id` ASC) VISIBLE,
    INDEX `state_idx` (`state_id` ASC) VISIBLE,
    CONSTRAINT `cities`
        FOREIGN KEY (`city_id`)
        REFERENCES `airports`.`cities` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT `states`
        FOREIGN KEY (`state_id`)
        REFERENCES `airports`.`states` (`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

SQL;
$pdo->exec($sql);

