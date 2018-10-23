<!DOCTYPE html>
<html>
<head>    
<title>Cadastrar livro</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/w3.css">
<link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">

<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet">
    </head>    
    
<body>
    
  <?php
    
  
    session_start();

        $_SESSION['nome'];
        $_SESSION['cdUs'];
         $_SESSION['email'];
         $_SESSION['senha'];
  
  if( isset($_SESSION['email']) && isset($_SESSION['senha']) ){
      
  }else{
     
         header('Location: login.php');
   } 
  
  ?>
    
    
    <!-- BARRA DE NAVEGAÇAO DESKTOP -->
       <div class="w3-top">
 <div class="w3-bar w3-black w3-border-4 w3-mobile w3-card-4 w3-large w3-hide-small w3-hide-medium">

     <a href="#" class="w3schools-logo w3-left">
     <img class="w3-image" hegiht="50" width="60" src="imgs/logo.png"> 
     </a>     
     
         
         <div class="w3-dropdown-click">
  <button onclick="myFunction()" class="w3-button w3-black" style="font-family: 'Alfa Slab One', cursive;">Conta ▼</button>
  <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
    <a href="consultardados.php" class="w3-bar-item w3-button">Consultar dados pessoais</a>
      <a href="alterardados.php" class="w3-bar-item w3-button">Alterar dados pessoais</a>
    <a href="excluirconta.php" class="w3-bar-item w3-button">Excluir conta</a>
  </div>
</div>

<div class="w3-dropdown-click">
  <button onclick="myFunction2()" class="w3-button w3-black" style="font-family: 'Alfa Slab One', cursive;">Livros ▼</button>
  <div id="Demo2" class="w3-dropdown-content w3-bar-block w3-border" style="width:210px;" >
      <a href="cadastrarlivro.php" class="w3-bar-item w3-button">Cadastrar livros</a>
   <a href="#" class="w3-bar-item w3-button">Meus livros</a>
  </div>
</div>

<div class="w3-dropdown-click">
  <button onclick="myFunction3()" class="w3-button w3-black" style="font-family: 'Alfa Slab One', cursive;">Trocas ▼</button>
  <div id="Demo3" class="w3-dropdown-content w3-bar-block w3-border">
    <a href="solicitacoestrocaenviadas.php" class="w3-bar-item w3-button">Solicitaçoes enviadas</a>
    <a href="solicitacoespendentestroca.php" class="w3-bar-item w3-button">Solicitaçoes recebidas</a>
    <a href="historicodetrocas.php" class="w3-bar-item w3-button">Historico</a>
  </div>
</div>

     <form class="w3-bar-item w3-mobile" action="pesquisarlivro.php" method="POST">
     <input type="text" name="info" class="w3-bar-item w3-input w3-mobile w3-center" placeholder="Pesquisar livro..." style="padding:5px; width:150px;" />
      <button type="submit" class="w3-button w3-blue w3-mobile" style="padding:5px;font-family: 'Alfa Slab One', cursive;">Buscar</button>      
     </form>
     
   
     <a href="acoes/encerrarSessao.php" class="w3-bar-tiem w3-button w3-mobile w3-right" style="font-family: 'Alfa Slab One', cursive;">Sair</a>
     
<a class="w3-right w3-hide-medium w3-hide-small">
     <i style="position:relative;top:10px;right:-3px;"> <?php print_r($_SESSION['nome']) ?> </i> 
     </a>     

       <a class="w3-right w3-hide-medium w3-hide-small">

     <?php 

include 'conexao.php';

$stmt = $con->prepare("SELECT avatar FROM usuario WHERE email=?");

$stmt->bindParam(1,$_SESSION['email']);

$stmt->execute();

while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){

$avatar = $linha['avatar'];

 echo"<img class='w3-image w3-center' width='50' src='avatarusuarios/$avatar'>";

}


     ?>

     </a>     

    </div>   
    </div>
      <!-- BARRA DE NAVEGAÇAO DESKTOP -->
    
