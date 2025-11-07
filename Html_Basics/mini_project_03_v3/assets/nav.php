<?php
echo "<div class='navi'>";//declares class
    echo "<nav>";// start nav

        echo "<ul>";//declares unordered list
            if (isset($_SESSION["user"])) {// checks if a user is logged in to reduce attack vectors

                echo "<li><a href='index.php'>main</a></li>";  // link to different page
                echo "<li><a href='book.php'>book</a></li>";  // link to different page
                echo "<li><a href='bookings.php'>bookings</a></li>";  // link to different page
                echo "<li><a href='register_patient.php'>register</a></li>";  // link to different page
                echo "<li><a href='view_audit.php'>view audit log</a></li>";  // link to different page
                echo "<li><a href='change_password.php'>change password</a></li>";  // link to different page
                echo "<li><a href='change_details.php'>change details</a></li>";  // link to different page
                echo "<li><a href='logout.php'>logout</a></li>";  // link to different page

            }elseif(isset($_SESSION["staff"])){  // checks if staff is logged in to reduce attack vectors

                echo "<li><a href='index.php'>main</a></li>";  // link to different page
                echo "<li><a href='staff_bookings.php'>bookings</a></li>";  // link to different page
                echo "<li><a href='register_staff.php'>register</a></li>";  // link to different page
                echo "<li><a href='view_audit_staff.php'>view audit log</a></li>";  // link to different page
                echo "<li><a href='change_password_staff.php'>change password</a></li>";  // link to different page
                echo "<li><a href='change_details_staff.php'>change details</a></li>";  // link to different page
                echo "<li><a href='staff_logout.php'>logout</a></li>";  // link to different page

            }
            else { // if no other conditions are met it will execute the following

                echo "<li><a href='index.php'>main</a></li>";  // link to different page
                echo "<li><a href='login.php'>login</a></li>";  // link to different page
                echo "<li><a href='staff_login.php'>staff login</a></li>";  // link to different page

            }
        echo "</ul>";//closes list

    echo "</nav>";
echo "</div>";
?>