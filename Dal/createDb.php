<?php
$servername = "localhost";
$user = "mysql";
$password = "123456";

try{
    $conn = new PDO("mysql:host=$servername;", $user, $password);
    //set the pdo error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE mysearch";
    //use exec() because no results are returned
    $conn->exec($sql);
    echo "Database Created Successfully";
}
catch(PDOException $e)
{
    echo $sql ."<br>" . $e->getMessage();
}