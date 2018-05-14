
<?php

require_once(__DIR__.'/../classes/Livro.php');

$livro = new Livro();

$codigo=$_POST['cd'];
$nome=$_POST['nome'];
$autor=$_POST['autor'];
$idade=$_POST['idade'];
$estadoConservacao=$_POST['estadoconservacao'];
$genero=$_POST['genero'];

$livro->alterarMeuLivro($codigo, $nome, $autor, $idade, $estadoConservacao, $genero);

