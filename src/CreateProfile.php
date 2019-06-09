<?php

include 'dbinfo.php'; 
?>  

<?php
session_start(); 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

if(isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['email']))  {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$name = "$firstname $lastname";
	$email = $_POST['email'];
	$DOB = $_POST['DOB'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$isfaculty = $_POST['isfaculty'];
	
    //form validation
    if(!preg_match("/^[a-zA-Z ]*$/",$firstname))
         echo'<script type="text/javascript">alert("Name can have only letters and alphabets !!")</script>';
    elseif(!preg_match("/^[a-zA-Z]*$/",$lastname))
         echo'<script type="text/javascript">alert("Name can have only letters and alphabets !!")</script>';
    elseif(!preg_match("/\d\d\d\d-\d\d-\d\d/",$DOB))
         echo'<script type="text/javascript">alert("DOB should be YYYY-MM-DD format!!")</script>';
    elseif(!preg_match("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/",$email))
         echo'<script type="text/javascript">alert("Please enter valid email address!!")</script>';
    elseif(!preg_match("/^[a-zA-Z0-9 ,]*$/",$address))
         echo'<script type="text/javascript">alert("Address can have only letters and alphabets and valid special chars!!")</script>';
   
    //form validation ends                
    else
    {
	   $username = $_SESSION['username'];
	   if($isfaculty == "1") 
       {
		  $dept = $_POST['dept'];
	   } 
       else 
       {
		  $dept = null;
	   }

	   $insertStatement = "INSERT INTO student_faculty (Username, Name, DOB, Email, Gender, Address,
	IsFaculty, Dept) VALUES ('$username', '$name', '$DOB', '$email', '$gender', '$address', '$isfaculty',
	'$dept')";
	$result = mysqli_query ($link, $insertStatement)  or die(mysqli_error($link)); 
	if($result == false) 
    {
		echo 'The query failed.';
		exit();
	} 
    else 
    {
        echo'<script type="text/javascript">alert("Account successfully created !!")</script>';
		header('Location: accountcreated.php');
	}
} 

}
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    include 'nav.php';
?>
<div class="container">
<h1 class="jumbotron"><center>Create Profile</center></h1>

<form action="" method="post">
<table class="table table-striped">
<tr>
    <td>First Name</td>
    <td><input type="text" name="firstname" required/></td>
</tr>
<tr>
    <td>Last Name</td>
    <td><input type="text" name="lastname" required/></td>
</tr>

<tr>
    <td>D.O.B</td>
    <td><input type="text" name="DOB"/></td>
</tr>

<tr>
    <td>Email</td>
    <td><input type="text" name="email" required/></td>
</tr>

<tr>
    <td>Address</td>
    <td><textarea name="address" rows="5" cols="30"></textarea></td>
</tr>




<tr>
    <td>Gender</td>



<td>
<select name="gender">
  <option value="M">male</option>
  <option value="F">female</option>
</select>
    </td>
    </tr>

<tr>
    <td>Are you a faculty</td>

<td>

<select name="isfaculty">
  <option value="1">Yes</option>
  <option value="0">no</option>
</select>
    </td></tr>



<tr>
    <td>Associate Department</td>

<td>
<select name="dept">
  <option value="School of Electrical & Computer Engineering">Electrical Engineering</option>
  <option value="College of Computing">Computer Science</option>
  <option value="School of Industrial & Systems Engineering">Industrial & Systems Engineering</option>
</select>
    </td></tr>
</table>


<input type="submit" value="submit" class="btn btn-primary"/>
</form>
    </div>
</body>
</html>