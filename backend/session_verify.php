<?php

session_start();

if(!isset($_SESSION['user']) && !str_contains($_SERVER['PHP_SELF'], 'index.html') && !str_contains($_SERVER['PHP_SELF'], 'sign_up_view.html')){
    header('Location: ../frontend/index.html');
    exit();
} elseif (isset($_SESSION['user']) && (str_contains($_SERVER['PHP_SELF'], 'index.html') || str_contains($_SERVER['PHP_SELF'], 'sign_up_view.html'))) {
    header('Location: ../frontend/home.html');
    exit();
}
