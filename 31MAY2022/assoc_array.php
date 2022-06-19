<?php
#associative array example
$heroes = array("ironman" => "tony stark", "spiderman" => "peter parker", "superman" => "clark kent");

//accessing array
echo $heroes["ironman"];

//loops
//1. foreach loop
echo "foreach loop<br>";

foreach ($heroes as $hero_name => $actual_name) {
    echo $hero_name . " : " . $actual_name . "<br>";
}

//extracting keys and values
$keys = array_keys($heroes);
$values = array_values($heroes);

echo "keys: ";
print_r($keys);
echo "<br>";
echo "values: ";
print_r($values);
