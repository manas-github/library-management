<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
unset($_SESSION['isbn']);
unset($_SESSION['copyid']);	
?> 
<html>
<head>
    <link rel="stylesheet" href="css/usersummary.css">
    <style>
        #btnss{
            margin-left: 580px;
        }
    </style>
</head>
<body>
<?php
    include 'nav2.php';
?>
<center><h1>Welcome <?php echo $username;?><h1></center>
<div id="btnss">
<form action="SearchBooks.php" method="post">
<input type="submit" class="button" value="Search Books"/>
</form>

<form action="TrackBookLocation.php" method="post">
<input type="submit" class="button" value="Track Book Location"/>
</form>

<form action="BookCheckout.php" method="post">
<input type="submit" class="button" value="Checkout Book"/>
</form>

<form action="FutureHoldRequestforaBook.php" method="post">
<input type="submit" class="button" value="Future Hold Request"/>
</form>

<form action="RequestExtensionOnaBook.php" method="post">
<input type="submit" class="button" value="Extension Request"/>
</form>

<form action="ReturnBook.php" method="post">
<input type="submit" class="button" value="Return Book"/>
</form>
<!---
<form action="Login.php" method="post">
<input type="submit" value="Close"/>--->
    </div>

</body>
</html>