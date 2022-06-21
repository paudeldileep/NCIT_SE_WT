<html>

<head>

</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="userimage">User Image:</label>
        <input type="file" name="userimage" id="userimage">
        <input type="submit" value="Upload">
    </form>
</body>

</html>
<?php

if (isset($_FILES['userimage'])) {
    $filename = $_FILES['userimage']['name'];
    $filesize = $_FILES['userimage']['size'];
    $filetype = $_FILES['userimage']['type'];
    $filetmpname = $_FILES['userimage']['tmp_name'];
    $target_path = "images/" . $filename;

    //supported file types
    $supported_types = array('image/jpeg', 'image/gif', 'image/png');

    //check for supported file types
    if (in_array($filetype, $supported_types)) {
        //move the file to the target path
        if (move_uploaded_file($filetmpname, $target_path)) {
            echo "File uploaded successfully";
            //print the file details
            echo "<br>File name: " . $filename;
            echo "<br>File size: " . $filesize;
            echo "<br>File type: " . $filetype;
            echo "<br>File tmp name: " . $filetmpname;
            echo "<br>Target path: " . $target_path;
            echo "<br>";
            echo "<img src='$target_path' width='100' height='100'>";
        } else {
            echo "There was an error uploading the file";
        }
    } else {
        echo "File type not supported";
    }
} else {
    echo "No file selected";
}


?>