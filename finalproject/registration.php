<?php
require 'database.php';
session_start();
//connect to database
Database::connect();
$db=new mysqli("localhost","tjpeltie","Rennat95","tjpeltie");
if($db->connect_error){
	die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['create']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$zip=$_POST['zip'];
    $sql="INSERT INTO tt_persons (fname,lname,email,password_hash,phone,address,city,state,zip) VALUES ('$fname','$lname','$email','$password','$phone','$address','$city','$state','$zip')";
    $result= $db->query($sql);
	$_SESSION['message']="Account created please click back to sign in";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login for Teetyme</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
</head>
<body>
<div class="header">
    <h1>Login for Teetyme</h1>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<form method="post" action="registration.php">
  <table>
     <tr>
           <td>Email : </td>
           <td><input type="text" name="email" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
	 <tr>
           <td>First Name : </td>
           <td><input type="text" name="fname" class="textInput"></td>
     </tr>
	 <tr>
           <td>Last Name : </td>
           <td><input type="text" name="lname" class="textInput"></td>
     </tr>
	 <tr>
           <td>Phone : </td>
           <td><input type="text" name="phone" class="textInput"></td>
     </tr>
	 <tr>
           <td>Address : </td>
           <td><input type="text" name="address" class="textInput"></td>
     </tr>
	 <tr>
           <td>City : </td>
           <td><input type="text" name="city" class="textInput"></td>
     </tr>
	 <tr>
           <td>State : </td>
           <td><input type="text" name="state" class="textInput"></td>
     </tr>
	 <tr>
           <td>Zip : </td>
           <td><input type="text" name="zip" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" class="btn btn-primary" name="create" value="Create"><input type="button" class="btn btn-primary" name="back" onclick="location.href='login.php'" value="Back"></td>
     </tr>
  
</table>
</form>
</body>
</html>