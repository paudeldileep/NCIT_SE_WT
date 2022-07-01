<?php
//add friend: get friend_id from url
//check session first
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $friend_id = $_GET['friend_id'];
    include 'db/connect.php';
    $db = mysqli_select_db($connection, 'social_network');
    $sql = "INSERT INTO friends (user_id, friend_id) VALUES ($user_id, $friend_id)";
    $result = mysqli_query($connection, $sql);
    //make userid friend of friend id also
    $sql = "INSERT INTO friends (user_id, friend_id) VALUES ($friend_id, $user_id)";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo '<h4 style="margin-left:5px">Friend added</h4>';
    } else {
        echo '<h4 style="margin-left:5px">Failed to add friend</h4>';
    }
} else {
    header('Location: login.php');
}
