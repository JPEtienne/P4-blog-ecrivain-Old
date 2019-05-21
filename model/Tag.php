<?php
class Tag {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllTags() {
        $sql = "SELECT * FROM tags";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function addTag($tag) {
        $sql = "INSERT INTO tags(tag) VALUES ('$tag')";
        $result = mysqli_query($this->db, $sql);
    }

    public function deleteTag($id) {
        $sql = "DELETE FROM tags WHERE id=$id";
        $result = mysqli_query($this->db, $sql);
        return $result; 
    }
}