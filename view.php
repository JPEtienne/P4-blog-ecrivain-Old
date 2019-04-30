<?php
include('header.php');
include('post.php');
$posts = new Post($db);
?>

<div class="container">
    <div class="row">
        <?php foreach($posts->getSinglePost($_GET['slug']) as $posts) { ?>
        <div class="card">
            <img src="images/<?=$posts['image'];?>" class="card-img-top">
        </div>
        <div class="card-body">
            <h4 class="card-title"><?=$posts['title'];?></h4>
            <p class="card-text"><?=$posts['description'];?></p>
        </div>
    </div>
    <?php } ?>
    
</div>