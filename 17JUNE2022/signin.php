<?php
$error = '';
//get the error message from url
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

?>

<html>

<head>
    <title>Sign In</title>
</head>

<body>
    <p style="color:red"><?php echo $error ?></p>
    <form action="process_signin.php" method="post">
        <table>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="useremail" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="userpassword" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit" name="submit" /></td>
            </tr>
        </table>
    </form>
</body>

</html>