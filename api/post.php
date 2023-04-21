<?php
function newTask($connect){
include 'alerts.php';

$name = $_POST['name'];
$email = $_POST['email'];
$place = $_POST['place'];
$kab = $_POST['kab'];
$problem = $_POST['problem'];
$sql = "INSERT INTO `pkhd`.`tickets` (`name`, `email`, `place`, `kab`, `problem`) VALUES ('$name', '$email', '$place', '$kab', '$problem')";

if (mysqli_query($connect, $sql)) {
    http_response_code(201);
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
  }
  mysqli_close($connect);
  header('Location: ../index.html',true,307);

  message_to_telegram("Новая заявка!\n".'Здание: '.$place."\n".'Кабинет: '.$kab."\n".'Проблема: '. $problem."\n");
};