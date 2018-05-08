<?php

require_once(__DIR__.'/../classes/Livro.php');
require_once(__DIR__.'/../classes/UsuarioLivro.php');

$livro = new Livro();

$email = $_POST['email'];
$cdUsuario = $_POST['cdUsuario'];
//$codigo=$_POST['cdLivro'];
$nome=$_POST['nomeLivro'];
$autor=$_POST['autorLivro'];
$idade=$_POST['idadeLivro'];
$estado=$_POST['estadoConservacao'];
$genero=$_POST['genero'];
$_FILES['image'];

$livro->cadastrarMeuLivro($nome, $autor, $idade, $estado, $genero, $cdUsuario);