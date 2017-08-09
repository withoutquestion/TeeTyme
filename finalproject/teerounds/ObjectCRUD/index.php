<?php
    if(isset($_POST['table'])) {
        // Set Table
        if ($_POST['table'] == "tt_rounds") {
            require("persons.php");
            $table = new Persons(
                $_POST['id'],
                $_POST['person_id'],
                $_POST['course_id'],
                $_POST['teedate'],
				$_POST['teetime'],
				$_POST['par01'],
				$_POST['par02'],
				$_POST['par03'],
				$_POST['par04'],
				$_POST['par05'],
				$_POST['par06'],
				$_POST['par07'],
				$_POST['par08'],
				$_POST['par09'],
				$_POST['par10'],
				$_POST['par11'],
				$_POST['par12'],
				$_POST['par13'],
				$_POST['par14'],
				$_POST['par15'],
				$_POST['par16'],
				$_POST['par17'],
				$_POST['par18']
            );
        }

        // Select Action
            if($_POST['action'] == "displayList"  ) $table->displayListScreen();
        elseif($_POST['action'] == "displayCreate") $table->displayCreateScreen();
        elseif($_POST['action'] == "createRecord" ) $table->createRecord();
        elseif($_POST['action'] == "displayRead"  ) $table->displayReadScreen();
        elseif($_POST['action'] == "displayUpdate") $table->displayUpdateScreen();
        elseif($_POST['action'] == "updateRecord" ) $table->updateRecord();
        elseif($_POST['action'] == "displayDelete") $table->displayDeleteScreen();
        elseif($_POST['action'] == "deleteRecord" ) $table->deleteRecord();
    }
?>