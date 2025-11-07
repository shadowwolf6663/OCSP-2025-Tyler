<?php

function commit_booking($conn,$epoch){  // declaring function

    $sql="INSERT INTO bookings (patientid,doctorid,dateofbooking,completed) VALUES (?,?,?,?)";  // doing a prepared statement by sending values separately, bound separately
    $stmt=$conn->prepare($sql);  // prepares sql statement with connection to database
    $bool="False";  // sets a value for the sql query

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1,$_SESSION['patient_id']);
    $stmt->bindparam(2,$_POST['staff']);
    $stmt->bindparam(3,$epoch);
    $stmt->bindparam(4,$bool);
    $stmt->execute();  // executes sql query

    $conn=null;  // voids connection to db for security reason since it no longer needs to be accessed
    return True;  // returns value

}

function staffauditor($conn, $doctorid,$code,$long){  // declaring function
    $sql = "INSERT INTO staffaudit(date,doctorid,code,longdesc) VALUES(?,?,?,?)";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database
    $date = time();  // sets a value for the sql query

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $date);
    $stmt->bindparam(2, $doctorid);
    $stmt->bindparam(3, $code);
    $stmt->bindparam(4, $long);
    $stmt->execute();  // executes sql query

    $conn = null;  // voids connection to db for security reason since it no longer needs to be accessed
    return true;  // returns value

}

function getnewstaffid($conn,$first_name){  // declaring function

    $sql = "SELECT doctorid FROM doctor WHERE doctor_name=?";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $first_name);
    $stmt->execute();  // executes sql query

    $result = $stmt->fetch(PDO::FETCH_ASSOC);  // fetches results from sql query
    $conn = null;  // voids connection to db for security reason since it no longer needs to be accessed
    return $result["doctorid"];  // returns value

}

function new_staff($conn, $post)
{  // declaring function

    $sql = "INSERT INTO doctor(doctor_name,role,room,password) VALUES(?,?,?,?)";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $hpsw = password_hash($post['password'], PASSWORD_DEFAULT);
    $stmt->bindparam(1, $post['staff_first']);
    $stmt->bindparam(2, $post['role']);
    $stmt->bindparam(3, $post['room']);
    $stmt->bindparam(4, $hpsw);
    $stmt->execute(); // runs the insert query

    $conn = null;  // voids connection to db for security reason since it no longer needs to be accessed

}

function staff_audit_getter($conn){  // declaring function

    $sql = "SELECT * FROM staffaudit WHERE doctorid=? order by auditid ASC";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $_SESSION['doctor_id']);
    $stmt->execute();  // executes sql query

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // fetches results from sql query
    $conn=null;  // voids connection to db for security reason since it no longer needs to be accessed
    return $result;  // returns value

}

function audit_getter($conn){  // declaring function

    $sql = "SELECT * FROM audit WHERE patientid=? order by auditid ASC";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $_SESSION['patient_id']);
    $stmt->execute();  // executes sql query

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // fetches results from sql query
    $conn=null;  // voids connection to db for security reason since it no longer needs to be accessed
    return $result;  // returns value

}

function book_update($conn,$bookid,$booktime){  // declaring function

    $sql="UPDATE bookings SET doctorid=?,dateofbooking=? WHERE bookingid=?";  // doing a prepared statement by sending values separately, bound separately
    $stmt=$conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindParam(1,$_POST["staff"]);
    $stmt->bindParam(2,$booktime);
    $stmt->bindParam(3,$bookid);
    $stmt->execute();  // executes sql query

    $conn=null;  // voids connection to db for security reason since it no longer needs to be accessed
    return True;  // returns value

}

function getpassword($conn){  // declaring function

    $sql = "SELECT password FROM patient WHERE patientid=?";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $_SESSION['patient_id']);
    $stmt->execute();  // executes sql query

    $result = $stmt->fetch(PDO::FETCH_ASSOC);  // fetches results from sql query
    $conn = null;  // voids connection to db for security reason since it no longer needs to be accessed

    if($result){  // checks if value was fetched

        return $result;  // returns value

    }else{  // if other conditions aren't met

        $_SESSION["error"] = "user not found";
        header("Location: login.php");  // redirects to different page
        exit;  // stops further execution

    }
}

