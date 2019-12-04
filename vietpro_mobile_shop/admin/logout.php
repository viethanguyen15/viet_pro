<?php
    session_start();
    if(isset($_SESSION['name']) & isset($_SESSION['pass'])){
        if(isset($_COOKIE['name_acount']) && isset($_COOKIE['pass'])){
            $name = $_COOKIE['name_acount'];
            $pass = $_COOKIE['pass'];
            setcookie('name', $name, time()-60);
            setcookie('pass', $pass, time()-60);
        }
        session_destroy();
        header('location: index.php');
    }
?>