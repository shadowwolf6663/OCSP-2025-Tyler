<?php //this opens the php code section
session_start();

require_once "assets/common.php";

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $_SESSION["password"] = $_POST["password"];


}

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

echo "<form method='post' action=''>";

echo "<input type='password' name='password' placeholder='password: '>";

echo "</form>";

echo num_check();
echo len_check();
echo lower_check();
echo upper_check();
echo special_check();
echo first_special_check();
echo last_special_check();
echo common_check();
echo first_num_check();
echo strength_check();



echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>