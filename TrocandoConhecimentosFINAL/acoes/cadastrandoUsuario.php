<?php


require_once(__DIR__.'/../classes/Usuario.php');

$usuario = new Usuario();

$rg=$_POST['cpf'];
$cpf=$_POST['rg'];
$nome=$_POST['nome'];
$dataNascimento=$_POST['dtn'];
$telefone=$_POST['telefone'];
$endereco=$_POST['endereco'];
$nomeMae=$_POST['nomemae'];
$nomePai=$_POST['nomepai'];
$email=$_POST['email'];
$senha=$_POST['senha'];

$usuario->criarConta($cpf, $rg, $nome, $dataNascimento, $telefone, $endereco, $nomeMae, $nomePai, $email, $senha);

/*
   echo "<html>";
   echo "<head>";
   echo "<script language='javascript'>";
     echo "alert('O livro foi cadastrado.')";
     echo "</script>";
   echo "<meta http-equiv='refresh' content='0;url=TELAlogin.php'>";
   echo "</head>";
    echo "</html>";   
 */
        
?>
