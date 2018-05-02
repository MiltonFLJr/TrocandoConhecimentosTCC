<?php

require_once (__DIR__.'/../classes/Usuario.php');

$email=$_POST['email'];
$senha=$_POST['senha'];

$usuario = new Usuario();

$usuario->excluirConta($email, $senha);

?>