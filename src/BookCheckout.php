<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
$today = date("Y-m-d");
$plus = strtotime("+14 day", time());
$estimate = date('Y-m-d', $plus);
if(isset($_POST['isbn']) and isset($_POST['copyid']) and isset($_POST['issueid']))  {
	$isbn = $_POST['isbn'];
	$copyid = $_POST['copyid'];
	$issueid = $_POST['issueid'];
	$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");
	//Our SQL Query
	$sql_query = "Select Max(IssueID) AS givenissueid, IsChecked From issue AS I, bookcopy AS BC Where I.ISBN = '$isbn' AND I.CopyID = '$copyid' AND I.ISBN = BC.ISBN AND I.CopyID = BC.CopyID";
	//Run our sql query
    $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$givenissueid = $row['givenissueid'];
	$ischecked = $row['IsChecked'];
	if($ischecked == 1) {
		echo 'Error: This book is checked out.';
	} elseif($issueid == $givenissueid) {
		$sql_query = "UPDATE issue AS I SET ExtenDate = '$today', IssueDate = '$today', ReturnDate = '$estimate' Where I.IssueID = '$issueid'";
		//Run our sql query
		$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
		if($result == false)
		{
			echo 'The query by ISBN failed.';
			exit();
		}
		$sql_query = "UPDATE bookcopy AS BC SET IsHold = 0, IsChecked = 1 Where BC.ISBN = '$isbn' AND BC.CopyID = '$copyid'";
		//Run our sql query
		$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
		if($result == false)
		{
			echo 'The query by ISBN failed.';
			exit();
		}
		header('Location: ConfirmCheckout.php');		
	} else {
		echo 'Wrong IssueID';
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
    include 'nav2.php';
?>
<div class="container">
<h1 class="jumbotron">Book Checkout</h1>

<form action="" method="post">
<table class="table table-striped">
<tr scope="row">
    <td>Issue ID</td>
    <td><input type="text" name="issueid" required/></td>
</tr>
<tr scope="row">
    <td>ISBN</td>
    <td><input type="text" name="isbn" required/></td>
</tr>
<tr scope="row">
    <td>Copy Number</td>
    <td><input type="text" name="copyid" required/></td>
</tr>

<tr scope="row">
    <td>Username</td>
    <td><?php echo $username; ?></td>
</tr>

<tr scope="row">
    <td>Check Out Date</td>
    <td><?php echo $today; ?></td>
</tr>

<tr scope="row">
    <td>Estimated Return Date</td>
    <td><?php echo $estimate; ?></td>
</tr>

</table>
<input type="submit" value="Confirm" class="btn btn-primary"/>
</form>
<form action="UserSummary.php" method="post">
<input type="submit" value="Back" class="btn btn-primary"/>
</form>
</div>
</body>
</html>