<?php
//multiplication table for a number
$num = 5;

echo "<table border='0'>";

for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    echo "<td>" . $num . "</td>";
    echo "<td>*</td>";
    echo "<td>" . $i . "</td>";
    echo "<td>=</td>";
    echo "<td>" . $num * $i . "</td>";
    echo "</tr>";
}

echo "</table>";
