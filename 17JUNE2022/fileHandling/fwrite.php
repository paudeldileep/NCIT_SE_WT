<?php
$filename = "files/students.txt";
//check if file exists or not
if (file_exists($filename)) {
    //write to file
    echo "file found";
    $file = fopen($filename, "a");
    $content = "\nName:Abhishek Phone:9876543210";
    $bytes_written = fwrite($file, $content);
    echo "Bytes written:" . $bytes_written;
    fclose($file);
} else {
    //create file
    $file = fopen($filename, "w");
}
