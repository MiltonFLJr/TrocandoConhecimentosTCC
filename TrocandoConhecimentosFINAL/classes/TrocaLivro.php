<?php

require_once 'LivroTrocaLivro.php';

class TrocaLivro extends LivroTrocaLivro {

    private $codigoTrocaLivro;
      
    public function cadastrarTrocaLivro($nomeLivro,$cdBook){
        
        
        $pendente="Pendente";
        
        include 'conexao.php';
        
        $stmt = $con->prepare("INSERT INTO troca_livro(nmLivro,cdLivro,cdUsuario,nomeUsuario,nomeLivroOferecido,email,statusTroca) VALUES (?,?,?,?,?,?,?) ");
        
        $stmt->bindParam(1,$nomeLivro);
         $stmt->bindParam(2,$cdBook);
        $stmt->bindParam(3,$_SESSION['cdUs']);
        $stmt->bindParam(4,$_SESSION['nome']);
        $stmt->bindParam(5,$_POST['nomebook']);
        $stmt->bindParam(6,$_SESSION['email']);
        $stmt->bindParam(7,$pendente);
        $stmt->execute();
        
    }
    
   public function aceitarTrocaLivro($cdTrocaLivro,$resultadoTroca){
  
      include 'conexao.php';
           
      $aceita = "Aceito";
      $pendente = "pendente";
      
      $stmt3 = $con->prepare("SELECT * FROM troca_livro WHERE cdTrocaLivro=?");
      
      $stmt3->bindParam(1,$cdTrocaLivro);
      
      $stmt3->execute();
     
      while($linha = $stmt3->fetch(PDO::FETCH_ASSOC)){
          
          $stmt4 = $con->prepare("INSERT INTO historico_de_troca(cdTrocaLivro,cdUsuario,cdLivro,nomeLivro,nomeLivroOferecido,resultadoTroca,dtTrocaLivro,dadosUsuarioTroca) VALUES (?,?,?,?,?,?,?,?)");
          
          $stmt4->bindParam(1,$linha['cdTrocaLivro']);
          $stmt4->bindParam(2,$linha['cdUsuario']);
          $stmt4->bindParam(3,$linha['cdLivro']);
          $stmt4->bindParam(4,$linha['nmLivro']);
          $stmt4->bindParam(5,$linha['nomeLivroOferecido']);
          $stmt4->bindParam(6,$resultadoTroca);
          $stmt4->bindParam(7,$linha['DATE']);
          $stmt4->bindParam(8,$linha['nomeUsuario']);
          
          $stmt4->execute();
          
          $stmt5 = $con->prepare("UPDATE troca_livro SET statusTroca=? WHERE cdTrocaLivro=? AND cdUsuario=? AND cdLivro=? AND nmLivro=? AND statusTroca=? AND nomeLivroOferecido=? AND DATE=? AND nomeUsuario=? ");
          
          $stmt5->bindParam(1,$aceita);
          $stmt5->bindParam(2,$linha['cdTrocaLivro']);
          $stmt5->bindParam(3,$linha['cdUsuario']);
          $stmt5->bindParam(4,$linha['cdLivro']);
          $stmt5->bindParam(5,$linha['nmLivro']);
          $stmt5->bindParam(6,$pendente);
          $stmt5->bindParam(7,$linha['nomeLivroOferecido']);
          $stmt5->bindParam(8,$linha['DATE']);
          $stmt5->bindParam(9,$linha['nomeUsuario']);

          $stmt5->execute();
                  
                  
      echo header('location:TELALGDhistoricoTrocas.php');
     
  }
      /* EXCLUIR DADOS DAS TABELAS DE TROCA PARA ALOCAR NO HISTÓRICO*/
       /*
      $stmt2 = $con->prepare("DELETE FROM livro_troca_livro WHERE cdTrocaLivro=?");
      
      $stmt2->bindParam(1,$cdTrocaLivro);
      
      $stmt2->execute();
      
      $stmt = $con->prepare("DELETE FROM troca_livro WHERE cdTrocaLivro=?");
      
      $stmt->bindParam(1,$cdTrocaLivro);
      
      $stmt->execute();
      */
      /* EXCLUIR DADOS DAS TABELAS DE TROCA PARA ALOCAR NO HISTÓRICO*/
  
  }
    
   public function alterarTrocaLivro(){
       
   }
   
