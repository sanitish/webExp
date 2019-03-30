<!DOCTYPE html>


<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="expensemanager";
$conn = mysqli_connect($servername, $username,$password,$dbname);
echo("successful in connection");
if(isset($_POST['submit'])){
	echo "string";
mysqli_select_db($conn,"expensemanager");
$pass = $_POST['pass'];
$user = $_POST['user'];
$query = "SELECT * FROM register WHERE Username = '$user' AND Password = '$pass' " ;

$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);
if($num == 1){

echo "Welcome";
header('location: expman.html');

}

else{
	header('location: temp.php');
	echo '<script language="javascript">';
	echo 'alert("Wrong Credentials")';
	echo '</script>';
	header('location: temp.php');

}

}


?>


<html>

<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="lstyle.css">
</head>

<body>
  <div class="loginbox">
    <img src="login_icons.jpeg" class = "login_icon" >
    <h1 style="color:black;" >Login</h1>

    <form action="" method="post" onsubmit="return validation()">

      <div class="">
        <p style="color:black;">Username</p>
        <input type="text" name="user" placeholder ="Enter Username" id="user">
        <span id="username" style="color: red; font-weight:bold;"></span>
      </div>

      <div class="">
        <p style="color:black;">Password</p>
        <input type="Password" name="pass" placeholder="Enter Password" id="pass">
        <span id="password" style="color: red; font-weight:bold; "></span>
      </div>

      <div class="">
        <input type="submit" name="submit" value="login" id="">
        <br>
        <p style="color:black;">Don't have an account?
          <a href="register.php">Register</a>
        </p>
      </div>

    </form>
  </div>

  <script type="text/javascript">
    function validation(e) {
      //e.preventDefault();
      var user = document.getElementById('user').value;
      var pass = document.getElementById('pass').value;
      if (user == "") {
        document.getElementById("username").innerHTML = "**Please fill the Username field";
        return false;
      }


      if ((user.length <= 2) || (user.length > 20)) {
        document.getElementById("username").innerHTML = "**Username length should between 2 and 20";
        return false;
      }



      if (pass == "") {

        document.getElementById("password").innerHTML = "**Please fill the Password field";
        document.getElementById("username").innerHTML = " ";

        return false;
      }
      if ((pass.length <= 2) || (pass.length > 20)) {
        document.getElementById("password").innerHTML = "**password length should between 2 and 20";
        document.getElementById("username").innerHTML = " ";

        return false;
      }

    }
  </script>
</body>
</html>
