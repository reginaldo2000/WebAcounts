<?php

session_start();
if(!isset($_SESSION['userid'])) {
    $_SESSION['alert'] = 1;
    header('location:index.php');
}

