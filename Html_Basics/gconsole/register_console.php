<?php //this opens the php code section
session_start();

echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html
echo "<head>";  // opening head

echo "<title>page title</title>";  // creating title
echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>";// getting css formatting for website from external

echo "</head>";
echo "<body>"; // opening body


echo "<div class ='container'>"; // class container to give all items a default to reduce need for styling later
require_once "assets/topbar.php"; // presenting header
require_once "assets/nav.php";// presenting navigation bar

echo "<div class ='content'>"; // class context to give all items that give information an overall css to reduce need for styling later and standardise formatting
echo "<form method='post' action='login.php'>";
echo "<input type= 'text' name ='console_name' placeholder='console name'>";
echo "<br>";
echo "<input type= 'text' name ='release_date' placeholder='release date'>";
echo "<br>";
echo "<input type= 'number' name ='controller_no' placeholder='controller number'>";
echo "<br>";
echo "<input type= 'text' name ='manufacturer' placeholder='manufacturer'>";
echo "<br>";
echo "<input type= 'number' name ='bits' placeholder='bits'>";
echo "<br>";
echo "<input type= 'submit' value='register console' id='submit'>";
echo "</form>";


echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>

