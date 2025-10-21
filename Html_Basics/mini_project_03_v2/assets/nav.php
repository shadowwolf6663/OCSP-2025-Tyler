<?php
echo "<div class='navi'>";//declares class
    echo "<nav>";

        echo "<ul>";//declares unordered list
if (!isset($_SESSION["user"])) {// checks if a user is logged in to reduce attack vectors
    echo "<li><a href='index.php'>main</a></li>";
    echo "<li><a href='login.php'>login</a></li>";
}
else {

    echo "<li><a href='index.php'>main</a></li>";
    echo "<li><a href='book.php'>book</a></li>";
    echo "<li><a href='bookings.php'>bookings</a></li>";
    echo "<li><a href='register_patient.php'>register</a></li>";
    echo "<li><a href='logout.php'>logout</a></li>";

}
        echo "</ul>";//closes list

    echo "</nav>";
echo "</div>";
?>