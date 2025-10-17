<?php //this opens the php code section
session_start();
require_once "assets/dbconn.php";
require_once "assets/common.php";
session_destroy();
auditor(dbconnect_insert(),$_SESSION["id"],"log","user has logged out");
header("Location: index.php?message=you have been logged out!");
?>
