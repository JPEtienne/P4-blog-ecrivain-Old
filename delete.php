<?php 
include('Post.php'); 

$post = new Post($db);

$post->deletePostBySlug($_GET['slug']);
header('Location:result.php');
?>