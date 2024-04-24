<?php

class ApiConfig {
    public $HOSTNAME = "127.0.0.1";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DATABASE = "car_management";
    public $conection = false;

    public function connect() {
        $res = mysqli_connect($this->HOSTNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASE);
        return $res;
    }

    public function addData($parkId,$vehicleType,$vehicleNo,$payment,$entryTime) {

        $this->conection = $this->connect();

        $sql = "INSERT INTO get_park (park_id,vehicle_type,vehicle_number,payment,entry_time) VALUES($parkId,$vehicleType,$vehicleNo,$payment,$entryTime)";

        $res = mysqli_query($this->conection, $sql);

        return $res;
    }

    public function fetchAllData() {
        $this->conection = $this->connect();

        $sql = "SELECT * FROM get_park";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }

    public function fetchSingleData($parkId) {
        $this->conection = $this->connect();

        $sql = "SELECT * FROM get_park WHERE park_id=$parkId";

        $res = mysqli_query($this->conection,$sql);

        return $res;
        
    }

    public function updateData($parkId,$vehicleType,$vehicleNo,$payment,$entryTime) {
        $this->conection = $this->connect();

        $sql = "UPDATE get_park SET vehicle_type='$vehicleType',vehicle_number=$vehicleNo,payment=$payment,entry_time='$entryTime' WHERE park_id=$parkId";

        $res = mysqli_query($this->conection,$sql);
        
        return $res;
    }

    public function deleteData($parkId) {
        $this->conection = $this->connect();

        $sql = "DELETE FROM get_park WHERE parkId=$parkId";

        $res = mysqli_query($this->conection,$sql);

        return $res;
    }

}

?>