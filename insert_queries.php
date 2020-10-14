<?php 
    session_start();
?>

<Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Insert Query Result</title>
	<link rel="stylesheet" type="text/css" href="CSS/new_style.css">
</head>
<body>
	<div class=wrapper>
    <div align="center">
    <div class="header">
    <h3>INSERT Query Result</h3>
    <?php 
        $db;
        include("db_connect.php"); //connects to the Database according to the user level. variable $db will be used.

        $sql;   //sql query that needs to be executed selected by which button is pressed
        if(isset($_POST["insert1"])) $sql = "INSERT INTO employee VALUES('" . $_POST["in1_eID"] ."', '". $_POST["in1_name"] . "', '". 
        $_POST["in1_NIC"] . "', '". $_POST["in1_address"] . "', '". $_POST["in1_dob"] . "', '". $_POST["in1_deptCode"] . "', '". $_POST["in1_branchID"] . "')";

        else if(isset($_POST["insert2"])) $sql = "INSERT INTO branch VALUES('" . $_POST["in2_branchID"] ."', '". $_POST["in2_name"] . "', '". $_POST["in2_location"] .
                        "', '". $_POST["in2_area"] . "')";

        else if(isset($_POST["insert3"])) $sql = "INSERT INTO customer VALUES('" . $_POST["in3_customerID"] . "', '" . $_POST["in3_branchID"] . "');";

        else if(isset($_POST["insert4"])) $sql ="INSERT INTO person VALUES('" . $_POST["in4_customerID"] . "', '"  . $_POST["in4_NIC"] . "', '" . $_POST["in4_name"] . "', '" . $_POST["in4_zip"] . "', '"  
             . $_POST["in4_province"] . "', '" . $_POST["in4_city"] . "', '" . $_POST["in4_address"] . "');";
        
        else if(isset($_POST["insert5"])) $sql = "INSERT INTO employee_qualification VALUES('" . $_POST["in5_eID"] . "', '" . $_POST["in5_qualification"] . "');";
        
        //$result = 1;
        $result = mysqli_query($db,$sql);
        
        if ($result) { // query successful
            echo "<h3>Data Inserted Successfully</h3>";

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