<?php //this opens the php code section
session_start();
require_once "assets/dbconn.php";
require_once "assets/common.php";
session_destroy();
staffauditor(dbconnect_insert(),$_SESSION["doctor_id"],"lgo","user has logged out");
header("Location: index.php?message=you have been logged out!");
?>
