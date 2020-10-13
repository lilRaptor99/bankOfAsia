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
    <table width="100%">
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
            <li>SELECT username, type FROM employee_login WHERE employee_id = '<input type="text" maxlength="5" size="2" name="sel1_eID" placeholder="EmpID">';</li>
                <input type="submit" value="Execute Query" name="select1"><br><br>
            
            <li>SELECT * FROM <select name="sel2_table" id="sel2_table">
                <option value="employee">employee</option>
                <option value="employee_qualification">employee_qualification</option>
                <option value="permanent_employee">permanent_employee</option>
                <option value="person">person</option>
                <option value="business">business</option>
                <option value="branch">branch</option>
                <option value="department">department</option>
                <option value="dept_contact">dept_contact</option>
                <option value="residential_account">residential_account</option>
                <option value="foreign_account">foreign_account</option>
                <option value="assignment">assignment</option>
            </select>
            
            ;</li>
                <input type="submit" value="Execute Query" name="select2"><br><br>

            <li>SELECT d.Name, dc.Contact_No FROM dept_contact dc, department d, works_on wo, assignment a <br>
                WHERE d.Department_Code = dc.Department_Code AND d.Department_Code = wo.Department_Code <br> 
                AND a.Project_ID = wo.Project_ID AND a.Project_ID = '00001';</li>
            <input type="submit" value="Execute Query" name="select3"><br><br>

        </ol>
        </form>

    <h3>INSERT Queries</h3>
        <form action="insert_queries.php" method="POST">
        <ol>
            <li>INSERT INTO employee VALUES(
                <input type="text" maxlength="5" size="2" name="in1_eID" placeholder="EmpID">, 
                <input type="text" maxlength="30" size="25" name="in1_name" placeholder="Name">, 
                <input type="text" maxlength="12" size="10" name="in1_NIC" placeholder="NIC">,
                <input type="text" maxlength="70" size="40" name="in1_address" placeholder="Address">,
                <input type="date" name="in1_dob" placeholder="DOB">,
                <input type="text" maxlength="5" size="3" name="in1_deptCode" placeholder="DEPT">,
                <input type="text" maxlength="3" size="2" name="in1_branchID" placeholder="BR">
            );</li>
                <input type="submit" value="Execute Query" name="insert1"><br><br>
            
            <li>INSERT INTO branch VALUES(
                <input type="text" maxlength="3" size="2" name="in2_branchID" placeholder="Br. ID">, 
                <input type="text" maxlength="30" size="25" name="in2_name" placeholder="Branch Name">,
                <input type="text" maxlength="50" size="30" name="in2_location" placeholder="Location">,
                <input type="text" maxlength="5" size="4" name="in2_area" placeholder="Area">
            );</li>
                <input type="submit" value="Execute Query" name="insert2"><br><br>


        </ol>
        </form>

        <h3>UPDATE Queries</h3>
        <form action="update_queries.php" method="POST">
        <ol>
            <li> UPDATE employee SET name = '<input type="text" maxlength="30" size="25" name="upd1_name" placeholder="Name">' 
                WHERE employee_id = '<input type="text" maxlength="5" size="2" name="upd1_eID" placeholder="EmpID">';
            </li>
            <input type="submit" value="Execute Query" name="update1"><br><br>

            <li> UPDATE -table- SET -attribute- = ' ' 
                WHERE -attribute2- = ' ';
            </li>
            <input type="submit" value="Execute Query" name="update2"><br><br>

        </ol>
        </form>

        <h3>DELETE Queries</h3>
        <form action="delete_queries.php" method="POST">
        <ol>
            <li> DELETE FROM employee WHERE employee_id = '<input type="text" maxlength="5" size="2" name="del1_eID" placeholder="EmpID">';
            </li>
            <input type="submit" value="Execute Query" name="delete1"><br><br>

            <li> DELETE FROM -table- WHERE -attribute- = ' ';
            </li>
            <input type="submit" value="Execute Query" name="delete2"><br><br>

        </ol>
        </form>

        
</body>
</html>