<?php
    session_start();
    session_unset();
    
    setcookie(session_name(),'',0,'/');
    header("Location: ../index.php");
    exit();
?>