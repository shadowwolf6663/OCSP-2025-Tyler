<?php
echo "<div class='navi'>";//declares class
    echo "<nav>";

        echo "<ul>";//declares unordered list
if (isset($_SESSION["user"])) {// checks if a user is logged in to reduce attack vectors
    echo "<li><a href='index.php'>main</a></li>";
    echo "<li><a href='book.php'>book</a></li>";
    echo "<li><a href='bookings.php'>bookings</a></li>";
    echo "<li><a href='register_patient.php'>register</a></li>";
    echo "<li><a href='view_audit.php'>view audit log</a></li>";
    echo "<li><a href='change_password.php'>change password</a></li>";
    echo "<li><a href='change_details.php'>change details</a></li>";
    echo "<li><a href='logout.php'>logout</a></li>";

}elseif(isset($_SESSION["staff"])){
    echo "<li><a href='index.php'>main</a></li>";
    echo "<li><a href='staff_bookings.php'>bookings</a></li>";
    echo "<li><a href='register_staff.php'>register</a></li>";
    echo "<li><a href='view_audit_staff.php'>view audit log</a></li>";
    echo "<li><a href='change_password_staff.php'>change password</a></li>";
    echo "<li><a href='change_details_staff.php'>change details</a></li>";
    echo "<li><a href='staff_logout.php'>logout</a></li>";
}
else {
    echo "<li><a href='index.php'>main</a></li>";
    echo "<li><a href='login.php'>login</a></li>";
    echo "<li><a href='staff_login.php'>staff login</a></li>";

}
        echo "</ul>";//closes list

    echo "</nav>";
echo "</div>";
?>