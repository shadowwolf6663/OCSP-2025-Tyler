<?php //this opens the php code section
session_start();
require_once "assets/dbconn.php";
require_once "assets/common.php";
auditor(dbconnect_insert(),$_SESSION["userid"],"log","user has logged out");
session_destroy();
header("Location: index.php?message=you have been logged out!");
?>
