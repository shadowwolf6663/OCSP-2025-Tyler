<?php

function sanmsg(){

    if (isset($_SESSION["message"])) { // checks variable has been set
        $sanitized = filter_var($_SESSION["message"], FILTER_SANITIZE_STRING);
        $message = "sanitized message: " . $sanitized; // stored
        $_SESSION["message"] = "";
        unset($_SESSION["message"]);
        return $message;

    }

    else {
        return "";

    }
}
function sanint(){

    if (isset($_SESSION["integer"])) { // checks variable has been set
        $sanitized = filter_var($_SESSION["integer"], FILTER_SANITIZE_NUMBER_INT);
        $integer = "sanitized integer: " . $sanitized; // stored
        $_SESSION["integer"] = "";
        unset($_SESSION["integer"]);
        return $integer;

    }

    else {
        return "";

    }
}
function sanflo(){

    if(isset($_SESSION["float"])){ // checks variable has been set
        $sanitized=filter_var($_SESSION['float'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $float = "sanitized float: ".$sanitized; // stored
        $_SESSION["float"] = "";
        unset($_SESSION["float"]);
        return $float;

    }

    else {
        return "";

    }
}


?>