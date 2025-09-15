<?php //this opens the php code section

echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html
    echo "<head>";  // opening head

    echo "<title>page 4</title>";  // creating title
    echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>";// getting css formatting for website from external

    echo "</head>";
    echo "<body>"; // opening body

        echo "<div class ='container'>";// class container to give all items a default to reduce need for styling later
            require_once "assets/topbar.php";// presenting header
            require_once "assets/nav.php";// presenting navigation bar

            echo "<div class ='content'>"; // class context to give all items that give information an overall css to reduce need for styling later and standardise formatting
                echo "<img src='images/login.jpg' id='login_image'>";//adding image to screen
                echo "<form method='post' action=''>"; // opening form

                    echo "<br>"; // line break

                    echo "<input type= 'text' name = 'username' placeholder='username'>"; // input box
                    echo "<br>"; // line break

                    echo "<input type= 'text' name = 'password' placeholder='password'>"; // input box
                    echo "<br>"; // line break

                    echo "<input type= 'text' name = 'password2' placeholder='confirm password'>"; // input box
                    echo "<br>"; // line break

                    echo "<input type= 'text' name = 'email' placeholder='email'>"; // input box
                    echo "<br>"; // line break

                    echo "<input type= 'submit' name = 'submit' value='add email'>"; // input box
                    echo "<br>"; // line break

                    if ($_SERVER["REQUEST_METHOD"] === "POST") {  //  super global from php using full caps and can be used anywhere
                        echo "welcome back: ". $_POST["username"]; // showing what user submitted

                    }

                echo "</form>";



            echo "</div>";

        echo "</div>";

    echo "</body>";

echo "</html>";
?>