<?php
require 'database.php';
session_start();
//connect to database
Database::connect();
$db=new mysqli("localhost","tjpeltie","Rennat95","tjpeltie");
if($db->connect_error){
	die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['login_btn']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM tt_persons WHERE email='$username' AND password_hash='$password'";
    $result= $db->query($sql);
    if($result->num_rows==1)
    {
        $_SESSION['message']="You are now Loggged In";
        $_SESSION['username']=$username;
        header("location:teepersons/ObjectCRUD/index.html");
    }
   else
   {
                $_SESSION['message']="Username and Password combination incorrect";
    }
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
<form method="post" action="login.php">
  <table>
     <tr>
           <td>Email : </td>
           <td><input type="text" name="username" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" class="btn btn-primary" name="login_btn" value="Login"><input type="button" class="btn btn-primary" name="register" onclick="location.href='registration.php'" value="Register"></td>
     </tr>
  
</table>
</form>
</body>
</html>