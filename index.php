<?php

include 'config/config.php';

$config = new Config();

$config->conection = $config->connect();

if ($config->conection) {
    $result = $config->fetchAllData();


    if (isset($_REQUEST['update_id'])) {
        $updateId = $_REQUEST['update_id'];

        $data = $config->fetchSingleData($updateId);

        $singleRecord = mysqli_fetch_array($data);
    }
    if (isset($_POST['update'])) {

        $parkId = $_POST['parkId'];
        $vehicleType = $_POST['vehicleType'];
        $vehicleNo = $_POST['vehicleNo'];
        $payment = $_POST['payment'];
        $entryTime = $_POST['entryTime'];


        $config->updateData($parkId, $vehicleType, $vehicleNo, $payment, $entryTime);
    }

    if (isset($_REQUEST['dlt_id'])) {
        
        $dlt_id = $_REQUEST['dlt_id'];

        $config->deleteData($dlt_id);
    }
} else {
    echo "Connection failed!!!";
}
