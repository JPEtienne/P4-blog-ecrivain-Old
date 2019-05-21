<?php
session_start();
if (($_SERVER['SCRIPT_NAME'] == '/P4/view/front/index.php') || $_SERVER['SCRIPT_NAME'] == '/P4/view/front/view.php' || $_SERVER['SCRIPT_NAME'] == '/P4/view/front/about.php') {
    return;
    
} elseif (empty($_SESSION['username'])) {
    header("location: ../back/login.php");
}