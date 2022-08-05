<?php
    require_once 'onfig.php';
    if(isset($_POST['logout'])){
        session_destroy();
        header('location: login.php');
    }

?>