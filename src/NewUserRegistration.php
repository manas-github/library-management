<?php
include 'dbinfo.php'; 
?>  

<?php
session_start(); 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['confirmpassword']))  
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
    
    
    //form validation 
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
        echo'<script type="text/javascript">alert("Username can have only alphabets and numbers!!")</script>';
        
    elseif(!preg_match("/^[a-zA-Z0-9]*$/",$password))
        echo'<script type="text/javascript">alert("Password can have only alphabets and numbers!!")</script>';
    
    
    
	else
    {    
        $username = mysqli_real_escape_string($link,$username);
        $password = mysqli_real_escape_string($link,$password);
        $confirmpassword = mysqli_real_escape_string($link,$confirmpassword);
    
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
	    $_SESSION['confirmpassword']=$confirmpassword;
	
	   if($password == $confirmpassword) 
       {
           $hashformat= "$2y$10$";
           $salt="iusesomecrazystrings22";
           $hash_and_salt = $hashformat . $salt;
           $password = crypt($password,$hash_and_salt);
        
        
           $insertStatement = "INSERT INTO user (Username, Password) VALUES ('$username', '$password')";
           $result = mysqli_query ($link, $insertStatement) ; 
           if($result == false) 
           {
               echo '<h3>Username already assigned. Please try with some other name!!<h3>';
               header( "refresh:3;url=NewUserRegistration.php" );
               exit();
           } 
           else 
           {
			     header('Location: CreateProfile.php');
		   }
        } 
        else 
        {
		  echo'<script type="text/javascript">alert("Password inconsistent!!")</script>';
	    }
    }
}
?>

<html>
<head>
    <link rel="stylesheet" href="css/Login.css">
    <script src="js/Login.js"></script>
</head>
<body>
<?php
    include 'nav.php';
?>

<!--
<form action="" method="post">
<table>
<tr>
    <td>Username</td>
    <td><input type="text" name="username" required/></td>
</tr>
<tr>
    <td>Password</td>
    <td><input type="text" name="password" required/></td>
</tr>

<tr>
    <td>Confirm Password</td>
    <td><input type="text" name="confirmpassword" required/></td>
</tr>
</table>

<input type="submit" value="Register"/>
</form>

<form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>
-->


<div class="wrapper">
	<div class="container">
		<h1>Sign Up !!</h1>
		
		<form class="form" action="" method="post">
			<input type="text" placeholder="Username" name="username" required/>
			<input type="password" placeholder="Password" name="password" required/>
			<input type="password" placeholder="Confirm Password" name="confirmpassword" required/>
			<button type="submit" id="login-button">Continue</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


</body>
</html>