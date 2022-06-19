<?php
//todo: create table for users
//step1.connect to db
include("connect.php");

//step2.select db
$db = mysqli_select_db($connection, "se2022");

//step3.create table
if ($db) {
    $query = "CREATE TABLE users(id INT(6) AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            password VARCHAR(500) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE)";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query failed:" . mysqli_error($connection));
    }
} else {
    die("Database selection failed: " . mysqli_error($connection));
}
