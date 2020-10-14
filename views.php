<?php 
    session_start();
?>

<Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Bank of Asia - View Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/query_style.css">
</head>
<body>
	 
    <div class="wrapper">
    <div class="header">
        <table width="100%" >
            <tr>
            <td width="40%">
                <?php
                    echo "<h3>Signed in as:&nbsp; <em>" . $_SESSION["type"] . "</em> &nbsp;  &nbsp;  &nbsp; Username:&nbsp; <em>" . $_SESSION["username"] . "</em></h3>"; 
                ?>
            </td>
            <td width="30%"><h2>View Page</h2></td>
            <td width="20%"><h3><a href="queries.php">Query Page</a></h3></td>
            <td width="10%">
                <h3 align="center"><a href = "logout.php">Sign Out</a></h3>
            </td>
            </tr>

        </table>
        <br>
        <ol> 
        <form action="run_views.php" method="POST">
            <li>
            <h4>Show to Manager what are the total balances of All the foreign and residential accounts<br>
            Query used to create the view:</h4>
            <pre>
            CREATE VIEW Total_balance AS
            SELECT SUM(foreign_account.Outstanding_Balance) AS Total_balance_of_foreign_accounts,
            SUM(residential_account.Account_Balance) AS Total_balance_of_residential_accounts
            FROM foreign_account, residential_account;
            </pre>    
            SELECT * FROM total_balance;
            </li>
            <input type="submit" value="Execute Query" name="view1"><br><br>

            <li>
            <h4>Show Outstanding Balance for a Customer who has a foreign account<br>
            Query used to create the view:</h4>
            <pre>
            CREATE VIEW Show_outstanding_balance AS
            SELECT customer_account.Branch_ID, customer_account.Customer_ID, account.Account_No,foreign_account.Outstanding_balance
            FROM customer_account, account, foreign_account, customer
            WHERE account.account_No=customer_account.account_No AND 
            account.account_No= foreign_account.account_No
            GROUP BY customer_account.Customer_ID;
            </pre>    
            SELECT * FROM show_outstanding_balance;
            </li>
            <input type="submit" value="Execute Query" name="view2"><br><br>

            <li>
            <h4>Show to Department Head How many permanent employees are getting more than 10,000.00 and their grades<br>
            Query used to create the view:</h4>
            <pre>
            CREATE VIEW Greater_Salaries AS
            SELECT Employee_ID, Basic_Salary, Grade
            FROM permanent_employee 
            WHERE Basic_Salary > 10000.0;
            </pre>    
            SELECT * FROM greater_salaries;
            </li>
            <input type="submit" value="Execute Query" name="view3"><br><br>

        </form>
        </ol>
    </div>
    </div>
</body>
</html>