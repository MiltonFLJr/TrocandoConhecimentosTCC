<?php

require_once 'CLASSEUsuario.php';

$usuario = new Usuario();

$idu=$_POST['id'];
$cpf=$_POST['cpf'];
$rg=$_POST['rg'];
$nome=$_POST['nome'];
$dataN=$_POST['dtn'];
$telefone=$_POST['telefone'];
$endereco=$_POST['endereco'];
$nomeMae=$_POST['nomemae'];
$nomePai=$_POST['nomepai'];

$usuario->alterarConta($idu, $cpf, $rg, $nome, $dataN, $telefone, $endereco, $nomeMae, $nomePai);


   echo "<html>";
   echo "<head>";
   echo "<meta http-equiv='refresh' content='0;url=TELALGDalterarDados.php'>";
   echo "</head>";
    echo "</html>";   
 
?>
