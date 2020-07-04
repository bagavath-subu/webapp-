
<!DOCTYPE html>
<html>
<head>
	<title>Bus Reservation System</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<h1><strong>Bus Reservation System</strong></h1>
	<ul class="style1">
  <li><a href="#" class="active">Search buses</a></li>
  <li><a href="main2.php">Status</a></li>
  <li><a href="main3.php">About</a></li>
  <li style="float: right"><a href="logout.php" onclick="alert('log out successfully!!!')">log out</a></li>
  <li style="float: right"><a href="change.php">Change password</a></li>
</ul>
<form method="POST">
  <div class="container">
    <label for="from"><b>From</b></label>
    <input type="text" placeholder="From" name="src" required>

    <label for="to"><b>To</b></label>
    <input type="text" placeholder="To" name="dest" required>

    <label for="doj"><b>Date of Journey : </b></label>
    <input type="date" name="doj">

    <button type="submit" name="search" style="width: 20%">search</button>
    <hr>
  </br>
  <label for="bus"><b>Bus name :</b></label>
    <input type="text" placeholder="name" id="bus" name="bus">
    <label for="no"><b>No of Persons :</b></label>
    <input type="text" pattern="[1-4]" placeholder="no" name="no" id="no" onkeydown="myFunction(event)">
    <label for="1"><b>person 1 :</b></label>
    <input type="text" placeholder="name" name="1" id="1">
    <label for="age1"><b>Age :</b></label>
    <input type="text" name="age1" style="width: 20%">
    <input type = "radio"
                 name = "rad1"
                 value = "M"
                 checked = "checked" />Male
          <input type = "radio"
                 name = "rad1"
                 value = "F" />Female
</br>
    <label for="2"><b>person 2 :</b></label>
    <input type="text" placeholder="name" name="2" id="2">
    <label for="age2"><b>Age :</b></label>
    <input type="text" name="age2" id="age2" style="width: 20%">
     <input type = "radio"
                 name = "rad2"
                 value = "M"
                 checked = "checked" />Male
          <input type = "radio"
                 name = "rad2"
                 value = "F" />Female
</br><label for="3"><b>person 3 :</b></label>
    <input type="text" placeholder="name" name="3" id="3">
    <label for="age3"><b>Age :</b></label>
    <input type="text" name="age3" id="age3" style="width: 20%">
     <input type = "radio"
                 name = "rad3"
                 value = "M"
                 checked = "checked" />Male
          <input type = "radio"
                 name = "rad3"
                 value = "F" />Female
</br><label for="4"><b>person 4 :</b></label>
    <input type="text" placeholder="name" name="4" id="4">
    <label for="age4"><b>Age :</b></label>
    <input type="text" name="age4" id="age4" style="width: 20%">
     <input type = "radio"
                 name = "rad4"
                 value = "M"
                 checked = "checked" />Male
          <input type = "radio"
                 name = "rad4"
                 value = "F" />Female
</br>
     <button type="submit" name="book">book now</button>
  </div>
</form> 
<p>
  <?php
if (isset($_POST['search'])) {
$username="root";
$password="";
$database="bus";
$db = mysqli_connect('localhost', 'root', '', 'bus');
$src = mysqli_real_escape_string($db, $_POST['src']);
  $dest = mysqli_real_escape_string($db, $_POST['dest']);
$mysqli = new mysqli("localhost", $username, $password, $database);
$query2="SELECT * FROM bus WHERE src='".$src."' AND dest='".$dest."'";
$query3="SELECT * FROM ticket WHERE src='".$src."' AND dest='".$dest."'";
$result=$mysqli->query($query2);
$results=$mysqli->query($query3);
$c=60-mysqli_num_rows($results);
print "<br/>";
print "<center><b>Database Output</b></center><br/>";
echo "<table border='1'>";
echo "<tr><th>id</th><th>bus</th><th>src</th><th>dest</th><th>phoneno</th><th>seat avail</th><th>price</th></tr>";
while($row=mysqli_fetch_array($result)){
echo "<tr><td>";
echo $row['id'];
echo "</td>";
echo "<td>";
echo $row['bus-name'];
echo "</td>";
echo "<td>";
echo $row['src'];
echo "</td>";
echo "<td>";
echo $row['dest'];
echo "</td>";
echo "<td>";
echo $row['phoneno'];
echo "</td>";
echo "<td>";
echo $c;
echo "</td>";
echo "<td>";
echo $row['price'];
echo "</td></tr>";
}
echo "</table>";
$mysqli->close();
}


