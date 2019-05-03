<?php 
include('Comment.php'); 

$comment = new Comment($db);

if (isset($_GET['signal'])) {
    $comment->signalComment($_GET['signal']);
    header('Location:view.php?slug='.$_GET['slug']);  
    
} elseif (isset($_GET['validate'])) {
    $comment->validateComment($_GET['validate']);
    header('Location:result.php');  

} elseif (isset($_GET['disable'])) {
    $comment->disableComment($_GET['disable']);
    header('Location:result.php'); 
  
} elseif (isset($_GET['delete'])) {
    $comment->deleteComment($_GET['delete']);
    header('Location:result.php'); 

}
