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

if (!isset($_SESSION["user"]  )and(!isset($_SESSION["staff"]) )) {// checks if a user is logged in to reduce attack vectors
    $_SESSION["usermessage"] = "You must be logged in to access this page!";
    header("Location: index.php");
    exit;
}
elseif ($_SERVER["REQUEST_METHOD"] === "POST") {// checks request method
    try {// trys to run this code
        $usr = getpassword(dbconnect_select());
        if (($usr && password_verify($_POST["current_psw"], $usr["password"])) and ($_POST["new_psw"] == $_POST["new_psw_verify"])) {
            if (password_update(dbconnect_update(), $_SESSION['patient_id'])) {
                $_SESSION["usermessage"] = "changed password";// assigning message
                if (isset($_SESSION["user"])) {
                    auditor(dbconnect_insert(), $_SESSION['patient_id'], "alt", "altered the booking");
                    header("Location: bookings.php");
                    exit;
                } else {
                    staffauditor(dbconnect_insert(), $_SESSION['doctor_id'], "alt", "altered the booking");
                    header("Location: staff_bookings.php");
                    exit;
                }
            } else {
                $_SESSION["usermessage"] = "failed to create booking";// assigning message
            }
            echo user_message();// echo message to screen
            auditor(dbconnect_insert(), $_SESSION["patient_id"], "log", "user has succesfully logged in");
            header("Location: index.php");
            exit;

        } else {
            $_SESSION["usermessage"] = "login failed";
            header("Location: login.php");
            exit;
        }
        echo user_message();// echo message to screen
    } catch (Exception $e) {//if code has an error catch it as $e

        $_SESSION["usermessage"] = "ERROR: Could not create booking: " . $e->getMessage();// make a message for user with error
        throw $e;// throw error to screen

    }
}
echo "<form method='post' action=''>";// opens a form
    echo "<input type= 'password' name='current_psw' placeholder='current password'>";// creates input box
    echo "<input type= 'password' name='new_psw' placeholder='new password'>";// creates input box
    echo "<input type= 'password' name='new_psw_verify' placeholder='verify new password'>";// creates input box
    echo "<input type= 'submit' value='book appointment' id='submit'>";// creates input box
echo "</form>";


echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>

