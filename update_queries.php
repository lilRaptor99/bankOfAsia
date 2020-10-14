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
    <h3>UPDATE Query Result</h3>
    <br><br>
    <?php 
        $db;
        include("db_connect.php"); //connects to the Database according to the user level. variable $db will be used.

        $sql;   //sql query that needs to be executed selected by which button is pressed
        if(isset($_POST["update1"])) $sql = "UPDATE employee SET name = '" . $_POST["upd1_name"] . "' 
        WHERE employee_id = '" . $_POST["upd1_eID"] . "';";

        else if(isset($_POST["update2"])) $sql = "UPDATE employee_qualification SET qualification = '" . $_POST["upd2_newQualification"] . "' 
        WHERE employee_id = '" . $_POST["upd2_eID"] . "' AND qualification LIKE '%". $_POST["upd2_oldQualification"] ."%';";

        else if(isset($_POST["update3"])) $sql = "UPDATE branch SET name = '" . $_POST["upd3_name"] . "' 
        WHERE branch_id = '" . $_POST["upd3_brID"] . "';";

        else if(isset($_POST["update4"])) $sql = "UPDATE customer SET branch_id = '" . $_POST["upd4_brID"] . "' 
        WHERE customer_id = '" . $_POST["upd4_custID"] . "';";

        else if(isset($_POST["update5"])) $sql = "UPDATE person SET name = '" . $_POST["upd5_name"] . "' 
        WHERE customer_id = '" . $_POST["upd5_custID"] . "';";
        
        //$result = 1;
        $result = mysqli_query($db,$sql);
        
        if ($result) { // query successful
            $rowsAffected = mysqli_affected_rows($db);
            if($rowsAffected == 0){  // no rows were updated by the query. Invalid data inserted.
                echo "<h3>0 rows Updated</h3>";
                echo "<p>Error: Invalid Data inserted</p>";
            } else{
                echo "<h3><em>$rowsAffected rows</em> Updated Successfully</h3>";
            }

        } else {
            echo "<p>Error: Invalid Data inserted or you have NO PERMISSION to execute this query</p>";
            echo "<p>Error description: " . mysqli_error($db) . "</p>";
        }

        echo "<h4>Query:</h4><p>". $sql ."</p>";
        mysqli_close($db);

        echo "<h4>You will be redirected to Query Page in <em>6 seconds</em></h4>";
        //header( "refresh:6;url=queries.php" );

    ?>
    </div>
    </div>
</body>
</html>