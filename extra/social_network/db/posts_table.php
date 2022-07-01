<?php
// create table for user's posts : social network
include_once 'connect.php';
$db = mysqli_select_db($connection, "se2022");
$query = "CREATE TABLE IF NOT EXISTS posts(
    post_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_content VARCHAR(500) NOT NULL,
    post_date TIMESTAMP,
    post_image VARCHAR(50) NOT NULL,
    post_user_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (post_user_id) REFERENCES users(user_id)
)";
