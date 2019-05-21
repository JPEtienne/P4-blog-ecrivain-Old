<?php
include('info.php');

$infos = new Info($db);

if (isset($_GET['id'])) {
    if ($_GET['id'] == '1') {
        $infos->updateInfo($_POST['name'], $_POST['phone'], $_POST['mail'], $_POST['job'], $_POST['description']);
        header('Location:my-about.php');
    } else {
        header('Location:index.php?page=1');
    }
} else {
    header('Location:index.php?page=1');
}
