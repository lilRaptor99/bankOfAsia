<?php 
    session_start();
?>

<Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Bank of Asia - Select 1</title>
</head>
<body>

    <h3>SELECT Queries</h3>
    <?php 
        $db;
        include("../db_connect.php"); //connects to the Database according to the user level. variable $db will be used.

        $sql = "SELECT username, type FROM employee_login WHERE employee_id = '00005';";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        if ($result) {
            echo "Returned rows are: " . mysqli_num_rows($result);
            // Free result set
            mysqli_free_result($result);
          }
          
          mysqli_close($db);

    ?>

</body>
</html>