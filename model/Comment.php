<?php 

class Comment {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function comment($name, $email, $description, $slug, $created, $status) {
        $sql = "INSERT INTO comments(name, email, description, slug, created_at, status) VALUES('$name', '$email', '$description', '$slug', '$created', '$status')";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function getComment($slug) {
        $sql = "SELECT * FROM comments WHERE slug='$slug' AND status=1";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function countComments($slug) {
        $sql = "SELECT * FROM comments WHERE slug='$slug' AND status=1";
        $result = mysqli_query($this->db, $sql);
        return mysqli_num_rows($result);
    }

    public function signalComment($id) {
        $sql = "UPDATE comments SET alert_signal=1 WHERE id=$id";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function getCommentBySignal() {
        $sql = "SELECT * FROM comments WHERE alert_signal>0";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function validateComment($id) {
        $sql = "UPDATE comments SET alert_signal=0 WHERE id=$id";
        $result = mysqli_query($this->db, $sql);
        return $result;    
    }

    public function disableComment($id) {
        $sql = "UPDATE comments SET status=0, alert_signal=0 WHERE id=$id";
        $result = mysqli_query($this->db, $sql);
        return $result; 
    }

    public function deleteComment($id) {
        $sql = "DELETE FROM comments WHERE id=$id";
        $result = mysqli_query($this->db, $sql);
        return $result; 
    }
}