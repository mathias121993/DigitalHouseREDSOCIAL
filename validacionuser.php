<?php 

  function validacionuser(){
    if($_POST){
      $usuariojsos=file_get_contents("users.txt");
      $usuarios_json= json_decode($usuariojsos,true);
      foreach ($usuarios_json["usuarios"] as $key) 
      {
        if ($key["email"]==$_POST["email"] && password_verify($_POST["password"],$key["password"])) 
        {
          session_start();
          $_SESSION['usuario']=$_POST["email"];
          if(isset($_POST["recordar"])){
            setcookie("email",$_POST["email"],time() + 24000);
          }
          
          return 'Location: profile.php';
        }   
        
      } 
        
       return 'Location:'.$_GET['pag']."?error=001";
        
      }
  }

  header(validacionuser());
  

 ?>