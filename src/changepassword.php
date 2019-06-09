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

if(isset($_POST['npassword']) and isset($_POST['password']))  { //check null
	$npassword = $_POST['npassword']; 
	$password = $_POST['password']; 
    $username=$_POST['username'];
     $npassword = mysqli_real_escape_string($link,$npassword);
    $password = mysqli_real_escape_string($link,$password);
    
    // encryption starts
    
    $hashformat= "$2y$10$";
    $salt="iusesomecrazystrings22";
    $hash_and_salt = $hashformat . $salt;
    $password= crypt($password,$hash_and_salt);
    $npassword= crypt($npassword,$hash_and_salt);
	
// store session data
$_SESSION['username']=$username;

//connect to the db 

$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

         //Our SQL Query
           $sql_query = "update user set password='$npassword' where username='$username' and password='$password'";  

         //Run our sql query
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}
        else{
            echo'<h3>Password changed. You will be automatically logged out in 5 seconds.</h3>';
            header( "refresh:5;url=logout.php" );
        }

    
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
			<input type="password" placeholder="Current Password" name="password" required/>
			<input type="password" placeholder="New Password" name="npassword" required/>
			<button type="submit" id="login-button">Submit</button>
			
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