<?php

    require_once 'Livro.php';
    
class UsuarioLivro extends Livro{
       
    private $codigoContaUsuario;
       
    public function getCodigoContaUsuario() {
        return $this->codigoContaUsuario;
    }

    public function setCodigoContaUsuario($codigoContaUsuario) {
        $this->codigoContaUsuario = $codigoContaUsuario;
    }
    
 public function gerarIDusuarioLivro($email){
     
     include 'conexao.php';
    
     session_start();
         
      //$email = $_SESSION['email'];
      //echo $email;
     

    $stmt = $con->query("SELECT cdUsuario FROM usuario WHERE email= '$email'")->fetch();
    
    //$stmt->bindParam(1,$email);
    
    //$stmt->execute(array($email));

    //echo $stmt['cdUsuario'];

    //print_r($stmt);

    
    
    /*while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
        
           $this->setCodigoContaUsuario($linha['cdUsuario']);
    }*/
    
    $this->setCodigoContaUsuario($stmt['cdUsuario']);
    

    $cdUsuario = $this->getCodigoContaUsuario();
    
    $stmt2 = $con->prepare("SELECT cdLivro FROM livro WHERE cdLivro=?");
    
    $stmt2->bindParam(1,$cdUsuario);
    
    $stmt2->execute();
    
        while($linha = $stmt2->fetch(PDO::FETCH_ASSOC)){
        
           $this->setCodigoLivro($linha['cdLivro']);
    }
           $cdLivro = $this->getCodigoLivro();
    
      $stmt3 = $con->prepare("INSERT INTO usuario_livro(cdLivro,cdUsuario) VALUES (?,?)");
 
      $stmt3->bindParam(1,$cdLivro);
      $stmt3->bindParam(2,$cdUsuario);
      
      $stmt3->execute();
      
      
}

}
