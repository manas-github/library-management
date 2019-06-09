<?php
include 'dbinfo.php'; 
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




<?php
//always start the session before anything else!!!!!! 

    session_start(); 
    $link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

if(isset($_POST['username']) and isset($_POST['password']))  { //check null
	$username = $_POST['username']; // text field for username 
	$password = $_POST['password']; // text field for password
     $username = mysqli_real_escape_string($link,$username);
    $password = mysqli_real_escape_string($link,$password);
    
    // encryption starts
    
    $hashformat= "$2y$10$";
    $salt="iusesomecrazystrings22";
    $hash_and_salt = $hashformat . $salt;
    $password= crypt($password,$hash_and_salt);
	
// store session data
$_SESSION['username']=$username;

//connect to the db 

$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

         //Our SQL Query
           $sql_query = "Select U.Username From user AS U, staff AS S Where U.Username = '$username' AND U.Password = '$password' AND U.Username = S.Username";  

         //Run our sql query
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}
			if(mysqli_num_rows($result) == 1){ 
			//the username and password matches the database 
			//move them to the page to which they need to go 
				header('Location: AdminSummary.php');	
				
			//Our SQL Query
			}
			
           $sql_query = "Select Username From user Where Username = '$username' AND Password = '$password'";  

            //Run our sql query
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}

			//this is where the actual verification happens 
			if(mysqli_num_rows($result) == 1){ 
			//the username and password matches the database 
			//move them to the page to which they need to go 
				header('Location: UserSummary.php');
			   
			}else{ 
			$err = 'Incorrect username or password' ; 
			} 
			//then just above your login form or where ever you want the error to be displayed you just put in 
			 echo'<script type="text/javascript">alert("Invalid username or password!!")</script>';
    } 
	
?>	

<!---
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
</table>

<input type="Submit" value="Login"/>
</form>
<form action="NewUserRegistration.php" method="post">
<input type="Submit" value="Create Account"/>
</form>--->

<div class="wrapper">
	<div class="container">
		<h1>Welcome</h1>
		
		<form class="form" action="" method="post">
			<input type="text" placeholder="Username" name="username" required/>
			<input type="password" placeholder="Password" name="password" required/>
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