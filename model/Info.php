<?php 

class Info {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getInfo() {
        $sql = "SELECT * FROM info WHERE id = 1";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function updateInfo($name, $phone, $mail, $job, $description) {
        $sql = "UPDATE info SET name = '$name', phone = '$phone', mail = '$mail', job = '$job', description = '$description' WHERE id = 1";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
}