<?php
include 'config.php';

$api = new ApiConfig();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $park_id = $_POST['park_id'];
    $vehicle_type = $_POST['vehicle_type'];
    $vehicle_number = $_POST['vehicle_number'];
    $payment = $_POST['payment'];
    $entry_time = $_POST['entry_time'];


    $res = $api->addData($park_id, $vehicle_type, $vehicle_number, $payment, $entry_time);

    if ($res) {
        http_response_code(201);

        $status['status'] = "Vehicle parking Sucessfully Occupied...";

        echo json_encode($status);
    } else {
        $status['status'] = "Failed to Occupy Vehicle parking.. ";

        echo json_encode($status);
    }
} else {
    $status['status'] = "Only POST method is allowed.";

    echo json_encode($status);
}
