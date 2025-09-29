<?php //this opens the php code section
require_once "assets/dbconn.php";
require_once "assets/common.php";

if (!isset($_GET["message"])){//checks if a message variable has been set
    session_start();
    $message = False;//sets $message to false to avoid errors when we compare variables later to check for message
}else{
    //decode message for display
    $message = htmlspecialchars(urldecode($_GET["message"]));//decodes message into readable string
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
            echo "<img src = 'images/Place.webp'>";
            if (!$message){
                echo user_message();
            }else{
                echo $message;
            }
            echo "<p>Welcome, gamer! This is where your journey to greatness begins. The right console and gear can take you from “just playing” to owning every challenge that comes your way. It’s not just about the games—it’s about pushing your limits, leveling up your skills, and proving to yourself what you’re really capable of. So power up, stay focused, and get ready to crush it like the champion you are. The game is yours—go make it legendary.</p>";



            echo "</div>";

        echo "</div>";

    echo "</body>";

echo "</html>";
?>