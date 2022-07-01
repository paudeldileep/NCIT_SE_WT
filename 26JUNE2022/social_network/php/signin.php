<?php
session_start();
//if logged in go to home page
//else show signin page
if (isset($_SESSION['user_id'])) {
    //session exists redirect to home
    header('Location: home.php');
} else {
    //get errror mesage
    $error = '';
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
    }
?>
    <!-- for html form -->
    <html>

    <head>

    </head>

    <body>
        <form action="process_signin.php" method="post">
            <p><?php echo $error ?></p>
            <input type="email" name="user_email" placeholder="Email">
            <input type="password" name="user_password" placeholder="Password">
            <input type="submit" value="Sign In">
        </form>
    </body>

    </html>

<?php
}
?>