<?php

function uploadImage() {
    $imageName = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $allowed = array('jpeg','png','jpg');
    $ext = pathinfo($imageName, PATHINFO_EXTENSION);
    if (in_array($ext, $allowed)) {
        move_uploaded_file($imageTmp, 'images/'.$imageName);
    } else {
        echo 'Fromat de d\'image seulement en jpg, jpeg et png';
    }
    return $imageName;
}

function createSlug($string) {
    $slug = preg_replace('/[^A-Za-z0-9]+/','-',$string);
    return $slug;
}

function st($string) {
    return strip_tags($string);
}