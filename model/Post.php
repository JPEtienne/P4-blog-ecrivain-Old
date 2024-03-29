<?php
include('../../functions/functions.php');

class Post {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addPost ($title, $description, $image, $date, $slug) {
        $sql = "INSERT INTO posts(title, description, image, created_at, slug) VALUES ('$title', '$description', '$image', '$date', '$slug')";
        $result = mysqli_query($this->db, $sql);
        if ($result) {
            if ($_POST['tags']) {
                $tags = $_POST['tags'];
                $lastInsertedId = mysqli_insert_id($this->db);
                foreach($tags as $tag) {
                    $sql = "INSERT INTO post_tag(post_id, tag_id) VALUES ('$lastInsertedId', '$tag')";
                    $result = mysqli_query($this->db, $sql);
                }
            }
        }
        return $result;
    }

    public function search($keyword) {
        $sql = "SELECT * FROM posts
                WHERE title LIKE '%{$keyword}%'
                OR description LIKE '%{$keyword}%'";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function getPost() {
        //By page
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $limit = 4;
            $startPage = $limit * ($page - 1);
            $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit OFFSET $startPage";
            $result = mysqli_query($this->db, $sql);
            return $result;  
        }

        // By search
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            return $this->search($keyword);
        }

        // By tag
        if (isset($_GET['tag'])) {
            $tag = $_GET['tag'];
            $sql = "SELECT * FROM posts 
                    INNER JOIN post_tag ON posts.id = post_tag.post_id
                    INNER JOIN tags ON tags.id = post_tag.tag_id
                    WHERE tags.tag ='$tag'";
            $result = mysqli_query($this->db, $sql);
            return $result;
        } else {
            $sql = "SELECT * FROM posts";
            $result = mysqli_query($this->db, $sql);
            return $result;
        }
    }

    public function countPostPages() {
        $sql = "SELECT count(id) FROM posts";
        $result = mysqli_query($this->db, $sql);
        return $row = mysqli_fetch_row($result);
    }

    public function getSinglePost($slug) {
        $sql = "SELECT *  FROM posts WHERE slug='$slug'";
        $result = mysqli_query($this->db, $sql);
        return $result;        
    }

    public function updatePost($title, $description, $slug) {
        $newImage = $_FILES['image']['name'];
        if (!empty($newImage)) {
            $image = uploadImage();
            $sql = "UPDATE posts SET title = '$title', description = '$description', image = '$image' WHERE slug = '$slug'";
            $result = mysqli_query($this->db, $sql);
            return $result;        
        } else {
            $sql = "UPDATE posts SET title = '$title', description = '$description' WHERE slug = '$slug'";
            $result = mysqli_query($this->db, $sql);
            return $result; 
        }
    }

    public function deletePostBySlug($slug) {
        $sql = "DELETE FROM posts WHERE slug='$slug'";
        $result = mysqli_query($this->db, $sql);
        return $result; 
    }

    public function getPopularPosts() {
        $sql = "SELECT * FROM posts 
                LEFT JOIN comments ON posts.slug=comments.slug 
                WHERE comments.slug IS NOT NULL
                GROUP BY comments.slug 
                ORDER BY count(comments.slug) 
                DESC LIMIT 5";
        $result = mysqli_query($this->db, $sql);
        return $result; 
    }
}