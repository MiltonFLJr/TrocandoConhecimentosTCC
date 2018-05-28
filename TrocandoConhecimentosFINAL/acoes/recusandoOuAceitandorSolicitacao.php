<?php

require_once '../classes/TrocaLivro.php';

$submit = $_POST['sub'];

$cdTrocaL = $_POST['cdTrocaLivro'];

$livro = new TrocaLivro();

if($submit=="Recusado"){

$livro->recusarTroca($cdTrocaL,"Recusado");

}else{
    
    $livro->aceitarTrocaLivro($cdTrocaL,"Aceito");
    
}
?>