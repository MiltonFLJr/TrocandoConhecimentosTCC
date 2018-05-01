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

    
    <!-- BARRA DE NAVEGAÇAO DESKTOP -->
       <div class="w3-top">
 <div class="w3-bar w3-black w3-border-4 w3-mobile w3-card-4 w3-large w3-hide-small w3-hide-medium">

     <a href="index.html" class="w3schools-logo w3-left">
     <img class="w3-image" height="50" width="60" src="imgs/logo.png"> 
     </a>     
     
     
<a href="index.html" class="w3-bar-item customfont w3-mobile w3-button" style="font-family: 'Alfa Slab One', cursive;">Gerenciar conta</a>
     
   <a href="#" class="w3-bar-item w3-button w3-mobile"  style="font-family: 'Alfa Slab One', cursive;">Gerenciar livros</a>
     
        <a href="#" class="w3-bar-item w3-button w3-mobile"  style="font-family: 'Alfa Slab One', cursive;">Gerenciar trocas</a>
    
     
   <form class="w3-bar-item w3-mobile" action="#">
     <input type="text" class="w3-bar-item w3-input w3-mobile w3-center" placeholder="Pesquisar livro..." style="padding:5px;" />
      <button type="submit" class="w3-button w3-blue w3-mobile" style="padding:5px;font-family: 'Alfa Slab One', cursive;">Buscar</button>      
     </form>
     
     <a href="login.html" class="w3-bar-tiem w3-button w3-mobile w3-right" style="font-family: 'Alfa Slab One', cursive;">Sair</a>
     
    </div>   
    </div>
      <!-- BARRA DE NAVEGAÇAO DESKTOP -->
    
<!-- BARRA DE NAVEGAÇAO DISPOSITIVOS MENORES -->
    <div class="w3-top">
     <div class="w3-bar w3-black w3-hide-large w3-border-4 w3-card-4 w3-mobile w3-padding-small">
         
       
 <!--SIDEBAR -->
         <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none;right:0;background-color:#2B2B2B;" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>

   <div class="w3-center"><a class="w3schools-logo w3-mobile">
     <img class="w3-image" height="50" width="60" src="imgs/logo.png"> 
     </a>     </div>
    
 
             <a href="index.html" class="w3-bar-item w3-mobile w3-center w3-button abrilfont" style="font-family: 'Alfa Slab One', cursive;">Inicio</a>
     
   <a href="#" class="w3-bar-item w3-button w3-mobile w3-center"  style="font-family: 'Alfa Slab One', cursive;">Contato</a>
   
     
        <a href="login.html" class="w3-bar-item w3-mobile w3-button abrilfont w3-center" style="font-family: 'Alfa Slab One', cursive;">Entrar</a>

      <a href="#" class="w3-bar-item w3-mobile w3-button abrilfont w3-center w3-text-blue" style="font-family: 'Alfa Slab One', cursive;">Cadastro</a>
            
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
    
    
    
    <!-- CADASTRO -->
    
 

<!-- FORMULARIO PARA O DESKTOP -->

    <!--
<br class="w3-hide-medium w3-hide-small">
 <br class="w3-hide-medium w3-hide-small">
-->
    
<br class="w3-hide-medium w3-hide-smal">
<br class="w3-hide-medium w3-hide-smal">
<br class="w3-hide-medium w3-hide-smal">
    
<div class="w3-display-bottommiddle w3-light-grey w3-card-4 w3-center w3-hide-medium w3-hide-small" style="width: 290px;position: relative; top:20px;">
    <div class="w3-container w3-blue w3-hide-medium w3-hide-small" style="width:290px;">
    <h4 class="w3-hide-medium" style="font-family: 'Alfa Slab One', cursive;">Cadastrar livro</h4>
     </div>   

     <form class="w3-container w3-hide-medium w3-mobile">
   
  <p> <label class="w3-text-black w3-mobile"><b>Capa:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey w3-mobile" type="file" style="width: 260px;"></p>


   <p> <label class="w3-text-black w3-mobile"><b>Nome:</b></label></p>
      <p>  <input class="w3-center w3-input w3-border w3-light-grey w3-mobile" type="text" style="width: 260px;"></p>

<p><label class="w3-text-black  w3-mobile"><b>Autor:</b></label></p>
        <p><input class="w3-center w3-input w3-border w3-light-grey  w3-mobile" type="text" style="width: 260px;">

        <p><label class="w3-text-black  w3-mobile"><b>Tempo de uso:</b></label>
       <p> <input class="w3-center w3-input w3-border w3-light-grey  w3-mobile" type="text" style="width: 260px;"></p>

<p><label class="w3-text-black w3-mobile"><b>Estado de conservação:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey w3-mobile" type="text" style="width: 260px;"></p>