if (isset($_POST['book'])) {
  $username="root";
$password="";
$database="bus";
$mysqli = new mysqli("localhost", $username, $password, $database);
$db = mysqli_connect('localhost', 'root', '', 'bus');
$src = mysqli_real_escape_string($db, $_POST['src']);
$dest = mysqli_real_escape_string($db, $_POST['dest']);
  $bus = mysqli_real_escape_string($db, $_POST['bus']);
  $no = mysqli_real_escape_string($db, $_POST['no']);
  $rad1 = mysqli_real_escape_string($db, $_POST['rad1']);
  $name1 = mysqli_real_escape_string($db, $_POST['1']);
   $age1 = mysqli_real_escape_string($db, $_POST['age1']);
  $doj = mysqli_real_escape_string($db, $_POST['doj']);
  $query2="SELECT * FROM bus WHERE src='".$src."' AND dest='".$dest."'";
  $result=$mysqli->query($query2);
  while ($row = mysqli_fetch_assoc($result)) {
     $p= $row['price']*$no;}

if($no=="1"){
$query = "INSERT INTO ticket (busname,name,age,src,dest,gender,doj) 
          VALUES('$bus','$name1','$age1','$src','$dest','$rad1','$doj')";
    $mysqli->query($query);
  echo "<table border='1'>";
echo "<tr><th>id</th><th>bus</th><th>Name</th><th>src</th><th>dest</th><th>DOJ</th></tr>";
echo "<tr><td>";
echo "1";
echo "</td>";
echo "<td>";
echo "$bus";
echo "</td>";
echo "<td>";
echo "$name1";
echo "</td>";
echo "<td>";
echo "$src";
echo "</td>";
echo "<td>";
echo "$dest";
echo "</td>";
echo "<td>";
echo "$doj";
echo "</td></tr>";
echo "<tr><th>TOTAL Fare:";
echo "</th>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo " ";
echo "</td>";

echo "<td>";
echo $p;
echo "</td></tr>";
echo "</table>";

  }
elseif ($no=="2") {
   $rad2 = mysqli_real_escape_string($db, $_POST['rad2']);
  $name2 = mysqli_real_escape_string($db, $_POST['2']);
   $age2 = mysqli_real_escape_string($db, $_POST['age2']);
   $query = "INSERT INTO ticket (busname,name,age,src,dest,gender,doj) 
          VALUES('$bus','$name1','$age1','$src','$dest','$rad1','$doj')";
           $query2 = "INSERT INTO ticket (busname,name,age,src,dest,gender,doj) 
          VALUES('$bus','$name2','$age2','$src','$dest','$rad2','$doj')";
          mysqli_query($db, $query);
          mysqli_query($db, $query2);
          echo "<table border='1'>";
echo "<tr><th>id</th><th>bus</th><th>Name</th><th>src</th><th>dest</th><th>DOJ</th></tr>";
echo "<tr><td>";
echo "1";
echo "</td>";
echo "<td>";
echo "$bus";
echo "</td>";
echo "<td>";
echo "$name1";
echo "</td>";
echo "<td>";
echo "$src";
echo "</td>";
echo "<td>";
echo "$dest";
echo "</td>";
echo "<td>";
echo "$doj";
echo "</td></tr>";
echo "<tr><td>";
echo "2";
echo "</td>";
echo "<td>";
echo "$bus";
echo "</td>";
echo "<td>";
echo "$name2";
echo "</td>";
echo "<td>";
echo "$src";
echo "</td>";
echo "<td>";
echo "$dest";
echo "</td>";
echo "<td>";
echo "$doj";
echo "</td></tr>";
echo "<tr><th>TOTAL Fare:";
echo "</th></tr>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo $p;
echo "</td></tr>";
echo "</table>";


}elseif ($no=="3") {
   $rad2 = mysqli_real_escape_string($db, $_POST['rad2']);
  $name2 = mysqli_real_escape_string($db, $_POST['2']);
   $age2 = mysqli_real_escape_string($db, $_POST['age2']);
  $rad3 = mysqli_real_escape_string($db, $_POST['rad3']);
  $name3 = mysqli_real_escape_string($db, $_POST['3']);
   $age3 = mysqli_real_escape_string($db, $_POST['age3']);
    $query = "INSERT INTO ticket (busname,name,age,src,dest,gender,doj) 
          VALUES('$bus','$name1','$age1','$src','$dest','$rad1','$doj')";
           $query2 = "INSERT INTO ticket (busname,name,age,src,dest,gender,doj) 
          VALUES('$bus','$name2','$age2','$src','$dest','$rad2','$doj')";
           $query3 = "INSERT INTO ticket (busname,name,age,src,dest,gender,doj) 
          VALUES('$bus','$name3','$age3','$src','$dest','$rad3','$doj')";
          mysqli_query($db, $query);
          mysqli_query($db, $query2);
          mysqli_query($db, $query3);
           echo "<table border='1'>";
echo "<tr><th>id</th><th>bus</th><th>Name</th><th>src</th><th>dest</th><th>DOJ</th></tr>";
echo "<tr><td>";
echo "1";
echo "</td>";
echo "<td>";
echo "$bus";
echo "</td>";
echo "<td>";
echo "$name1";
echo "</td>";
echo "<td>";
echo "$src";
echo "</td>";
echo "<td>";
echo "$dest";
echo "</td>";
echo "<td>";
echo "$doj";
echo "</td></tr>";
echo "<tr><td>";
echo "2";
echo "</td>";
echo "<td>";
echo "$bus";
echo "</td>";
echo "<td>";
echo "$name2";
echo "</td>";
echo "<td>";
echo "$src";
echo "</td>";
echo "<td>";
echo "$dest";
echo "</td>";
echo "<td>";
echo "$doj";
echo "</td></tr>";
echo "<tr><td>";
echo "3";
echo "</td>";
echo "<td>";
echo "$bus";
echo "</td>";
echo "<td>";
echo "$name3";
echo "</td>";
echo "<td>";
echo "$src";
echo "</td>";
echo "<td>";
echo "$dest";
echo "</td>";
echo "<td>";
echo "$doj";
echo "</td></tr>";
echo "<tr><th>TOTAL Fare:";
echo "</th>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo " ";
echo "</td>";

echo "<td>";
echo $p;
echo "</td></tr>";
echo "</table>";


}else{
   $rad2 = mysqli_real_escape_string($db, $_POST['rad2']);
  $name2 = mysqli_real_escape_string($db, $_POST['2']);
   $age2 = mysqli_real_escape_string($db, $_POST['age2']);
  $rad3 = mysqli_real_escape_string($db, $_POST['rad3']);
  $name3 = mysqli_real_escape_string($db, $_POST['3']);
   $age3 = mysqli_real_escape_string($db, $_POST['age3']);
$rad4 = mysqli_real_escape_string($db, $_POST['rad4']);
  $name4 = mysqli_real_escape_string($db, $_POST['4']);
   $age4 = mysqli_real_escape_string($db, $_POST['age4']);
    $query = "INSERT INTO ticket (busname,name,age,src,dest,gender,doj) 
          VALUES('$bus','$name1','$age1','$src','$dest','$rad1','$doj')";
           $query2 = "INSERT INTO ticket (busname,name,age,src,dest,gender,doj) 
          VALUES('$bus','$name2','$age2','$src','$dest','$rad2','$doj')";
           $query3 = "INSERT INTO ticket (busname,name,age,src,dest,gender,doj) 
          VALUES('$bus','$name3','$age3','$src','$dest','$rad3','$doj')";
           $query4 = "INSERT INTO ticket (busname,name,age,src,dest,gender,doj) 
          VALUES('$bus','$name4','$age4','$src','$dest','$rad4','$doj')";
          mysqli_query($db, $query);
          mysqli_query($db, $query2);
          mysqli_query($db, $query3);
          mysqli_query($db, $query4);

 echo "<table border='1'>";
echo "<tr><th>id</th><th>bus</th><th>Name</th><th>src</th><th>dest</th><th>DOJ</th></tr>";
echo "<tr><td>";
echo "1";
echo "</td>";
echo "<td>";
echo "$bus";
echo "</td>";
echo "<td>";
echo "$name1";
echo "</td>";
echo "<td>";
echo "$src";
echo "</td>";
echo "<td>";
echo "$dest";
echo "</td>";
echo "<td>";
echo "$doj";
echo "</td></tr>";
echo "<tr><td>";
echo "2";
echo "</td>";
echo "<td>";
echo "$bus";
echo "</td>";
echo "<td>";
echo "$name2";
echo "</td>";
echo "<td>";
echo "$src";
echo "</td>";
echo "<td>";
echo "$dest";
echo "</td>";
echo "<td>";
echo "$doj";
echo "</td></tr>";
echo "<tr><td>";
echo "3";
echo "</td>";
echo "<td>";
echo "$bus";
echo "</td>";
echo "<td>";
echo "$name3";
echo "</td>";
echo "<td>";
echo "$src";
echo "</td>";
echo "<td>";
echo "$dest";
echo "</td>";
echo "<td>";
echo "$doj";
echo "</td></tr>";
echo "<tr><td>";
echo "4";
echo "</td>";
echo "<td>";
echo "$bus";
echo "</td>";
echo "<td>";
echo "$name4";
echo "</td>";
echo "<td>";
echo "$src";
echo "</td>";
echo "<td>";
echo "$dest";
echo "</td>";
echo "<td>";
echo "$doj";
echo "</td></tr>";

echo "<tr><th>TOTAL Fare:";
echo "</th>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo " ";
echo "</td>";
echo "<td>";
echo " ";
echo "</td>";

echo "<td>";
echo $p;
echo "</td></tr>";
echo "</table>";


}
$db->close();
}
?>
</p>
<script type="text/javascript">
  function myFunction(event){
    var key = event.keyCode;
    if(key==49){
      document.getElementById("2").disabled = true;
      document.getElementById("3").disabled = true;
      document.getElementById("4").disabled = true;
      document.getElementById("age2").disabled = true;
      document.getElementById("age3").disabled = true;
      document.getElementById("age4").disabled = true;

    } else if(key==50){
       document.getElementById("3").disabled = true;
      document.getElementById("4").disabled = true;
      document.getElementById("age3").disabled = true;
      document.getElementById("age4").disabled = true;
    } else if(key==51){
      document.getElementById("4").disabled = true;
      document.getElementById("age4").disabled = true;
    }
  }
</script>
</body>
</html>