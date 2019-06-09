<html>
<head>
<title>Flat Search Box Responsive Widget Template | Home :: w3layouts</title>
<!-- Custom Theme files -->
<link href="css/searchbooks.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Flat Search Box Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--Google Fonts-->
</head>

<body>
<?php
    include 'nav3.php';
    
    ?>
<div class="search">
	<i> </i>
	<div class="s-bar">
	   <form action="TrackResult.php" method="post">
		<input type="text" name="isbn" value="Search by ISBN" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Template';}">
		<input type="submit"  value="Search"/><br><br>
		
	  </form>
	</div>

</div>
    </body>
</html>
<!---
<body>

<h1>Track Book Location</h1>

<form action="TrackResult.php" method="post">
<table>
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn" required/></td>
</tr>
</table>

<input type="submit" value="Locate"/>
</form>

<form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>


</body>
</html>-->