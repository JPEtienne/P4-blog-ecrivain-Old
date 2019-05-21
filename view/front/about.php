<?php 
include('../../functions/include_views.php');
include('../common/header.php');
$infos = new Info($db);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php foreach($infos->getInfo() as $info) { ?>
                <h4>À propos</h4>
                <p><?=$info['name'] ?></p>
                <p><?=$info['phone'] ?></p>
                <p><?=$info['mail'] ?></p>
                <p><?=$info['job'] ?></p>
                <p><?=$info['description'] ?></p>
            <?php } ?>
        </div>
    </div>
</div>