<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
       
    <img src="http://www.carstensachse.de/blog/wp-content/uploads/2017/03/preloader-12.gif" alt="" width="100%" height="100%" />
</body>
</html>
 
<?php   
session_start(); //to ensure you are using same session
session_destroy();
//destroy the session


header( "refresh:5;url=Login.php" ); //to redirect back to "index.php" after logging out
exit();
?>
