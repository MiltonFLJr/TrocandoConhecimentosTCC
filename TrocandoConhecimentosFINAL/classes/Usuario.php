<?php
//include('teste.php');
class Usuario{


    private $codigoContaUsuario;
    private $cpfContaUsuario;
    private $rgContaUsuario;
    private $nomeUsuario;
    private $dataNascimentoContaUsuario;
    private $telefoneContaUsuario;
    private $enderecoContaUsuario;
    private $nomeMaeContaUsuario;
    private $nomePaiContaUsuario;
    private $emailContaUsuario;
    private $senhaUsuario;
    
    public function getCodigoContaUsuario() {
        return $this->codigoContaUsuario;
    }

    public function setCodigoContaUsuario($codigoContaUsuario) {
        $this->codigoContaUsuario = $codigoContaUsuario;
    }

        
    public function getCpfContaUsuario() {
        return $this->cpfContaUsuario;
    }

    public function getRgContaUsuario() {
        return $this->rgContaUsuario;
    }

    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public function getDataNascimentoContaUsuario() {
        return $this->dataNascimentoContaUsuario;
    }

    public function getTelefoneContaUsuario() {
        return $this->telefoneContaUsuario;
    }

    public function getEnderecoContaUsuario() {
        return $this->enderecoContaUsuario;
    }

    public function getNomeMaeContaUsuario() {
        return $this->nomeMaeContaUsuario;
    }

    public function getNomePaiContaUsuario() {
        return $this->nomePaiContaUsuario;
    }

    public function getEmailContaUsuario() {
        return $this->emailContaUsuario;
    }

    public function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    public function setCpfContaUsuario($cpfContaUsuario) {
        $this->cpfContaUsuario = $cpfContaUsuario;
    }

    public function setRgContaUsuario($rgContaUsuario) {
        $this->rgContaUsuario = $rgContaUsuario;
    }

    public function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function setDataNascimentoContaUsuario($dataNascimentoContaUsuario) {
        $this->dataNascimentoContaUsuario = $dataNascimentoContaUsuario;
    }

    public function setTelefoneContaUsuario($telefoneContaUsuario) {
        $this->telefoneContaUsuario = $telefoneContaUsuario;
    }

    public function setEnderecoContaUsuario($enderecoContaUsuario) {
        $this->enderecoContaUsuario = $enderecoContaUsuario;
    }

    public function setNomeMaeContaUsuario($nomeMaeContaUsuario) {
        $this->nomeMaeContaUsuario = $nomeMaeContaUsuario;
    }

    public function setNomePaiContaUsuario($nomePaiContaUsuario) {
        $this->nomePaiContaUsuario = $nomePaiContaUsuario;
    }

    public function setEmailContaUsuario($emailContaUsuario) {
        $this->emailContaUsuario = $emailContaUsuario;
    }

