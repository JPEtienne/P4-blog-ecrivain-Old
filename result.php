<?php 
include('Session.php');
include('header.php'); 
include('Post.php');
include('Comment.php');
$post = new Post($db);
$comment = new Comment($db);
?>

<div class="container">
    <h2>Posts</h2>
    <?php
        if (!empty($_SESSION['username'])) {
            echo "Bonjour, {$_SESSION['username']}";
        } else {
            echo "Vous n'êtes pas connecté";
        }
    
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Ajout</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($post->getPost() as $post) { ?>
            <tr>
                <td><?=$post['title']?></td>
                <td><?=substr($post['description'], 0, 20)?></td>
                <td><?=date('d/m/Y', strtotime($post['created_at']));?></td>
                <td>
                    <a href="view.php?slug=<?=$post['slug']?>">
                        <button type="submit" class="btn btn-danger btn-sm">Voir</button>
                    </a>
                    <a href="edit.php?slug=<?=$post['slug']?>">
                        <button type="submit" class="btn btn-danger btn-sm">Éditer</button>
                    </a>
                    <a href="delete.php?slug=<?=$post['slug']?>">
                        <button type="submit" class="btn btn-dark btn-sm">Supprimer</button>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Commentaires signalés</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Description</th>
                <th>Ajout</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($comment->getCommentBySignal() as $comment) { ?>
            <tr>
                <td><?=$comment['name']?></td>
                <td><?=$comment['email']?></td>
                <td><?=substr($comment['description'], 0, 20)?></td>
                <td><?=date('d/m/Y', strtotime($post['created_at']));?></td>
                <td>
                    <a href="view.php?slug=<?=$comment['slug']?>">
                        <button type="submit" class="btn btn-danger btn-sm">Voir</button>
                    </a>
                    <a href="manageComment.php?validate='<?=$comment['id']?>'">
                        <button type="submit" class="btn btn-danger btn-sm">Valider</button>
                    </a>
                    <a href="manageComment.php?disable='<?=$comment['id']?>'">
                        <button type="submit" class="btn btn-danger btn-sm">Désactiver</button>
                    </a>
                    <a href="manageComment.php?delete='<?=$comment['id']?>'">
                        <button type="submit" class="btn btn-dark btn-sm">Supprimer</button>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>