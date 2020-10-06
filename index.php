<!Doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Bank of Asia - Login</title>
</head>
<body>
    <div align="center">
    <h1>Welcome to Bank of Asia</h1> <br>
    <h2>Login to Continue</h2> <br>
    
	<form action="login.php" method="post">
        <label for="userType" style="font-weight: bold;">Select User Type  :</label>
        <select name="userType">
            <option value="Customer">Customer</option>
            <option value="Employee">Employee</option>
            <option value="Entry Operator">Entry Operator</option>
            <option value="Head of Department">Head of Department</option>
            <option value="Manager">Manager</option>
            <option value="Administrator">Administrator</option>
        </select> <br><br>
        <label for="userName">Username:</label>
        <input type="text" id="userName" name="userName"><br><br>
        <label for="pwd">Password:</label>
        <input type="password" id="pwd" name="pwd"><br><br>
        <input type="submit" value="Login">
      </form>
    </div>
</body>
</html>