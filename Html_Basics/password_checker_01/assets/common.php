<?php
$strength=0;
function num_check(){

    if (isset($_SESSION["password"])) { // checks variable has been set
        if (preg_match('/[0-9]/',$_SESSION["password"])){
            $numcheck = "<div id='good'>contains a integer</div>"; // stored
            $GLOBALS['strength']+=1;
            return $numcheck;

        } else{
            $numcheck = "<div id='bad'>doesnt contain a integer</div>"; // stored
            return $numcheck;

        }

    }
    else {
        return "";

    }
}

function len_check(){

    if (isset($_SESSION["password"])) { // checks variable has been set
        $length = strlen($_SESSION["password"]);

        if ($length>=8){
            $lencheck = "<div id='good'>is at least 8 characters</div>"; // stored
            $GLOBALS['strength']+=1;
            return $lencheck;

        } else{
            $lencheck = "<div id='bad'>is not 8 characters in length</div>"; // stored
            return $lencheck;

        }

    }
    else {
        return "";

    }
}

function upper_check(){

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (preg_match('/[A-Z]/',$_SESSION["password"])){
            $upper_check = "<div id='good'>contains uppercase</div>"; // stored
            $GLOBALS['strength']+=1;
            return $upper_check;

        } else{
            $upper_check = "<div id='bad'>doesnt contain uppercase</div>"; // stored
            return $upper_check;

        }

    }
    else {
        return "";

    }
}

function lower_check(){

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (preg_match('/[a-z]/',$_SESSION["password"])){
            $lower_check = "<div id='good'>contains lowercase</div>"; // stored
            $GLOBALS['strength']+=1;
            return $lower_check;

        } else{
            $lower_check = "<div id='bad'>doesnt contain lowercase</div>"; // stored
            return $lower_check;

        }

    }
    else {
        return "";

    }
}

function special_check(){
    if (isset($_SESSION["password"])) { // checks variable has been set

        if (preg_match('/[^a-zA-Z0-9_]/', $_SESSION["password"])) {
            $special_check = "<div id='good'>contains a special character</div>";
            $GLOBALS['strength'] += 1;
            return $special_check;

        } else {
            $special_check = "<div id='bad'>doesn’t contain a special character</div>";
            return $special_check;
        }

    } else {
        return "";
    }
}


function first_special_check(){

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (!preg_match('/[a-zA-Z0-9_]/',$_SESSION["password"][0])) {
            $first_special_check = "<div id='bad'>first character  is special</div>"; // stored
            return $first_special_check;

        } else{
            $first_special_check = "<div id='good'>first character isn't special</div>"; // stored
            $GLOBALS['strength']+=1;
            return $first_special_check;

        }

    }
    else {
        return "";

    }
}

function last_special_check(){

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (!preg_match('/[a-zA-Z0-9_]/',$_SESSION["password"][strlen($_SESSION["password"])-1])){
            $last_special_check = "<div id='bad'>last character is special</div>"; // stored
            return $last_special_check;

        } else{
            $last_special_check = "<div id='good'>last character isn't special</div>"; // stored
            $GLOBALS['strength']+=1;
            return $last_special_check;

        }

    }
    else {
        return "";

    }
}

function common_check(){
    $common_words=["password","qwerty"];

    if (isset($_SESSION["password"])) { // checks variable has been set
        foreach ($common_words as $word) {
            if (str_contains($_SESSION["password"], $word) ) {
                $common_check = "<div id='bad'>contains common password, ".$word."</div>"; // stored
                return $common_check;

            }
        }
        $common_check = "<div id='good'>doesnt contain a common password</div>"; // stored
        $GLOBALS['strength'] += 1;
        return $common_check;

    }
    else {
        return "";

    }
}

function first_num_check(){

    if (isset($_SESSION["password"])) { // checks variable has been set
        if (!preg_match('/[0-9]/',$_SESSION["password"][0])){
            $first_num_check = "<div id='good'>first character isn't a number</div>"; // stored
            $GLOBALS['strength']+=1;
            return $first_num_check;

        } else{
            $first_num_check = "<div id='bad'>first character is a number</div>"; // stored
            return $first_num_check;

        }

    }
    else {
        return "";

    }
}

function strength_check(){
    if (isset($_SESSION["password"])) {
        $_SESSION["password"] = "";
        unset($_SESSION["password"]);
        if ($GLOBALS['strength'] >=6){
            $strength="<div id= 'good'> strength of password: ".$GLOBALS['strength']. "/9</div> ";
        }
        elseif($GLOBALS['strength'] >=3){
            $strength="<div id= 'medium'> strength of password: ".$GLOBALS['strength']. "/9</div> ";
        }
        else{
            $strength="<div id= 'bad'> strength of password: ".$GLOBALS['strength']. "/9</div> ";
        }
        return $strength;

    }
}

?>