<?php 
include('model/Post.php'); 
include('db.php');

$post = new Post($db);
$post->deletePostBySlug($_GET['slug']);
header('Location:office-1');