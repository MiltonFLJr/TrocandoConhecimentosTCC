<?php

require_once (__DIR__.'/../classes/Livro.php');

$livro = new Livro();

$idl=$_POST['cd'];

$livro->excluirMeuLivro($idl);

?>