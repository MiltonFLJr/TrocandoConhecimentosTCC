<?php

 require_once(__DIR__.'/../classes/TrocaLivro.php');
 
 $cdU = $_POST['cdUs'];
 $cdli = $_POST['cdlivro'];
 
 $livro = new TrocaLivro();
 
 $livro->cancelarSolicitacao($cdU, $cdli);
