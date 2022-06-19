<?php
include("connect.php");
$db = mysqli_select_db($connection, "se2022");

if ($db) {
    $query = "INSERT INTO users(name, password, email) VALUES('abc', 'abc123', 'abc@gmail.com')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "Inserted successfully";
    } else {
        echo "Insertion failed" . mysqli_error($connection);
    }
} else {
    die("Database selection failed: " . mysqli_error($connection));
}
