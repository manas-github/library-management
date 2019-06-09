<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
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
<h1>Future Hold Request for a Book</h1>

<form action="FutureHoldRequestResult.php" method="post">
<table class="table table-striped">
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn" required/></td>
</tr>
</table>
<input type="submit" value="Request" class="btn btn-primary"/>
</form>

<form action="UserSummary.php" method="post">
<input type="submit" value=" Back " class="btn btn-primary"/>
</form>

</div>
</body>
</html>