<?php 
   // session_start();
?>

<Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Login Error</title>
</head>
<style>
    body{text-align: center;}
</style>
<body>
    <br><br><h1>Login Error</h1><br>
        
    <h2>Possible causes:</h2>
    <h3>
            -Incorrect User Type<br>
            -Incorrect Username<br>
            -Incorrect Password<br>
    </h3>   

    <h4>You will be redirected to Login Page in <em>6 seconds</em></h4>

    <?php
    
        header( "refresh:6;url=logout.php" );
        
    ?>
</body>
</html>