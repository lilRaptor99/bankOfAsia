<?php 
    session_start();
?>

<Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Update Query Result</title>
</head>
<body>

    <h3>UPDATE Query Result</h3>
    <?php 
        $db;
        include("db_connect.php"); //connects to the Database according to the user level. variable $db will be used.

        $sql;   //sql query that needs to be executed selected by which button is pressed
        if(isset($_POST["update1"])) $sql = "UPDATE employee SET name = '" . $_POST["upd1_name"] . "' 
        WHERE employee_id = '" . $_POST["upd1_eID"] . "';";

        else if(isset($_POST["update2"])) $sql = "";
        
        //$result = 1;
        $result = mysqli_query($db,$sql);
        
        if ($result) { // query successful
            echo "<h3>Data Updated Successfully</h3>";
            echo "<h4>Query:</h4><p>". $sql ."</p>";

        } else {
            echo "<p>Error: Invalid Data inserted or you have NO PERMISSION to execute this query</p>";
            echo "<p>Error description: " . mysqli_error($db) . "</p>";
        }
          
        mysqli_close($db);

        echo "<h4>You will be redirected to Query Page in <em>6 seconds</em></h4>";
        header( "refresh:6;url=queries.php" );

    ?>

</body>
</html>