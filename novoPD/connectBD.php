<?php
//FAZENDO A CONEXÃO COM O BANCO DE DADOS
  $dbHost="localhost";
  $dbUser="root";
  $dbPass= "";
  $dbName="cadastro";

    
  $conn = mysqli_connect($dbHost,$dbUser, $dbPass, $dbName);
    if (!$conn) {
        die("Não foi possivel conectar ao bando de dados.". mysqli_connect_error());
    }
?>
