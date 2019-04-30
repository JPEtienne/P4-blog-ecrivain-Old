<?php
include('header.php');
include('Post.php');
include('Tag.php');

$post = new Post($db);
$tags = new Tag($db);
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
        <?php foreach($post->getPost() as $post) { ?>
            <div class="media">
                <div class="media-left media-top">
                    <img src="images/<?= $post['image'];?>" alt="9gag" class="media-object" style="width:200px;">
                    <p>Auteur: Admin <br>
                    Ajout: <?=date('d/m/Y', strtotime($post['created_at']));?></p>
                    
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><a href="view.php?slug=<?=$post['slug']?>"><?=$post['title'];?></a></h4>
                    <?= htmlspecialchars_decode($post['description']); ?>
                </div>
            </div>
        <?php } ?>
        </div>

        <div class="col-md-4">
            <h4>Recherche par tags</h4>
            <p><?php
                foreach($tags->getAllTags() as $tag) { ?>
                    <a href="index.php?tag=<?=$tag['tag']?>"><button class="btn btn-outline-danger btn-sm"><?=$tag['tag']?></button></a>
            <?php } ?></p>
        </div>

    </div>
</div>
<style type="text/css">
    body {
        text-align: justify;
    }
    img {
        margin-right: 10px;
    }
    .media {
        margin-top: 10px;
    }

</style>