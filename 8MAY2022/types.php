<?php

//integer variable
$age = 25;
//string variable
$name = "John";
//boolean variable
$isStudent = true;
//float variable
$cgpa = 3.4;

//check type
echo gettype($cgpa);

//change type of cgpa
settype($cgpa, "integer");

echo "the cgpa is $cgpa and type is" . gettype($cgpa);
// if (is_int($name)) {
//     echo "name is an integer";
// } else {
//     echo "name is not an integer";
// }
