<?php 
    session_start();
?>

<Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>View Query Result</title>
    <link rel="stylesheet" type="text/css" href="CSS/new_style.css">

</head>
<body>
     <div class=header>
     <div class=wrapper>
    <div align="center">
    <h3>VIEW Query Result</h3>
    <?php 
        $db;
        include("db_connect.php"); //connects to the Database according to the user level. variable $db will be used.

        $sql;   //sql query that needs to be executed    
        if(isset($_POST["view1"])) $sql = "SELECT * FROM total_balance;";

        else if(isset($_POST["view2"])) $sql = "SELECT * FROM show_outstanding_balance;";

        else if(isset($_POST["view3"])) $sql = "SELECT * FROM greater_salaries;";

        $result = mysqli_query($db,$sql);
        
        if ($result) { // query successful
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $numRows = mysqli_num_rows($result); // No. of result rows

            $columns = array();  //Column headers are stored in this array
            if(!empty($row)){
                $columns = array_keys($row);

            } else {
                echo "<h3>Query error!</h3>";
            }

            echo "<p>Returned row count: " . $numRows . "</p>";

            echo "<p>Result: </p>"; //result table
             
            echo "<table border='1'><tr>";
            for ($i=0; $i < count($columns); $i++) {   // creating table header from columns array
                echo "<th>" . $columns[$i] . "</th>";
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
            echo "<p>Error: You have NO PERMISSION to execute this query</p>";
            echo "<p>Error description: " . mysqli_error($db) . "</p>";
        }
        
        echo "<h4>Query:</h4><p>". $sql ."</p>";
        mysqli_close($db);

        echo "<h4>You will be redirected to View Page in <em>20 seconds</em></h4>";
        header( "refresh:20;url=views.php" );

    ?>
    </div>
    </div>

</body>
</html>