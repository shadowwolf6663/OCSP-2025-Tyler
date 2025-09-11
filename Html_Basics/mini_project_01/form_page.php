<?php
echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html

echo "<head>";  // opening head

echo "<title>forms</title>";
echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>";

echo "</head>";

echo "<body>";
echo "<h1>signing up for email notifications</h1>";


if ($_SERVER["REQUEST_METHOD"] === "POST") {  //  super global from php using full caps and can be used anywhere
    echo "your email: ". $_POST["email"]; // showing what user submitted
    echo "<br>"; // line break
    echo "your email has been added"; // showing what user submitted
}


echo "<br>";
echo "<form method='post' action=''>"; // opening form
echo "<br>"; // line break

echo "<input type= 'text' name = 'email' placeholder='email'>"; // input box
echo "<br>"; // line break

echo "<input type= 'submit' name = 'submit' value='add email'>"; // input box
echo "<br>"; // line break

echo "</form>";
echo "<a href='https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjmtc-DgMmPAxWhX0EAHaAJLsEQtwJ6BAgTEAI&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DdQw4w9WgXcQ&usg=AOvVaw0aHtehaphMhOCAkCydRLZU&opi=89978449'>forgot password?</a>"; // reference to another page
echo "<br>"; // line break

echo "<a href='index.php'>back</a>"; // reference to another page
echo "</body>";

echo "</html>";

?>