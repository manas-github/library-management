<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$isbn = null;
$copyid = null;
$username = $_SESSION['username'];
$currentime = date("Y-m-d H:i");
$Name = null;
$_SESSION['target'] = "AdminSummary.php";
if(isset($_POST['isbn']) and isset($_POST['copynumber'])){
	$isbn = $_POST['isbn'];
	$copyid = $_POST['copynumber'];
	$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
	mysqli_select_db($link, $database) or die( "Unable to select database");
	//Our SQL Query
	$sql_query = "Select Max(IssueID) AS last_issueid From issue AS I Where I.ISBN = '$isbn' AND I.CopyID = '$copyid'";
	//Run our sql query
	$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
	if($result == false){
		echo 'The query failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$last_issueid = $row['last_issueid'];
	mysqli_select_db($link, $database) or die( "Unable to select database");
	//Our SQL Query
	$sql_query = "Select SF.Username, Name From issue AS I, student_faculty AS SF Where I.IssueID = '$last_issueid' AND I.Username = SF.Username";
	//Run our sql query
	$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));
	if($result == false){
		echo 'The query failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$Name = $row['Name'];
	$chargename = $row['Username'];
	$_SESSION['chargename'] = $chargename;
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
    include 'nav3.php';
?>
<div class="container">
<h1 class="jumbotron">Lost Damaged Book</h1>

<form action="" method="post">
<table class="table table-stripied">
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn" value="<?php echo $isbn; ?>" required/></td>
</tr>
<tr>
    <td>Copy Number</td>
    <td><input type="text" name="copynumber" value="<?php echo $copyid; ?>" required/></td>
</tr>

<tr>
    <td>Current Time</td>
    <td><?php echo $currentime; ?></td>
</tr>
</table>
<input type="submit" value="Look for the last user" class="btn btn-primary"/>
</form>

<form action="ConfirmDamage.php" method="post">
<table class="table">
<tr>
    <td>Last User of Book</td>
    <td><?php echo $Name; ?></td>
</tr>

<tr>
    <td>Amount to be charged</td>
    <td><input type="text" name="charge" required/></td>
</tr>

</table>
<input type="submit" value="Submit" class="btn btn-primary"/>
</form>

<form action="AdminSummary.php" method="post">
<input type="submit" value="Back" class="btn btn-prmary"/>
</form>
    </div>
</body>
</html>