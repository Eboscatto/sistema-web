<?php
 /* Conectar Bando de Dados */
try{
    $Servidor = 'localhost';
    $nomeBanco = 'db_pesquisa_preco';
    $Usuario = 'root';
    $Senha = '';
    $strcon = mysqli_connect($Servidor, $Usuario, $Senha, $nomeBanco);
    echo "<Conexão com o banco de dados executada com sucesso!/br>";
 }
 catch(PDOException $erro){
     echo "<strong>ERRO DETECTADO:</strong></br>", $erro->getMessage();
 }
 ?>
