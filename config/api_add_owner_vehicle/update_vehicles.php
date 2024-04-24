<?php

include 'api_config.php';

header('Access-Control-Allow-Method: POST');
header('Content-Type: application/json');

$api = new ApiConfig();

if ($_SERVER['REQUEST_METHOD'] == "PATCH" || $_SERVER['REQUEST_METHOD'] == "PUT") {

    parse_str(file_get_contents('php://input'), $_PATCH);

    $park_id = $_PATCH['park_id'];
    $vehicle_type = $PATCH['vehicle_type'];
    $vehicle_number = $PATCH['vehicle_number'];
    $payment = $PATCH['payment'];
    $entry_time = $PATCH['entry_time'];


    $res = $api->updateData($park_id, $vehicle_type, $vehicle_number, $payment, $entry_time);

    if ($res) {
        $status['status'] = "Vehicle parking Updated Successfully...";

        echo json_encode($status);
    } else {
        $status['status'] = "Vehicle Parking Updation Failed...";

        echo json_encode($status);
    }
} else {
    $status['status'] = "PATCH or PUT method is allowed.";

    echo json_encode($status);
}
