<?php
session_start();

    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }

    elseif($_SESSION['usertype']=='admin')
    {
        header("location:login.php");
    }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer Dashboard</title>
</head>
<body>
    <h1>Customer Home</h1>
    <a href="logout.php">Logout</a>
</body>
</html>