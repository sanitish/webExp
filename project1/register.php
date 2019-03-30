<!DOCTYPE html>

<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="expensemanager";
$conn = mysqli_connect($servername, $username,$password,$dbname);
echo("successful in connection");
if(isset($_POST['tsubmit'])){
$fullname=$_POST['fullname'];
$Username=$_POST['Username'];
$email=$_POST['Email'];
$Password = $_POST['Password'];

$q = "SELECT Username from register where Username = '$Username' ";
$result = mysqli_query($conn, $q);

$num = mysqli_num_rows($result);
if($num == 0){
$iq = "INSERT INTO register(`fullname`, `Username`, `email`, `password`) VALUES ('$fullname','$Username','$email','$Password')";

if(mysqli_query($conn, $iq))
{echo("registration successful");
header('Location: login.php');
}
else
echo("error in registration");
}
else{
  echo '<script language="javascript">';
  echo 'alert("Try with diff username")';
  echo '</script>';

}
}




?>

<html>
<head>
<title>Registration Page</title>
  <link rel="stylesheet" type="text/css" href="Rstyle.css">
</head>
<body>
  <div class = "Registerbox" >
    <img src="login_icons.jpeg" class = "login_icon" >
    <h1 style="color:black;" >Register</h1>
    <form action ="" onsubmit="return validation()" method="post" name="rform">
      <p style ="color:black;">Full Name</p>
       <input type="text" name="fullname" placeholder="Name" id="fn">
         <span id="fname" style="color: red; font-weight:bold;"></span>
      <p style="color:black;">Username</p>
      <input type="text" name="Username" placeholder ="Enter Username" id="user">
        <span id="username" style="color: red; font-weight:bold;"></span>
      <p style="color:black;">Email</p>
      <input type="email" name="Email" placeholder ="Enter Email" id="em">
        <span id="email" style="color: red; font-weight:bold;"></span>
      <p style="color:black;">Password</p>
      <input type="Password" name="Password" placeholder="Enter Password" id="pass">
        <span id="password" style="color: red; font-weight:bold;"></span>
      <br>
      <input type="submit" name="tsubmit" value="register">

    </form>
  </div>

  <script type="text/javascript">
    function validation(e) {
      //e.preventDefault();
      var user = document.getElementById('user').value;
      var pass = document.getElementById('pass').value;
      var email = document.getElementById('em').value;
      var fn = document.getElementById('fn').value;

      if (fn == "") {
        document.getElementById("fname").innerHTML = "**Please fill the Username field";
        return false;
      }


      if ((fn.length <= 2) || (user.length > 40)) {
        document.getElementById("fname").innerHTML = "**Username length should between 2 and 20";
        return false;
      }

      if (user == "") {
        document.getElementById("username").innerHTML = "**Please fill the Username field";
        return false;
      }


      if ((user.length <= 2) || (user.length > 20)) {
        document.getElementById("username").innerHTML = "**Username length should between 2 and 20";
        return false;
      }

      if(email==""){
                document.getElementById("email").innerHTML="**Please fill the email address";
                return false;
      }

      if(email.indexOf('@') <= 0){
                document.getElementById("email").innerHTML=" Invalid @ position";
                return false;

      }
      if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!=='.')){
                document.getElementById("email").innerHTML=" Invalid Position of '.' " ;
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
