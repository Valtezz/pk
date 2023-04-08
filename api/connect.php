<?php
$server = 'valtezz.ru';
$username = 'hduser';
$password = 'hduserpass';


// Create connection
$connectToBase = mysqli_connect($servername, $username, $password);

// Check connection
if (!$connectToBase) {
  die("Connection failed: " . mysqli_connect_error());
}
?>