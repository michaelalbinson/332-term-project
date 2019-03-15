DROP DATABASE IF EXISTS cmpe_332_project; 
CREATE DATABASE IF NOT EXISTS cmpe_332_project;

-- Use the database we just created
USE cmpe_332_project;

-- Attendee table
DROP TABLE IF EXISTS `Attendee`;
CREATE TABLE `Attendee` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`type` ENUM('student', 'professional', 'sponsor') NOT NULL DEFAULT "student", 
	`room_number` VARCHAR(10) DEFAULT NULL,
	`sponsor_id` INT DEFAULT NULL,
	`first_name` VARCHAR(40) NOT NULL,
	`last_name` VARCHAR(40) NOT NULL 
);

DROP TABLE IF EXISTS `Organizer`;
CREATE TABLE `Organizer` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`first_name` VARCHAR(40) NOT NULL, 
	`last_name` VARCHAR(40) NOT NULL
);

-- Session table
DROP TABLE IF EXISTS `Session`;
CREATE TABLE `Session` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`start_time` DATETIME NOT NULL, 
	`end_time` DATETIME NOT NULL, 
	`conf_room` VARCHAR(100) NOT NULL, 
	`name` VARCHAR(100) NOT NULL
);

-- Subcommittee table
DROP TABLE IF EXISTS `Subcommittee`;
CREATE TABLE `Subcommittee` (
	`id` INT PRIMARY KEY AUTO_INCREMENT, 
	`name` VARCHAR(100) NOT NULL, 
	`chair` INT NOT NULL
);

-- Sponsor table
DROP TABLE IF EXISTS `Sponsor`;
CREATE TABLE `Sponsor` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`tier` ENUM('bronze', 'silver', 'gold', 'platinum') DEFAULT 'bronze', 
	`name` VARCHAR(100) NOT NULL,
	`num_emails_sent` int(11),
	`email_address` VARCHAR(20) 
);

-- Job table
DROP TABLE IF EXISTS `Job`;
CREATE TABLE `Job` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`sponsor_id` INT NOT NULL, 
	`title` VARCHAR(100) NOT NULL, 
	`city` VARCHAR(100) NOT NULL, 
	`province` VARCHAR(100) NOT NULL,
	`pay_rate` INT NOT NULL
);

-- Room table
DROP TABLE IF EXISTS `Room`;
CREATE TABLE `Room` (
	`id` VARCHAR(10) PRIMARY KEY,
    `num_beds` INT
);

-- On_Committee table
DROP TABLE IF EXISTS `On_Committee`;
CREATE TABLE `On_Committee` ( 
	`organizer_id` INT NOT NULL,
	`subcommittee_id` INT NOT NULL
);

-- Speaking table
DROP TABLE IF EXISTS `Speaking`;
CREATE TABLE `Speaking` ( 
	`attendee_id` INT NOT NULL,
	`session_id` INT NOT NULL
);

-- Foreign Key Constraints
ALTER TABLE `Attendee` ADD FOREIGN KEY (room_number) REFERENCES `Room` (`id`);
ALTER TABLE `Attendee` ADD FOREIGN KEY (sponsor_id) REFERENCES `Sponsor` (`id`) 
	ON DELETE CASCADE;

ALTER TABLE `Subcommittee` ADD FOREIGN KEY (chair) REFERENCES `Organizer` (`id`);

ALTER TABLE `Job` ADD FOREIGN KEY (sponsor_id) REFERENCES `Sponsor` (`id`) 
	ON DELETE CASCADE;

ALTER TABLE `On_Committee` ADD FOREIGN KEY (organizer_id) REFERENCES `Organizer` (`id`);
ALTER TABLE `On_Committee` ADD FOREIGN KEY (subcommittee_id) REFERENCES `Subcommittee` (`id`);

ALTER TABLE `Speaking` ADD FOREIGN KEY (attendee_id) REFERENCES `Attendee` (`id`); 
ALTER TABLE `Speaking` ADD FOREIGN KEY (session_id) REFERENCES `Session` (`id`);




