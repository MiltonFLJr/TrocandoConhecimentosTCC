<?php
include '../conexao.php';
require_once(__DIR__.'/../classes/TrocaLivro.php');;

  session_start();

        $_SESSION['nome'];
        $_SESSION['cdUs'];
         $_SESSION['email'];
         $_SESSION['senha'];

$nomeBook =$_POST['nomeLivro'];
$cdLivro =$_POST['cd'];

//VERIFICANDO SE UMA SOLICITAÇÃO JA NÃO FOI ENVIADA 

$statement = $con->prepare("SELECT cdLivro,nmLivro,nomeUsuario FROM troca_livro WHERE cdLivro=? AND nmLivro=? AND nomeUsuario=?");

$statement->bindParam(1,$cdLivro);
$statement->bindParam(2,$nomeBook);
$statement->bindParam(3,$_SESSION['nome']);
$statement->execute();

$livros = $statement->fetchAll(PDO::FETCH_ASSOC);

 if( count($livros) <= 0)
 {
// VERIFICANDO SE UMA SOLICITAÇÃO JA NÃO FOI ENVIADA 

$solicitacaotroca = new TrocaLivro();

$solicitacaotroca->cadastrarTrocaLivro($nomeBook,$cdLivro);

 /* INSERT NA livro_troca_livro */
      
 $stmt = $con->prepare("SELECT cdTrocaLivro FROM troca_livro WHERE cdUsuario=?");
 
 $stmt->bindParam(1,$_SESSION['cdUs']);

 $stmt->execute();
 
 while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
   
     $stmt2 = $con->prepare("INSERT INTO livro_troca_livro(cdLivro,cdUsuario,cdTrocaLivro) VALUES (?,?,?) ");
        
   $stmt2->bindParam(1,$cdLivro);
   $stmt2->bindParam(2,$_SESSION['cdUs']);
   $stmt2->bindParam(3,$linha['cdTrocaLivro']);
   
   $stmt2->execute();
   
   /* INSERT NA livro_troca_livro */
 }

   echo "<script>";
   echo "location.href='../solicitacaolivroenviada.php'";
   echo "</script>";
   

// echo header('location:TELALGDmeusLivros.php');
}else{
    header('location:../acoes/erroSolicitacaoRepetida.php');
}
?>
