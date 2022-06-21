<?php
if (isset($_GET['error'])) {
    echo '<p>' . $_GET['error'] . '</p>';
}

?>

<html>

<head>
</head>

<body>
    <form action="process_signin.php" method="post">
        <label for="useremail">useremail:</label>
        <input type="text" name="useremail" id="useremail">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Sign in">
    </form>

</body>

</html>