function getpassword_staff($conn){  // declaring function

    $sql = "SELECT password FROM doctor WHERE doctorid=?";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $_SESSION['doctor_id']);
    $stmt->execute();  // executes sql query

    $result = $stmt->fetch(PDO::FETCH_ASSOC);  // fetches results from sql query
    $conn = null;  // voids connection to db for security reason since it no longer needs to be accessed

    if($result){  // checks if value was returned

        return $result;  // returns value

    }else{  // if other conditions aren't met

        $_SESSION["error"] = "staff not found";
        header("Location: login.php");  // redirects to different page
        exit;  // stops further execution

    }
}

function password_update($conn,$patientid){  // declaring function

    $sql="UPDATE patient SET password=? WHERE patientid=?";  // doing a prepared statement by sending values separately, bound separately
    $stmt=$conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $psw = password_hash($_POST["new_psw"], PASSWORD_DEFAULT);
    $stmt->bindParam(1,$psw);
    $stmt->bindParam(2,$patientid);
    $stmt->execute();  // executes sql query

    $conn=null;  // voids connection to db for security reason since it no longer needs to be accessed
    return True;  // returns value

}

function password_update_staff($conn,$doctorid){  // declaring function

    $sql="UPDATE doctor SET password=? WHERE doctorid=?";  // doing a prepared statement by sending values separately, bound separately
    $stmt=$conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $psw = password_hash($_POST["new_psw"], PASSWORD_DEFAULT);  // sets a value for the sql query
    $stmt->bindParam(1,$psw);
    $stmt->bindParam(2,$doctorid);
    $stmt->execute();  // executes sql query

    $conn=null;  // voids connection to db for security reason since it no longer needs to be accessed
    return True;  // returns value

}

function book_fetch($conn,$bookid){  // declaring function

    $sql="SELECT * FROM bookings WHERE bookingid=?";  // doing a prepared statement by sending values separately, bound separately
    $stmt=$conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1,$bookid);
    $stmt->execute();

    $results=$stmt->fetch(PDO::FETCH_ASSOC);  // fetches results from sql query
    $conn=null;  // voids connection to db for security reason since it no longer needs to be accessed
    return $results;  // returns value

}

function cancel_booking($conn,$bookid){  // declaring function

    $sql="DELETE FROM bookings WHERE bookingid=?";  // doing a prepared statement by sending values separately, bound separately
    $stmt=$conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1,$bookid);
    $stmt->execute();  // executes sql query

    $conn=null;  // voids connection to db for security reason since it no longer needs to be accessed
    return True;  // returns value

}

function staff_login($conn){  // declaring function

    $sql = "SELECT * FROM doctor WHERE doctor_name=?";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $_POST["first_name"]);
    $stmt->execute();  // executes sql query

    $result = $stmt->fetch(PDO::FETCH_ASSOC);  // fetches results from sql query
    $conn = null;  // voids connection to db for security reason since it no longer needs to be accessed

    if($result){  // checks if a value was returned

        return $result;  // returns value

    }else{  // if other conditions aren't met

        $_SESSION["error"] = "user not found";
        header("Location: login.php");  // redirects to different page
        exit;  // stops further execution

    }
}

function booking_getter($conn){  // declaring function

    $sql = "SELECT b.bookingid,b.dateofbooking,b.completed,d.role,d.doctor_name,d.room,b.patientid FROM bookings b JOIN doctor d on b.doctorid=d.doctorid where b.patientid=? order by b.dateofbooking ASC";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1,$_SESSION['patient_id']);
    $stmt->execute();  // executes sql query

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // fetches results from sql query
    $conn=null;  // voids connection to db for security reason since it no longer needs to be accessed
    return $result;  // returns value

}

function booking_getter_staff($conn){  // declaring function

    $sql = "SELECT b.bookingid,b.dateofbooking,b.completed,d.role,d.doctor_name,d.room,b.patientid FROM bookings b JOIN doctor d on b.doctorid=d.doctorid where b.doctorid=? order by b.dateofbooking ASC";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1,$_SESSION['doctor_id']);
    $stmt->execute();  // executes sql query

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // fetches results from sql query
    $conn=null;  // voids connection to db for security reason since it no longer needs to be accessed
    return $result;  // returns value

}

