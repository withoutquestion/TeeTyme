<?php
    include 'database.php';
    $sql = "
        CREATE TABLE IF   NOT EXISTS `tt_rounds` (`id` int(11) DEFAULT NULL,`person_id` int(11) NOT NULL,`course_id` int(11) NOT NULL,`teedate` date NOT NULL,`teetime` time NOT NULL,`par01` int(11) NOT NULL,`par02` int(11) NOT NULL,`par03` int(11) NOT NULL,`par04` int(11) NOT NULL,`par05` int(11) NOT NULL,`par06` int(11) NOT NULL,`par07` int(11) NOT NULL,`par08` int(11) NOT NULL,`par09` int(11) NOT NULL,`par10` int(11) NOT NULL,`par11` int(11) NOT NULL,`par12` int(11) NOT NULL,`par13` int(11) NOT NULL,`par14` int(11) NOT NULL,`par15` int(11) NOT NULL,`par16` int(11) NOT NULL,`par17` int(11) NOT NULL,`par18` int(11) NOT NULL)";
    Database::prepare($sql, array());
    echo "Rounds Table Created";
	echo "<h3><a href='index.html'>Click here</a></h3>";
?>