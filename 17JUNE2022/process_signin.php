

<?php

//check whether this file is accessed after form submission or not
//option 1:  use isset() method :  if(isset($_POST['submit']))
//option 2 : check server request method (GET or POST)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $useremail = '';
    $userpassword = '';
    //check whether the form values are set or not using isset() method
    // if (isset($_POST['useremail'])) {
    //     $useremail = $_POST['useremail'];
    // }
    // if (isset($_POST['userpassword'])) {
    //     $userpassword = $_POST['userpassword'];
    // }

    // if ($useremail && $userpassword) {
    //     echo "Welcome " . $useremail;
    // } else {
    //     echo "Please enter both email and password";
    // }

    //check whether the form values are set or not using empty() method


    if (!empty($_POST['useremail'])) {
        $useremail = $_POST['useremail'];
    }
    if (!empty($_POST['userpassword'])) {
        $userpassword = $_POST['userpassword'];
    }

    if ($useremail && $userpassword) {
        //echo "Welcome " . $useremail;
        //create cookies
        setcookie('useremail', $useremail, time() + 3600);
        //redirect to home
        header('Location: sessionCookies/home.php');
    } else {
        //redirect to signin page with error message
        header('Location: signin.php?error=' . 'Please enter both email and password');
    }
} else {
    //redirect to the signin form
    header('Location: signin.php');
}
