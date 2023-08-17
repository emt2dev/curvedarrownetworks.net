<?php

if(!isset($_SESSION)) {
  session_start();
} else {
  session_start();
}

// $__db[] array
$__db[0] ="localhost"; // server
$__db[1] ="root"; // user
$__db[2] ="utJURj9eC0gndyvec("; // pass
$__db[3] ="madebycan"; //db name

// Create our database connection
// $connection = new mysqli("localhost", "root", "utJURj9eC0gndyvec(", "madebycan");

$connection = new mysqli($__db[0], $__db[1], $__db[2], $__db[3]);

// Ensure our database connection works
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

include 'signIn.php';
include 'sanitizer.php';
include 'preSale.php';

?>