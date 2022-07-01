<?php
// for handling user signup and signin
//for sign in
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
} else {
    // check signin button is pressed
    if (isset($_POST['signin'])) {
        // connect to database
        include 'db/connect.php';
        $db = mysqli_select_db($connection, 'social_network');
        // get user input
        $useremail = $_POST['useremail'];
        $userpassword = $_POST['password'];
        // check if user exists
        $query = "SELECT * FROM users WHERE user_email='$useremail'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == 1) {
            // get user data
            $row = mysqli_fetch_assoc($result);
            $db_id = $row['user_id'];
            $db_username = $row['user_name'];
            $db_password = $row['user_password'];
            // check if password is correct
            if (md5($userpassword) == $db_password) {
                // set session variables
                $_SESSION['user_id'] = $db_id;
                $_SESSION['user_name'] = $db_username;
                // redirect to home page
                header('Location: home.php');
            } else {
                // display error message
                header('Location: signin.php?error=Invalid password&useremail=' . $useremail);
            }
        } else {
            // display error message
            header('Location: signin.php?error=Invalid email&useremail=' . $useremail);
        }
    }
    //for signup

}
