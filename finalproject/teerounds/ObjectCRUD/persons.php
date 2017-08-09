<?php
    require_once("database.php");
    require_once("table.php");
	session_start();
    
    class Persons implements Table {
        // DATA MEMBERS
        private $id;
        private $course_id;
        private $courseErr;
		private $person_id;
		private $personErr;
		private $teetime;
		private $timeErr;
		private $teedate;
		private $dateErr;
		private $par1;
		private $par2;
		private $par3;
		private $par4;
		private $par5;
		private $par6;
		private $par7;
		private $par8;
		private $par9;
		private $par10;
		private $par11;
		private $par12;
		private $par13;
		private $par14;
		private $par15;
		private $par16;
		private $par17;
		private $par18;
		private $parErr;
        
        // CONSTRUCTOR
        function __construct($id, $course_id, $person_id, $teetime, $teedate, $par1, $par2, $par3, $par4, $par5, $par6, $par7, $par8, $par9, $par10, $par11, $par12, $par13, $par14, $par15, $par16, $par17, $par18) {
            $this->id     = $id;
            $this->course_id = $course_id;
			$this->person_id = $person_id;
			$this->teetime = $teetime;
			$this->teedate = $teedate;
			$this->par1 = $par1;
			$this->par2 = $par2;
			$this->par3 = $par3;
			$this->par4 = $par4;
			$this->par5 = $par5;
			$this->par6 = $par6;
			$this->par7 = $par7;
			$this->par8 = $par8;
			$this->par9 = $par9;
			$this->par10 = $par10;
			$this->par11 = $par11;
			$this->par12 = $par12;
			$this->par13 = $par13;
			$this->par14 = $par14;
			$this->par15 = $par15;
			$this->par16 = $par16;
			$this->par17 = $par17;
			$this->par18 = $par18;
        }
    
        // Display a table containing details about every record in the database.
        public function displayListScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>".  $_SESSION['username'] . "'s TeeTyme</h3>
							<h4>Rounds</h4>
                        </div>
                        <div class='row'>
						<div class='things' style='display:inline'>
                            <a class='btn btn-primary' onclick='personsRequest(\"displayCreate\")'>Add Round</a>
							<a class='btn btn-primary' onclick=\"location.href='/~tjpeltie/cis355/finalproject/teepersons/ObjectCRUD/index.html'\";>Persons</a>
							<a class='btn btn-primary' onclick=\"location.href='/~tjpeltie/cis355/finalproject/teecourses/ObjectCRUD/index.html'\";>Courses</a>
							<a class='btn btn-primary' onclick=\"location.href='/~tjpeltie/cis355/finalproject/fileUpload.html'\";>Upload File</a>
							<a class='btn btn-primary' onclick=\"location.href='/~tjpeltie/cis355/finalproject/jsonFinal.html'\";>Clubs</a>
							<a class='btn btn-primary' onclick=\"location.href='/~tjpeltie/cis355/finalproject/ProjectWriteUp.html'\";>Write-Up</a>
							<a class='btn btn-primary' onclick=\"location.href='/~tjpeltie/cis355/finalproject/diag.html'\";>Diagrams</a>
						</div>
                            <table class='table table-striped table-bordered' style='background-color: lightgrey !important'>
                                <thead>
                                    <tr>
                                        <th>Person ID</th>
										<th>Course ID</th>
										<th>Teetime</th>
										<th>Teedate</th>
										<th>Hole 1</th>
										<th>Hole 2</th>
										<th>Hole 3</th>
										<th>Hole 4</th>
										<th>Hole 5</th>
										<th>Hole 6</th>
										<th>Hole 7</th>
										<th>Hole 8</th>
										<th>Hole 9</th>
										<th>Hole 10</th>
										<th>Hole 11</th>
										<th>Hole 12</th>
										<th>Hole 13</th>
										<th>Hole 14</th>
										<th>Hole 15</th>
										<th>Hole 16</th>
										<th>Hole 17</th>
										<th>Hole 18</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";                                    
            foreach (Database::prepare('SELECT * FROM `tt_rounds`', array()) as $row) {
                echo "
                    <tr>
                        <td>{$row['person_id']  }</td>
                        <td>{$row['course_id'] }</td>
                        <td>{$row['teetime']}</td>
						<td>{$row['teedate']}</td>
						<td>{$row['par01']}</td>
						<td>{$row['par02']}</td>
						<td>{$row['par03']}</td>
						<td>{$row['par04']}</td>
						<td>{$row['par05']}</td>
						<td>{$row['par06']}</td>
						<td>{$row['par07']}</td>
						<td>{$row['par08']}</td>
						<td>{$row['par09']}</td>
						<td>{$row['par10']}</td>
						<td>{$row['par11']}</td>
						<td>{$row['par12']}</td>
						<td>{$row['par13']}</td>
						<td>{$row['par14']}</td>
						<td>{$row['par15']}</td>
						<td>{$row['par16']}</td>
						<td>{$row['par17']}</td>
						<td>{$row['par18']}</td>
                        <td>
                            <button class='btn' onclick='personsRequest(\"displayRead\", {$row['id']})'>Read</button><br>
                            <button class='btn btn-success' onclick='personsRequest(\"displayUpdate\", {$row['id']})'>Update</button><br>
                            <button class='btn btn-danger' onclick='personsRequest(\"displayDelete\", {$row['id']})'>Delete</button>
                        </td>
                    </tr>";
            }
            echo "</tbody></table></div></div></div>";
        }
        
        // Display a form for adding a record to the database.
        public function displayCreateScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Create Courses</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->courseErr))?'':' error') ."'>Person ID</label>
                                <div class='controls'>
                                    <input id='person_id' type='text' required>
                                    <span class='help-inline'>{$this->courseErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->personErr))?'':' error') ."'>Course ID</label>
                                <div class='controls'>
                                    <input id='course_id' type='text' required>
                                    <span class='help-inline'>{$this->personErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->timeErr))?'':' error') ."'>Teetime</label>
                                <div class='controls'>
                                    <input id='teetime' type='text' placeholder='HH:MM:SS' required>
                                    <span class='help-inline'>{$this->timeErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->dateErr))?'':' error') ."'>Teedate</label>
                                <div class='controls'>
                                    <input id='teedate' type='text' placeholder='YYYY-MM-DD' required>
                                    <span class='help-inline'>{$this->dateErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 1</label>
                                <div class='controls'>
                                    <input id='par01' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 2</label>
                                <div class='controls'>
                                    <input id='par02' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->nameErr))?'':' error') ."'>Hole 3</label>
                                <div class='controls'>
                                    <input id='par03' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 4</label>
                                <div class='controls'>
                                    <input id='par04' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 5</label>
                                <div class='controls'>
                                    <input id='par05' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 6</label>
                                <div class='controls'>
                                    <input id='par06' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 7</label>
                                <div class='controls'>
                                    <input id='par07' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 8</label>
                                <div class='controls'>
                                    <input id='par08' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 9</label>
                                <div class='controls'>
                                    <input id='par09' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 10</label>
                                <div class='controls'>
                                    <input id='par10' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 11</label>
                                <div class='controls'>
                                    <input id='par11' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 12</label>
                                <div class='controls'>
                                    <input id='par12' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 13</label>
                                <div class='controls'>
                                    <input id='par13' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 14</label>
                                <div class='controls'>
                                    <input id='par14' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 15</label>
                                <div class='controls'>
                                    <input id='par15' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 16</label>
                                <div class='controls'>
                                    <input id='par16' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 17</label>
                                <div class='controls'>
                                    <input id='par17' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 18</label>
                                <div class='controls'>
                                    <input id='par18' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
                            <div class='form-actions'>
                                <button class='btn btn-success' onclick='personsRequest(\"createRecord\")'>Create</button>
                                <a class='btn' onclick='personsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Adds a record to the database.
        public function createRecord() {
            if ($this->validate()) {
                Database::prepare(
                    "INSERT INTO tt_rounds (person_id, course_id, teedate, teetime, par01, par02, par03, par04, par05, par06, par07, par08, par09, par10, par11, par12, par13, par14, par15, par16, par17, par18) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
                    array($this->person_id, $this->course_id, $this->teedate, $this->teetime, $this->par1, $this->par2, $this->par3, $this->par4, $this->par5, $this->par6, $this->par7, $this->par8, $this->par9, $this->par10, $this->par11, $this->par12, $this->par13, $this->par14, $this->par15, $this->par16, $this->par17, $this->par18)
                );
                $this->displayListScreen();
            } else {
                $this->displayCreateScreen();
            }
        }
        
        // Display a form containing information about a specified record in the database.
        public function displayReadScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_rounds WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Course Details</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label'>Player ID</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['person_id']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Course ID</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['course_id']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Teetime</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['teetime']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>Teedate</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['teedate']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 1</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par01']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 2</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par02']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 3</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par03']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 4</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par04']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 5</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par05']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 6</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par06']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 7</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par07']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 8</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par08']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 9</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par09']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 10</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par10']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 11</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par11']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 12</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par12']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 13</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par13']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 14</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par14']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 15</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par15']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 16</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par16']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 17</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par17']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Hole 18</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par18']}
                                    </label>
                                </div>
                            </div>
                            <div class='form-actions'>
                                <a class='btn' onclick='personsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Display a form for updating a record within the database.
        public function displayUpdateScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_rounds WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Update Person</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->personErr))?'':' error') ."'>Player ID</label>
                                <div class='controls'>
                                    <input id='person_id' type='text' value='{$rec['person_id']}' required>
                                    <span class='help-inline'>{$this->personErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->descErr))?'':' error') ."'>Course ID</label>
                                <div class='controls'>
                                    <input id='course_id' type='text' value='{$rec['course_id']}' required>
                                    <span class='help-inline'>{$this->descErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->emailErr))?'':' error') ."'>Teetime</label>
                                <div class='controls'>
                                    <input id='teetime' type='text' value='{$rec['teetime']}' required>
                                    <span class='help-inline'>{$this->emailErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->addressErr))?'':' error') ."'>Teedate</label>
                                <div class='controls'>
                                    <input id='teedate' type='text' value='{$rec['teedate']}' required>
                                    <span class='help-inline'>{$this->addressErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 1</label>
                                <div class='controls'>
                                    <input id='par01' type='text' value='{$rec['par01']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 2</label>
                                <div class='controls'>
                                    <input id='par02' type='text' value='{$rec['par02']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 3</label>
                                <div class='controls'>
                                    <input id='par03' type='text' value='{$rec['par03']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 4</label>
                                <div class='controls'>
                                    <input id='par04' type='text' value='{$rec['par04']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 5</label>
                                <div class='controls'>
                                    <input id='par05' type='text' value='{$rec['par05']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 6</label>
                                <div class='controls'>
                                    <input id='par06' type='text' value='{$rec['par06']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 7</label>
                                <div class='controls'>
                                    <input id='par07' type='text' value='{$rec['par07']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 8</label>
                                <div class='controls'>
                                    <input id='par08' type='text' value='{$rec['par08']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 9</label>
                                <div class='controls'>
                                    <input id='par09' type='text' value='{$rec['par09']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 10</label>
                                <div class='controls'>
                                    <input id='par10' type='text' value='{$rec['par10']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 11</label>
                                <div class='controls'>
                                    <input id='par11' type='text' value='{$rec['par11']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 12</label>
                                <div class='controls'>
                                    <input id='par12' type='text' value='{$rec['par12']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 13</label>
                                <div class='controls'>
                                    <input id='par13' type='text' value='{$rec['par13']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 14</label>
                                <div class='controls'>
                                    <input id='par14' type='text' value='{$rec['par14']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 15</label>
                                <div class='controls'>
                                    <input id='par15' type='text' value='{$rec['par15']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 16</label>
                                <div class='controls'>
                                    <input id='par16' type='text' value='{$rec['par16']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 17</label>
                                <div class='controls'>
                                    <input id='par17' type='text' value='{$rec['par17']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Hole 18</label>
                                <div class='controls'>
                                    <input id='par18' type='text' value='{$rec['par18']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
                            <div class='form-actions'>
                                <button class='btn btn-success' onclick='personsRequest(\"updateRecord\", {$this->id})'>Update</button>
                                <a class='btn' onclick='personsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Updates a record within the database.
        public function updateRecord() {
            if ($this->validate()) {
                Database::prepare(
                    "UPDATE tt_rounds SET person_id = ?, course_id = ?, teetime = ?, teedate = ?, par01 = ?, par02 = ?, par03 = ?, par04 = ?, par05 = ?, par06 = ?, par07 = ?, par08 = ?, par09 = ?, par10 = ?, par11 = ?, par12 = ?, par13 = ?, par14 = ?, par15 = ?, par16 = ?, par17 = ?, par18 = ? WHERE id = ?",
                    array($this->player_id, $this->course_id, $this->teetime, $this->teedate, $this->par1, $this->par2, $this->par3, $this->par4, $this->par5, $this->par6, $this->par7, $this->par8, $this->par9, $this->par10, $this->par11, $this->par12, $this->par13, $this->par14, $this->par15, $this->par16, $this->par17,$this->par18, $this->id)
                );
                $this->displayListScreen();
            } else {
                $this->displayUpdateScreen();
            }
        }
        
        // Display a form for deleting a record from the database.
        public function displayDeleteScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Delete Round</h3>
                        </div>
                        <div class='form-horizontal'>
                            <p class='alert alert-error'>Are you sure you want to delete ?</p>
                            <div class='form-actions'>
                                <button id='submit' class='btn btn-danger' onClick='personsRequest(\"deleteRecord\", {$this->id});'>Yes</button>
                                <a class='btn' onclick='personsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Removes a record from the database.
        public function deleteRecord() {
            Database::prepare(
                "DELETE FROM tt_rounds WHERE id = ?",
                array($this->id)
            );
            $this->displayListScreen();
        }
        
        // Validates user input.
        private function validate() {
            $valid = true;
            // Check for empty input.
            if (empty($this->person_id)) { 
                $this->nameErr = "Please enter a Player ID.";
                $valid = false; 
            }
            if (empty($this->course_id)) { 
                $this->phoneErr = "Please enter a Course ID.";
                $valid = false; 
            }
			if (empty($this->teedate)) { 
                $this->phoneErr = "Please enter a teedate.";
                $valid = false; 
            }
			if (empty($this->teetime)) { 
                $this->phoneErr = "Please enter a teetime.";
                $valid = false; 
            }
			if (empty($this->par1)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par2)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par3)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par4)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par5)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par6)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par7)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par8)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par9)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par10)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par11)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par12)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par13)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par14)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par15)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par16)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par17)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			if (empty($this->par18)) { 
                $this->parErr = "Please enter strokes";
                $valid = false; 
            }
			print_r($valid);
            return $valid;
        }
    }
?>