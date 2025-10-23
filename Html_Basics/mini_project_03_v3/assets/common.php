<?php

function commit_booking($conn,$epoch){
    $sql="INSERT INTO bookings (patientid,doctorid,dateofbooking,completed) VALUES (?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $bool="False";
    $stmt->bindparam(1,$_SESSION['patient_id']);
    $stmt->bindparam(2,$_POST['staff']);
    $stmt->bindparam(3,$epoch);
    $stmt->bindparam(4,$bool);
    $stmt->execute();
    $conn=null;
    return True;

}

function cancel_booking($conn,$bookid){
    $sql="DELETE FROM bookings WHERE bookingid=?";
    $stmt=$conn->prepare($sql);
    $stmt->bindparam(1,$bookid);
    $stmt->execute();
    $conn=null;
    return True;
}

function booking_getter($conn){
    $sql = "SELECT b.bookingid,b.dateofbooking,b.completed,d.role,d.doctor_name,d.room,b.patientid FROM bookings b JOIN doctor d on b.doctorid=d.doctorid where b.patientid=? order by b.dateofbooking ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bindparam(1,$_SESSION['patient_id']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn=null;
    return $result;
}

function staff_getter($conn){
    $sql = "SELECT * FROM doctor WHERE role != ? order by role desc";
    $stmt = $conn->prepare($sql);
    $exclude_role="adm";
    $stmt->bindparam(1, $exclude_role);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn=null;
    return $result;

}



function new_console($conn, $post)
{

    $sql = "INSERT INTO patient(first_name,middle_name,second_name,gender,age,password) VALUES(?,?,?,?,?,?)";// doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepare to sql

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $hpsw=password_hash($post['password'],PASSWORD_DEFAULT);
    $stmt->bindparam(1,$post['patient_first']);
    $stmt->bindparam(2,$post['patient_middle']);
    $stmt->bindparam(3,$post['patient_second']);
    $stmt->bindparam(4,$post['gender']);
    $stmt->bindparam(5,$post['age']);
    $stmt->bindparam(6,$hpsw);
    $stmt->execute(); // runs the insert query

    $conn = null;
}
//catches all errors  and throws an error message to screen


function user_check($conn, $username){
    try {
        $sql = "SELECT username FROM  user WHERE username=?";// doing a prepared statement by sending values separately, bound separately
        $stmt = $conn->prepare($sql);
        // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
        $stmt->bindparam(1, $username);
        $stmt->execute(); // runs the insert query
        $result = $stmt->fetch(PDO::FETCH_ASSOC);//fetchs values returned by the executed sql
        $conn = null;
        if ($result) {// checks if a value was fetched
            return false;//returns false
        } else {
            return true;//returns true
        }
        //catches all errors  and throws an error message to screen
    }catch(PDOException $e){
        error_log($e->getMessage());
        throw new exception($e);
    } catch(Exception $e){
        error_log($e->getMessage());
        throw new exception($e);

    }

}


function reg_user($conn, $post){//creates function
    if (user_check(dbconnect_select(), $post["username"])) {//checks if user exists
        try{
            $sql = "INSERT INTO user(username,password,signupdate,dob,country) VALUES(?,?,?,?,?)";//creates a sql line
            $stmt = $conn->prepare($sql);// prepares sql statement with connection to database
            $hpswd = password_hash($post["password"], PASSWORD_DEFAULT);// hashes password using inbuilt php function
            //forced to use password default as we have no other available  hashing ways in this environment  if this was a production system I would use better ways such as argon2i for better security
            // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
            $stmt->bindparam(1, $post["username"]);
            $stmt->bindparam(2, $hpswd);
            $stmt->bindparam(3, $post["signupdate"]);
            $stmt->bindparam(4, $post["dob"]);
            $stmt->bindparam(5, $post["country"]);
            $stmt->execute();//executes sql statement
            $conn = null;// terminates connection to database

            //catches all errors  and throws an error message to screen
        }catch(PDOException $e){
            error_log($e->getMessage());// logs error
            throw new exception($e);
        } catch(Exception $e){
            error_log($e->getMessage());// logs error
            throw new exception($e);

        }

    }
}

function auditor($conn, $patientid,$code,$long){
    $sql = "INSERT INTO audit(date,patientid,code,longdesc) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $date = date("Y-m-d");
    $stmt->bindparam(1, $date);
    $stmt->bindparam(2, $patientid);
    $stmt->bindparam(3, $code);
    $stmt->bindparam(4, $long);
    $stmt->execute();
    $conn = null;
    return true;
}

function getnewpatientid($conn,$first_name){
    $sql = "SELECT patientid FROM patient WHERE first_name=?";
    $stmt = $conn->prepare($sql);
    $stmt->bindparam(1, $first_name);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    return $result["patientid"];
}

function login($conn, $post){
    try{
        $sql = "SELECT * FROM patient WHERE first_name=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(1, $post["first_name"]);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;
        if($result){
            return $result;
        }else{
            $_SESSION["error"] = "user not found";
            header("Location: login.php");
            exit;
        }
    }catch(PDOException $e){
        error_log($e->getMessage());// logs error
        throw new exception($e);
    } catch(Exception $e){
        error_log($e->getMessage());// logs error
        throw new exception($e);

    }
}