   public function consultarTrocaLivro(){
       
        $_SESSION['nome'];
        $_SESSION['cdUs'];
         $_SESSION['email'];
         $_SESSION['senha'];
         
   include 'conexao.php';
   
   $stmt = $con->prepare("SELECT cdLivro FROM usuario_livro WHERE cdUsuario=? ");
   
   $stmt->bindParam(1,$_SESSION['cdUs']);
   
   $stmt->execute();
   
   while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
       
        $font = "font-family:Alfa Slab One, cursive";
        
       $pendente = "Pendente";
       
       $stmt2 = $con->prepare("SELECT nomeLivro FROM livro WHERE cdLivro=? ");
       
       $stmt2->bindParam(1,$linha['cdLivro']);
       
       $stmt2->execute();
       
       while($linha2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
   
           $stmt3 = $con->prepare("SELECT * FROM troca_livro WHERE nmLivro=? AND statusTroca=? ");
           
           $stmt3->bindParam(1,$linha2['nomeLivro']);
           $stmt3->bindParam(2,$pendente);
           $stmt3->execute();
           
           while($linha3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
              
               
                 echo "<form action='acoes/recusandoOuAceitandorSolicitacao.php' method='POST'>";
        echo "<table class='w3-table' border='2' id='customers'>";
        echo "<tr>";
        
        echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Meu Livro";
        echo "</th>";
        
         echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Livro Oferecido";
        echo "</th>";
        
           echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Status";
        echo "</th>";
        
        echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Ação";
        echo "</th>";
        
        echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Ação";
        echo "</th>";
        
        echo "</tr>";
        
        echo "<tr>";
        
        $cdTcL = $linha3['cdTrocaLivro'];
        echo "<input type='hidden' name='cdTrocaLivro' value='$cdTcL'>";

        echo "<td class='w3-center'>";
        echo $linha3['nmLivro'];
        echo "</td>";
        
        $booko = $linha3['nomeLivroOferecido'];
        
        echo "<td class='w3-center'>";
        echo $linha3['nomeLivroOferecido'];
        echo "<input type='hidden' name='livrooferecido' value='$booko'>";
        echo "</td>";
        
         echo "<td class='w3-center'>";
        echo $linha3['statusTroca'];
        echo "</td>";
        
        echo "<td class='w3-center'>";
        echo "<button type='submit' class='form-control' value='Aceito' name='sub'>Aceitar</button>";
        echo "</td>";
        
            echo "<td class='w3-center'>";
        echo "<button type='submit' class='form-control' value='Recusado' name='sub' >Recusar</button>";
        echo "</td>";
        
        echo "</table>";  
        echo "</form>";

               
           }
           
   }
               
   }
   
   }
   
   public function selecionarLivroParaTroca(){
       
   }
   
  public function enviarDemonstracaoDeInteresseDeTrocaParaUsuario(){
      
  }
  
  public function recusarTroca($cdTrocaLivro,$resultadoTroca){
      
      include 'conexao.php';
           
         $pendente = "Pendente";
      
      $stmt3 = $con->prepare("SELECT * FROM troca_livro WHERE cdTrocaLivro=?");
      
      $stmt3->bindParam(1,$cdTrocaLivro);
      
      $stmt3->execute();
     
      while($linha = $stmt3->fetch(PDO::FETCH_ASSOC)){
          
          $stmt4 = $con->prepare("INSERT INTO historico_de_troca(cdTrocaLivro,cdUsuario,cdLivro,nomeLivro,nomeLivroOferecido,resultadoTroca,dtTrocaLivro,dadosUsuarioTroca) VALUES (?,?,?,?,?,?,?,?)");
          
          $stmt4->bindParam(1,$linha['cdTrocaLivro']);
          $stmt4->bindParam(2,$linha['cdUsuario']);
          $stmt4->bindParam(3,$linha['cdLivro']);
          $stmt4->bindParam(4,$linha['nmLivro']);
          $stmt4->bindParam(5,$resultadoTroca);
          $stmt4->bindParam(6,$linha['nomeLivroOferecido']);
          $stmt4->bindParam(7,$linha['DATE']);
          $stmt4->bindParam(8,$linha['nomeUsuario']);
          
          $stmt4->execute();
          
             $stmt5 = $con->prepare("UPDATE troca_livro SET statusTroca=? WHERE cdTrocaLivro=? AND cdUsuario=? AND cdLivro=? AND nmLivro=? AND statusTroca=? AND nomeLivroOferecido=? AND DATE=? AND nomeUsuario=? ");
             
          $stmt5->bindParam(1,$resultadoTroca);
          $stmt5->bindParam(2,$linha['cdTrocaLivro']);
          $stmt5->bindParam(3,$linha['cdUsuario']);
          $stmt5->bindParam(4,$linha['cdLivro']);
          $stmt5->bindParam(5,$linha['nmLivro']);
          $stmt5->bindParam(6,$pendente);
          $stmt5->bindParam(7,$linha['nomeLivroOferecido']);
          $stmt5->bindParam(8,$linha['DATE']);
          $stmt5->bindParam(9,$linha['nomeUsuario']);

          $stmt5->execute();
          
      //echo header('location:TELALGDsolicitacoesPendentes.php');
     
  }
      /* EXCLUIR DADOS DAS TABELAS DE TROCA PARA ALOCAR NO HISTÓRICO*/
   /*   $stmt2 = $con->prepare("DELETE FROM livro_troca_livro WHERE cdTrocaLivro=?");
      
      $stmt2->bindParam(1,$cdTrocaLivro);
      
      $stmt2->execute();
      
      $stmt = $con->prepare("DELETE FROM troca_livro WHERE cdTrocaLivro=?");
      
      $stmt->bindParam(1,$cdTrocaLivro);
      
      $stmt->execute(); */
    
    /* EXCLUIR DADOS DAS TABELAS DE TROCA PARA ALOCAR NO HISTÓRICO*/

     
     echo header('location:TELALGDhistoricoTrocas.php');
      
  }
  
  public function exibirSolicitacoesEnviadas(){
      
      require_once('conexao.php');
      
       $pendente = "Pendente";
       
      $font = "font-family:Alfa Slab One, cursive"; 
      
        $_SESSION['nome'];
       $cdUsuario = $_SESSION['cdUs'];
         $_SESSION['email'];
         $_SESSION['senha'];
         
      $stmt = $con->prepare("SELECT cdLivro,cdUsuario FROM livro_troca_livro WHERE cdUsuario=?");
      
      $stmt->bindParam(1,$cdUsuario);
      
      $stmt->execute();
   
      while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
          
          $cdl = $linha['cdLivro'];
          $cdu = $linha['cdUsuario'];
          
          $stmt2 = $con->prepare("SELECT * FROM troca_livro WHERE cdLivro=? AND cdUsuario=? AND statusTroca=?");
          
          $stmt2->bindParam(1,$linha['cdLivro']);
          $stmt2->bindParam(2,$linha['cdUsuario']);
            $stmt2->bindParam(3,$pendente);
          $stmt2->execute();
      
          while($linha2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
              
              $livroOferecido = $linha2['nomeLivroOferecido'];
              $nmLivro = $linha2['nmLivro'];
              $DATE = $linha2['DATE'];
              $status = $linha2['statusTroca'];
              
              echo "
                  <div class='w3-container'>
      <form action='__DIR__./../acoes/cancelandoSolicitacao.php' method='POST'> 
      <input type='hidden' name='cdUs' value='$cdu'>
      <input type='hidden' name='cdlivro' value='$cdl'>
      <table border='2' class='w3-table'>
      <tr>
     <th class='w3-black w3-text-white w3-center' style='$font;'>Livro oferecido</th>
     <th class='w3-black w3-text-white w3-center' style='$font;'>Livro almejado</th>
     <th class='w3-black w3-text-white w3-center' style='$font;'>Status da troca</th>
     <th class='w3-black w3-text-white w3-center' style='$font;'>Data</th>
     <th class='w3-black w3-text-white w3-center' style='$font;'> </th>
</tr>

<tr>
<td class='w3-center'>$livroOferecido</td>
<td class='w3-center'>$nmLivro</td>
<td class='w3-center'>$status</td>    
<td class='w3-center'>$DATE</td>
<td class='w3-center'><input class='w3-button w3-blue w3-center' style='$font;' type='submit' value='Cancelar'></td>    
</tr>
</table>
</form>
</div>
";
              
          }
  }
      
  }
  
  public function cancelarSolicitacao($cdUs,$cdl){
      
      include('conexao.php');
      
      $stmt = $con->prepare("DELETE FROM livro_troca_livro WHERE cdUsuario=? AND cdLivro=?");
      
      $stmt->bindParam(1,$cdUs);
      $stmt->bindParam(2,$cdl);
      $stmt->execute();
      
      $stmt2 = $con->prepare("DELETE FROM troca_livro WHERE cdUsuario=? AND cdLivro=?");
      
      $stmt2->bindParam(1,$cdUs);
      $stmt2->bindParam(2,$cdl);
      $stmt2->execute();
      
      header('location:../solicitacoestrocaenviadas.php');
      
  }
  
}
