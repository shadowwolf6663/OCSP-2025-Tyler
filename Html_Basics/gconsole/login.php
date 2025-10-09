<?php //this opens the php code section
session_start();

require_once "assets/dbconn.php";
require_once "assets/common.php";


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
            if (isset($_SESSION["user"])){// checks if a user is logged in
                $_SESSION["usermessage"] = "error: you are already logged in"; // prints message for user
                header("Location: index.php");// sends user back to main
                exit;}//stops further execution
            elseif($_SERVER['REQUEST_METHOD'] === "POST"){// if other condition isnt met and method = post
                $usr=login(dbconnect_insert(),$_POST);
                if ($usr&& password_verify($_POST["password"],$usr["password"])){
                    $_SESSION["user"] = true;
                    $_SESSION["userid"] = $usr["user_id"];
                    $_SESSION["usermessage"] = "login success";
                    auditor(dbconnect_insert(),$_SESSION["userid"],"log","user has succesfully logged in");
                    header("Location: index.php");
                    exit;

                }else{
                    $_SESSION["usermessage"] = "login failed";
                    header("Location: login.php");
                    exit;
                }
                }
            echo "<form method='post' action=''>";
            echo "<input type= 'text'name ='username' placeholder='username'>";
            echo "<br>";
            echo "<input type= 'password'name ='password' placeholder='password'>";
            echo "<br>";
            echo "<input type= 'submit' value='login' id='submit'>";
            echo "</form>";
            echo "<br>";
            echo user_message();


        echo "</div>";

        echo "</div>";

    echo "</body>";

echo "</html>";
?>