function user_message(){
    if(isset($_SESSION["usermessage"])){
        $message= $_SESSION["usermessage"];
        unset($_SESSION["usermessage"]);
        return  $message;

    }else{
        $message= "";
        return $message;
    }
}

// starts php


function num_check()
{ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        $_SESSION["strength"] = 0; // setting count variable

        if (preg_match('/[0-9]/', $_SESSION["password"])) { //if condition is met

            $_SESSION["strength"] += 1; // increments value

        } else { // if no other conditions are met

            $numcheck = "<div id='bad'>doesnt contain a integer</div>"; // creating a message to be returned
            return $numcheck; // return value to calling function

        }

    } else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function len_check()
{ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        $length = strlen($_SESSION["password"]);

        if ($length >= 8) { //if condition is met

            $_SESSION["strength"] += 1; // increments value

        } else { // if no other conditions are met

            $lencheck = "<div id='bad'>is not 8 characters in length</div>"; // creating a message to be returned
            return $lencheck; // return value to calling function

        }

    } else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function upper_check()
{ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (preg_match('/[A-Z]/', $_SESSION["password"])) { //if condition is met

            $_SESSION["strength"] += 1; // increments value

        } else { // if no other conditions are met

            $upper_check = "<div id='bad'>doesnt contain uppercase</div>"; // creating a message to be returned
            return $upper_check; // return value to calling function

        }

    } else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function lower_check()
{ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (preg_match('/[a-z]/', $_SESSION["password"])) { //if condition is met

            $_SESSION["strength"] += 1; // increments value

        } else { // if no other conditions are met

            $lower_check = "<div id='bad'>doesnt contain lowercase</div>"; // creating a message to be returned
            return $lower_check; // return value to calling function

        }

    } else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function special_check()
{ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (preg_match('/[^a-zA-Z0-9_]/', $_SESSION["password"])) { //if condition is met

            $_SESSION["strength"] += 1; // increments value

        } else { // if no other conditions are met
            $special_check = "<div id='bad'>doesn’t contain a special character</div>"; // creating a message to be returned
            return $special_check; // return value to calling function
        }

    } else { // if no other conditions are met
        return ""; // return value to calling function
    }
}


function first_special_check()
{ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (!preg_match('/[a-zA-Z0-9_]/', $_SESSION["password"][0])) { //if condition is met

            $first_special_check = "<div id='bad'>first character  is special</div>"; // creating a message to be returned
            return $first_special_check; // return value to calling function

        } else { // if no other conditions are met

            $_SESSION["strength"] += 1; // increments value

        }

    } else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function last_special_check()
{ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (!preg_match('/[a-zA-Z0-9_]/', $_SESSION["password"][strlen($_SESSION["password"]) - 1])) { //if condition is met

            $last_special_check = "<div id='bad'>last character is special</div>"; // creating a message to be returned
            return $last_special_check; // return value to calling function

        } else { // if no other conditions are met

            $_SESSION["strength"] += 1; // increments value

        }

    } else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function common_check()
{ // declaring function

    $common_words = ["password", "qwerty"]; // list of common passwords

    if (isset($_SESSION["password"])) { // checks variable has been set //if condition is met

        foreach ($common_words as $word) { // iterates through all items in the list

            if (str_contains($_SESSION["password"], $word)) { //if condition is met

                $common_check = "<div id='bad'>contains common password, " . $word . "</div>"; // creating a message to be returned
                return $common_check; // return value to calling function

            }
        }

        $_SESSION["strength"] += 1; // increments value

    } else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function first_num_check()
{ // declaring function

    if (isset($_SESSION["password"])) { // checks variable has been set

        if (!preg_match('/[0-9]/', $_SESSION["password"][0])) { //if condition is met

            $_SESSION["strength"] += 1; // increments value

        } else { // if no other conditions are met

            $first_num_check = "<div id='bad'>first character is a number</div>"; // creating a message to be returned
            return $first_num_check; // return value to calling function

        }

    } else { // if no other conditions are met

        return ""; // return value to calling function

    }
}

function strength_check()
{ // declaring function

    if (isset($_SESSION["password"])) { //if condition is met

        $_SESSION["password"] = ""; // blanks value
        unset($_SESSION["password"]); // unsets value

        if ($_SESSION["strength"] >= 8) { //if condition is met

            $strength = "<div id= 'good'> strength of password: " . $_SESSION["strength"] . "/9</div> "; // creating a message to be returned
        } elseif ($_SESSION["strength"] >= 4) { // if other condition isn't met but this condition is met

            $strength = "<div id= 'medium'> strength of password: " . $_SESSION["strength"] . "/9</div> "; // creating a message to be returned
        } else { // if no other conditions are met

            $strength = "<div id= 'bad'> strength of password: " . $_SESSION["strength"] . "/9</div> "; // creating a message to be returned
        }

        return $strength; // return value to calling function

    } else { // if no other conditions are met
        return ""; // return value to calling function
    }
}


?>