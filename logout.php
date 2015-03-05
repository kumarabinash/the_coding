<?php 
session_start();

$_SESSION = array(); // Need to empty the array first

session_destroy(); //Need to destroy the session.
// unset($_SESSION['username']);

//then you can head home! ;)
header('Location: home.php?logout=1');
//the extra parameter help me show a message that successfully logged out
//check code in home.php about $_GET['logout']
 ?>