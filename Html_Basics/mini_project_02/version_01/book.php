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

echo "<input type= 'datetime-local' name = 'date' placeholder='date'>"; // input box
echo "<br>"; // line break

echo "<input type= 'text' name = 'location' placeholder='location'>"; // input box
echo "<br>"; // line break

echo "<input type= 'text' name = 'tutor' placeholder='tutor'>"; // input box
echo "<br>"; // line break

echo "<label for='english'>english</label>";
echo "<input type= 'radio' name = 'subject' value='english' id='checkbox'>"; // input box

echo "<label for='math'>math</label>";
echo "<input type= 'radio' name = 'subject' value='math' id='checkbox'>"; // input box

echo "<label for='science'>science</label>";
echo "<input type= 'radio' name = 'subject' value='science' id='checkbox'>"; // input box
echo "<br>"; // line break

echo "<input type= 'submit' name = 'submit' value='confirm' id='checkbox'>"; // input box
echo "<br>"; // line break

echo "</form>";



echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>