<p><label class="w3-text-black  w3-mobile"><b>Genero:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey  w3-mobile" type="text" style="width: 260px;"></p>

       <p> <input type="submit" class="w3-input w3-button w3-blue w3-mobile" value="Enviar" style="width:160px;position:relative;right:-50px;font-family: 'Alfa Slab One', cursive;"></p>

     </form>
</div>

<br class="w3-hide-medium w3-hide-small">
  <br class="w3-hide-medium w3-hide-small">
  <br class="w3-hide-medium w3-hide-small">

<!-- FORMULARIO PARA O DESKTOP - FIM -->

<!-- FORMULARIO MEDIUM -->

  <br class="w3-hide-large w3-hide-small">
    
<div class=" w3-display-bottommiddle w3-light-grey w3-card-4 w3-center w3-hide-large w3-hide-small" style="width: 290px;position:relative;bottom:-64px;">
    <div class="w3-container w3-blue w3-hide-large w3-hide-small" style="width:290px;">
    <h4 style="font-family: 'Alfa Slab One', cursive;">Cadastrar</h4>
     </div>   

     <form class="w3-container">
   
   <p><label class="w3-text-black"><b>Avatar:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="file" style="width: 260px;"></p>


   <p> <label class="w3-text-black"><b>CPF:</b></label></p>
      <p>  <input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

<p><label class="w3-text-black"><b>RG:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

        <p><label class="w3-text-black"><b>Nome:</b></label></p>
        <p><input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

<p><label class="w3-text-black"><b>Data de nascimento:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>


<p><label class="w3-text-black"><b>Telefone:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

       <p> <label class="w3-text-black"><b>Endereço:</b></label></p>
        <p><input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>


 <p><label class="w3-text-black"><b>Nome da mae:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

 <p><label class="w3-text-black"><b>Nome do pai:</b></label></p>
        <p><input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

 <p><label class="w3-text-black"><b>E-mail:</b></label></p>
        <p><input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

         <p><label class="w3-text-black"><b>Senha:</b></label></p>
        <p><input class="w3-center w3-input w3-border w3-light-grey" type="password" style="width: 260px;"></p>

       <p> <input type="submit" class="w3-input w3-button w3-blue" value="Enviar" style="width:160px;position:relative;right:-50px;font-family: 'Alfa Slab One', cursive;"></p>

     </form>
</div>

<br class="w3-hide-large w3-hide-small">
  <br class="w3-hide-large w3-hide-small">
  <br class="w3-hide-large w3-hide-small">
<br class="w3-hide-large w3-hide-small">
<br class="w3-hide-large w3-hide-small">
    <br class="w3-hide-large w3-hide-small">

<!-- FORMULARIO MEDIUM -->

    <!-- FORMULARIO SMALL -->
    
    <div class=" w3-display-bottommiddle w3-light-grey w3-card-4 w3-center w3-hide-large w3-hide-medium" style="width: 290px;position:relative;bottom:-20px;">
    <div class="w3-container w3-blue w3-hide-large w3-hide-medium" style="width:290px;">
    <h4 style="font-family: 'Alfa Slab One', cursive;">Cadastrar</h4>
     </div>   

     <form class="w3-container">
   
  <p> <label class="w3-text-black"><b>Avatar:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="file" style="width: 260px;"></p>


    <p><label class="w3-text-black"><b>CPF:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

<p><label class="w3-text-black"><b>RG:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

        <p><label class="w3-text-black"><b>Nome:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

<p><label class="w3-text-black"><b>Data de nascimento:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>


<p><label class="w3-text-black"><b>Telefone:</b></label></p>
        <p><input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

       <p> <label class="w3-text-black"><b>Endereço:</b></label></p>
        <p><input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>


 <p><label class="w3-text-black"><b>Nome da mae:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

<p> <label class="w3-text-black"><b>Nome do pai:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

 <p><label class="w3-text-black"><b>E-mail:</b></label></p>
        <p><input class="w3-center w3-input w3-border w3-light-grey" type="text" style="width: 260px;"></p>

         <p><label class="w3-text-black"><b>Senha:</b></label></p>
       <p> <input class="w3-center w3-input w3-border w3-light-grey" type="password" style="width: 260px;"></p>

       <p> <input type="submit" class="w3-input w3-button w3-blue" value="Enviar" style="width:160px;position:relative;right:-50px;font-family: 'Alfa Slab One', cursive;"></p>

     </form>
</div>

<br class="w3-hide-large w3-hide-medium">
  <br class="w3-hide-large w3-hide-medium">
  <br class="w3-hide-large w3-hide-medium">
<br class="w3-hide-large w3-hide-medium">
<br class="w3-hide-large w3-hide-medium">
    <br class="w3-hide-large w3-hide-medium">

    
    <!-- FORMULARIO SMALL -->
    
    <!-- CADASTRO -->

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
