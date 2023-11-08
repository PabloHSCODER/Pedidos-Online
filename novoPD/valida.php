<?php
session_start();
if(isset($_GET['sair'])){
        unset($_SESSION['usuario']);
        session_unset();
        header("location:   login.php");
        exit();
    
    }

if(!isset($_SESSION['usuario'])){

    header("location:   login.php");
    exit();
}



?>