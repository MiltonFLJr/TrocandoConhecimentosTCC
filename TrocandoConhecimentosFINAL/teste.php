<?php
/*
$n = 0;

while($n < 2){
    
   
    
    echo "<table>";
    
    if($n < 1){
        
        echo" <tr>
    <th>Nome</th>
    <th>Idade</th>
</tr> ";
        
    }
    
echo "</table>";
     
    
     $n++;
}

*/

  require_once('conexao.php');
      
  session_start();
  
        //$_SESSION['nome'];
    $cdUsuario = 56;
         //$_SESSION['email'];
         //$_SESSION['senha'];
         
      $stmt = $con->prepare("SELECT cdLivro,cdUsuario FROM livro_troca_livro WHERE cdUsuario=?");
      
      $stmt->bindParam(1,$cdUsuario);
      
      $stmt->execute();
   
      while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
          
          $stmt2 = $con->prepare("SELECT * FROM troca_livro WHERE cdLivro=? AND cdUsuario=?");
          
          $stmt2->bindParam(1,$linha['cdLivro']);
          $stmt2->bindParam(2,$linha['cdUsuario']);
          $stmt2->execute();
      
          while($linha2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
              
              $livroOferecido = $linha2['nomeLivroOferecido'];
              $nmLivro = $linha2['nmLivro'];
              $DATE = $linha2['DATE'];
              $status = $linha2['statusTroca'];
              
              echo "
                  
      <table border='2'>
      <tr>
     <th>Livro oferecido</th>
     <th>Livro almejado</th>
     <th>Status da troca</th>
     <th>Data</th>
</tr>

<tr>
<td>$livroOferecido</td>
<td>$nmLivro</td>
<td>$status</td>    
<td>$DATE</td>
</tr>
</table>

";
              
          }
  }