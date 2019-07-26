<?php
session_start();
if (($_SERVER['SCRIPT_NAME'] == '/view/front/index.php') || $_SERVER['SCRIPT_NAME'] == '/view/front/view.php' || $_SERVER['SCRIPT_NAME'] == '/view/front/about.php') {
    return;
    
} elseif (empty($_SESSION['username'])) {
    header("location:login");
}