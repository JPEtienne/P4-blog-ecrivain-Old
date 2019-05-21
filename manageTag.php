<?php
include('Tag.php');

$tags = new Tag($db);

if (isset($_GET['add'])) {
    if (isset($_POST['name'])) {
        $tags->addTag($_POST['name']);
        header('Location:my-tags.php');
    }
}

if (isset($_GET['delete'])) {
    $tags->deleteTag($_GET['delete']);
    header('Location:my-tags.php');
}
