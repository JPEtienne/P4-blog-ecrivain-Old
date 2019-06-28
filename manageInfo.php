<?php
include('model/info.php');
include('db.php');

$infos = new Info($db);

if (isset($_GET['id'])) {
    if ($_GET['id'] == '1') {
        $infos->updateInfo($_POST['name'], $_POST['phone'], $_POST['mail'], $_POST['job'], $_POST['description']);
        header('Location:my-information');
    } else {
        header('Location:home-1');
    }
} else {
    header('Location:home-1');
}
