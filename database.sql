CREATE DATABASE IF NOT EXISTS `acmgmrit`;

CREATE TABLE
    `webzen2` (
        `ID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `time` tinytext NOT NULL,
        `reg_no` tinytext NOT NULL,
        `name` tinytext NOT NULL,
        `email` tinytext NOT NULL,
        `ph_no` tinytext NOT NULL,
        `college` tinytext NOT NULL,
        `dept` tinytext NOT NULL,
        `section` tinytext NOT NULL,
        `gender` tinytext NOT NULL,
        `year` tinyint(4) NOT NULL,
        `event` tinytext NOT NULL
    );