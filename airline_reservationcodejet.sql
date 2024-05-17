SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Drop existing tables if they exist
DROP TABLE IF EXISTS `reservations`;
DROP TABLE IF EXISTS `passengers`;
DROP TABLE IF EXISTS `flights`;

DELIMITER $$

-- Create RemoveVowels function
CREATE DEFINER=`root`@`localhost` FUNCTION `RemoveVowels` (`str` VARCHAR(255)) RETURNS VARCHAR(255) CHARSET latin1
BEGIN
    DECLARE vowels CHAR(10) DEFAULT 'aeiouAEIOU';
    DECLARE i INT DEFAULT 1;
    DECLARE result VARCHAR(255) DEFAULT '';

    WHILE i <= LENGTH(str) DO
        IF LOCATE(SUBSTRING(str, i, 1), vowels) = 0 THEN
            SET result = CONCAT(result, SUBSTRING(str, i, 1));
        END IF;
        SET i = i + 1;
    END WHILE;

    RETURN result;
END$$

DELIMITER ;

-- Create new tables
CREATE TABLE `flights` (
  `flight_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_location` varchar(255) DEFAULT NULL,
  `to_location` varchar(255) DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  PRIMARY KEY (`flight_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `passengers` (
  `passenger_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`passenger_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `passenger_id` int(11) DEFAULT NULL,
  `flight_id` int(11) DEFAULT NULL,
  `reservationcode_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `fk_passenger_id` (`passenger_id`),
  KEY `fk_flight_id` (`flight_id`),
  CONSTRAINT `fk_passenger_id` FOREIGN KEY (`passenger_id`) REFERENCES `passengers` (`passenger_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_flight_id` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Reset AUTO_INCREMENT values
ALTER TABLE `flights` AUTO_INCREMENT = 1;
ALTER TABLE `passengers` AUTO_INCREMENT = 1;
ALTER TABLE `reservations` AUTO_INCREMENT = 1;
