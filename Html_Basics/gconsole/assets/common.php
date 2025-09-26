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
} catch(PDOException $e){
    error_log($e->getMessage());
    throw new exception($e);
} catch(Exception $e){
    error_log($e->getMessage());
    throw new exception($e);

}

function user_check($conn, $post){
    $sql = "SELECT username FROM  user WHERE id=?";// doing a prepared statement by sending values separately, bound separately
    $stmt = $conn->prepare($sql);
    // binding data from form to sql statement parameter making it more secure from a sql injection attack unlikely to hijack my sql statement

    $stmt->execute(["id"=>$post["username"]]); // runs the insert query

    $conn = null;
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