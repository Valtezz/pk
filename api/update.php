<?php
function updateTask($connect){
    include 'alerts.php';
$data = file_get_contents('php://input');
$data = json_decode($data,true);
if (isset($data['id'])){
    $id = $data['id'];
    $place = $data['place'];
    $kab = $data['kab'];
    $sql = "UPDATE `pkhd`.`tickets` SET `done` = '1' WHERE `tickets`.`id` = $id";
    mysqli_query($connect,$sql);
    message_to_telegram("Заявка выполнена!\n"."Здание:".$place."\n"."Кабинет:".$kab);
}

}