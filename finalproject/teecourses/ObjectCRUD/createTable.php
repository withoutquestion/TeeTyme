<?php
    include 'database.php';
    $sql = "
        CREATE TABLE IF   NOT EXISTS `tt_courses` (`id` int(11) NOT NULL,`name` varchar(255) NOT NULL,`description` varchar(1024) NOT NULL,`email` varchar(255) NOT NULL,`address` varchar(255) NOT NULL,`city` varchar(255) NOT NULL,`state` varchar(2) NOT NULL,`zip` varchar(10) NOT NULL,`phone` varchar(255) NOT NULL,`par01` int(11) NOT NULL,`par02` int(11) NOT NULL,`par03` int(11) NOT NULL,`par04` int(11) NOT NULL,`par05` int(11) NOT NULL,`par06` int(11) NOT NULL,`par07` int(11) NOT NULL,`par08` int(11) NOT NULL,`par09` int(11) NOT NULL,`par10` int(11) NOT NULL,`par11` int(11) NOT NULL,`par12` int(11) NOT NULL,`par13` int(11) NOT NULL,`par14` int(11) NOT NULL,`par15` int(11) NOT NULL,`par16` int(11) NOT NULL,
`par17` int(11) NOT NULL,`par18` int(11) NOT NULL)";
    Database::prepare($sql, array());
    echo "Courses Table Created";
	echo "<h3><a href='index.html'>Click here</a></h3>";
?>