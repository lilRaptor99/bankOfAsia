<?php 
    session_start();
?>

<Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Bank of Asia - Query Page</title>
</head>
<body>
    <table width="100%" border="0">
        <tr>
        <td>
            <?php
                echo "<h3>Signed in as:&nbsp; <em>" . $_SESSION["type"] . "</em> &nbsp;  &nbsp;  &nbsp; Username:&nbsp; <em>" . $_SESSION["username"] . "</em></h3>"; 
            ?>
        </td>
        <td>
            <h3 align="center"><a href = "logout.php">Sign Out</a></h3>
        </td>
        </tr>

    </table>
    <h3>SELECT Queries</h3>
        <form action="select_queries.php" method="POST">
        <ol>
            <li><pre>SELECT username, type FROM employee_login WHERE employee_id = '00005';</pre></li>
                <input type="submit" value="Execute Query" name="select1"><br>
            
            <li><pre>SELECT * FROM employee;</pre></li>
                <input type="submit" value="Execute Query" name="select2"><br>

            <li><pre>SELECT d.Name, dc.Contact_No FROM dept_contact dc, department d, works_on wo, assignment a 
    WHERE d.Department_Code = dc.Department_Code AND d.Department_Code = wo.Department_Code 
        AND a.Project_ID = wo.Project_ID AND a.Project_ID = '00001';</pre></li>
            <input type="submit" value="Execute Query" name="select3"><br>

        </ol>
        </form>

    <h3>INSERT Queries</h3>
        <form action="insert_queries.php" method="POST">
        <ol>
            <li>INSERT INTO employee VALUES(<input type="text" maxlength="5" size="2" name="in1_eID" placeholder="EmpID">, 
                    <input type="text" maxlength="30" size="25" name="in1_name" placeholder="Name">, 
                    <input type="text" maxlength="12" size="10" name="in1_NIC" placeholder="NIC">,
                    <input type="text" maxlength="70" size="40" name="in1_address" placeholder="Address">,
                    <input type="date" name="in1_dob" placeholder="DOB">,
                    <input type="text" maxlength="5" size="3" name="in1_deptCode" placeholder="DEPT">,
                    <input type="text" maxlength="3" size="2" name="in1_branchID" placeholder="BR">
            );</li>
            
                <input type="submit" value="Execute Query" name="insert1"><br>
            
            <li><pre>INSERT INTO employee VALUES();</pre></li>
                <input type="submit" value="Execute Query" name="insert2"><br>


        </ol>
        </form>

        
</body>
</html>