    public function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
    }

    public function criarConta($cpfContaUsuario,$rgContaUsuario,$nomeUsuario,$dataNascimentoContaUsuario,$telefoneContaUsuario,$enderecoContaUsuario,$nomeMaeContaUsuario,$nomePaiContaUsuario,$emailContaUsuario,$senhaUsuario){
        
        
    include(__DIR__.'/../classes/conexao.php');
          
     $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio =__DIR__."/../TrocandoConhecimentosTCC/TrocandoConhecimentosFINAL/avataresus/";

     
     $this->setCpfContaUsuario($cpfContaUsuario);
     $this->setRgContaUsuario($rgContaUsuario);
     $this->setNomeUsuario($nomeUsuario);
     $this->setDataNascimentoContaUsuario($dataNascimentoContaUsuario);
     $this->setTelefoneContaUsuario($telefoneContaUsuario);
     $this->setEnderecoContaUsuario($enderecoContaUsuario);
     $this->setNomeMaeContaUsuario($nomeMaeContaUsuario);
     $this->setNomePaiContaUsuario($nomePaiContaUsuario);
     $this->setEmailContaUsuario($emailContaUsuario);
     $this->setSenhaUsuario($senhaUsuario);
     
     $cpf = $this->getCpfContaUsuario();
     $rg = $this->getRgContaUsuario();
     $nomeUs = $this->getNomeUsuario();
     $dtn = $this->getDataNascimentoContaUsuario();
     $telefone = $this->getTelefoneContaUsuario();
     $endereco = $this->getEnderecoContaUsuario();
     $nMae = $this->getNomeMaeContaUsuario();
     $nPai = $this->getNomePaiContaUsuario();
     $email = $this->getEmailContaUsuario();
     $senha = $this->getSenhaUsuario();
     
          
     $stmt = $con->prepare("INSERT INTO usuario(avatar,cpfUsuario,rgUsuario,nomeUsuario,dtNascimento,telefone,endereco,nomeMae,nomePai,email,senha) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
     
     $stmt->bindParam(1,$novo_nome);
     $stmt->bindParam(2,$cpf);
     $stmt->bindParam(3,$rg);
     $stmt->bindParam(4,$nomeUs);
     $stmt->bindParam(5,$dtn);
     $stmt->bindParam(6,$telefone);
     $stmt->bindParam(7,$endereco);
     $stmt->bindParam(8,$nMae);
     $stmt->bindParam(9,$nPai);
     $stmt->bindParam(10,$email);
     $stmt->bindParam(11,$senha);
     
     $stmt->execute();
     
     echo "<script language='javascript'>";
     echo "alert('O cadastro foi concluído, você ja pode logar!')";
     echo "</script>";
          
     /*
   echo "<html>";
   echo "<head>";
   echo "<meta http-equiv='refresh' content='0;url=TELAlogin.php'>";
   echo "</head>";
   echo "</html>";
      */
    }
    
    public function excluirConta($emailContaUsuario,$senhaContaUsuario){
        
       include(__DIR__.'/../classes/conexao.php');
     
     $this->setEmailContaUsuario($emailContaUsuario);
     $this->setSenhaUsuario($senhaContaUsuario);
     
     $email = $this->getEmailContaUsuario();
     $senha = $this->getSenhaUsuario();
     
     $stmt = $con->prepare("SELECT email,senha FROM usuario WHERE email=? AND senha=? ");
     
     $stmt->bindParam(1,$email);
     $stmt->bindParam(2,$senha);
     
     $stmt->execute();
     
     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
     if(count($users) <= 0){
         
          echo "<html>";
   echo "<head>";
   
   echo "<script language='javascript'>";
     echo "alert('E-mail ou senha incorretas, não foi possível encerrar a conta.')";
     echo "</script>";
      echo "<meta http-equiv='refresh' content='0;url=TELALGDencerrarConta.php'>";

   echo "<meta http-equiv='refresh' content='0;url=TELALGDencerrarConta.php'>";
   
   echo "</head>";
    echo "</html>";   
      
     }else{
         
        $stmt= $con->prepare("DELETE FROM usuario WHERE email=? AND senha=?");   
         
      $stmt->bindParam(1,$email);
      $stmt->bindParam(2,$senha);
      
      $stmt->execute();
      
      session_start();

session_destroy();
      
/*
        echo "<html>";
   echo "<head>";
   
   echo "<script language='javascript'>";
     echo "window.alert('A sua conta foi encerrada.')";
     echo "</script>";
   
   echo "<meta http-equiv='refresh' content='0;url=TELAlogin.php'>";
   
   echo "</head>";
    echo "</html>";   
    */

     }
     
        
    }
    
    public function alterarConta($id,$cpfContaUsuario,$rgContaUsuario,$nomeUsuario,$dataNascimentoContaUsuario,$telefoneContaUsuario,$enderecoContaUsuario,$nomeMaeContaUsuario,$nomePaiContaUsuario){
        
       include(__DIR__.'/../classes/conexao.php');
        
       $this->setCpfContaUsuario($cpfContaUsuario);
     $this->setRgContaUsuario($rgContaUsuario);
     $this->setNomeUsuario($nomeUsuario);
     $this->setDataNascimentoContaUsuario($dataNascimentoContaUsuario);
     $this->setTelefoneContaUsuario($telefoneContaUsuario);
     $this->setEnderecoContaUsuario($enderecoContaUsuario);
     $this->setNomeMaeContaUsuario($nomeMaeContaUsuario);
     $this->setNomePaiContaUsuario($nomePaiContaUsuario);
     
     $cpf = $this->getCpfContaUsuario();
     $rg = $this->getRgContaUsuario();
     $nomeUs = $this->getNomeUsuario();
     $dtn = $this->getDataNascimentoContaUsuario();
     $telefone = $this->getTelefoneContaUsuario();
     $endereco = $this->getEnderecoContaUsuario();
     $nMae = $this->getNomeMaeContaUsuario();
     $nPai = $this->getNomePaiContaUsuario();
     $_FILES['image'];
     
        if( ($cpfContaUsuario <> NULL) && ($rgContaUsuario <> NULL) && ($nomeUsuario <> NULL) && ($dataNascimentoContaUsuario <> NULL) && ($telefoneContaUsuario <> NULL) && ($enderecoContaUsuario <> NULL) && ($nomeMaeContaUsuario <> NULL) && ($nomePaiContaUsuario <> NULL)  && ($_FILES['image'] <> NULL) ){
            
     $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET avatar=?, cpfUsuario=?,rgUsuario=?,nomeUsuario=?,dtNascimento=?,telefone=?,endereco=?,nomeMae=?,nomePai=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$novo_nome);
     $stmt2->bindParam(2,$cpf);
     $stmt2->bindParam(3,$rg);
     $stmt2->bindParam(4,$nomeUs);
     $stmt2->bindParam(5,$dtn);
     $stmt2->bindParam(6,$telefone);
     $stmt2->bindParam(7,$endereco);
     $stmt2->bindParam(8,$nMae);
     $stmt2->bindParam(9,$nPai);     
     $stmt2->bindParam(10,$id);
     
     $stmt2->execute();
     
        } elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] <> NULL)) {
            
              $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET avatar=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$novo_nome);     
     $stmt2->bindParam(2,$id);
     
     $stmt2->execute();
     
            
        }elseif (($cpfContaUsuario <> NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] == NULL)) {
        
        $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET cpfUsuario=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$cpf);     
     $stmt2->bindParam(2,$id);
     
     $stmt2->execute();
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario <> NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] == NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET rgUsuario=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$rg);     
     $stmt2->bindParam(2,$id);
     
     $stmt2->execute();
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario <> NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] == NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET rgUsuario=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$rg);     
     $stmt2->bindParam(2,$id);
     
     $stmt2->execute();
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario <> NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] == NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET dtNascimento=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$dtn);     
     $stmt2->bindParam(2,$id);
     
     $stmt2->execute();
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario <> NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] == NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET telefone=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$telefone);     
     $stmt2->bindParam(2,$id);
     
     $stmt2->execute();
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario <> NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] == NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET endereco=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$endereco);     
     $stmt2->bindParam(2,$id);
     
     $stmt2->execute();
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario <> NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] == NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET nomeMaeUsuario=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$nMae);     
     $stmt2->bindParam(2,$id);
     
     $stmt2->execute();
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario <> NULL)  && ($_FILES['image'] == NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET rgUsuario=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$nPai);     
     $stmt2->bindParam(2,$id);
     
     $stmt2->execute();
            
        }elseif (($cpfContaUsuario <> NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] <> NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET avatar=?,cpfUsuario=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$novo_nome);   
     $stmt2->bindParam(2,$cpf);
     $stmt2->bindParam(2,$id);
     
     $stmt2->execute();
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario <> NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] <> NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET avatar=?,rgUsuario=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$novo_nome);   
     $stmt2->bindParam(2,$rg);
     $stmt2->bindParam(3,$id);
     
     $stmt2->execute();
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario <> NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] <> NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET avatar=?,rgUsuario=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$novo_nome);   
     $stmt2->bindParam(2,$nomeUs);
     $stmt2->bindParam(3,$id);
     
     $stmt2->execute();
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario <> NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] <> NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET avatar=?,dtNascimento=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$novo_nome);   
     $stmt2->bindParam(2,$dtn);
     $stmt2->bindParam(3,$id);
     
     $stmt2->execute();
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario <> NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] <> NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET avatar=?,endereco=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$novo_nome);   
     $stmt2->bindParam(2,$endereco);
     $stmt2->bindParam(3,$id);
     
     $stmt2->execute(); 
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario == NULL) && ($nomeMaeContaUsuario <> NULL) && ($nomePaiContaUsuario == NULL)  && ($_FILES['image'] <> NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET avatar=?,nomeMae=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$novo_nome);   
     $stmt2->bindParam(2,$nMae);
     $stmt2->bindParam(3,$id);
     
     $stmt2->execute(); 
            
        }elseif (($cpfContaUsuario == NULL) && ($rgContaUsuario == NULL) && ($nomeUsuario == NULL) && ($dataNascimentoContaUsuario == NULL) && ($telefoneContaUsuario == NULL) && ($enderecoContaUsuario <> NULL) && ($nomeMaeContaUsuario == NULL) && ($nomePaiContaUsuario <> NULL)  && ($_FILES['image'] <> NULL)) {
            
            $extensao = strtolower(substr($_FILES['image'] ['name'], -4));    
     $novo_nome = md5(time()) . $extensao;
     $diretorio ="avataresus/";
     move_uploaded_file($_FILES['image']['tmp_name'], $diretorio.$novo_nome);
     
     $stmt2 = $con->prepare("UPDATE usuario SET avatar=?,nomePai=? WHERE cdUsuario=?");
     
     $stmt2->bindParam(1,$novo_nome);   
     $stmt2->bindParam(2,$nPai);
     $stmt2->bindParam(3,$id);
     
     $stmt2->execute(); 
            
        }
        
    }
    
    public function consultarConta($emailContaUsuario,$senhaContaUsuario){
        
         include(__DIR__.'/../classes/conexao.php');
     
     $this->setEmailContaUsuario($emailContaUsuario);
     $this->setSenhaUsuario($senhaContaUsuario);
     
     $email = $this->getEmailContaUsuario();
     $senha = $this->getSenhaUsuario();
     
     $stmt = $con->prepare("SELECT email,senha FROM usuario WHERE email=? AND senha=?");
     
     $stmt->bindParam(1,$email);
     $stmt->bindParam(2,$senha);
     
     $stmt->execute();
     
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
     if( count($users) <= 0){
         
     
    echo "<script language='javascript'>";
     echo "location.href='loginfail.php'";
     echo "</script>";
     
   echo "<script language='javascript'>";
     echo "alert('Falhou')";
     echo "</script>";
 
     
     }else{
        
         session_start();
         
  $stmt2 = $con->prepare("SELECT cdUsuario,nomeUsuario FROM usuario WHERE email=?");
       
       $stmt2->bindParam(1,$email);
        
       $stmt2->execute();
       
       while($linha = $stmt2->fetch(PDO::FETCH_ASSOC)){
           
           //var_dump($linha['cdUsuario']);
           
           $this->setCodigoContaUsuario($linha['cdUsuario']);
           $this->setNomeUsuario($linha['nomeUsuario']);
            
       }

       
       $cdUs=$this->getCodigoContaUsuario();
        $nomeUs=$this->getNomeUsuario();

      echo "<script language='javascript'>";
     echo "alert('Deu certo!')";
     echo "</script>";
      
        $_SESSION['nome']=$nomeUs;
        $_SESSION['cdUs']=$cdUs;
         $_SESSION['email'] = $email;
         $_SESSION['senha'] = $senha;
         
         
         
      

     }
        
    }
    
    public function gerenciarPerfilDeUsuario(){
        
    }
    
    public function bloquearConta(){
        
    }
}

?>

