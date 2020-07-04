<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign up</title>
  <link href="css/style1.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <form method="POST" action="signup.php" style="border:1px solid #ccc">
  <div class="container">
  <?php include('errors.php');?>
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="age"><b>Age</b></label>
    <input type="Number" placeholder="Enter Age" name="age"  min="18" required></br><hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

     <label for="phoneno"><strong>Phone number</strong></label>
    <input type="number" class="form-control" name="phoneno" pattern=".{8,}" placeholder="Enter phone number"></br><hr>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="psw-repeat" required>

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>



    <div class="clearfix">
      <button type="button" class="cancelbtn" onclick="window.location.href='index.html'">Cancel</button>
      <button type="submit" name="register" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form> 
</body>
</html>