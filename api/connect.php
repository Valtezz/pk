<?php
$server = 'localhost';
$username = 'hduser';
$password = 'hduserpass';


// Create connection
$connectToBase = mysqli_connect($server, $username, $password);

// Check connection
if (!$connectToBase) {
  die("Connection failed: " . mysqli_connect_error());
}