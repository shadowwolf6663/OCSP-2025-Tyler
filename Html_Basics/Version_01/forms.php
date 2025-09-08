<?php
echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html

echo "<head>";  // opening head

echo "<title>forms</title>";
echo "<link rel='stylesheet' href=css\styles.css' />";

echo "</head>";

echo "<body>";
echo "<h1>forms</h1>";
echo "<form method='post' action=''>";
echo "<label for='num'>no of tickets</label>";
echo "<br>";
echo "<input type= 'text' name = 'num' id = 'num' placeholder='number of tickets'>required";
echo "<input type= 'password' name = 'password' placeholder='password'>required";
echo "<br>";
echo "<input type= 'submit' name = 'submit' value='login'>";

echo "</form>";

echo "</body>";

echo "</html>";

?>