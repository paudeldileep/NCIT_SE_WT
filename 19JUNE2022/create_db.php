<?php
//todo:db creation
//step1.connect to db
include("connect.php");
//step2.create db
//$query="CREATE DATABASE IF NOT EXISTS se2022";
$query = "CREATE DATABASE se2022";

//execute the query
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query failed:" . mysqli_error($connection));
}
