<?php


session_start();
session_unset();
session_destroy();

if (isset($_COOKIE['user'])):
    setcookie('user', '', time() - 7000000, );
endif;

header("location: index.php");
exit();