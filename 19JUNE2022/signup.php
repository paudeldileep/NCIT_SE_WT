<?php


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
                        <td><input type="text" name="username" /></td>
                    </tr>
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
        </div>
    </div>
</body>


</html>