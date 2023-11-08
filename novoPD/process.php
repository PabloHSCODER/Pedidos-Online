<?php
 
function redirect($url) {
  header("Location: $url");
}

include("connectBD.php");

if (isset($_REQUEST["acao"])) {

  switch ($_REQUEST["acao"]) {
    
    case 'cadastrar':
      redirect("cadastrar.php");
      break;
    
    case 'cadastre':
     

       // Verifica se todos os campos estão preenchidos
      $vazio = false;

      

      if (empty($_POST["usuario"])) {
        $vazio = true;
      }

      if (empty($_POST["senha"])) {
        $vazio = true;
      }

     

      if ($vazio) {
        echo "Por favor, preencha todos os campos.";
      } else {

        // Verifica se o nome de usuário já existe
        $sql = "SELECT * FROM usuarios WHERE nome = '$_POST[usuario]'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          echo "O nome de usuário já existe.";
        } else {

          

            // O usuário não existe, então é possível cadastrar
            $usuario = mysqli_real_escape_string($conn, $_POST["usuario"]);
            $senha = mysqli_real_escape_string($conn, $_POST["senha"]);
            

            $sql = "INSERT INTO usuarios (nome, senha) VALUES ('$usuario', '$senha')";
            mysqli_query($conn, $sql);

            echo "<script type='text/javascript'>alert('voce foi cadastrado');location.href=\"index.php\";</script>";


          }
        }
        break;
    case "entre":

          // Verifica se o nome de usuário e a senha existem no banco de dados
          $sql = "SELECT * FROM usuarios WHERE nome = '".$_POST['usuario']."' AND senha = '".$_POST['senha']."'";
          $result = mysqli_query($conn, $sql);
          
          if (mysqli_num_rows($result) > 0) {
    
            // O usuário existe, então ele pode fazer login
            session_start();
            $_SESSION["usuario"] = $_POST["usuario"];
            header("Location: index.php");
    
          } else {
    
            // O usuário não existe, então ele não pode fazer login
            echo "Usuário ou senha inválidos.";
    
          }
     
         

      
      
      
      
      break;
        }
        

}

   
 



?>
