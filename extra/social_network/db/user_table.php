<?php
// create table for users : social network
include_once 'connect.php';
$db = mysqli_select_db($connection, "se2022");
$query = "CREATE TABLE IF NOT EXISTS users(
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL,
    user_email VARCHAR(50) NOT NULL,
    user_password VARCHAR(50) NOT NULL,
    user_image VARCHAR(50) NOT NULL,
    user_reg_date TIMESTAMP,
    user_role VARCHAR(50) NOT NULL
)";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query failed." . mysqli_error($connection));
}
