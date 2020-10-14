<?php 
   // session_start();
?>

<Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Login Error</title>
	<link rel="stylesheet" type="text/css" href="CSS/Login_error_style.css">
</head>

<body>
	<div class="wrapper">
    <div align="center">
    <div class="error_header">

    <br><br><h1>Login Error!</h1><br>
        
    <h2>Possible causes:</h2>
    <ul class="a">
            <li>Incorrect User Type<br></li>
            <li>Incorrect Username<br></li>
            <li>Incorrect Password<br></li>
    </ul>   

    <h4>You will be redirected to Login Page in <em>10 seconds</em></h4>

    <?php
    
        header( "refresh:10;url=logout.php" );
        
    ?>
	</div>
    </div>
	</div>
</body>
</html>