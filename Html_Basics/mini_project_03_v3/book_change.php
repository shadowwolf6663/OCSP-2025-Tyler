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

if (!isset($_SESSION["user"]  )and(!isset($_SESSION["staff"]) )) {// checks if a user is logged in to reduce attack vectors
    $_SESSION["usermessage"] = "You must be logged in to access this page!";
    header("Location: index.php");
    exit;
}
elseif ($_SERVER["REQUEST_METHOD"] === "POST") {// checks request method
    try {// trys to run this code
        $tmp=$_POST["appt_date"]. ' '.$_POST["appt_time"];
        $epoch = strtotime($tmp);
        echo $epoch." seconds";
        echo "<br>";
        echo "current: ".time()." seconds";
        if(book_update(dbconnect_update(),$_SESSION['bookingid'], $epoch)){
            $_SESSION["usermessage"] = "created booking";// assigning message
            if (isset($_SESSION["user"])){
                auditor(dbconnect_insert(),$_SESSION['patient_id'],"alt","altered the booking");
                header("Location: bookings.php");
                exit;
            }else{
                staffauditor(dbconnect_insert(),$_SESSION['doctor_id'],"alt","altered the booking");
                header("Location: staff_bookings.php");
                exit;
            }
        }else{
            $_SESSION["usermessage"] = "failed to create booking";// assigning message
        }
             auditor(dbconnect_insert(),$_SESSION['patient_id'],"bok","created new booking");

        echo user_message();// echo message to screen
    } catch (Exception $e){//if code has an error catch it as $e

        $_SESSION["usermessage"]="ERROR: Could not create booking: ".$e->getMessage();// make a message for user with error
        throw $e;// throw error to screen

    }

}

$book=book_fetch(dbconnect_select(),$_SESSION["bookingid"]);//should have a try except around this isnce it calls a subroutine that may fail
echo "<form method='post' action=''>";// opens a form
$doctor=staff_getter(dbconnect_select());
$book_time=date('h:i:s',$book["dateofbooking"]);
$book_date=date('Y-m-d',$book["dateofbooking"]);
    echo "<label for ='appt_time'>appointment time: </labelfor></label>";
    echo "<input type= 'time' name ='appt_time' value = '".$book_time. "'>";// creates input box
    echo "<br>";// breaks to next line
echo "<label for ='appt_date'>appointment time: </labelfor></label>";
echo "<input type= 'date' name ='appt_date' value = '".$book_date. "'>";// creates input box
if (isset($_SESSION["user"])) {
    echo "<select name='staff'>";
    foreach ($doctor as $staff) {
        if ($staff['role'] = "doc") {
            $role = 'doctor';
        } else if ($staff['role'] = "nur") {
            $role = 'nurse';
        }
        if ($book['doctorid'] == $staff['doctorid']) {
            $selected = 'selected';
        } else {
            $selected = '';
        }
        echo "<option  value =" . $staff['doctorid'] . ">" . $selected . " " . $role . " " . $staff['staff_first'] . "room " . $staff['room'] . "</option>";

    }
    echo "</select>";
}else{
    echo "<input type='hidden' name='staff' value='".$_SESSION['doctor_id']."'>";
}




    echo "<input type= 'submit' value='book appointment' id='submit'>";// creates input box
echo "</form>";


echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>

