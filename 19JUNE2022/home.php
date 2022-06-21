<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
} else {

    if (isset($_POST['update'])) {
        include 'connect.php';
        $db = mysqli_select_db($connection, 'se2022');
        $name = $_POST['username'];
        if (!empty($name)) {
            $query = "UPDATE users SET name='$name' ";
            $result = mysqli_query($connection, $query);
            if ($result) {
                $_SESSION['user_name'] = $name;
                header('Location: home.php');
            }
        } else {
            echo "Please enter a name";
        }
    }
    echo '<p>Welcome, ' . $_SESSION['user_name'] . '</p>';
    echo '<p><a href="signout.php">Sign out</a></p>';

?>
    <!-- username update form -->
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <input type="submit" value="Update username" name="update">
    </form>

<?php
}
?>


<!-- https://stackoverflow.com/questions/8923114/how-to-reset-auto-increment-in-mysql -->