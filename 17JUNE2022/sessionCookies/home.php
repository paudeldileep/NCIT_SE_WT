<?php

//check for existing cookie
if (isset($_COOKIE['useremail'])) {
    echo "Welcome " . $_COOKIE['useremail'];
} else {
    header('Location: ../signin.php');
}
