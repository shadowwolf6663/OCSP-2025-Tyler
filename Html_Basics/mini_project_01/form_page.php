<?php
echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html

echo "<head>";  // opening head

echo "<title>forms</title>";
echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>";

echo "</head>";

echo "<body>";
echo "<h1>forms</h1>";


if ($_SERVER["REQUEST_METHOD"] === "POST") {  //  super global from php using full caps and can be used anywhere
    echo "your total tickets: ". $_POST["num"];
    echo "<br>";
    echo "your email: ". $_POST["email"];
    echo "<br>";
    echo "your password: ". $_POST["password"];
    echo "<br>";
    echo "your password confirmation: ". $_POST["password2"];
    echo "<br>";
    echo "gender: ". $_POST["gender"];
    echo "<br>";
}





echo "<a href='index.php'>back</a>";
echo "<br>";
echo "<form method='post' action=''>";
echo "<br>";
echo "<input type= 'text' name = 'num' id = 'num' placeholder='username'>required";
echo "<input type= 'password' name = 'password' placeholder='password'>required";
echo "<input type= 'password' name = 'password2' placeholder='confirm password'>required";
echo "<br>";
echo "<input type= 'text' name = 'email' placeholder='email'>";
echo "<br>";
echo "<label for='male'>male</label>";
echo "<input type= 'radio' name = 'gender' value='male' id='checkbox'>";
echo "<label for='female'>female</label>";
echo "<input type= 'radio' name = 'gender' value='female' id='checkbox'>";
echo "<label for='other'>other</label>";
echo "<input type= 'radio' name = 'gender' value='other' id='checkbox'>";

echo "<br>";
echo "<input type= 'submit' name = 'submit' value='login'>";
echo "<br>";
echo "</form>";
echo "<a href='https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjmtc-DgMmPAxWhX0EAHaAJLsEQtwJ6BAgTEAI&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DdQw4w9WgXcQ&usg=AOvVaw0aHtehaphMhOCAkCydRLZU&opi=89978449'>forgot password?</a>";

echo "</body>";

echo "</html>";

?>