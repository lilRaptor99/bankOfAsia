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
    <div align="center">
    <h3>DELETE Query Result</h3>
    <br><br>
    <?php 
        $db;
        include("db_connect.php"); //connects to the Database according to the user level. variable $db will be used.

        $sql;   //sql query that needs to be executed selected by which button is pressed
        if(isset($_POST["delete1"])) $sql = "DELETE FROM employee WHERE employee_id = '" . $_POST["del1_eID"] . "';";

        else if(isset($_POST["delete2"])) $sql = "DELETE FROM employee_qualification WHERE employee_id = '" . $_POST["del2_eID"] . "';";

        else if(isset($_POST["delete3"])) $sql = "DELETE FROM branch WHERE branch_id = '" . $_POST["del3_brID"] . "';";

        else if(isset($_POST["delete4"])) $sql = "DELETE FROM customer WHERE customer_id = '" . $_POST["del4_custID"] . "';";

        else if(isset($_POST["delete5"])) $sql = "DELETE FROM person WHERE customer_id = '" . $_POST["del5_custID"] . "';";
        
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
            

        } else {
            echo "<p>Error: Invalid Data inserted or you have NO PERMISSION to execute this query</p>";
            echo "<p>Error description: " . mysqli_error($db) . "</p>";
        }
        
        echo "<h4>Query:</h4><p>". $sql ."</p>";
        mysqli_close($db);

        echo "<h4>You will be redirected to Query Page in <em>20 seconds</em></h4>";
        header( "refresh:20;url=queries.php" );

    ?>
    </div>
</div>
</div>
</body>
</html>