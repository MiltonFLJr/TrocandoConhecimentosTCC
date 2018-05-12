<?php

require_once 'Usuario.php';

class Livro extends Usuario{
    
//private $codigoLivro;
private $nomeLivro;
private $autorLivro;
private $idadeLivro;
private $estadoConservacaoLivro;
private $generoLivro;

public function getCodigoLivro() {
    return $this->codigoLivro;
}

public function getNomeLivro() {
    return $this->nomeLivro;
}

public function getAutorLivro() {
    return $this->autorLivro;
}

public function getIdadeLivro() {
    return $this->idadeLivro;
}

public function getEstadoConservacaoLivro() {
    return $this->estadoConservacaoLivro;
}

public function getGeneroLivro() {
    return $this->generoLivro;
}

public function setCodigoLivro($codigoLivro) {
    $this->codigoLivro = $codigoLivro;
}

public function setNomeLivro($nomeLivro) {
    $this->nomeLivro = $nomeLivro;
}

public function setAutorLivro($autorLivro) {
    $this->autorLivro = $autorLivro;
}

public function setIdadeLivro($idadeLivro) {
    $this->idadeLivro = $idadeLivro;
}

public function setEstadoConservacaoLivro($estadoConservacaoLivro) {
    $this->estadoConservacaoLivro = $estadoConservacaoLivro;
}

public function setGeneroLivro($generoLivro) {
    $this->generoLivro = $generoLivro;
}

public function cadastrarMeuLivro($nomeLivro, $autorLivro,$idadeLivro,$estadoConservacaoLivro,$generoLivro, $cdUsuario){
    ini_set('default_charset', 'UTF-8');
    include 'conexao.php';
    
     if(isset($_FILES['image'])){
     $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="capaslivros/";
    move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
    

    $ultimoCd = $con->query("SELECT max(cdLivro) as cdLivro FROM livro")->fetch();
    if($ultimoCd['cdLivro'] == NULL){
        $codigoLivro = 1;
    }else{
        $codigoLivro = ++$ultimoCd['cdLivro'];
    }


    $this->setCodigoLivro($codigoLivro);
    $this->setNomeLivro($nomeLivro);
    $this->setAutorLivro($autorLivro);
    $this->setIdadeLivro($idadeLivro);
    $this->setEstadoConservacaoLivro($estadoConservacaoLivro);
    $this->setGeneroLivro($generoLivro);
      

    
    $cd = $this->getCodigoLivro();
    $nome = $this->getNomeLivro();
    $autor = $this->getAutorLivro();
    $idade = $this->getIdadeLivro();
    $estadoconservacao = $this->getEstadoConservacaoLivro();
    $genero = $this->getGeneroLivro();
    
    $stmt = $con->prepare("INSERT INTO livro VALUES (?,?,?,?,?,?,?)");
    
  
    $stmt->bindParam(1,$cd); 
    $stmt->bindParam(2,$novo_nome); 
    $stmt->bindParam(3,$nome);
    $stmt->bindParam(4,$autor); 
    $stmt->bindParam(5,$idade); 
    $stmt->bindParam(6,$estadoconservacao);
    $stmt->bindParam(7,$genero);
    
    $stmt->execute();



    //CADASTRANDO USUARIO_LIVRO

    $ultimoCdUsuarioLivro = $con->query("SELECT max(cdUsuarioLivro) as cdUsuarioLivro FROM usuario_livro")->fetch();
    if($ultimoCdUsuarioLivro['cdUsuarioLivro'] == NULL){
        $codigoUsuarioLivro = 1;
    }else{
        $codigoUsuarioLivro = ++$ultimoCdUsuarioLivro['cdUsuarioLivro'];
    }

    $stmt2 = $con->prepare("INSERT INTO usuario_livro VALUES (?, ?, ?)");

//echo '$cd = '. $cd."<br>";
//echo '$cdUsuario = ' . $cdUsuario."<br>";
//echo '$codigoUsuarioLivro = ' .$codigoUsuarioLivro."<br>";
    $stmt2->bindParam(1,$cd); 
    $stmt2->bindParam(2,$cdUsuario); 
    $stmt2->bindParam(3,$codigoUsuarioLivro);
    $stmt2->execute();
    
    }
    
}


public function excluirMeuLivro($id){
    
    include 'conexao.php';
    
    $stmt = $con->prepare("DELETE FROM livro WHERE cdLivro=?");
    
    $stmt->bindParam(1,$id);
    
    $stmt->execute();
    
    $stmt2 = $con->prepare("DELETE FROM usuario_livro WHERE cdLivro=?");
    
    $stmt2->bindParam(1,$id);
    
    $stmt2->execute();
    
    echo "<script language='javascript'>";
     echo "location.href='/TrocandoConhecimentosTCC/TrocandoConhecimentosFINAL/meuslivroscadastrados.php'";
     echo "</script>";

    
}

public function alterarMeuLivro($codigoLivro,$nomeLivro,$autorLivro,$idadeLivro,$estadoConservacaoLivro,$generoLivro){
    
      include 'conexao.php';
        
         $this->setCodigoLivro($codigoLivro);
    $this->setNomeLivro($nomeLivro);
    $this->setAutorLivro($autorLivro);
    $this->setIdadeLivro($idadeLivro);
    $this->setEstadoConservacaoLivro($estadoConservacaoLivro);
    $this->setGeneroLivro($generoLivro);
      
         $cd = $this->getCodigoLivro();
    $nome = $this->getNomeLivro();
    $autor = $this->getAutorLivro();
    $idade = $this->getIdadeLivro();
    $estadoconservacao = $this->getEstadoConservacaoLivro();
    $genero = $this->getGeneroLivro();
    
    if( ($nome<>NULL) && ($autor<>NULL) && ($idade<>NULL) && ($estadoconservacao<>NULL) && ($genero<>NULL)){
    
      /*
     $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="capaslivros/";
    move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
        */
        
        $stmt= $con->prepare("UPDATE livro SET nomeLivro=?, autorLivro=?, idadeLivro=?,estadoConservacaoLivro=?,generoLivro=? WHERE cdLivro=?");
        
        
        $stmt->bindParam(1,$nome);
        $stmt->bindParam(2,$autor);
        $stmt->bindParam(3,$idade);
        $stmt->bindParam(4,$estadoconservacao);
        $stmt->bindParam(5,$genero);
        $stmt->bindParam(6,$cd);
        
        $stmt->execute();
  
        
   echo "<html>";
   echo "<head>";
   echo "<meta http-equiv='refresh' content='0;url=TELALGDmeusLivros.php'>";
   echo "</head>";
    echo "</html>";   
    
    }elseif( ($nome<>NULL) && ($autor==NULL) && ($idade==NULL) && ($estadoconservacao==NULL) && ($genero==NULL)){
    
          $stmt= $con->prepare("UPDATE livro SET nomeLivro=? WHERE cdLivro=?");
        
        $stmt->bindParam(1,$nome);
       $stmt->bindParam(2,$cd);
       
        $stmt->execute();
        
          echo "<html>";
   echo "<head>";
   echo "<meta http-equiv='refresh' content='0;url=TELALGDmeusLivros.php'>";
   echo "</head>";
    echo "</html>";   
    
    
    }elseif( ($nome==NULL) && ($autor<>NULL) && ($idade==NULL) && ($estadoconservacao==NULL) && ($genero==NULL)){
    
          $stmt= $con->prepare("UPDATE livro SET autorLivro=? WHERE cdLivro=?");
        
        $stmt->bindParam(1,$autor);
        $stmt->bindParam(2,$cd);
       
        $stmt->execute();
        
          echo "<html>";
   echo "<head>";
   echo "<meta http-equiv='refresh' content='0;url=TELALGDmeusLivros.php'>";
   echo "</head>";
    echo "</html>";   
   
    }elseif( ($nome==NULL) && ($autor==NULL) && ($idade<>NULL) && ($estadoconservacao==NULL) && ($genero==NULL)){
    
          $stmt= $con->prepare("UPDATE livro SET idadeLivro=? WHERE cdLivro=?");
        
        $stmt->bindParam(1,$idade);
        $stmt->bindParam(2,$cd);
       
        $stmt->execute();
        
          echo "<html>";
   echo "<head>";
   echo "<meta http-equiv='refresh' content='0;url=TELALGDmeusLivros.php'>";
   echo "</head>";
    echo "</html>";   
    
    
    }elseif( ($nome==NULL) && ($autor==NULL) && ($idade==NULL) && ($estadoconservacao<>NULL) && ($genero==NULL)){
    
          $stmt= $con->prepare("UPDATE livro SET estadoConservacaoLivro=? WHERE cdLivro=?");
        
        $stmt->bindParam(1,$estadoconservacao);
        $stmt->bindParam(2,$cd);
       
        $stmt->execute();
        
          echo "<html>";
   echo "<head>";
   echo "<meta http-equiv='refresh' content='0;url=TELALGDmeusLivros.php'>";
   echo "</head>";
    echo "</html>";   
   
    } elseif( ($nome==NULL) && ($autor==NULL) && ($idade<>NULL) && ($estadoconservacao==NULL) && ($genero<>NULL)){
    
          $stmt= $con->prepare("UPDATE livro SET generoLivro=? WHERE cdLivro=?");
        
        $stmt->bindParam(1,$genero);
        $stmt->bindParam(2,$cd);
       
        $stmt->execute();
        
          echo "<html>";
   echo "<head>";
   echo "<meta http-equiv='refresh' content='0;url=TELALGDmeusLivros.php'>";
   echo "</head>";
    echo "</html>";   
    
    } elseif( ($nome<>NULL) && ($autor<>NULL) && ($idade==NULL) && ($estadoconservacao==NULL) && ($genero==NULL)){
    
          $stmt= $con->prepare("UPDATE livro SET nomeLivro=?,autorLivro=? WHERE cdLivro=?");
        
        $stmt->bindParam(1,$nome);
        $stmt->bindParam(2,$autor);
        $stmt->bindParam(3,$cd);
       
        $stmt->execute();
        
          echo "<html>";
   echo "<head>";
   echo "<meta http-equiv='refresh' content='0;url=TELALGDmeusLivros.php'>";
   echo "</head>";
    echo "</html>";   
    
    }elseif( ($nome<>NULL) && ($autor==NULL) && ($idade<>NULL) && ($estadoconservacao==NULL) && ($genero<>NULL)){
    
          $stmt= $con->prepare("UPDATE livro SET nomeLivro=?,idadeLivro=? WHERE cdLivro=?");
        
        $stmt->bindParam(1,$nome);
        $stmt->bindParam(2,$idade);
        $stmt->bindParam(3,$cd);
       
        $stmt->execute();
        
          echo "<html>";
   echo "<head>";
   echo "<meta http-equiv='refresh' content='0;url=TELALGDmeusLivros.php'>";
   echo "</head>";
    echo "</html>";   
    
    }elseif( ($nome<>NULL) && ($autor==NULL) && ($idade==NULL) && ($estadoconservacao<>NULL) && ($genero==NULL)){
    
          $stmt= $con->prepare("UPDATE livro SET nomeLivro=?,estadoConservacaoLivro=? WHERE cdLivro=?");
        
        $stmt->bindParam(1,$nome);
        $stmt->bindParam(2,$estadoConservacaoLivro);
        $stmt->bindParam(3,$cd);
       
        $stmt->execute();
        
          echo "<html>";
   echo "<head>";
   echo "<meta http-equiv='refresh' content='0;url=TELALGDmeusLivros.php'>";
   echo "</head>";
    echo "</html>";   
    
    }elseif( ($nome<>NULL) && ($autor==NULL) && ($idade==NULL) && ($estadoconservacao==NULL) && ($genero<>NULL)){
    
          $stmt= $con->prepare("UPDATE livro SET nomeLivro=?,generoLivro=? WHERE cdLivro=?");
        
        $stmt->bindParam(1,$nome);
        $stmt->bindParam(2,$genero);
        $stmt->bindParam(3,$cd);
       
        $stmt->execute();
        
          echo "<html>";
   echo "<head>";
   echo "<meta http-equiv='refresh' content='0;url=TELALGDmeusLivros.php'>";
   echo "</head>";
    echo "</html>";   
    
    }
    
    
}

public function consultarMeuLivro(){
        
        include 'conexao.php';

        $_SESSION['nome'];
        $_SESSION['cdUs'];
         $_SESSION['email'];
         $_SESSION['senha'];
        
         $font = "font-family:Alfa Slab One, cursive";
                 
        $stmt= $con->prepare("SELECT cdLivro FROM usuario_livro WHERE cdUsuario=?");
        
        $stmt->bindParam(1,$_SESSION['cdUs']);
        
        $stmt->execute();
        
        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
            
            $cdLivros = ($linha['cdLivro']);
            //var_dump($cdLivros);
            
                    $stmt2 = $con->prepare("SELECT * FROM livro WHERE cdLivro=? ");
        
        $stmt2->bindParam(1,$cdLivros);
        
        $stmt2->execute();
        
        while($linha2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
 
             $nome = $linha2['nomeLivro'];
         $cdLivro = $linha2['cdLivro'];   
         $capa = $linha2['capa'];   
         $autor = $linha2['autorLivro'];
         $idade = $linha2['idadeLivro'];
         $estado = $linha2['estadoConservacaoLivro'];
         $genero = $linha2['generoLivro'];
         
         echo"
   
    <form method='POST' action='../TrocandoConhecimentosFINAL/acoes/excluindoLivro.php'>
    <input type='hidden' name='cd' value='$cdLivro'>
        
      <div class='w3-container'>
   <table class='w3-table' border='2'>
<tr>
<th class='w3-black w3-text-white w3-center' style='$font;'>Capa</th>
<th class='w3-black w3-text-white w3-center' style='$font;'>Nome</th>
<th class='w3-black w3-text-white w3-center' style='$font;'>Autor</th>
<th class='w3-black w3-text-white w3-center' style='$font;'>Tempo de uso</th>
<th class='w3-black w3-text-white w3-center' style='$font;'>Estado de conservacao</th>
<th class='w3-black w3-text-white w3-center w3-resposnsive' style='$font;'>Genero</th>
<th class='w3-black w3-text-white w3-center w3-resposnsive' style='font-family: $font;'> </th>
<th class='w3-black w3-text-white w3-center w3-resposnsive' style='font-family: '$font;'> </th>
</tr>

<br >
<tr>
  <td class='w3-light-gray w3-hover-blue w3-hide-small w3-hide-medium w3-resposnsive'>
    <img class='w3-image w3-center' width='100' src='capaslivros/$capa'>
  </td>

<td class='w3-light-gray w3-hover-blue w3-resposnsive w3-hide-small w3-hide-large'>
    <img class='w3-image w3-center' width='100' src='capaslivros/$capa'>
  </td>

  <td class='w3-light-gray w3-hover-blue w3-resposnsive w3-hide-medium w3-hide-large'>
    <img class='w3-image w3-center' width='100' src='capaslivros/$capa'>
  </td>


<td class='w3-center w3-hover-blue'>$nome</td> 

<td class='w3-center w3-hover-blue'>$autor</td> 

<td class='w3-center w3-hover-blue'>$idade</td> 

<td class='w3-center w3-hover-blue'>$estado</td> 

<td class='w3-center w3-hover-blue'>$genero</td> 
    
<td class='w3-center'><a href='#' class='w3-button w3-blue' style='$font;'>Alterar</a></td> 

<td class='w3-center'><button type='submit' class='w3-button w3-blue' style='$font;'>Excluir</button></td>

</tr>

   </table>
 </div>
</form>
";

            
        }
        
        }
        /*
        $stmt2 = $con->prepare("SELECT * FROM livro WHERE cdLivro=? ");
        
        $stmt2->bindParam(1,$cdUsuario);
        
        $stmt2->execute();
        
        while($linha = $stmt2->fetch(PDO::FETCH_ASSOC)){
            
         $nome = $linha['nomeLivro'];
         $cdLivro = $linha['cdLivro'];   
         $capa = $linha['capa'];   
         $autor = $linha['autorLivro'];
         $idade = $linha['idadeLivro'];
         $estado = $linha['estadoConservacaoLivro'];
         $genero = $linha['generoLivro'];
         
        echo "<form action='CDexcluirLivro.php' method='POST'>";
        echo "<table border='2' id='customers'>";
        echo "<tr>";
        
        echo "<th>";
        echo "Capa";
        echo "</th>";
        
         echo "<th>";
        echo "ID";
        echo "</th>";
        
           echo "<th>";
        echo "Nome";
        echo "</th>";
        
        echo "<th>";
        echo "Autor";
        echo "</th>";
        
        echo "<th>";
        echo "Idade";
        echo "</th>";
        
         echo "<th>";
        echo "Estado de conservação";
        echo "</th>";
        
        echo "<th>";
        echo "Gênero";
        echo "</th>";
        
        echo "<th>";
        echo "Ações";
        echo "</th>";
        
        echo "</tr>";
        
        echo "<tr>";
        echo "<td>";
        echo "<img src='/PJTC/capaslivros/$capa' width='120' height='150' ";
        echo "</td>";
        
        echo "<td>";
        echo $cdLivro;
        echo "<input type='hidden' name='cd' value='$cdLivro'>";
        echo "</td>";
        
         echo "<td>";
        echo $nome;
        echo "</td>";
        
        echo "<td>";
        echo $autor;
        echo "</td>";
        
        echo "<td>";
        echo $idade;
        echo "</td>";
        
        echo "<td>";
        echo $estado;
        echo "</td>";
        
         echo "<td>";
        echo $genero;
        echo "</td>";
        
        
        echo "<td>";
        echo "<input type='submit' value='Excluir'>";
        echo "</td>";
        
        echo "</table>";  
        echo "</form>";
        
        }
    */
}

