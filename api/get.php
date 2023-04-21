<?php
   function getAllTasks($connect){
    include 'connect.php';
    header('Content-type: application/json');
    $sql = "SELECT * FROM `pkhd`.`tickets`";
    $tickets = mysqli_query($connect,$sql);
    $ticketList = [];
    while($ticket = mysqli_fetch_assoc($tickets)){
        $ticketList[] = $ticket;
    }
    echo json_encode($ticketList);
}