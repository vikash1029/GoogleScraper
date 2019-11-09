<?php
$servername = "localhost";
$username = "mysql";
$password = "123456";
$dbname = "mysearch";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //sql Create table

    $sql = "CREATE TABLE results (
    id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    search_id varchar(40) NOT NULL ,
    anchor_text varchar(100) NOT NULL ,
    anchor_value varchar(100) NOT NULL ,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table Created Successfully";
}
    catch (PDOException $e)
    {
        echo $sql ."<br>". $e->getMessage();
    }
$conn = null;
?>