<?php //this opens the php code section

session_start();

require_once "assets/common.php";

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $_SESSION["message"] = $_POST["input"];

}

echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html
    echo "<head>";  // opening head

    echo "<title>session work</title>";  // creating title
    echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>";// getting css formatting for website from external

    echo "</head>";
    echo "<body>"; // opening body


        echo "<div class ='container'>"; // class container to give all items a default to reduce need for styling later
            require_once "assets/topbar.php"; // presenting header
            require_once "assets/nav.php";// presenting navigation bar

            echo "<div class ='content'>"; // class context to give all items that give information an overall css to reduce need for styling later and standardise formatting
                echo user_msg();
                echo "<h2>session work</h2>";

                //form takes user input stores in session to be outputted elsewhere

                echo "<form method='post' action=''>";

                echo "<input type='text' name='input' placeholder='input'>";
                echo "<input type='submit' name='submit' value='submit'>";

                echo "</form>";

            echo "</div>";

        echo "</div>";

    echo "</body>";

echo "</html>";
?>