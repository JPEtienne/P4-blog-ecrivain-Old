<?php 
session_start();
session_destroy();
header("Location:view/back/login.php");