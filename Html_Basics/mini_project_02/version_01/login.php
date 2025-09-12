<?php //this opens the php code section

echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html
echo "<head>";  // opening head

echo "<title>page 4</title>";  // creating title
echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>";

echo "</head>";
echo "<body>"; // opening body


echo "<div class ='container'>";
    require_once "assets/topbar.php";
    require_once "assets/nav.php";

echo "<div class ='content'>";
echo "<form method='post' action=''>"; // opening form
echo "<br>"; // line break

echo "<input type= 'text' name = 'username' placeholder='username'>"; // input box
echo "<br>"; // line break

echo "<input type= 'text' name = 'password' placeholder='password'>"; // input box
echo "<br>"; // line break

echo "<input type= 'text' name = 'password2' placeholder='confirm password'>"; // input box
echo "<br>"; // line break

echo "<input type= 'text' name = 'email' placeholder='email'>"; // input box
echo "<br>"; // line break

echo "<input type= 'submit' name = 'submit' value='add email'>"; // input box
echo "<br>"; // line break

echo "</form>";



echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>