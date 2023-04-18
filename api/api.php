

<?php
    header('Access-Control-Allow-Origin: *');
include 'connect.php';
include 'alerts.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){
    // Method is POST
    $name = $_POST['name'];
    $email = $_POST['email'];
    $place = $_POST['place'];
    $kab = $_POST['kab'];
    $problem = $_POST['problem'];

    $sql = "INSERT INTO `pkhd`.`tickets` (`name`, `email`, `place`, `kab`, `problem`) VALUES ('$name', '$email', '$place', '$kab', '$problem')";
    if (mysqli_query($connectToBase, $sql)) {
        http_response_code(201);
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connectToBase);
      }
      mysqli_close($connectToBase);
      message_to_telegram('Новая заявка!\n'.'Здание: '.$place.'\n'.'Кабинет: '.$kab.'\n'.'Проблема: '. $problem.'\n');
     header('Location: ../index.html',true,307);
    }
     elseif ($method == 'GET'){
    // Method is GET
    $sql = "SELECT * FROM `pkhd`.`tickets`";
    $tickets = mysqli_query($connectToBase,$sql);
    $ticketList = [];
    while($ticket = mysqli_fetch_assoc($tickets)){
        $ticketList[] = $ticket;
    }
    header('Content-type: application/json');
    echo json_encode($ticketList);

} elseif ($method == 'PUT'){
    // Method is PUT
} elseif ($method == 'DELETE'){
    // Method is DELETE
    // $sql = "DELETE FROM `pkhd`.`tickets` WHERE `tickets`.`id` = $_DELETE['id']";
} else {
    // Method unknown
}