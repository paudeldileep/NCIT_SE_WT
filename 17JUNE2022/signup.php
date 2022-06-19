<?php
//check errors in url
if (isset($_GET['errors'])) {
    $errors = unserialize($_GET['errors']);
    //output errors
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li style='color:red'>$error</li>";
    }
    echo "</ul>";
}

$formdata = array();

if (isset($_GET['formdata'])) {
    $formdata = unserialize($_GET['formdata']);
}

?>

<html>

<head>
    <title>Signup</title>
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css"> -->
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Signup</h1>
        </div>
        <div class="content">
            <form action="process_signup.php" method="post">
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="username" value="<?php if (isset($formdata['username'])) echo $formdata['username'] ?>" /></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="useremail" value="<?php if (isset($formdata['useremail'])) echo $formdata['useremail'] ?>" /></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="text" name="userpassword" value="<?php if (isset($formdata['userpassword'])) echo $formdata['userpassword'] ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Submit" name="submit" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>


</html>