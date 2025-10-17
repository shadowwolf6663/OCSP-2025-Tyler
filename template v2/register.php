<?php //this opens the php code section
session_start(); // start session

require_once "assets/dbconn.php"; // connects to another file
require_once "assets/common.php"; // connects to another file

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

if (!isset($_SESSION["user"])) {// checks if a user is logged in to reduce attack vectors
    $_SESSION["usermessage"] = "You must be logged in to access this page!";
    header("Location: index.php");
    exit;
}
elseif ($_SERVER["REQUEST_METHOD"] === "POST") {// checks request method
    try {// trys to run this code
             $_SESSION["usermessage"] = "created booking";// assigning message
             book(dbconnect_insert(),$_POST);
             auditor(dbconnect_insert(),$_SESSION['id'],"bok","created new booking");
        echo user_message();// echo message to screen
    } catch (Exception $e){//if code has an error catch it as $e

        $_SESSION["usermessage"]="ERROR: Could not create booking: ".$e->getMessage();// make a message for user with error
        throw $e;// throw error to screen

    }

}


echo "<form method='post' action=''>";// opens a form

    echo "<input type= 'submit' value='register' id='submit'>";// creates input box
echo "</form>";


echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>

