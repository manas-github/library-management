<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
if(isset($_POST['isbn'])) {
$isbn = $_POST['isbn'];
$_SESSION['isbn'] = $isbn;
//connect to the db
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "Select S.ShelfID AS shelfid, S.AisleID AS aisleid, F.FloorID AS floorid, SU.SubName AS subname From book AS B, shelf AS S, floor AS F,subject AS SU
	Where B.ISBN = '$isbn' AND B.ShelfID = S.ShelfID AND B.SubName = SU.SubName AND S.FloorID = F.FloorID";
	//Run our sql query
    $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$shelfid = $row['shelfid'];
	$aisleid = $row['aisleid'];
	$floorid = $row['floorid'];
	$subname = $row['subname'];
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
<table class="table table-striped">
<caption>Book location</caption>
<tr>
    <td>ISBN</td>
    <td><?php echo $isbn; ?></td>
</tr>
<tr>
    <td>Floor Number</td>
    <td><?php echo $floorid; ?></td>
</tr>
<tr>
    <td>Aisle Number</td>
    <td><?php echo $aisleid; ?></td>
</tr>
<tr>
    <td>Shelf Number</td>
    <td><?php echo $shelfid; ?></td>
</tr>
<tr>
    <td>Subject</td>
    <td><?php echo $subname; ?></td>
</tr>
</table>
<form action="UserSummary.php" method="post">
<input type="submit" value="Back" class="btn btn-lg">
</form>
</div>
</body>
</html>