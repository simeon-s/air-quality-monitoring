<?php
session_start();
session_destroy();
if(isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    setcookie('username', $username, time()-1); 
    header("location: index");
}
?>