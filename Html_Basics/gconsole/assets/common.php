<?php

try{
function new_console($conn, $post)
{

    $sql = "INSERT INTO console(manufacturer,c_name,release_date,controller_no,bit) VALUES(?,?,?,?,?)";// doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);  // prepare to sql

    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement
    $stmt->bindparam(1, $post["manufacturer"]);
    $stmt->bindparam(2, $post["console_name"]);
    $stmt->bindparam(3, $post["release_date"]);
    $stmt->bindparam(4, $post["controller_no"]);
    $stmt->bindparam(5, $post["bit"]);
    $stmt->execute(); // runs the insert query

    $conn = null;
}
//catches all errors  and throws an error message to screen
} catch(PDOException $e){
    error_log($e->getMessage());
    throw new exception($e);
} catch(Exception $e){
    error_log($e->getMessage());
    throw new exception($e);

}

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


function user_message(){
    if(isset($_SESSION["usermessage"])){
        $message= $_SESSION["usermessage"];
        unset($_SESSION["usermessage"]);
        return  $message;

    }else{
        $message= "";
        return $_SESSION["usermessage"];
    }
}





?>