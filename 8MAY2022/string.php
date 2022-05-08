<?php
//string functions
$str = "I love Nepal";
$str2 = "I love Nepal";
echo "length:" . strlen($str);

echo "position:" . strpos($str, 'l');

echo "substring:" . substr($str, 2);

$trimmed = trim($str);
echo "length:" . strlen($trimmed);

//compare
if (strcmp($str, $str2) == 0) {
    echo "equal";
} else {
    echo "not equal";
}
