<?php
session_start();
if ($_SERVER['SCRIPT_NAME'] == '/P4/index.php') {
    return;
    
} elseif (empty($_SESSION['username'])) {
    header("location: login.php");
}