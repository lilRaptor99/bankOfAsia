<?php 
    session_start();
?>

<Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>DB Test</title>
</head>
<body>

    <h3>DB Test</h3>
    <?php 
        $db;
        $db = mysqli_connect('localhost:3306','Manager','1234','boa_db');

        $sql = "SELECT * FROM employee;";
        //Only an  Admin can execute this command

        $result = mysqli_query($db,$sql);
        
        if ($result) { // query successful
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $numRows = mysqli_num_rows($result); // No. of result rows

            $columns = array();  //Column headers are stored in this array
            if(!empty($row)){
                $columns = array_keys($row);

            } else {
                echo "Query error, no rows returned";
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

        } else {
            echo "<p>Error: Invalid Data inserted or you have NO PERMISSION to execute this query</p>";
            echo "<p>Error description: " . mysqli_error($db) . "</p>";
        }
          
        mysqli_close($db);


    ?>

</body>
</html>