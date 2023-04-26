<?php
session_start();// Initialize the session
$_SESSION = array();
session_destroy();
header("location: index.php");
exit;
?>
