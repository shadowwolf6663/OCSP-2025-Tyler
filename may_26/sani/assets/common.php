<?php

function user_msg(){
    if(isset($_SESSION["message"])){ // checks variable has been set
        $message = "message: ".$_SESSION["message"]; // stored
        $sanitized=filter_var($_SESSION["message"],FILTER_SANITIZE_STRING);
        $message = "message: ".$_sanatized["message"]; // stored
        $_SESSION["message"] = "";
        unset($_SESSION["message"]);
        return $message;

    }

    if(isset($_SESSION["message"])){ // checks variable has been set
        $message = "message: ".$_SESSION["message"]; // stored
        $sanitized=filter_var($_SESSION["message"],FILTER_SANITIZE_STRING);
        $message = "message: ".$_SESSION["message"]; // stored
        $_SESSION["message"] = "";
        unset($_SESSION["message"]);
        return $message;

    }

    if(isset($_SESSION["message"])){ // checks variable has been set
        $message = "message: ".$_SESSION["message"]; // stored
        $sanitized=filter_var($_SESSION["message"],FILTER_SANITIZE_STRING);
        $message = "message: ".$_Sanatized; // stored
        $_SESSION["message"] = "";
        unset($_SESSION["message"]);
        return $message;

    }

    else {
        return "";

    }
}


?>