<?php
    include './config.php';

    session_destroy();
    setcookie('username', '', time() - 3600);
    header('location:login.php');
?>