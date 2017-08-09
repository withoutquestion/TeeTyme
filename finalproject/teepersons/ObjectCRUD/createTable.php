<?php
    include 'database.php';
    $sql = "
        CREATE TABLE IF   NOT EXISTS `tt_persons` (`id` int(11) NOT NULL,`fname` varchar(255) NOT NULL,`lname` varchar(255) NOT NULL,`email` varchar(255) NOT NULL,`password_hash` varchar(32) NOT NULL,`phone` varchar(255) DEFAULT NULL,`address` varchar(255) DEFAULT NULL,`city` varchar(255) DEFAULT NULL,`state` varchar(2) DEFAULT NULL,`zip` varchar(10) DEFAULT NULL)";
    Database::prepare($sql, array());
    echo "Persons Table Created";
	echo "<h3><a href='index.html'>Click here</a></h3>";
?>