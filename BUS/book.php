<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Bus reservation system</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>	
	<h1 data-text="ref" >Bus Reservation System</h1>
<form method="POST" action="index.php">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>

    <button type="submit" name="login">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
    <button type="button" class="button1" onclick=location.href='signup.php'>signup</button>
</form> 
</body>
</html>