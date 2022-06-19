<?php
//check if form submitted or not
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "form submitted";
} else {
    echo "form not submitted";
    echo "go back and fill the form";
    echo "<a href='form.php'>Go back</a>";
}
//print_r($_POST);
