<?php
// table for user friends
include_once 'connect.php';
$db = mysqli_select_db($connection, "social_network");

$query = "CREATE TABLE IF NOT EXISTS friends(id INT(6) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    friend_id INT(6) NOT NULL
)";

$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query failed." . mysqli_error($connection));
}
