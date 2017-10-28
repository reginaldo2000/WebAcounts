<?php

session_start();
date_default_timezone_set('America/Fortaleza');
if(!isset($_SESSION['userid'])) {
    $_SESSION['alert'] = 1;
    header('location:index.php');
}

