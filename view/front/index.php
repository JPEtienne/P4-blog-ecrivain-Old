<?php
include('../../functions/include_views.php');
include('../common/header.php');

$posts = new Post($db);
$tags = new Tag($db);
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
         <?php if (isset($_GET['keyword'])) {
            echo '<p>Recerhce pour: <i>'.$_GET['keyword'].'</i></p>';
        } ?>
        <?php foreach($posts->getPost() as $post) { ?>
            <div class="media">
                <div class="media-left media-top">
                    <img src="image-<?= $post['image'];?>" alt="9gag" class="media-object" style="width:200px;"><br>
                    Ajout: <?=date('d/m/Y', strtotime($post['created_at']));?></p>
                    
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><a href="post-<?=$post['slug']?>"><?=$post['title'];?></a></h4>
                    <?= htmlspecialchars_decode($post['description']); ?>
                </div>
            </div>
        <?php } ?>
            <?php if (isset($_GET['page'])) { ?>
            <ul class="pagination">
                <?php $row = $posts->countPostPages()[0];
                $totalPages = ceil($row/4); ?>
                <li class="page-item" style="<?= $_GET['page'] <= 1 ?'display:none;':'';?>"><a class="page-link" href="home-1"><i class="fas fa-angle-double-left"></i></a></li>
                <li class="page-item" style="<?= $_GET['page'] <= 1 ?'display:none;':'';?>"><a class="page-link" href="home-<?=$_GET['page']-1?>"><i class="fas fa-chevron-left"></i></a></li>
                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class="page-item <?= $i != $_GET['page'] ?: 'active';?>" style="<?php if (($i >= ($_GET['page']+4)) || ($i <= ($_GET['page']-4))) {echo 'display:none;';}?>">
                        <a class="page-link" href="home-<?=$i?>"><?=$i?></a>
                    </li>
                <?php } ?>
                <li class="page-item" style="<?= $_GET['page'] >= $totalPages ?'display:none;':'';?>"><a class="page-link" href="home-<?=$_GET['page']+1?>"><i class="fas fa-chevron-right"></i></a></li>
                <li class="page-item" style="<?= $_GET['page'] >= $totalPages ?'display:none;':'';?>"><a class="page-link" href="home-<?=$totalPages?>"><i class="fas fa-angle-double-right"></i></a></li>                    
            </ul> 
            <?php } ?>   
        </div>

        <div class="col-md-4">
            <h4>Recherche par tags</h4>
            <p>
                <?php foreach($tags->getAllTags() as $tag) { ?>
                    <a href="tag-<?=$tag['tag']?>"><button class="btn btn-outline-danger btn-sm"><?=$tag['tag']?></button></a>
                <?php } ?>
            </p>
            <p>
                <form action="index.php" method="GET">
                <h4>Recherche de post</h4>
                    <input type="text" name="keyword" class="form-control" placeholder="recherche...">
                </form>
            </p>
                <h4>Posts populaires</h4>
            <?php foreach($posts->getPopularPosts() as $p_post) { ?>
            <p>
                <a href="post-<?=$p_post['slug']?>" style="color:black; border-bottom: 1px dashed black;"><?=$p_post['title']?></a>
            </p>
            <?php } ?>
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