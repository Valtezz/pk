

<?php
include("connect.php");
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){
    // Method is POST
    $name = $_POST['name'];
    $email = $_POST['email'];
    $place = $_POST['place'];
    $kab = $_POST['kab'];
    $problem = $_POST['problem'];

    $sql = "INSERT INTO `pkhd`.`tickets` (`id`, `name`, `email`, `place`, `kab`, `problem`, `done`) VALUES (NULL, '$name', '$email', '$place', '$kab', '$problem', '0')";
    if (mysqli_query($connectToBase, $sql)) {
        http_response_code(201);
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connectToBase);
      }
      mysqli_close($connectToBase);
     header('Location: /hd',true,307);
    }
     elseif ($method == 'GET'){
    // Method is GET
    header('Content-type: application/json; charset=utf-8');
    $sql = "SELECT * FROM `pkhd`.`tickets`";
    $tickets = mysqli_query($connectToBase,$sql);
    $ticketList = [];
    while($ticket = mysqli_fetch_assoc($tickets)){
        $ticketList[] = $ticket;
    }
    echo json_encode($ticketList, JSON_UNESCAPED_UNICODE);
    http_response_code(200);

} elseif ($method == 'PUT'){
    // Method is PUT
} elseif ($method == 'DELETE'){
    // Method is DELETE
} else {
    // Method unknown
}