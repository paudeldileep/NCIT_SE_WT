<?php
//math functions test
$a = 10;
$b = 5.4;

echo "the floor of $b is " . floor($b) . "<br>";

echo "some random number is " . rand(1, 100) . "<br>";
//use of srand()
//srand(time());

echo "some random number is " . rand(1, 100) . "<br>";

//min and max
$numbers = array(2, 3, 4, 5, 6);
echo "the minimum values is " . min($numbers);
