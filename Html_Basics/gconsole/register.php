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


if ($_SERVER["REQUEST_METHOD"] === "POST") {// checks request method
    try {// trys to run this code

         if (user_check(dbconnect_select(), $_POST["username"])){//checking if it returns true

             $_SESSION["usermessage"] = "created user";// assigning message
             reg_user(dbconnect_insert(),$_POST);
             auditor(dbconnect_insert(),getnewuserid(dbconnect_select(),$_POST["username"]),"reg","created new user");



         }else{

             $_SESSION["usermessage"] = "user exists!";// assigning message

         }
        echo user_message();// echo message to screen
    } catch (Exception $e){//if code has an error catch it as $e

        $_SESSION["usermessage"]="ERROR: Could not create console: ".$e->getMessage();// make a message for user with error
        throw $e;// throw error to screen

    }

}


echo "<form method='post' action=''>";// opens a form
    echo "<input type= 'text' name ='username' placeholder='username'>";// creates input box
    echo "<br>"; // breaks to next line
    echo "<input type= 'password' name ='password' placeholder='password'>";// creates input box
    echo "<br>";// breaks to next line
    echo "<input type= 'text' name ='signupdate' placeholder='sign up date'>";// creates input box
    echo "<br>";// breaks to next line
    echo "<input type= 'text' name ='dob' placeholder='date of birth'>";// creates input box
    echo "<br>";// breaks to next line
    echo "<input type= 'text' name ='country' placeholder='county'>";// creates input box
    echo "<br>";// breaks to next line
    echo "<input type= 'submit' value='register' id='submit'>";// creates input box
echo "</form>";


echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>