public function PesquisarLivroParaTrocar($info){
    
    include 'conexao.php';
    
    include 'CDiniciarSessao.php';
    
    $stmt = $con->prepare("SELECT cdLivro FROM usuario_livro WHERE cdUsuario=? ");
    
    $stmt->bindParam(1,$_SESSION['cdUs']);
    
    $stmt->execute();
    
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        $cdLivro = $linha['cdLivro'];
        
       $stmt2 = $con->prepare("SELECT * FROM livro WHERE nomeLivro=? OR autorLivro=? OR idadeLivro=? OR estadoConservacaoLivro=? OR generoLivro=? AND cdLivro<>?");
        
        $stmt2->bindParam(1,$info);
         $stmt2->bindParam(2,$info);
          $stmt2->bindParam(3,$info);
           $stmt2->bindParam(4,$info);
            $stmt2->bindParam(5,$info);
             $stmt2->bindParam(6,$cdLivro);

        $stmt2->execute();
    
    while($linha2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
 
         $nome = $linha2['nomeLivro'];
         $cdLivro = $linha2['cdLivro'];   
         $capa = $linha2['capa'];   
         $autor = $linha2['autorLivro'];
         $idade = $linha2['idadeLivro'];
         $estado = $linha2['estadoConservacaoLivro'];
         $genero = $linha2['generoLivro'];
         
         echo "<form action='CDenviandoSolicitacaoLivro.php' method='POST'>";
        echo "<table border='2' id='customers'>";
        echo "<tr>";
        
        echo "<th>";
        echo "Capa";
        echo "</th>";
        
         echo "<th>";
        echo "ID";
        echo "</th>";
        
           echo "<th>";
        echo "Nome";
        echo "</th>";
        
        echo "<th>";
        echo "Autor";
        echo "</th>";
        
        echo "<th>";
        echo "Idade";
        echo "</th>";
        
         echo "<th>";
        echo "Estado de conservação";
        echo "</th>";
        
        echo "<th>";
        echo "Gênero";
        echo "</th>";
        
      echo "<th>";
        echo "Oferecer Livro";
        echo "</th>";
        
        echo "<th>";
        echo "Ação";
        echo "</th>";
        
        echo "</tr>";
        
        echo "<tr>";
        echo "<td>";
        echo "<img src='/PJTCWEBH/capaslivros/$capa' width='120' height='150' ";
        echo "</td>";
        
        echo "<td>";
        echo $cdLivro;
        echo "<input type='hidden' name='cd' value='$cdLivro'>";
        echo "</td>";
        
         echo "<td>";
        echo $nome;
        echo "<input type='hidden' name='nomeLivro' value='$nome'>";
        echo "</td>";
        
        echo "<td>";
        echo $autor;
        echo "</td>";
        
        echo "<td>";
        echo $idade;
        echo "</td>";
        
        echo "<td>";
        echo $estado;
        echo "</td>";
        
         echo "<td>";
        echo $genero;
        echo "</td>";
        
        
         echo "<td>";
         
         /* SELECT PARA TRAZER O NOME DOS LIVROS DO USUARIO */
           
             $stmt3= $con->prepare("SELECT cdLivro FROM usuario_livro WHERE cdUsuario=?");
        
        $stmt3->bindParam(1,$_SESSION['cdUs']);
        
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
        echo "<button type='submit' class='form-control' value='Excluir'>Enviar solicitação troca</button>";
        echo "</td>";
        
        echo "</tr>";
        echo "</table>";  
        echo "</form>";
    
}

}

    }
    
}
    
