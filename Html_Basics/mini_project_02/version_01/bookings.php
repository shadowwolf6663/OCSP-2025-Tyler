<?php //this opens the php code section

echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html
    echo "<head>";  // opening head

    echo "<title>page 4</title>";  // creating title
    echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>";// getting style formatting for website from external

    echo "</head>";
    echo "<body>"; // opening body


        echo "<div class ='container'>";// class container to give all items a default to reduce need for styling later
            require_once "assets/topbar.php";// presenting header
            require_once "assets/nav.php";// presenting navigation bar

            echo "<div class ='content'>"; // class context to give all items that give information an overall style to reduce need for styling later and standardise formatting
                echo "<img src='images/current%20booking%20image.png' id='bookings_image'>";//adding image to screen
                echo "<table>";

                    //I added headers for columns

                    echo "<tr>";
                        echo "<th>date</th>";
                        echo "<th>time</th>";
                        echo "<th>location</th>";
                        echo "<th>tutor</th>";
                        echo "<th>subject</th>";
                    echo "</tr>";

                    // I added a bunch of empty rows as no data is input yet since it's only a design and not fully functional

                    echo "<tr>";
                        echo "<td>19/11/2025</td>";
                        echo "<td>14:30</td>";
                        echo "<td>Online</td>";
                        echo "<td>Watkins</td>";
                        echo "<td>Math</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                        echo "<td>N/A</td>";
                    echo "</tr>";


            echo "</table>";




          echo "</div>";

        echo "</div>";

    echo "</body>";

echo "</html>";
?>