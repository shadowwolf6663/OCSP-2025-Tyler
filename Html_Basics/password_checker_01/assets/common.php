<?php // starts php


function num_check(){ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        $_SESSION["strength"] = 0; // setting count variable

        if (preg_match('/[0-9]/',$_SESSION["password"])){ //if condition is met

            $numcheck = "<div id='good'>contains a integer</div>"; // creating a message to be returned
            $_SESSION["strength"]+=1; // increments value
            return $numcheck; // return value to calling function

        } else{ // if no other conditions are met

            $numcheck = "<div id='bad'>doesnt contain a integer</div>"; // creating a message to be returned
            return $numcheck; // return value to calling function

        }   

    }
    else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function len_check(){ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        $length = strlen($_SESSION["password"]);

        if ($length>=8){ //if condition is met

            $lencheck = "<div id='good'>is at least 8 characters</div>"; // creating a message to be returned
            $_SESSION["strength"]+=1; // increments value
            return $lencheck; // return value to calling function

        } else{ // if no other conditions are met

            $lencheck = "<div id='bad'>is not 8 characters in length</div>"; // creating a message to be returned
            return $lencheck; // return value to calling function

        }

    }
    else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function upper_check(){ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (preg_match('/[A-Z]/',$_SESSION["password"])){ //if condition is met

            $upper_check = "<div id='good'>contains uppercase</div>"; // creating a message to be returned
            $_SESSION["strength"]+=1; // increments value
            return $upper_check; // return value to calling function

        } else{ // if no other conditions are met

            $upper_check = "<div id='bad'>doesnt contain uppercase</div>"; // creating a message to be returned
            return $upper_check; // return value to calling function

        }

    }
    else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function lower_check(){ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (preg_match('/[a-z]/',$_SESSION["password"])){ //if condition is met

            $lower_check = "<div id='good'>contains lowercase</div>"; // creating a message to be returned
            $_SESSION["strength"]+=1; // increments value
            return $lower_check; // return value to calling function

        } else{ // if no other conditions are met

            $lower_check = "<div id='bad'>doesnt contain lowercase</div>"; // creating a message to be returned
            return $lower_check; // return value to calling function

        }

    }
    else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function special_check(){ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (preg_match('/[^a-zA-Z0-9_]/', $_SESSION["password"])) { //if condition is met

            $special_check = "<div id='good'>contains a special character</div>"; // creating a message to be returned
            $_SESSION["strength"] += 1; // increments value
            return $special_check; // return value to calling function

        } else { // if no other conditions are met
            $special_check = "<div id='bad'>doesn’t contain a special character</div>"; // creating a message to be returned
            return $special_check; // return value to calling function
        }

    } else { // if no other conditions are met
        return ""; // return value to calling function
    }
}


function first_special_check(){ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (!preg_match('/[a-zA-Z0-9_]/',$_SESSION["password"][0])) { //if condition is met

            $first_special_check = "<div id='bad'>first character  is special</div>"; // creating a message to be returned
            return $first_special_check; // return value to calling function

        } else{ // if no other conditions are met

            $first_special_check = "<div id='good'>first character isn't special</div>"; // creating a message to be returned
            $_SESSION["strength"]+=1; // increments value
            return $first_special_check; // return value to calling function

        }

    }
    else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function last_special_check(){ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (!preg_match('/[a-zA-Z0-9_]/',$_SESSION["password"][strlen($_SESSION["password"])-1])){ //if condition is met

            $last_special_check = "<div id='bad'>last character is special</div>"; // creating a message to be returned
            return $last_special_check; // return value to calling function

        } else{ // if no other conditions are met
            $last_special_check = "<div id='good'>last character isn't special</div>";  // creating a message to be returned
            $_SESSION["strength"]+=1; // increments value
            return $last_special_check; // return value to calling function

        }

    }
    else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function common_check(){ // declaring function

    $common_words=["password","qwerty"]; // list of common passwords

    if (isset($_SESSION["password"])) { // checks variable has been set //if condition is met

        foreach ($common_words as $word) { // iterates through all items in the list

            if (str_contains($_SESSION["password"], $word) ) { //if condition is met

                $common_check = "<div id='bad'>contains common password, ".$word."</div>"; // creating a message to be returned
                return $common_check; // return value to calling function

            }
        }

        $common_check = "<div id='good'>doesnt contain a common password</div>"; // creating a message to be returned
        $_SESSION["strength"] += 1; // increments value
        return $common_check; // return value to calling function

    }
    else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function first_num_check(){ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (!preg_match('/[0-9]/',$_SESSION["password"][0])){ //if condition is met

            $first_num_check = "<div id='good'>first character isn't a number</div>"; // creating a message to be returned
            $_SESSION["strength"]+=1; // increments value
            return $first_num_check; // return value to calling function

        } else{ // if no other conditions are met

            $first_num_check = "<div id='bad'>first character is a number</div>"; // creating a message to be returned
            return $first_num_check; // return value to calling function

        }

    }
    else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function strength_check(){ // declaring function

    if (isset($_SESSION["password"])) { //if condition is met

        $_SESSION["password"] = ""; // blanks value
        unset($_SESSION["password"]); // unsets value

        if ($_SESSION["strength"] >=8){ //if condition is met

            $strength="<div id= 'good'> strength of password: ".$_SESSION["strength"]. "/9</div> "; // creating a message to be returned
        }
        elseif($_SESSION["strength"] >=4){ // if other condition isn't met but this condition is met

            $strength="<div id= 'medium'> strength of password: ".$_SESSION["strength"]. "/9</div> "; // creating a message to be returned
        }
        else{ // if no other conditions are met

            $strength="<div id= 'bad'> strength of password: ".$_SESSION["strength"]. "/9</div> "; // creating a message to be returned
        }

        return $strength; // return value to calling function

    }
    else{ // if no other conditions are met
        return ""; // return value to calling function
    }
}

?>