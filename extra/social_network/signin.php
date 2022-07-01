<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
} else {
    //check for error message
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        $useremail = $_GET['useremail'] ?? '';
    } else {
        $error = '';
        $useremail = '';
    }
?>
    <!-- display signin page -->
    <!DOCTYPE html>
    <html>

    <head>
        <title>Sign In</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/signin.css">
    </head>

    <body>
        <div class="container">
            <div class="left_section"></div>
            <div class="right_section">
                <div class="form">
                    <form action="process_authentication.php" method="post">
                        <h1>Sign In</h1>
                        <?php if ($error != '') { ?>
                            <div class="error">
                                <p> <?php echo $error; ?></p>
                            </div>
                        <?php } ?>
                        <input type="email" name="useremail" placeholder="User Email" value="<?php echo $useremail ?>" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="submit" name="signin" value="Sign In">
                        <p>New User?<a href="signup.php">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>


    <?php
}
    ?>