<?php 
include('db.php');

class Comment {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function comment($name, $email, $subject, $description, $slug) {
        $sql = "INSERT INTO comments(name, email, subject, description, slug) VALUES('$name', '$email', '$subject', '$description', '$slug')";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function getComment($slug) {
        $sql = "SELECT * FROM comments WHERE slug='$slug'";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
}