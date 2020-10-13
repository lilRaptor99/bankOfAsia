<Doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Password Encryption Test</title>
</head>

<body>

    <h3>Password Encryption Test</h3>

    <?php
        $input = "1234";
        $hashedPwd = password_hash($input, PASSWORD_DEFAULT);
        echo "Password: " . $input . "<br>";
        echo "Hashed password: " . $hashedPwd ."<br>"; 
        echo "Comparison: " . password_verify($input, $hashedPwd) . "<br>";
        $hashedPwd = password_hash($input, PASSWORD_DEFAULT);
        echo "Hashed password2: " . $hashedPwd ."<br>"; 
        echo "Comparison2: " . password_verify($input, $hashedPwd) . "<br>";
    ?>

</body>

</html>