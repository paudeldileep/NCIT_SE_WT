<?php
//create table users for social network
include_once 'connect.php';
$db = mysqli_select_db($connection, "social_network");
$query = "CREATE TABLE IF NOT EXISTS users(
    user_id INT(6) AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    user_email VARCHAR(500) NOT NULL UNIQUE,
    user_dob DATE NOT NULL,
    user_password VARCHAR(500) NOT NULL,
    user_image VARCHAR(500) NOT NULL,
    user_reg_date DATETIME NOT NULL,
    user_role VARCHAR(50) NOT NULL
)";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query failed." . mysqli_error($connection));
}
