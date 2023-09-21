/*
Created: 12. 09. 2023
Modified: 19. 09. 2023
Model: MySQL 8.0
Database: MySQL 8.0
*/

-- Create tables section -------------------------------------------------

-- Table uporabniki

CREATE TABLE `uporabniki`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `Ime` Text NOT NULL,
  `priimek` Text NOT NULL,
  `email` Text NOT NULL,
  `geslo` Text NOT NULL,
  PRIMARY KEY (`id`)
)
;

ALTER TABLE `uporabniki` ADD UNIQUE `email` (`email`)
;

-- Table pini

CREATE TABLE `pini`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `url` Text NOT NULL,
  `naslov` Text NOT NULL,
  `opis` Text,
  `zanr_id` Int,
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `IX_Relationship6` ON `pini` (`zanr_id`)
;

-- Table komentarji

CREATE TABLE `komentarji`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `besedilo` Text NOT NULL,
  `datum` Datetime,
  `uporabnik_id` Int,
  `pin_id` Int,
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `IX_Relationship2` ON `komentarji` (`uporabnik_id`)
;

CREATE INDEX `IX_Relationship10` ON `komentarji` (`pin_id`)
;

-- Table vsecki

CREATE TABLE `vsecki`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `uporabnik_id` Int,
  `pin_id` Int,
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `IX_Relationship1` ON `vsecki` (`uporabnik_id`)
;

CREATE INDEX `IX_Relationship9` ON `vsecki` (`pin_id`)
;

-- Table zanr_pinov

CREATE TABLE `zanr_pinov`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `zanr` Text NOT NULL,
  PRIMARY KEY (`id`)
)
;

-- Table boardi

CREATE TABLE `boardi`
(
  `id` Int NOT NULL AUTO_INCREMENT,
  `uporabnik_id` Int,
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `IX_Relationship7` ON `boardi` (`uporabnik_id`)
;

-- Table boardi_pini

CREATE TABLE `boardi_pini`
(
  `id` Int NOT NULL,
  `board_id` Int,
  `pin_id` Int
)
;

CREATE INDEX `IX_Relationship11` ON `boardi_pini` (`board_id`)
;

CREATE INDEX `IX_Relationship13` ON `boardi_pini` (`pin_id`)
;

ALTER TABLE `boardi_pini` ADD PRIMARY KEY (`id`)
;

-- Create foreign keys (relationships) section -------------------------------------------------

ALTER TABLE `vsecki` ADD CONSTRAINT `Relationship1` FOREIGN KEY (`uporabnik_id`) REFERENCES `uporabniki` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `komentarji` ADD CONSTRAINT `Relationship2` FOREIGN KEY (`uporabnik_id`) REFERENCES `uporabniki` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `pini` ADD CONSTRAINT `Relationship6` FOREIGN KEY (`zanr_id`) REFERENCES `zanr_pinov` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `boardi` ADD CONSTRAINT `Relationship7` FOREIGN KEY (`uporabnik_id`) REFERENCES `uporabniki` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `vsecki` ADD CONSTRAINT `Relationship9` FOREIGN KEY (`pin_id`) REFERENCES `pini` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `komentarji` ADD CONSTRAINT `Relationship10` FOREIGN KEY (`pin_id`) REFERENCES `pini` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `boardi_pini` ADD CONSTRAINT `Relationship11` FOREIGN KEY (`board_id`) REFERENCES `boardi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `boardi_pini` ADD CONSTRAINT `Relationship13` FOREIGN KEY (`pin_id`) REFERENCES `pini` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


