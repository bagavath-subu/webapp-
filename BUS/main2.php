<!DOCTYPE html>
<html>
<head>
	<title>Bus Reservation System</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<h1>Bus Reservation System</h1>
	<ul class="style1">
  <li><a href="main.php" >Search buses</a></li>
  <li><a class="active">Status</a></li>
  <li><a href="main3.php">About</a></li>
  <li style="float: right"><a href="index.php?logout='1'" onclick="alert('log out successfully!!!')">log out</a></li>
  <li style="float: right"><a href="change.php">Change password</a></li>
</ul>
<form method="POST" action="#">
<center>Select bus :<input type="text" name="bus" id="bus"></center>
<button type="submit" name="search">search</button>
</form>
<?php
if (isset($_POST['search'])) {
$username="root";
$password="";
$database="bus";
$db = mysqli_connect('localhost', 'root', '', 'bus');
$mysqli = new mysqli("localhost", $username, $password, $database);
$bus = mysqli_real_escape_string($db, $_POST['bus']);
$query2="SELECT * FROM ticket WHERE busname='".$bus."'";
$result=mysqli_query($db, $query2);
print "<br/>";
echo "<table border='1'>";
echo "<tr><th>bus</th><th>name</th><th>age</th><th>Gender</th><th>src</th><th>dest</th><th>seat no</th></tr>";
while($row=mysqli_fetch_array($result)){
echo "<tr><td>";
echo $row['busname'];
echo "</td>";
echo "<td>";
echo $row['name'];
echo "</td>";
echo "<td>";
echo $row['age'];
echo "</td>";
echo "<td>";
echo $row['gender'];
echo "</td>";
echo "<td>";
echo $row['src'];
echo "</td>";
echo "<td>";
echo $row['dest'];
echo "</td>";
echo "<td>";
echo $row['id'];
echo "</td>
</tr>";
}
echo "</table>";
$mysqli->close();
}

?>

</body>
</html>