<?php
    require_once("database.php");
    require_once("table.php");
	session_start();
    
    class Persons implements Table {
        // DATA MEMBERS
        private $id;
        private $name;
        private $nameErr;
		private $description;
        private $descErr;
        private $email;
        private $emailErr;
		private $address;
        private $addressErr;
		private $city;
        private $cityErr;
		private $state;
        private $stateErr;
		private $zip;
        private $zipErr;
		private $phone;
        private $phoneErr;
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
        function __construct($id, $name, $description, $email, $address, $city, $state, $zip, $phone, $par1, $par2, $par3, $par4, $par5, $par6, $par7, $par8, $par9, $par10, $par11, $par12, $par13, $par14, $par15, $par16, $par17, $par18) {
            $this->id     = $id;
            $this->name   = $name;
			$this->description = $description;
            $this->email  = $email;
			$this->address = $address;
			$this->city = $city;
			$this->state = $state;
			$this->zip = $zip;
            $this->phone = $phone;
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
							<h4>Courses</h4>
                        </div>
                        <div class='row'>
						<div class='things' style='display:inline'>
                            <a class='btn btn-primary' onclick='personsRequest(\"displayCreate\")'>Add Course</a>
							<a class='btn btn-primary' onclick=\"location.href='/~tjpeltie/cis355/finalproject/teepersons/ObjectCRUD/index.html'\";>Persons</a>
							<a class='btn btn-primary' onclick=\"location.href='/~tjpeltie/cis355/finalproject/teerounds/ObjectCRUD/index.html'\";'>Rounds</a>
							<a class='btn btn-primary' onclick=\"location.href='/~tjpeltie/cis355/finalproject/uploadFile.html'\";>Upload File</a>
							<a class='btn btn-primary' onclick=\"location.href='/~tjpeltie/cis355/finalproject/jsonFinal.html'\";>Clubs</a>
							<a class='btn btn-primary' onclick=\"location.href='/~tjpeltie/cis355/finalproject/ProjectWriteUp.html'\";>Write-Up</a>
							<a class='btn btn-primary' onclick=\"location.href='/~tjpeltie/cis355/finalproject/diag.html'\";>Diagrams</a>
						</div>
                            <table class='table table-striped table-bordered' style='background-color: lightgrey !important'>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Email</th>
										<th>Address</th>
										<th>City</th>
										<th>State</th>
										<th>Zipcode</th>
										<th>Phone</th>
										<th>Par Hole 1</th>
										<th>Par Hole 2</th>
										<th>Par Hole 3</th>
										<th>Par Hole 4</th>
										<th>Par Hole 5</th>
										<th>Par Hole 6</th>
										<th>Par Hole 7</th>
										<th>Par Hole 8</th>
										<th>Par Hole 9</th>
										<th>Par Hole 10</th>
										<th>Par Hole 11</th>
										<th>Par Hole 12</th>
										<th>Par Hole 13</th>
										<th>Par Hole 14</th>
										<th>Par Hole 15</th>
										<th>Par Hole 16</th>
										<th>Par Hole 17</th>
										<th>Par Hole 18</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";                                    
            foreach (Database::prepare('SELECT * FROM `tt_courses`', array()) as $row) {
                echo "
                    <tr>
                        <td>{$row['name']  }</td>
                        <td>{$row['description'] }</td>
                        <td>{$row['email']}</td>
						<td>{$row['address']}</td>
						<td>{$row['city']}</td>
						<td>{$row['state']}</td>
						<td>{$row['zip']}</td>
						<td>{$row['phone']}</td>
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
                                <label class='control-label". ((empty($this->nameErr))?'':' error') ."'>Name</label>
                                <div class='controls'>
                                    <input id='name' type='text' required>
                                    <span class='help-inline'>{$this->nameErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->descErr))?'':' error') ."'>Description</label>
                                <div class='controls'>
                                    <input id='description' type='text' required>
                                    <span class='help-inline'>{$this->descErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->emailErr))?'':' error') ."'>Email</label>
                                <div class='controls'>
                                    <input id='email' type='text' placeholder='name@svsu.edu' required>
                                    <span class='help-inline'>{$this->emailErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->addressErr))?'':' error') ."'>Address</label>
                                <div class='controls'>
                                    <input id='address' type='text' required>
                                    <span class='help-inline'>{$this->addressErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->cityErr))?'':' error') ."'>City</label>
                                <div class='controls'>
                                    <input id='city' type='text' required>
                                    <span class='help-inline'>{$this->cityErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->stateErr))?'':' error') ."'>State</label>
                                <div class='controls'>
                                    <input id='state' type='text' required>
                                    <span class='help-inline'>{$this->stateErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->nameErr))?'':' error') ."'>Zipcode</label>
                                <div class='controls'>
                                    <input id='zip' type='text' required>
                                    <span class='help-inline'>{$this->nameErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->phoneErr))?'':' error') ."'>Phone</label>
                                <div class='controls'>
                                    <input id='phone' type='text' placeholder='555-555-5555' required>
                                    <span class='help-inline'>{$this->phoneErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 1</label>
                                <div class='controls'>
                                    <input id='par01' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 2</label>
                                <div class='controls'>
                                    <input id='par02' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->nameErr))?'':' error') ."'>Par 3</label>
                                <div class='controls'>
                                    <input id='par03' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 4</label>
                                <div class='controls'>
                                    <input id='par04' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 5</label>
                                <div class='controls'>
                                    <input id='par05' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 6</label>
                                <div class='controls'>
                                    <input id='par06' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 7</label>
                                <div class='controls'>
                                    <input id='par07' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 8</label>
                                <div class='controls'>
                                    <input id='par08' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 9</label>
                                <div class='controls'>
                                    <input id='par09' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 10</label>
                                <div class='controls'>
                                    <input id='par10' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 11</label>
                                <div class='controls'>
                                    <input id='par11' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 12</label>
                                <div class='controls'>
                                    <input id='par12' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 13</label>
                                <div class='controls'>
                                    <input id='par13' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 14</label>
                                <div class='controls'>
                                    <input id='par14' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 15</label>
                                <div class='controls'>
                                    <input id='par15' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 16</label>
                                <div class='controls'>
                                    <input id='par16' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 17</label>
                                <div class='controls'>
                                    <input id='par17' type='text' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par 18</label>
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
                    "INSERT INTO tt_courses (name, description, email, address, city, state, zip, phone, par01, par02, par03, par04, par05, par06, par07, par08, par09, par10, par11, par12, par13, par14, par15, par16, par17, par18) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
                    array($this->name, $this->description, $this->email, $this->address, $this->city, $this->state, $this->zip, $this->phone, $this->par1, $this->par2, $this->par3, $this->par4, $this->par5, $this->par6, $this->par7, $this->par8, $this->par9, $this->par10, $this->par11, $this->par12, $this->par13, $this->par14, $this->par15, $this->par16, $this->par17, $this->par18)
                );
                $this->displayListScreen();
            } else {
                $this->displayCreateScreen();
            }
        }
        
        // Display a form containing information about a specified record in the database.
        public function displayReadScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_courses WHERE id = ?", 
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
                                <label class='control-label'>Name</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['name']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Description</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['description']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Email</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['email']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>Address</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['address']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>City</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['city']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>State</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['state']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Zipcode</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['zip']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>Phone</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['phone']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 1</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par01']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 2</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par02']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 3</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par03']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 4</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par04']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 5</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par05']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 6</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par06']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 7</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par07']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 8</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par08']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 9</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par09']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 10</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par10']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 11</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par11']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 12</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par12']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 13</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par13']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 14</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par14']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 15</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par15']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 16</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par16']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 17</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['par17']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>Par for Hole 18</label>
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
                "SELECT * FROM tt_courses WHERE id = ?", 
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
                                <label class='control-label". ((empty($this->nameErr))?'':' error') ."'>Name</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['name']}' required>
                                    <span class='help-inline'>{$this->nameErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->descErr))?'':' error') ."'>Description</label>
                                <div class='controls'>
                                    <input id='description' type='text' value='{$rec['description']}' required>
                                    <span class='help-inline'>{$this->descErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->emailErr))?'':' error') ."'>Email</label>
                                <div class='controls'>
                                    <input id='email' type='text' value='{$rec['email']}' required>
                                    <span class='help-inline'>{$this->emailErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->addressErr))?'':' error') ."'>Address</label>
                                <div class='controls'>
                                    <input id='address' type='text' value='{$rec['address']}' required>
                                    <span class='help-inline'>{$this->addressErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->cityErr))?'':' error') ."'>City</label>
                                <div class='controls'>
                                    <input id='city' type='text' value='{$rec['city']}' required>
                                    <span class='help-inline'>{$this->cityErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->stateErr))?'':' error') ."'>State</label>
                                <div class='controls'>
                                    <input id='state' type='text' value='{$rec['state']}' required>
                                    <span class='help-inline'>{$this->stateErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->zipErr))?'':' error') ."'>Zipcode</label>
                                <div class='controls'>
                                    <input id='zip' type='text' value='{$rec['zip']}' required>
                                    <span class='help-inline'>{$this->zipErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->phoneErr))?'':' error') ."'>Phone</label>
                                <div class='controls'>
                                    <input id='phone' type='text' value='{$rec['phone']}' required>
                                    <span class='help-inline'>{$this->phoneErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par1</label>
                                <div class='controls'>
                                    <input id='par01' type='text' value='{$rec['par01']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par2</label>
                                <div class='controls'>
                                    <input id='par02' type='text' value='{$rec['par02']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par3</label>
                                <div class='controls'>
                                    <input id='par03' type='text' value='{$rec['par03']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par4</label>
                                <div class='controls'>
                                    <input id='par04' type='text' value='{$rec['par04']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par5</label>
                                <div class='controls'>
                                    <input id='par05' type='text' value='{$rec['par05']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par6</label>
                                <div class='controls'>
                                    <input id='par06' type='text' value='{$rec['par06']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par7</label>
                                <div class='controls'>
                                    <input id='par07' type='text' value='{$rec['par07']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par8</label>
                                <div class='controls'>
                                    <input id='par08' type='text' value='{$rec['par08']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par9</label>
                                <div class='controls'>
                                    <input id='par09' type='text' value='{$rec['par09']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par10</label>
                                <div class='controls'>
                                    <input id='par10' type='text' value='{$rec['par10']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par11</label>
                                <div class='controls'>
                                    <input id='par11' type='text' value='{$rec['par11']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par12</label>
                                <div class='controls'>
                                    <input id='par12' type='text' value='{$rec['par12']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par13</label>
                                <div class='controls'>
                                    <input id='par13' type='text' value='{$rec['par13']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par14</label>
                                <div class='controls'>
                                    <input id='par14' type='text' value='{$rec['par14']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par15</label>
                                <div class='controls'>
                                    <input id='par15' type='text' value='{$rec['par15']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par16</label>
                                <div class='controls'>
                                    <input id='par16' type='text' value='{$rec['par16']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par17</label>
                                <div class='controls'>
                                    <input id='par17' type='text' value='{$rec['par17']}' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>Par18</label>
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
                    "UPDATE tt_courses SET name = ?, description = ?, email = ?, address = ?, city = ?, state = ?, zip = ?, phone = ?, par01 = ?, par02 = ?, par03 = ?, par04 = ?, par05 = ?, par06 = ?, par07 = ?, par08 = ?, par09 = ?, par10 = ?, par11 = ?, par12 = ?, par13 = ?, par14 = ?, par15 = ?, par16 = ?, par17 = ?, par18 = ? WHERE id = ?",
                    array($this->name, $this->description, $this->email, $this->address, $this->city, $this->state, $this->zip, $this->phone, $this->par1, $this->par2, $this->par3, $this->par4, $this->par5, $this->par6, $this->par7, $this->par8, $this->par9, $this->par10, $this->par11, $this->par12, $this->par13, $this->par14, $this->par15, $this->par16, $this->par17,$this->par18, $this->id)
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
                            <h3>Delete Person</h3>
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
                "DELETE FROM tt_courses WHERE id = ?",
                array($this->id)
            );
            $this->displayListScreen();
        }
        
        // Validates user input.
        private function validate() {
            $valid = true;
            // Validate Mobile
            if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $this->phone)) {
                $this->phoneErr = "Please enter a valid phone number.";
                $valid = false;
            }
            // Validate Email
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->emailErr = "Please enter a valid email address.";
                $valid = false;
            }
            // Check for empty input.
            if (empty($this->name)) { 
                $this->nameErr = "Please enter a name.";
                $valid = false; 
            }
            if (empty($this->email)) { 
                $this->emailErr = "Please enter an email.";
                $valid = false; 
            }
            if (empty($this->phone)) { 
                $this->phoneErr = "Please enter a phone number.";
                $valid = false; 
            }
			if (empty($this->par1)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par2)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par3)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par4)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par5)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par6)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par7)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par8)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par9)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par10)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par11)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par12)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par13)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par14)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par15)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par16)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par17)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			if (empty($this->par18)) { 
                $this->parErr = "Please enter a Par";
                $valid = false; 
            }
			print_r($valid);
            return $valid;
        }
    }
?>