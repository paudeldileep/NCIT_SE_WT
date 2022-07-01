<?php
// process the signup form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //get form values
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $upassword = $_POST['user_password'];
    $dob = $_POST['user_dob'];
    $image = '';
    //check for empty fields
    if (empty($name) || empty($email) || empty($upassword) || empty($dob)) {

        header('Location: signup.php?error=All fields are required' . '&name=' . $name . '&email=' . $email . '&dob=' . $dob);
    } else {
        //check if email is valid, if not, redirect to signup page
        //check if name is valid, if not, redirect to signup page
        //check if password is valid, if not, redirect to signup page
        //check if dob is valid, if not, redirect to signup page

        //check if email is already in use, if so, redirect to signup page
        include_once 'db/connect.php';
        $db = mysqli_select_db($connection, 'social_network');
        $query = "SELECT * FROM users WHERE user_email = '$email'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            header('Location: signup.php?error=Email already in use' . '&name=' . $name . '&email=' . $email . '&dob=' . $dob);
        } else {
            //new user
            //check for image
            if (isset($_FILES['user_image'])) {
                $image_name = $_FILES['user_image']['name'];
                $image_type = $_FILES['user_image']['type'];
                $image_tmp_name = $_FILES['user_image']['tmp_name'];
                $new_image_name = rand(1, 10000) . '_' . $name . '_' . $image_name;
                $image_path = 'files/' . $new_image_name;

                //check for image file type
                $supported_types = array('image/jpeg', 'image/gif', 'image/png');
                // echo $image_type;

                if (in_array($image_type, $supported_types)) {
                    echo 'in array';
                } else {
                    header('Location: signup.php?error=Image file type not supported' . '&name=' . $name . '&email=' . $email . '&dob=' . $dob);
                    return;
                }
            }
            //registration in datetime format with timezone
            //set timezone
            date_default_timezone_set('Asia/Kathmandu');
            $registration_date = date('Y-m-d H:i:s');

            if (move_uploaded_file($image_tmp_name, $image_path)) {
                $image = $new_image_name;
            }

            //encrypt password
            $upassword = md5($upassword);
            //insert user into database
            $query = "INSERT INTO users (user_name, user_email, user_password, user_dob, user_image, user_reg_date,user_role) VALUES ('$name', '$email', '$upassword', '$dob', '$image', '$registration_date','user')";
            $result = mysqli_query($connection, $query);
            if ($result) {
                //redirect to login page
                header('Location: signin.php?error=You are now registered and can log in');
            } else {
                header('Location: signup.php?error=Something went wrong' . '&name=' . $name . '&email=' . $email . '&dob=' . $dob);
            }
        }
    }
} else {
    header("Location: signup.php");
}
