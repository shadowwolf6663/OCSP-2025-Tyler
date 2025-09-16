<?php

function user_msg(){
    if(isset($_SESSION["message"])){ // checks variable has been set
        if ($message = "good"){
            $message = "<div id='bad'>message: ".$_SESSION["message"]."</div>"; // stored
        }
        elseif ($message = "bad"){
            $message = "<div id='good'>message: ".$_SESSION["message"]."</div>"; // stored
        }
        else{
            $message = "message: ".$_SESSION["message"]; // stored
        }
        $message = "message: ".$_SESSION["message"]; // stored
        $_SESSION["message"] = "";
        unset($_SESSION["message"]);
        return $message;
    }
    else {
        return "";
    }
}

?>