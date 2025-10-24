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

if (!isset($_SESSION["user"])and(!isset($_SESSION["staff"]))) {// checks if a user is logged in to reduce attack vectors
    $_SESSION["usermessage"] = "You must be logged in to access this page!";
    header("Location: index.php");
    exit;
}
else  {// checks request method
    echo user_message();// echo message to screen
    try {// trys to run this code
        $audit=staff_audit_getter(dbconnect_select());
        if (!$audit){
            echo "No bookings found!";
        }else {
            echo "<table>";
                echo "<tr>";
                    echo "<th>audit-NO</th>";
                    echo "<th>doctorid</th>";
                    echo "<th>code</th>";
                    echo "<th>longdesc</th>";
                    echo "<th>date</th> ";
                echo "</tr>";
                foreach ($audit as $log) {
                    if ($log['code']=="log"){
                        $code="login";

                    }elseif ($log['code']=="bok"){
                        $code="book";
                    }elseif ($log['code']=="reg"){
                        $code="register";
                    }elseif ($log['code']=="lgo"){
                        $code="logout";}
                    elseif ($log['code']=="alt"){
                        $code="altered the booking";
                    }else{
                        $code="error";
                    }
                    echo "<form method='post' action=''>";
                    echo "<tr>";
                        echo "<td>".$log['auditid']."</td>";
                        echo "<td>".$log['doctorid']."</td>";
                        echo "<td>code: ".$code."</td>";
                        echo "<td>description: ".$log['longdesc']."</td>";
                        echo "<td>date: ".date('M d, Y @ h:i A',$log['date'])."</td>";
                    echo "</tr>";
                    echo "</form>";

                }
            echo "</table>";

        }
    } catch (Exception $e){//if code has an error catch it as $e

        $_SESSION["usermessage"]="ERROR: ".$e->getMessage();// make a message for user with error
        throw $e;// throw error to screen

    }

}


echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>