<!-- BARRA DE NAVEGAÇAO DISPOSITIVOS MENORES -->
    <div class="w3-top">
     <div class="w3-bar w3-black w3-hide-large w3-border-4 w3-card-4 w3-mobile w3-padding-small">
         

          <a class="w3-left w3-hide-large">
     
<?php 

include 'conexao.php';

$stmt = $con->prepare("SELECT avatar FROM usuario WHERE email=?");

$stmt->bindParam(1,$_SESSION['email']);

$stmt->execute();

while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){

$avatar = $linha['avatar'];

 echo"<img class='w3-image w3-center' width='50' src='avatarusuarios/$avatar'>";

}


     ?>

     </a>     

         <a class="w3-bar-item w3-left w3-hide-large">
     <i style="position:relative;top:10px;"><?php print_r($_SESSION['nome']) ?></i> 
     </a>     
       
 <!--SIDEBAR -->
         <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none;right:0;background-color:#2B2B2B;" id="mySidebar">
  
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>

   <div class="w3-center"><a class="w3schools-logo w3-mobile">
     <img class="w3-image" hegiht="50" width="60" src="imgs/logo.png"> 
     </a>     </div>
    
 
                <div class="w3-dropdown-click">
  <button onclick="myFunction4()" class="w3-button w3-center" style="font-family: 'Alfa Slab One', cursive;background-color:#2B2B2B;">Conta ▼</button>
  <div id="Demo4" class="w3-dropdown-content w3-bar-block w3-border">
       <a href="consultardados.php" class="w3-bar-item w3-button">Consultar dados pessoais</a>
      <a href="alterardados.php" class="w3-bar-item w3-button">Alterar dados pessoais</a>
    <a href="excluirconta.php" class="w3-bar-item w3-button">Excluir conta</a>
  </div>
</div>

     
  <div class="w3-dropdown-click">
  <button onclick="myFunction5()" class="w3-button w3-center" style="font-family: 'Alfa Slab One', cursive;background-color:#2B2B2B;">Livros ▼</button>
  <div id="Demo5" class="w3-dropdown-content w3-bar-block w3-border" style="width:210px;" >
    <a href="cadastrarlivro.php" class="w3-bar-item w3-button">Cadastrar livros</a>
   <a href="#" class="w3-bar-item w3-button">Meus livros</a>
  </div>
</div>
   
     
        <div class="w3-dropdown-click">
  <button onclick="myFunction6()" class="w3-button w3-center" style="font-family: 'Alfa Slab One', cursive;background-color:#2B2B2B;">Trocas ▼</button>
  <div id="Demo6" class="w3-dropdown-content w3-bar-block w3-border">
    <a href="solicitacoestrocaenviadas.php" class="w3-bar-item w3-button">Solicitaçoes enviadas</a>
    <a href="solicitacoespendentestroca.php" class="w3-bar-item w3-button">Solicitaçoes recebidas</a>
    <a href="historicodetrocas.php" class="w3-bar-item w3-button">Historico</a>
  </div>
</div>

  <a href="/acoes/encerrarSecao.php" class="w3-bar-item w3-button w3-mobile w3-center"  style="font-family: 'Alfa Slab One', cursive;">Sair</a>
            
  <form class="w3-bar-item w3-mobile" action="aleatoria.php" method="POST">
     <input type="text" name="info" class="w3-bar-item w3-input w3-mobile" placeholder="Pesquisar livro..." style="padding:5px;">
       <input type="submit" class="w3-button w3-blue w3-mobile" style="padding:5px;width:167px;font-family: 'Alfa Slab One', cursive;" value="Enviar">      
     </form>
             
</div>
           <button class="w3-button w3-black w3-xlarge w3-right" onclick="w3_open()">☰</button>
      
         <!--SIDEBAR -->
         
    </div>  
    </div>
    
   <!-- BARRA DE NAVEGAÇAO DISPOSITIVOS MENORES -->
    
    
    
  



