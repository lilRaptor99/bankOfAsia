<?php 
    session_start();
?>

<Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Bank of Asia - Select 2</title>
</head>
<body>

    <h3>SELECT Query 2</h3>
    <?php 
        $db;
        include("../db_connect.php"); //connects to the Database according to the user level. variable $db will be used.

        $sql = "SELECT d.Name, dc.Contact_No FROM dept_contact dc, department d, works_on wo, assignment a 
                WHERE d.Department_Code = dc.Department_Code AND d.Department_Code = wo.Department_Code 
                        AND a.Project_ID = wo.Project_ID AND a.Project_ID = '00001'";
        //Only an  Admin or HOD can execute this command

        $result = mysqli_query($db,$sql);
        
        if ($result) { // query successful
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $numRows = mysqli_num_rows($result); // No. of result rows
            echo "<p>Returned row count: " . $numRows . "</p>";

            echo "<p>Result: </p>";
             
            echo "<table border='1'><tr><td>Name</td><td>Contact_No</td></tr>";
            for ($i=0; $i < $numRows; $i++) { 
                echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['Contact_No'] . "</td></tr>";
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            }
            
            echo "</table>";
            // Free result set
            mysqli_free_result($result);

        } else {
            echo "<p>Error: Invalid Data or you have NO PERMISSION to execute this query</p>";
            echo "<p>Error description: " . mysqli_error($db) . "</p>";
        }
          
        mysqli_close($db);

        echo "<h4>You will be redirected to Query Page in <em>8 seconds</em></h4>";

        header( "refresh:8; url=../queries.php" );

    ?>

</body>
</html>