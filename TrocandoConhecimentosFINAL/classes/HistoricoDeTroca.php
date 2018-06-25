<?php

 require_once "TrocaLivro.php";
 
class HistoricoDeTroca extends TrocaLivro {
 
   private $codigoHistoricoDeTroca;
   
   public function exibirHistoricoTroca(){
       
   include 'conexao.php';

        $_SESSION['nome'];
        $_SESSION['cdUs'];
         $_SESSION['email'];
         $_SESSION['senha'];
    
    $stmt= $con->prepare("SELECT cdLivro FROM usuario_livro WHERE cdUsuario=?");
        
    $stmt->bindParam(1,$_SESSION['cdUs']);
        
    $stmt->execute();
        
        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
            
            $cdLivros = ($linha['cdLivro']);
    
$stmt2 = $con->prepare("SELECT * FROM historico_de_troca WHERE cdLivro=? OR dadosUsuarioTroca=? ");

$stmt2->bindParam(1,$cdLivros);
$stmt2->bindParam(2,$_SESSION['nome']);

$stmt2->execute();

while($linha2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    
    echo "<center>";
    echo "<div class='w3-container'>";
     echo "<table border='2' class='w3-table w3-bordered w3-card-4'>";
     
          echo "<th class='w3-black w3-text-white w3-center'>";
          echo "Código livro";
          echo "</th>" ; 
          
          echo "<th class='w3-black w3-text-white w3-center'>";
          echo "Nome do livro";
          echo "</th>" ; 
          
            echo "<th class='w3-black w3-text-white w3-center'>";
          echo "Nome do livro oferecido";
          echo "</th>" ; 
          
            echo "<th class='w3-black w3-text-white w3-center'>";
          echo "Resultado da troca";
          echo "</th>" ; 
          
          echo "<th class='w3-black w3-text-white w3-center'>";
          echo "Usuário que ofereceu o livro";
          echo "</th>" ; 
          
            echo "<th class='w3-black w3-text-white w3-center'>";
          echo "Data da troca";
          echo "</th>" ; 
          
          echo  "</tr>";
          
          echo  "<tr>";
          
          echo  "<td class='w3-center'>";
        echo ($linha2['cdLivro']);
       echo "</td>";
       
        echo  "<td class='w3-center'>";
        echo $linha2['nomeLivro'];
       echo "</td>";
       
           echo  "<td class='w3-center'>";
        echo $linha2['resultadoTroca'];
       echo "</td>";

       echo  "<td class='w3-center'>";
        echo $linha2['nomeLivroOferecido'];
       echo "</td>";
       
        echo  "<td class='w3-center'>";
        echo $linha2['dadosUsuarioTroca'];
       echo "</td>";
       
        echo  "<td class='w3-center'>";
        echo $linha2['dtTrocaLivro'];
       echo "</td>";
       
       echo "</tr>";
       
      echo "</table>";
      echo "</div>";
    echo "</center>";
}
   
}


   }

}