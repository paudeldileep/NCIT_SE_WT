<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //variable to store errors
    $errors = array();

    //or store in individual variable like $nameErr='' $emailErr='' $passwordErr=''

    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];

    //validate the values
    if (empty($username)) {
        $errors['username'] = "Name cannot be empty";
    } else {
        if (!preg_match('/^[A-Za-z]+\s[A-Za-z]+(\s[A-Za-z]+)?$/', $username)) {
            $errors['username'] = "Invalid name format";
        }
    }
    if (empty($useremail)) {
        $errors['useremail'] = "Email cannot be empty";
    } else {
        if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
            $errors['useremail'] = "Invalid email format";
        }
    }
    if (empty($userpassword)) {
        $errors['userpassword'] = "Password cannot be empty";
    } else {
        // if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$userpassword)){
        //     $errors['userpassword']="Invalid password format";
        // }
        if (strlen($userpassword) < 6) {
            $errors['userpassword'] = "Password must be at least 6 characters long";
        }
    }

    //check if there are any errors
    if (count($errors) == 0) {
        //no errors
        echo "No errors";
    } else {
        //errors
        //redirect to the form with errors and submitted values
        header('Location: signup.php?errors=' . serialize($errors) . '&formdata=' . serialize($_POST));
        //header('Location:signup.php');
        //pass individual errors
        // header('Location: signup.php?nameErr=' . $nameErr . '&emailErr=' . $emailErr . '&passwordErr=' . $passwordErr);
    }
} else {
    header('Location: signup.php');
}
