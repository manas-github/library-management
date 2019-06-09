<?php
include 'dbinfo.php'; 
?>  

<?php
session_start(); 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

if(isset($_POST['username']) && isset($_POST['password']))
{
	$username = $_POST['username'];
    $password=$_POST['password'];

    
     $hashformat= "$2y$10$";
    $salt="iusesomecrazystrings22";
    $hash_and_salt = $hashformat . $salt;
    $password= crypt($password,$hash_and_salt);
	
   
        
        
           $insertStatement = "update admin set Password='$password' where Username='$username'";
           $result = mysqli_query ($link, $insertStatement)  or die(mysqli_error($link)); 
           if($result == false) 
           {
               echo 'The query failed.';
               exit();
           } 
           else 
           {
			     header('Location: CreateProfcile.php');
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
		<h1>script to update encryption</h1>
		
		<form class="form" action="" method="post">
			<input type="text" placeholder="Username" name="username" required/>
			<input type="text" placeholder="pwd" name="password" required/>
			
			<button type="submit" id="login-button">Login</button>
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