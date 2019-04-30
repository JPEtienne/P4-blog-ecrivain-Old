<?php
$db = mysqli_connect('localhost','root','','projet_ecrivain');
if (mysqli_connect_error()) {
    echo 'erreur de connexion'.mysqli_connect_error();
}