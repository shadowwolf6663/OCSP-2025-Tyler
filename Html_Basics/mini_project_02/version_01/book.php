<?php //this opens the php code section

echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html
    echo "<head>";  // opening head

    echo "<title>page 4</title>";  // creating title
    echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>"; // getting css formatting for website from external

    echo "</head>";
    echo "<body>"; // opening body


        echo "<div class ='container'>";// class container to give all items a default to reduce need for styling later
            require_once "assets/topbar.php";// presenting header
            require_once "assets/nav.php";// presenting navigation bar

            echo "<div class ='content'>"; // class context to give all items that give information an overall css to reduce need for styling later and standardise formatting
                echo "<img src='images/book.jpg'  id='book_image'>";//adding image to screen
                echo "<form method='post' action=''>"; // opening form
                    echo "<br>"; // line break

                    echo "<input type= 'datetime-local' name = 'date' placeholder='date'>"; // input box
                    echo "<br>"; // line break

                    echo "<input type= 'text' name = 'location' placeholder='location'>"; // input box
                    echo "<br>"; // line break

                    echo "<input type= 'text' name = 'tutor' placeholder='tutor'>"; // input box
                    echo "<br>"; // line break

                    echo "<label for='english'>english</label>";// adding label to identify what the box is for
                    echo "<input type= 'radio' name = 'subject' value='english' id='checkbox'>"; // input box

                    echo "<label for='math'>math</label>";// adding label to identify what the box is for
                    echo "<input type= 'radio' name = 'subject' value='math' id='checkbox'>"; // input box

                    echo "<label for='science'>science</label>";// adding label to identify what the box is for
                    echo "<input type= 'radio' name = 'subject' value='science' id='checkbox'>"; // input box
                    echo "<br>"; // line break

                    echo "<input type= 'submit' name = 'submit' value='confirm' id='checkbox'>"; // input box
                    echo "<br>"; // line break

                    if ($_SERVER["REQUEST_METHOD"] === "POST") {  //  super global from php using full caps and can be used anywhere
                        echo "booking made for ". $_POST["date"] ," at ". $_POST["location"]," with ". $_POST["tutor"]," for the subject: ". $_POST["subject"]; // showing what user submitted

                    }

                echo "</form>";



            echo "</div>";

        echo "</div>";

    echo "</body>";

echo "</html>";
?>