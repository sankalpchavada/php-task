<?php

    include 'api_config.php';

    header('Access-Control-Allow-Method: POST');
    header('Content-Type: application/json');

    $api = new ApiConfig();

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $res = $api->fetchAllData();

        $allrecords = [];
        $i = 0;

        while($record = mysqli_fetch_array($res)) {
            $allrecords[$i] = $record;
            $i = $i + 1;
        }

        echo json_encode($allrecords);
    } else {

        $status['status'] = "Get method is allowed.";

        echo json_encode($status);
    }
?>