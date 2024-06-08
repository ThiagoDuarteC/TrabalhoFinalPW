<?php

session_start();

if(!isset($_SESSION['user']) && $_POST['url'] != 'index' && $_POST['url'] != 'sign_up' && $_POST['url'] != 'forgot_password'){
    echo 'not session';
    exit();
} elseif (isset($_SESSION['user']) && ($_POST['url'] == 'index' || $_POST['url'] == 'sign_up' || $_POST['url'] == 'forgot_password')) {
    echo 'session';
    exit();
}
