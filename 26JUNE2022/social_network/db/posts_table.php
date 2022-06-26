<?php
// table for user's post
include_once 'connect.php';
$db = mysqli_select_db($connection, "social_network");
$query = "CREATE TABLE IF NOT EXISTS posts(
    post_id INT(6) AUTO_INCREMENT PRIMARY KEY,
    post_content VARCHAR(500) NOT NULL,
    post_date DATETIME NOT NULL,
    post_image VARCHAR(500),
    post_user_id INT(6) NOT NULL,
    FOREIGN KEY (post_user_id) REFERENCES users(user_id)
)";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query failed." . mysqli_error($connection));
}
