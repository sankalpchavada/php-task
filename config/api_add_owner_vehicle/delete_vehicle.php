<?php

    include 'api_config.php';

    header('Access-Control-Allow-Method: POST');
    header('Content-Type: application/json');

    $api = new ApiConfig();

    if($_SERVER['REQUEST_METHOD'] == "DELETE") {

        parse_str(file_get_contents('php://input'),$_DELETE);

        $id = $_DELETE['id'];

        $res = $api->deleteData($id);

        if($res) {
            $status['status'] = "Vehicle Parking Cleared Successfully...";

            echo json_encode($status);
        } else {
            $status['status'] = "Fail to free-up the Vehicle Parking..";

            echo json_encode($status);
        }

    } else {
        $status['status'] = "DELETE method is allowed.";

        echo json_encode($status);
    }
?>