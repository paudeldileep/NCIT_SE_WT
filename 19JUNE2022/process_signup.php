<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['username'];
    $email = $_POST['useremail'];
    $upassword = $_POST['userpassword'];

    //encrypt password
    $upassword = md5($upassword);

    if (!empty($name) && !empty($email) && !empty($upassword)) {
        // connect to database
        include("connect.php");
        $db = mysqli_select_db($connection, "se2022");

        if ($db) {
            $query = "INSERT INTO users(name, password, email) VALUES('$name', '$upassword', '$email')";
            $result = mysqli_query($connection, $query);
            if ($result) {
                echo "Inserted successfully";
            } else {
                echo "Insertion failed" . mysqli_error($connection);
            }
        } else {
            die("Database selection failed: " . mysqli_error($connection));
        }
    } else {
        echo "Please fill in all fields";
    }
} else {
    //redirect
    header("Location: signup.php");
}
