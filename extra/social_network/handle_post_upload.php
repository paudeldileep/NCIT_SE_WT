<?php

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    include_once 'db/connect.php';
    $db = mysqli_select_db($connection, 'social_network');

    //handle user's post if post button is pressed
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $post_content = '';
        $post_image = '';
        if (isset($_POST['post_status'])) {
            $post_content = $_POST['post_status'];
        }
        if (isset($_FILES['image_post'])) {
            //check for image file
            if ($_FILES['image_post']['name'] != '') {
                $post_image = $_FILES['image_post']['name'];
                $image_post_tmp = $_FILES['image_post']['tmp_name'];
                move_uploaded_file($image_post_tmp, "files/" . $post_image);
            }
        }
        //change date timezone
        date_default_timezone_set('Asia/Kathmandu');
        $post_date = date('Y-m-d H:i:s');
        $post_user_id = $user_id;
        $sql = "INSERT INTO posts (post_content, post_image, post_date, post_user_id) VALUES ('$post_content', '$post_image', '$post_date', '$post_user_id')";
        $result = mysqli_query($connection, $sql);
        if (!$result) {
            $post_error = 'Error: ' . mysqli_error($connection);
            echo $post_error;
        } else {
            echo "Post uploaded successfully";
        }
    } else {
        echo "No post";
    }
} else {
    header('Location: login.php');
}
