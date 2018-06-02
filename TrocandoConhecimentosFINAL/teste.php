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

/* -----------------------------------------------------------------------------------------------------------------*/

/*
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
 */

/* -----------------------------------------------------------------------------------------------------------------*/

include 'conexao.php';
     
     $font = "font-family:Alfa Slab One, cursive";
     $cdu = $_SESSION['cdUs'];
     
    $stmt = $con->prepare("SELECT cdLivro FROM usuario_livro WHERE cdUsuario=? ");
    
    $stmt->bindParam(1,$cdu);
    
    $stmt->execute();
    
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        $cdLivro = $linha['cdLivro'];
        
       $stmt2 = $con->prepare("SELECT * FROM livro WHERE cdLivro<>?");
        
             $stmt2->bindParam(1,$cdLivro);

        $stmt2->execute();
    
    while($linha2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
 
         $nome = $linha2['nomeLivro'];
         $cdLivro = $linha2['cdLivro'];   
         $capa = $linha2['capa'];   
         $autor = $linha2['autorLivro'];
         $idade = $linha2['idadeLivro'];
         $estado = $linha2['estadoConservacaoLivro'];
         $genero = $linha2['generoLivro'];
         
         echo "<form class='w3-container' action='acoes/enviandoSolicitacaoLivro.php' method='POST'>";
        echo "<table class='w3-table' border='2'>";
        echo "<tr>";
        
        echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Capa";
        echo "</th>";
        
         echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "ID";
        echo "</th>";
        
           echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Nome";
        echo "</th>";
        
        echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Autor";
        echo "</th>";
        
        echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Idade";
        echo "</th>";
        
         echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Estado de conservação";
        echo "</th>";
        
        echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Gênero";
        echo "</th>";
        
      echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Oferecer Livro";
        echo "</th>";
        
        echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Ação";
        echo "</th>";
        
        echo "</tr>";
        
        echo "<tr>";
        echo "<td class='w3-center w3-hover-blue'>";
        echo "<img src='capaslivros/$capa' width='120' height='150' ";
        echo "</td>";
        
        echo "<td class='w3-center w3-hover-blue'>";
        echo $cdLivro;
        echo "<input type='hidden' name='cd' value='$cdLivro'>";
        echo "</td>";
        
         echo "<td class='w3-center w3-hover-blue'>";
        echo $nome;
        echo "<input type='hidden' name='nomeLivro' value='$nome'>";
        echo "</td>";
        
        echo "<td class='w3-center w3-hover-blue'>";
        echo $autor;
        echo "</td>";
        
        echo "<td class='w3-center w3-hover-blue'>";
        echo $idade;
        echo "</td>";
        
        echo "<td class='w3-center w3-hover-blue'>";
        echo $estado;
        echo "</td>";
        
         echo "<td class='w3-center w3-hover-blue'>";
        echo $genero;
        echo "</td>";
        
        
         echo "<td>";
         
         /* SELECT PARA TRAZER O NOME DOS LIVROS DO USUARIO */
           
             $stmt3= $con->prepare("SELECT cdLivro FROM usuario_livro WHERE cdUsuario=?");
        
        $stmt3->bindParam(1,$cdu);
        
        $stmt3->execute();
        
        while($linha3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
            
            $cdLivros = ($linha3['cdLivro']);
            //var_dump($cdLivros);
            
                    $stmt4 = $con->prepare("SELECT nomeLivro FROM livro WHERE cdLivro=?");
        
        $stmt4->bindParam(1,$cdLivros);
        
        $stmt4->execute();
        
        while($linha4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
 
             $nome = $linha4['nomeLivro'];
         echo "<p>";
        echo "<input type='radio' name='nomebook' value='$nome'>$nome</input>";
       echo "</p>";

       /* SELEÇÃO POR MENU SEM USO
        echo "<select class='form-control' name='nomebook'>";
        echo "<option value='$nome'>$nome</option>";
        echo "</select>";
        
SELEÇÃO POR MENU SEM USO */
            
        }
        
        }
          
  /*SELECT PARA TRAZER O NOME DOS LIVROS DO USUARIO*/ 
        
        echo "</td>"; 
        
        echo "<td>";
        echo "<button type='submit' class='w3-button w3-blue' style='$font;'>Enviar solicitação troca</button>";
        echo "</td>";
        
        echo "</tr>";
        echo "</table>";  
        echo "</form>";
    
}

}