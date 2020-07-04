<!DOCTYPE html>
<html>
<head>
	<title>Bus Reservation System</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<h1><strong>Bus Reservation System</strong></h1>
	<ul class="style1">
  <li><a href="main.php" >Search buses</a></li>
  <li><a href="main2.php">Status</a></li>
  <li><a href="main3.php">About</a></li>
  <li style="float: right"><a href="index.php?logout='1'" onclick="alert('log out successfully!!!')">log out</a></li>
  <li style="float: right"><a href="change.php"  class="active">Change password</a></li>
</ul>
<form action="#" method="POST">
  <div class="container">
    <label for="name"><b>User name :</b></label>
    <input type="text" placeholder="username" name="user" required>

    <label for="pass"><b>password :</b></label>
    <input type="password" placeholder="password" name="pass" required>

    <label for="pass"><b>New password : </b></label>
    <input type="password" placeholder="New password" name="psw1">

    <button type="submit" name="change" onsubmit="alert("password changed successfully!!!");">CONFIRM</button>
  </div>
</form> 
<p>
  <?php
if (isset($_POST['change'])) {
$username="root";
$password="";
$database="bus";
$db = mysqli_connect('localhost', 'root', '', 'bus');
$usr = mysqli_real_escape_string($db, $_POST['user']);
  $pass = mysqli_real_escape_string($db, $_POST['pass']);
  $pass1 = mysqli_real_escape_string($db, $_POST['psw1']);

$mysqli = new mysqli("localhost", $username, $password, $database);
$query2="UPDATE users SET password='".$pass1."' WHERE username='".$usr."' AND password='".$pass."'";
$result=$mysqli->query($query2);
$mysqli->close();
header("location: main.php");
}
?>
</p>
</body>
</html>