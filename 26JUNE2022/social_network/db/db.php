<?php
// create db social_network
include_once 'connect.php';

//create db if not exists
$query = "CREATE DATABASE IF NOT EXISTS social_network";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query failed." . mysqli_error($connection));
}
