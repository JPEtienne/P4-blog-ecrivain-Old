<?php include('header.php'); 
include('Post.php');
$post = new Post($db);
?>

<div class="container">
    <h2>Posts</h2>
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
</div>