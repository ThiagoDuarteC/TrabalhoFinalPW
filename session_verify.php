<?php

session_start();

if(!isset($_SESSION['user']) && !str_contains($_SERVER['PHP_SELF'], 'index.php') && !str_contains($_SERVER['PHP_SELF'], 'index2.php')){
    header('Location: index.php');
    exit();
} elseif (isset($_SESSION['user']) && (str_contains($_SERVER['PHP_SELF'], 'index.php') || str_contains($_SERVER['PHP_SELF'], 'index2.php'))) {
    header('Location: home.php');
    exit();
}
