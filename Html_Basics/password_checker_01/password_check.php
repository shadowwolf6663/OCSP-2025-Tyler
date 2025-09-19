<?php //this opens the php code section
session_start(); // starts session to store values for page

require_once "assets/common.php"; // accesses common to grab my php functions

if ($_SERVER["REQUEST_METHOD"] === 'POST') { // checks input

    $_SESSION["password"] = $_POST["password"]; // setting a session value from inputs

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

            echo "<form method='post' action=''>"; // initiates form

                echo "<input type='password' name='password' placeholder='password: '>"; // input box for password

            echo "</form>";

            echo num_check(); // calls function and echos value returned to screen
            echo len_check(); // calls function and echos value returned to screen
            echo lower_check(); // calls function and echos value returned to screen
            echo upper_check(); // calls function and echos value returned to screen
            echo special_check(); // calls function and echos value returned to screen
            echo first_special_check(); // calls function and echos value returned to screen
            echo last_special_check(); // calls function and echos value returned to screen
            echo common_check(); // calls function and echos value returned to screen
            echo first_num_check(); // calls function and echos value returned to screen
            echo strength_check(); // calls function and echos value returned to screen



            echo "</div>";

        echo "</div>";

    echo "</body>";

echo "</html>";
?>