<br>
<br>
<br>
<br>

    
 <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue w3-hide-medium" style="position: relative;right:-15px;font-family: 'Alfa Slab One', cursive;">Livros para troca</button>

  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue w3-hide-small w3-hide-large" style="position: relative;right:-15px;top:60px;font-family: 'Alfa Slab One', cursive;">Livros para troca</button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        
        <!-- CONTEÚDO MODAL --> 
        
        <?php
        
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
        echo "<table class='w3-table w3-card-4 w3-bordered' border='3'>";
        echo "<tr>";
        
        echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Capa";
        echo "</th>";
        
           echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Nome";
        echo "</th>";
        
        echo "<th class='w3-black w3-text-white w3-center' style='$font;'>";
        echo "Autor";
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
        

        echo "<input type='hidden' name='cd' value='$cdLivro'>";
        
         echo "<td class='w3-center w3-hover-blue'>";
        echo $nome;
        echo "<input type='hidden' name='nomeLivro' value='$nome'>";
        echo "</td>";
        
        echo "<td class='w3-center w3-hover-blue'>";
        echo $autor;
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
        echo "<button type='submit' class='w3-button w3-blue' style='$font;'>Enviar solicitação de troca</button>";
        echo "</td>";
        
        echo "</tr>";
        echo "</table>";  
        echo "</form>";
        
}

}
        ?>
        
         <!-- CONTEÚDO MODAL --> 
      </div>
    </div>
  </div>

<p class="w3-responsive w3-center w3-large" style="font-family: 'Alfa Slab One', cursive;">MEUS LIVROS CADASTRADOS</p>
  

  <!-- CÓNTEÚDO DA PÁGINA - INÍCIO -->
  
   <?php
  
      require_once('./classes/Livro.php');
        
   $livro = new Livro();
   
   $livro->consultarMeuLivro();
        
        ?>
  
   <!-- CÓNTEÚDO DA PÁGINA - FIM -->
   
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <!-- FOOTER -->
   
    <!--
<footer class="footer w3-black">
  <p style="font-family: 'Alfa Slab One', cursive;" class="abrilfont">&copy; Trocando Conhecimentos</p>
</footer>
    -->
    


    <footer class="w3-container w3-black w3-padding-small" >
        <center>
    <p style="font-family: 'Alfa Slab One', cursive;">&copy; Trocando Conhecimentos</p>
        </center>
            </footer>

    
    <!-- FOOTER --> 
    
    <!-- BARRA DE NAVEGAÇAO LATERAL -->
 <script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
    <!-- BARRA DE NAVEGAÇAO LATERAL -->

<!-- DROPDOWN 1-->
    <script>
function myFunction() {
    var x = document.getElementById("Demo");
    if (x.className.indexOf("w3-show") == -1) {  
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<!-- DROPDOWN 1-->

<!-- DROPDOWN 2-->
    <script>
function myFunction2() {
    var x = document.getElementById("Demo2");
    if (x.className.indexOf("w3-show") == -1) {  
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<!-- DROPDOWN 2 -->

<!-- DROPDOWN 3-->
    <script>
function myFunction3() {
    var x = document.getElementById("Demo3");
    if (x.className.indexOf("w3-show") == -1) {  
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<!-- DROPDOWN 3 -->

<!-- DROPDOWN 4-->
    <script>
function myFunction4() {
    var x = document.getElementById("Demo4");
    if (x.className.indexOf("w3-show") == -1) {  
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<!-- DROPDOWN 4 -->

<!-- DROPDOWN 5-->
    <script>
function myFunction5() {
    var x = document.getElementById("Demo5");
    if (x.className.indexOf("w3-show") == -1) {  
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<!-- DROPDOWN 5 -->

<!-- DROPDOWN 6-->
    <script>
function myFunction6() {
    var x = document.getElementById("Demo6");
    if (x.className.indexOf("w3-show") == -1) {  
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<!-- DROPDOWN 6 -->

</body>
</html> 
