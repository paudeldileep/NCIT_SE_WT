<?php
//credentials to connect to the database
$server = "localhost";
$username = "root";
$password = "";
//connect to db
$connection = mysqli_connect($server, $username, $password);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
