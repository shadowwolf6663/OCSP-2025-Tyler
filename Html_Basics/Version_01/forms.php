<?php
echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html

echo "<head>";  // opening head

echo "<title>forms</title>";
echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>";

echo "</head>";

echo "<body>";
echo "<h1>forms</h1>";
echo "<a href='index.php'>back</a>";
echo "<br>";
echo "<form method='post' action=''>";
echo "<label for='num'>no of tickets</label>";
echo "<br>";
echo "<input type= 'text' name = 'num' id = 'num' placeholder='number of tickets'>required";
echo "<input type= 'password' name = 'password' placeholder='password'>required";
echo "<br>";
echo "<input type= 'submit' name = 'submit' value='login'>";
echo "<br>";
echo "<label for='date'>date</label>";
echo "<input type= 'datetime-local' name = 'date'>";
echo "<br>";
echo "<label for='male'>male</label>";
echo "<input type= 'radio' name = 'gender' value='male' id='checkbox'>";
echo "<label for='female'>female</label>";
echo "<input type= 'radio' name = 'gender' value='female' id='checkbox'>";
echo "<label for='other'>other</label>";
echo "<input type= 'radio' name = 'gender' value='other' id='checkbox'>";
echo "<br>";
echo "</form>";
echo "<a href='https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjmtc-DgMmPAxWhX0EAHaAJLsEQtwJ6BAgTEAI&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DdQw4w9WgXcQ&usg=AOvVaw0aHtehaphMhOCAkCydRLZU&opi=89978449'>forgot password?</a>";
echo "</body>";

echo "</html>";

?>