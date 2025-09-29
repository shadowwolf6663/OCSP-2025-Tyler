<?php //this opens the php code section
session_start();

session_destroy();
header("Location: index.php?message=you have been logged out!");
?>
