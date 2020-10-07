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

    <h3>SELECT Query 1</h3>
    <?php 
        $db;
        include("../db_connect.php"); //connects to the Database according to the user level. variable $db will be used.

        $sql = "SELECT username, type FROM employee_login WHERE employee_id = '00005';";
        $result = mysqli_query($db,$sql);
        
        if ($result) { // query successful
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            echo "Returned rows are: " . mysqli_num_rows($result);
            echo $row['username'] . " space " . $row['type'];
            // Free result set
            mysqli_free_result($result);
        } else {
            echo "<p>Error: Invalid Data or you have NO PERMISSION to execute this query</p>";
            echo "<p>Error description: " . mysqli_error($db) . "</p>";
        }
          
          mysqli_close($db);

    ?>

</body>
</html>