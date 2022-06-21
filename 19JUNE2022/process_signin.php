<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['password'];
    if (empty($useremail) || empty($userpassword)) {
        header('Location: signin.php?error=Empty fields');
    } else {
        //check from db
        include 'connect.php';
        $db = mysqli_select_db($connection, 'se2022');
        if (!$db) {
            die("Database selection failed: " . mysqli_error($connection));
        }
        $userpassword = md5($userpassword);
        $query = "SELECT * FROM users WHERE email='$useremail' AND password='$userpassword'";
        $result = mysqli_query($connection, $query);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);

                //echo '<p>Welcome, ' . $row['name'] . '</p>';
                // extra (not required for exam (for login question))
                //create session
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];

                //redirect to home page
                header('Location: home.php');
            } else {
                header('Location: signin.php?error=Invalid credentials/ User not found');
            }
        } else {
            die("Database query failed: " . mysqli_error($connection));
        }
    }
}
