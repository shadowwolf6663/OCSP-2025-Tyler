<?php //this opens the php code section
session_start();

require_once "assets/dbconn.php";
require_once "assets/common.php";

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
if (!isset($_SESSION["user"])){// checks if a user is logged in
    $_SESSION["usermessage"] = "error: you are not logged in"; // prints message for user
    header("Location: login.php");// sends user back to main
    exit;}//stops further execution
echo "<br>";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        new_console(dbconnect_insert(), $_POST);
        $_SESSION["usermessage"]="SUCCESS: Console created!";
        auditor(dbconnect_insert(),$_SESSION["userid"],"reg","created new console: ".getnewconsoleid(dbconnect_select(),$_POST["console_name"]));
        echo user_message();

    } catch (Exception $e){

        $_SESSION["usermessage"]="ERROR: Could not create console: ".$e->getMessage();
        throw $e;
    }

}
echo "<br>";
echo "<form method='post' action=''>";
echo "<input type= 'text' name ='console_name' placeholder='console name'>";
echo "<br>";
echo "<input type= 'text' name ='release_date' placeholder='release date'>";
echo "<br>";
echo "<input type= 'number' name ='controller_no' placeholder='controller number'>";
echo "<br>";
echo "<input type= 'text' name ='manufacturer' placeholder='manufacturer'>";
echo "<br>";
echo "<input type= 'number' name ='bit' placeholder='bits'>";
echo "<br>";
echo "<input type= 'submit' value='register console' id='submit'>";
echo "</form>";


echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>

