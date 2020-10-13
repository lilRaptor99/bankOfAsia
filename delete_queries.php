<?php 
    session_start();
?>

<Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Update Query Result</title>
    <link rel="stylesheet" type="text/css" href="CSS/main_style.css">
</head>
<body>
    <div class=header>
     <div class=wrapper>
    <h3>DELETE Query Result</h3>
    <?php 
        $db;
        include("db_connect.php"); //connects to the Database according to the user level. variable $db will be used.

        $sql;   //sql query that needs to be executed selected by which button is pressed
        if(isset($_POST["delete1"])) $sql = "DELETE FROM employee WHERE employee_id = '" . $_POST["del1_eID"] . "';";

        else if(isset($_POST["delete2"])) $sql = "";
        
        //$result = 1;
        $result = mysqli_query($db,$sql);
        
        if ($result) { // query successful
            $rowsAffected = mysqli_affected_rows($db);
            if($rowsAffected == 0){  // no rows deleted by the query. Invalid data inserted.
                echo "<h3>0 rows Deleted</h3>";
                echo "<p>Error: Invalid Data inserted</p>";
            } else{
                echo "<h3><em>$rowsAffected rows</em> Deleted Successfully</h3>";
            }
            echo "<h4>Query:</h4><p>". $sql ."</p>";

        } else {
            echo "<p>Error: Invalid Data inserted or you have NO PERMISSION to execute this query</p>";
            echo "<p>Error description: " . mysqli_error($db) . "</p>";
        }
          
        mysqli_close($db);

        echo "<h4>You will be redirected to Query Page in <em>8 seconds</em></h4>";
        header( "refresh:8;url=queries.php" );

    ?>
</div>
</div>
</body>
</html>