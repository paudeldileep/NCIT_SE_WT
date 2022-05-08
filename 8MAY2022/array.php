<?php
//php arrays
//1. numeric array
$colors = array("red", "green", "blue");

//accessing array
//echo $colors[0];

//looping
//1. for loop
echo "for loop<br>";
for ($i = 0; $i < count($colors); $i++) {
    echo $colors[$i] . "<br>";
}

//2.while next
echo "while next loop<br>";

//using current to get first array elemnt
$current = current($colors);
echo $current . "<br>";

while ($c = next($colors)) {
    echo $c . "<br>";
}

//3.foreach
echo "foreach loop<br>";
foreach ($colors as $color) {
    echo $color . "<br>";
}
