<!DOCTYPE html>
<html>
<head>    
<title>Inicio</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">

<link href="css/font.css" rel="stylesheet">
    </head>    
    
<body>

<!-- HEADER BANNER -->
    
    <div class="header w3-hide-medium w3-hide-small">

        <img class="w3-image w3-mobile" src="imgs/book_banner.png" style="position:relative; bottom: -53px;">
        
    </div>
    
 <div class="header w3-hide-large w3-hide-small">

        <img class="w3-image w3-mobile" src="imgs/book_bannerM.png" style="position:relative; bottom: -53px;">
        
    </div>
    
<div class="header w3-hide-medium w3-hide-large">

        <img class="w3-image w3-mobile" src="imgs/book_bannerS.png" style="position:relative; bottom: -53px;">
        
    </div>

     <!-- HEADER BANNER FIM -->

    
    <!-- BARRA DE NAVEGAÇAO DESKTOP -->
    
    <br class="w3-hide-small w3-hide-medium">
     <br class="w3-hide-small w3-hide-medium">
     <br class="w3-hide-small w3-hide-medium">
    
<div class="w3-top">       
 <div class="w3-bar w3-black w3-border-4 w3-mobile w3-card-4 w3-large w3-hide-small w3-hide-medium">

     <a href="#" class="w3schools-logo w3-left">
     <img class="w3-image" hegiht="50" width="60" src="imgs/logo.png"> 
     </a>     
     
     
<a href="index.php" class="w3-bar-item customfont w3-mobile w3-button w3-text-blue" style="font-family: 'Alfa Slab One', cursive;">Inicio</a>
     
   <a href="contato.php" class="w3-bar-item w3-button w3-mobile"  style="font-family: 'Alfa Slab One', cursive;">Contato</a>
     
   <form class="w3-bar-item w3-mobile" action="#">
     <input type="text" class="w3-bar-item w3-input w3-mobile w3-center" placeholder="Pesquisar livro..." style="padding:5px;" />
      <button type="submit" class="w3-button w3-blue w3-mobile" style="padding:5px;font-family: 'Alfa Slab One', cursive;">Buscar</button>      
     </form>
     
     <a href="login.php" class="w3-bar-tiem w3-button w3-mobile w3-right" style="font-family: 'Alfa Slab One', cursive;">Entrar</a>
     
       <a href="cadastro.php" class="w3-bar-tiem w3-button w3-right w3-mobile abrilfont" style="font-family: 'Alfa Slab One', cursive;">Cadastro</a>
     
    </div>   
    </div>        
      <!-- BARRA DE NAVEGAÇAO DESKTOP FIM -->
    
<!-- BARRA DE NAVEGAÇAO DISPOSITIVOS MENORES -->
    <div class="w3-top">
     <div class="w3-bar w3-black w3-hide-large w3-border-4 w3-card-4 w3-mobile w3-padding-small">
         
       
 <!--SIDEBAR -->
         <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none;right:0;background-color:#2B2B2B;" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>

   <div class="w3-center"><a class="w3schools-logo w3-mobile">
     <img class="w3-image" hegiht="50" width="60" src="imgs/logo.png"> 
     </a>     </div>
    
 
             <a href="index.html" class="w3-bar-item w3-mobile w3-center w3-button abrilfont w3-text-blue" style="font-family: 'Alfa Slab One', cursive;">Inicio</a>
     
   <a href="contato.php" class="w3-bar-item w3-button w3-mobile w3-center"  style="font-family: 'Alfa Slab One', cursive;">Contato</a>
   
     
        <a href="login.php" class="w3-bar-item w3-mobile w3-button abrilfont w3-center" style="font-family: 'Alfa Slab One', cursive;">Entrar</a>

      <a href="cadastro.php" class="w3-bar-item w3-mobile w3-button abrilfont w3-center" style="font-family: 'Alfa Slab One', cursive;">Cadastro</a>
            
   <form class="w3-bar-item w3-mobile" action="#">
     <input type="text" class="w3-bar-item w3-input w3-mobile" placeholder="Pesquisar livro..." style="padding:5px;" />
       <button type="submit" class="w3-button w3-blue w3-mobile" style="padding:5px;width:167px;font-family: 'Alfa Slab One', cursive;">Buscar</button>       
     </form>
             
</div>
           <button class="w3-button w3-black w3-xlarge w3-right" onclick="w3_open()">☰</button>
      
         <!--SIDEBAR -->
         
    </div>  
    </div>
    
   <!-- BARRA DE NAVEGAÇAO DISPOSITIVOS MENORES FIM -->

   <h4 class="w3-center" style="font-family:'Alfa Slab One', cursive;">Livros adicionados recentemente</h4>

   <?php

 include 'conexao.php';
    
$stmt = $con->query("SELECT * FROM livro LIMIT 30");

while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    $font = "font-family:Alfa Slab One, cursive";
    $capa = $linha['capa'];
    
     $nome = $linha['nomeLivro'];
         $cdLivro = $linha['cdLivro'];   
         $autor = $linha['autorLivro'];
         $idade = $linha['idadeLivro'];
         $estado = $linha['estadoConservacaoLivro'];
         $genero = $linha['generoLivro'];
         
   echo"<div class='w3-container w3-center'>" ;
             echo "<table class='w3-table w3-bordered w3-card-4' border='3'>";
          echo "<tr>";
          
         echo"
          <th class='w3-black w3-text-white w3-center' style='$font;'>Capa</th>
<th class='w3-black w3-text-white w3-center' style='$font;'>Nome</th>
<th class='w3-black w3-text-white w3-center' style='$font;'>Autor</th>
<th class='w3-black w3-text-white w3-center' style='$font;'>Estado de conservacao</th>
<th class='w3-black w3-text-white w3-center w3-resposnsive' style='$font;'>Genero</th>
          ";
         
          echo  "</tr>";
          
          echo  "<tr>";
          
          echo"
              
        <td class='w3-center w3-light-gray w3-hide-small w3-hide-medium'>
    <img class='w3-image w3-center' width='100' src='capaslivros/$capa'>
  </td>

<td class='w3-center w3-light-gray w3-hover-blue w3-hide-small w3-hide-large'>
    <img class='w3-image w3-center' width='100' src='capaslivros/$capa'>
  </td>

  <td class='w3-center w3-light-gray w3-hover-blue w3-hide-medium w3-hide-large'>
    <img class='w3-image w3-center' width='100' src='capaslivros/$capa'>
  </td>


<td class='w3-center'>$nome</td> 

<td class='w3-center'>$autor</td> 


<td class='w3-center'>$estado</td> 

<td class='w3-center'>$genero</td> 
    
";

       
       echo "</tr>";
       
      echo "</table>";
    echo "</div>";  
}

?>

    <!-- FOOTER -->
   
    <!--
<footer class="footer w3-black">
  <p style="font-family: 'Alfa Slab One', cursive;" class="abrilfont">&copy; Trocando Conhecimentos</p>
</footer>
    -->
    
    <br>
    <br>

 <footer class="w3-container w3-black w3-padding-small" >
        <center>
    <p style="font-family: 'Alfa Slab One', cursive;">&copy; Trocando Conhecimentos</p>
        </center>
            </footer>
    
    <!-- FOOTER --> 
    
 <script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
    
</body>
</html> 
