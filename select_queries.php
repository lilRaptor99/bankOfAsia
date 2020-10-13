<?php 
    session_start();
?>

<Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Select Query Result</title>
</head>
<body>

    <h3>SELECT Query Result</h3>
    <?php 
        $db;
        include("db_connect.php"); //connects to the Database according to the user level. variable $db will be used.

        $sql;   //sql query that needs to be executed    //= "SELECT * FROM employee"
        if(isset($_POST["select1"])) $sql = "SELECT username, type FROM employee_login WHERE employee_id = '". $_POST["sel1_eID"] ."';";
        else if(isset($_POST["select2"])) $sql = "SELECT * FROM " . $_POST['sel2_table'] . ";";
        else if(isset($_POST["select3"])) $sql = "SELECT d.Name, dc.Contact_No FROM dept_contact dc, department d, works_on wo, assignment a 
                                                WHERE d.Department_Code = dc.Department_Code AND d.Department_Code = wo.Department_Code 
                                                AND a.Project_ID = wo.Project_ID AND a.Project_ID = '00001';";
        else if(isset($_POST["select2"])) $sql = "SELECT * FROM employee;";

        $result = mysqli_query($db,$sql);
        
        if ($result) { // query successful
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $numRows = mysqli_num_rows($result); // No. of result rows

            $columns = array();  //Column headers are stored in this array
            if(!empty($row)){
                $columns = array_keys($row);

            } else {
                echo "<h3>Query error</h3>";
            }

            echo "<p>Returned row count: " . $numRows . "</p>";

            echo "<p>Result: </p>"; //result table
             
            echo "<table border='1'><tr>";
            for ($i=0; $i < count($columns); $i++) {   // creating table header from columns array
                echo "<td>" . $columns[$i] . "</td>";
            }
            echo "</tr>";

            for ($i=0; $i < $numRows; $i++) {
                echo "<tr>";
                for ($j=0; $j < count($columns); $j++) {   // creating rows
                    echo "<td>" . $row[$columns[$j]] . "</td>";
                }
                echo "</tr>";
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            }
            
            echo "</table>";

            // Free result set
            mysqli_free_result($result);

            echo "<h4>Query:</h4><p>". $sql ."</p>";

        } else {
            echo "<p>Error: Invalid Data inserted or you have NO PERMISSION to execute this query</p>";
            echo "<p>Error description: " . mysqli_error($db) . "</p>";
        }
          
        mysqli_close($db);

        echo "<h4>You will be redirected to Query Page in <em>8 seconds</em></h4>";
        header( "refresh:8;url=queries.php" );

    ?>

</body>
</html>