<?php
include('header.php');
include('post.php');
include('Comment.php');
include('functions/functions.php');

$posts = new Post($db);
$comments = new Comment($db);
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
    <h4>Commentaires</h4>
    <?php if(isset($_POST['btnComment'])) {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['description'])) {
            $result = $comments->comment(st($_POST['name']), st($_POST['email']), st($_POST['subject']), st($_POST['description']), st($_GET['slug']));
            if ($result == true) {
                echo '<div class="text-center alert alert-success">Commentaire ajouté</div>';
            }
            } else {
                echo '<div class="text-center alert alert-danger">Champs manquants requis</div>';
            }
    } ?>

    <form action="" method="POST">
        <div class="col-md-4"> 
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="subject">Sujet</label>
                <input type="text" name="subject" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Commentaire</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="btnComment" class="btn btn-secondary">Envoyer</button>
            </div>
        </div>
    </form>

    <?php foreach($comments->getComment($_GET['slug']) as $comment) { ?>
     <div class="media">
        <div class="media-left media-top">
            <img src="images/accelrys.png" alt="9gag" class="media-object" style="width:100px;">
        </div>
        <div class="media-body">
            <strong><?=$comment['name']?></strong>
            <p><?=$comment['description']?></p>
        </div>
    </div>
    <?php } ?>

</div>