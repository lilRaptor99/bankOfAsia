<?php
    // echo $_SESSION['type'];
    // echo $_SESSION['username'];
    // echo $_SESSION['pwd'];

    $userLevel = $_SESSION['type'];
    $dbUser;
    $dbPassword;

    switch ($userLevel) {
        case "Administrator":
            $dbUser = $_SESSION['username'];
            $dbPassword = $_SESSION['pwd'];
            break;

        case "Customer":
            $dbUser = "Customer";
            $dbPassword = "1234";
            break;

        case "Employee":
            $dbUser = "Employee";
            $dbPassword = "1234";
            break;

        case "Entry Operator":
            $dbUser = "Entry_operator";
            $dbPassword = "1234";
            break;
                    
        case "Head of Department":
            $dbUser = "Head_of_department";
            $dbPassword = "1234";
            break;

        case "Manager":
            $dbUser = "Manager";
            $dbPassword = "1234";
            break;
    }
    
    define('DB_SERVER', 'localhost:3306');
    define('DB_USERNAME', $dbUser);
    define('DB_PASSWORD', $dbPassword);
    define('DB_DATABASE', 'boa_db');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if (mysqli_connect_errno()) {
        echo "Failed to connect MySQL: " . mysqli_connect_error();
    }
?>