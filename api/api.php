<?php
header('Access-Control-Allow-Origin: *');

include 'connect.php';
include 'post.php';
include 'get.php';
include 'update.php';


$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST'){
    newTask($connectToBase);
    }
elseif ($method == 'GET'){
    getAllTasks($connectToBase);
}
elseif ($method == 'PATCH'){
    updateTask($connectToBase);

}
elseif ($method == 'DELETE'){
    // Method is DELETE
    // $sql = "DELETE FROM `pkhd`.`tickets` WHERE `tickets`.`id` = $_DELETE['id']";
}
else {
    // Method unknown
}