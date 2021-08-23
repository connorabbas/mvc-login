<?php
// database connection
include 'app/model/db.class.php';
global $db;
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'mvctester';
$db = new db($dbhost, $dbuser, $dbpass, $dbname);

/* 
for users table

CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userRole` int(1) NOT NULL DEFAULT 0,
  `userName` varchar(128) NOT NULL,
  `userEmail` varchar(128) NOT NULL,
  `userUID` varchar(128) NOT NULL,
  `userPwd` varchar(128) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4

*/

?>