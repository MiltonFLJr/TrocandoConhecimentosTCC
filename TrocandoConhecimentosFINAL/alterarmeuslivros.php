<!DOCTYPE html>
<html>
<head>    
<title>Cadastrar livro</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/w3.css">
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

     <a href="index.html" class="w3schools-logo w3-left">
     <img class="w3-image" hegiht="50" width="60" src="imgs/logo.png"> 
     </a>     
     
         
         <div class="w3-dropdown-click">
  <button onclick="myFunction()" class="w3-button w3-black" style="font-family: 'Alfa Slab One', cursive;">Conta ▼</button>
  <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
    <a href="alterardados.php" class="w3-bar-item w3-button">Alterar dados pessoais</a>
    <a href="#" class="w3-bar-item w3-button">Alterar e-mail e senha</a>
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
    <a href="#" class="w3-bar-item w3-button">Solicitaçoes enviadas</a>
    <a href="#" class="w3-bar-item w3-button">Solicitaçoes recebidas</a>
    <a href="#" class="w3-bar-item w3-button">Historico</a>
  </div>
</div>

   <form class="w3-bar-item w3-mobile" action="#">
     <input type="text" class="w3-bar-item w3-input w3-mobile w3-center" placeholder="Pesquisar livro..." style="padding:5px; width:150px;" />
      <button type="submit" class="w3-button w3-blue w3-mobile" style="padding:5px;font-family: 'Alfa Slab One', cursive;">Buscar</button>      
     </form>
     
   
     <a href="login.php" class="w3-bar-tiem w3-button w3-mobile w3-right" style="font-family: 'Alfa Slab One', cursive;">Sair</a>
     
<a class="w3-right w3-hide-medium w3-hide-small">
     <i style="position:relative;top:10px;right:-3px;"> <?php print_r($_SESSION['nome']) ?> </i> 
     </a>     

       <a class="w3-right w3-hide-medium w3-hide-small">
     <img class="w3-image" width="53" src="imgs/avatar.jpeg"> 
     </a>     

    </div>   
    </div>
      <!-- BARRA DE NAVEGAÇAO DESKTOP -->
    
<!-- BARRA DE NAVEGAÇAO DISPOSITIVOS MENORES -->
    <div class="w3-top">
     <div class="w3-bar w3-black w3-hide-large w3-border-4 w3-card-4 w3-mobile w3-padding-small">
         

          <a class="w3-left w3-hide-large">
     <img class="w3-image" width="53" src="imgs/avatar.jpeg"> 
     </a>     

         <a class="w3-bar-item w3-left w3-hide-large">
     <i style="position:relative;top:10px;"> <?php print_r($_SESSION['nome']) ?> </i> 
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
      <a href="alterardados.php" class="w3-bar-item w3-button">Alterar dados pessoais</a>
    <a href="#" class="w3-bar-item w3-button">Alterar e-mail e senha</a>
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
    <a href="#" class="w3-bar-item w3-button">Solicitaçoes enviadas</a>
    <a href="#" class="w3-bar-item w3-button">Solicitaçoes recebidas</a>
    <a href="#" class="w3-bar-item w3-button">Historico</a>
  </div>
</div>

  <a href="/acoes/encerrarSecao.php" class="w3-bar-item w3-button w3-mobile w3-center"  style="font-family: 'Alfa Slab One', cursive;">Sair</a>
            
   <form class="w3-bar-item w3-mobile" action="#">
     <input type="text" class="w3-bar-item w3-input w3-mobile" placeholder="Pesquisar livro..." style="padding:5px;" />
       <button type="submit" class="w3-button w3-blue w3-mobile" style="padding:5px;width:167px;font-family: 'Alfa Slab One', cursive;">Buscar</button>       
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
        <p>Livro 1</p>
        <p>Livro 2</p>
      </div>
    </div>
  </div>

<p class="w3-responsive w3-center w3-large" style="font-family: 'Alfa Slab One', cursive;">ALTERAR DADOS DE LIVRO CADASTRADO</p>
  
 


  <!-- CÓNTEÚDO DA PÁGINA - INÍCIO -->
  
   
        <?php
        
       include 'conexao.php';
        $font = "font-family:Alfa Slab One, cursive";
        $email = $_SESSION['email'];
        $senha = $_SESSION['senha'];
        $idus = $_SESSION['cdUs'];
        
        $stmt= $con->prepare("SELECT cdLivro FROM usuario_livro WHERE cdUsuario=?");
        
        $stmt->bindParam(1,$idus);
        
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
   
    <form method='POST' action='acoes/alterandoDadosLivros.php' style='overflow: scroll'>
    <input type='hidden' name='cd' value='$cdLivro'>
        
      <div class='w3-container'>
   <table class='w3-table' border='2'>
<tr>
<th class='w3-black w3-text-white w3-center' style='$font;width:50px;'>Capa</th>
<th class='w3-black w3-text-white w3-center' style='$font;'>Nome</th>
<th class='w3-black w3-text-white w3-center' style='$font;'>Autor</th>
<th class='w3-black w3-text-white w3-center' style='$font;'>Tempo de uso</th>
<th class='w3-black w3-text-white w3-center' style='$font;'>Estado de conservacao</th>
<th class='w3-black w3-text-white w3-center w3-resposnsive' style='$font;'>Genero</th>
<th class='w3-black w3-text-white w3-center w3-resposnsive' style='font-family: $font;'> </th>
</tr>

<br >
<tr>
  <td class='w3-light-gray w3-hover-blue w3-hide-small w3-hide-medium w3-resposnsive'>
    <input type='file' placeholder='arquivo' name='image'>
  </td>

<td class='w3-light-gray w3-hover-blue w3-resposnsive w3-hide-small w3-hide-large'>
    <input type='file' name='image'>
  </td>

  <td class='w3-light-gray w3-hover-blue w3-resposnsive w3-hide-medium w3-hide-large'>
    <input type='file' name='image'>
  </td>

<input type='hidden' name='cd' value='$cdLivro'>

<td class='w3-center w3-hover-blue'>
<input type='text' name='nome' value='$nome'>
</td> 

<td class='w3-center w3-hover-blue'>
<input type='text' name='autor' value='$autor'>
</td> 

<td class='w3-center w3-hover-blue'>
<input type='text' name='idade' value='$idade'>
</td> 

<td class='w3-center w3-hover-blue'>
<input type='text' name='estadoconservacao' value='$estado'>
</td> 

<td class='w3-center w3-hover-blue'>
<input type='text' name='genero' value='$genero'>
</td> 
    
<td class='w3-center'><input type='submit' value='Enviar' class='w3-button w3-blue' style='$font;'></td> 

</tr>

   </table>
 </div>
</form>
";
         
        }
        
        }
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
