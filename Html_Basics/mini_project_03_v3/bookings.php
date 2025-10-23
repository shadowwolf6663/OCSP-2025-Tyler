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

if (!isset($_SESSION["user"])) {// checks if a user is logged in to reduce attack vectors
    $_SESSION["usermessage"] = "You must be logged in to access this page!";
    header("Location: index.php");
    exit;
}elseif($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["bookdelete"])){
        try{
            if (cancel_booking(dbconnect_delete(),$_POST["bookingid"])){
                $_SESSION["usermessage"] = "Booking has been deleted successfully!.";
            }else{
                $_SESSION["usermessage"] = "Unable to delete booking!.";
            }
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }elseif(isset($_POST["bookchange"])){
        try{
            $booking=book_fetch(dbconnect_select(),$_POST["bookingid"]);
            if ($booking){
                $_SESSION["bookingid"]=$_POST["bookingid"];
                header("location: book_change.php");
                exit;
            }
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}
else  {// checks request method
    echo user_message();// echo message to screen
    try {// trys to run this code
        $bookings=booking_getter(dbconnect_select());
        if (!$bookings){
            echo "No bookings found!";
        }else {
            echo "<table>";
                echo "<tr>";
                    echo "<th>patient</th>";
                    echo "<th>appt date</th>";
                    echo "<th>doctor</th>";
                    echo "<th>room</th>";
                    echo "<th>completed</th> ";
                    echo "<th>change/delete</th>";
                echo "</tr>";
                foreach ($bookings as $book) {
                    if ($book['role']="doc"){
                        $role="doctor";

                    }elseif ($book['role']="nur"){
                        $role="nurse";
                    }
                    echo "<form method='post' action=''>";
                    echo "<tr>";
                        echo "<td>".$book['patientid']."</td>";
                        echo "<td>date: ".date('M d, Y @ h:i A',$book['dateofbooking'])." </td>";
                        echo "<td>with: ".$role." ".$book['doctor_name']."</td>";
                        echo "<td>in: ".$book['room']."</td>";
                        echo "<td>status: ".$book['completed']."</td>";
                        echo "<td><input type='hidden' name='bookingid' value='".$book['bookingid']."'>
                    <input type='submit' name='bookdelete' value='delete booking'>
                    <input type='submit' name='bookchange' value='change booking'></td>";
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