function staff_getter($conn){  // declaring function

    $sql = "SELECT * FROM doctor WHERE role != ? order by role desc";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database
    $exclude_role="adm";  // sets a value for the sql query

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $exclude_role);
    $stmt->execute();  // executes sql query

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // fetches results from sql query
    $conn=null;  // voids connection to db for security reason since it no longer needs to be accessed
    return $result;  // returns value

}

function new_console($conn, $post)
{  // declaring function

    $sql = "INSERT INTO patient(first_name,middle_name,second_name,gender,age,password) VALUES(?,?,?,?,?,?)";// doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $hpsw=password_hash($post['password'],PASSWORD_DEFAULT);
    $stmt->bindparam(1,$post['patient_first']);
    $stmt->bindparam(2,$post['patient_middle']);
    $stmt->bindparam(3,$post['patient_second']);
    $stmt->bindparam(4,$post['gender']);
    $stmt->bindparam(5,$post['age']);
    $stmt->bindparam(6,$hpsw);
    $stmt->execute(); // runs the insert query

    $conn = null;  // voids connection to db for security reason since it no longer needs to be accessed

}

function user_check($conn, $username){  // declaring function

    $sql = "SELECT username FROM  user WHERE username=?";// doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $username);
    $stmt->execute(); // runs the insert query

    $result = $stmt->fetch(PDO::FETCH_ASSOC);  // fetchs values returned by the executed sql
    $conn = null;  // voids connection to db for security reason since it no longer needs to be accessed

    if ($result) {  // checks if a value was fetched

        return false;  // returns false

    } else {  // if other conditions aren't met

        return true;  // returns true

    }
}

function reg_user($conn, $post){  // declaring function

    if (user_check(dbconnect_select(), $post["username"])) {//checks if user exists

        $sql = "INSERT INTO user(username,password,signupdate,dob,country) VALUES(?,?,?,?,?)";  // doing a prepared statement by sending values separately, bound separately
        $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

        $hpswd = password_hash($post["password"], PASSWORD_DEFAULT);// hashes password using inbuilt php function

        //forced to use password default as we have no other available  hashing ways in this environment  if this was a production system I would use better ways such as argon2i for better security

        // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
        $stmt->bindparam(1, $post["username"]);
        $stmt->bindparam(2, $hpswd);
        $stmt->bindparam(3, $post["signupdate"]);
        $stmt->bindparam(4, $post["dob"]);
        $stmt->bindparam(5, $post["country"]);
        $stmt->execute();//executes sql statement

        $conn = null;  // terminates connection to database

    }
}

function auditor($conn, $patientid,$code,$long){  // declaring function

    $sql = "INSERT INTO audit(date,patientid,code,longdesc) VALUES(?,?,?,?)";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    $date = time();  // sets a value for the sql query

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $date);
    $stmt->bindparam(2, $patientid);
    $stmt->bindparam(3, $code);
    $stmt->bindparam(4, $long);
    $stmt->execute();  // executes sql query

    $conn = null;  // terminates connection to database
    return true;  // returns value

}

function getnewpatientid($conn,$first_name){  // declaring function

    $sql = "SELECT patientid FROM patient WHERE first_name=?";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $first_name);
    $stmt->execute();  // executes sql query

    $result = $stmt->fetch(PDO::FETCH_ASSOC);  // fetches results from sql query
    $conn = null;  // terminates connection to database
    return $result["patientid"];  // returns value

}

function login($conn, $post){  // declaring function

    $sql = "SELECT * FROM patient WHERE first_name=?";  // doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepares sql statement with connection to database

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $post["first_name"]);
    $stmt->execute();  // executes sql query

    $result = $stmt->fetch(PDO::FETCH_ASSOC);  // fetches results from sql query
    $conn = null;    // terminates connection to database

    if($result){  // checks condition is met

        return $result;  // returns value

    }else{  // if other conditions aren't met

        $_SESSION["error"] = "user not found";
        header("Location: login.php");  // redirects to different page
        exit;  // stops further execution

    }

}

function user_message(){  // declaring function

    if(isset($_SESSION["usermessage"])){  // checks condition is met

        $message= $_SESSION["usermessage"];  // gets user message from session
        unset($_SESSION["usermessage"]);  // removes message from session
        return  $message;  // returns value to calling function

    }else{  // if other conditions aren't met

        $message= "";  // sets value to blank
        return $message;  // returns value

    }
}

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