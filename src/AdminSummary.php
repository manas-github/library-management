<html>
<head>
     <link rel="stylesheet" href="css/usersummary.css">   
</head>
<body>
<?php
    include 'nav3.php';

?>

<center>
<h1>Admin Summary</h1>

<form action="PopularSubjectReport.php" method="post">
<input type="submit" value="Popular Subject Report" class="button"/>
</form>

<form action="FrequentUsersReport.php" method="post">
<input type="submit" value="Frequent User Report" class="button"/>
</form>

<form action="PopularBooksReport.php" method="post">
<input type="submit" value="Popular Books Report" class="button"/>
</form>

<form action="DamagedBooksReport.php" method="post">
<input type="submit" value="Damaged Books Report" class="button"/>
</form>

<form action="LostDamagedBook_Admin.php" method="post">
<input type="submit" value="Lost/Damaged Book" class="button"/>
</form></center>



</body>
</html>