<?php

if(array_key_exists('logout',$_POST)){
    session_start();
    session_destroy();
    header('Location: ../../../Portfolio/index.php');
}

?>