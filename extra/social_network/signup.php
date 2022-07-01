<?php
//check for errors and form data after redirection
$error = '';
$name = '';
$email = '';
$dob = '';
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $dob = $_GET['dob'];
}

?>

<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>

<body>
    <div class="signup_box">
        <h1>SIGN UP</h1>
        <p class="error">
            <?php echo $error; ?>
        </p>
        <form action="process_signup.php" method="POST" enctype="multipart/form-data">
            <div class="form_row">
                <label> Name:</label>
                <input type="text" name="user_name" class="form_input" value="<?php echo $name ?>">
            </div>
            <div class="form_row">
                <label> Email:</label>
                <input type="email" name="user_email" class="form_input" value="<?php echo $email ?>">
            </div>
            <div class="form_row">
                <label> Password:</label>
                <input type="password" name="user_password" class="form_input">
            </div>
            <div class="form_row">
                <label>Date of Birth:</label>
                <input type="date" name="user_dob" class="form_input" value="<?php echo $dob ?>">
            </div>
            <div class="form_row">
                <label> User Image :</label>
                <input type="file" name="user_image" class="form_input">
            </div>
            <div class="form_row">
                <input type="submit" name="submit" class="form_submit">
            </div>
        </form>
    </div>
</body>

</html>