<?php

function user_msg(){
    if(isset($_SESSION["message"])){ // checks variable has been set
        if(str_contains($_SESSION["message"], "good")){
            $message = "<div id='good'>message: ".$_SESSION["message"]."</div>"; // stored

        }

        elseif(str_contains($_SESSION["message"], "bad")){
            $message = "<div id='bad'>message: ".$_SESSION["message"]."</div>"; // stored

        }
        else {
            $message = "<div id='none'>message: ".$_SESSION["message"]."</div>"; // stored
        }

        $_SESSION["message"] = "";
        unset($_SESSION["message"]);
        return $message;

    }

    else {
        return "";

    }
}

?>