<?php

session_start();
if(isset($_SESSION["usuario"])){
  header('Location:profile.php');
}

$estados=[
"consultaClase" => "",
"botonRecuperar" => "",
"preguntaClase" => "d-none",
"pregunta" => "",
"respuesta" => "",
"contraseña" => "d-none",
"valueContraseña" => "",
"mensajeE" => "d-none",
"mensaje" => "",
];

if(isset($_GET["process"])){
  $arraymensaje=[303=>"La respuesta es incorrecta intente luego.",302=>"El email no esta registrado","success"=>"El cambio de contraseña fue exitoso"];
  $estados["mensaje"]=$arraymensaje[$_GET["process"]];
  $estados["mensajeE"]="campo-invalido";
}

if(isset($_POST["email"]) && !empty($_POST["email"])){

  $db_json=file_get_contents('users.txt');
  $db=json_decode($db_json,true);
  $estado=false;
  foreach ($db["usuarios"] as $key => $value) {
   if ($value["email"]==$_POST["email"]) {
     $objetoUsuario=$value;
     $estados["consultaClase"]="d-none";
     $estados["preguntaClase"]="";
     $pregunta=$value["pregyrest"]["pregunta"];
     $estado=true;
   }
  }
  if(!$estado){
    header('Location:recuperarpass.php'."?process=302");
  }
    


}
if(isset($_POST["respuesta"]) && !empty($_POST["respuesta"])){

$db_json=file_get_contents('users.txt');
  $db=json_decode($db_json,true);
  foreach ($db["usuarios"] as $key => $value) {
   if ($value["email"]==$_POST["email"]) {
     if($value["pregyrest"]["respuesta"]==$_POST["respuesta"]){
      $estados["preguntaClase"]="d-none";
      $estados["contraseña"]="";
      $estados["valueContraseña"]=$value["password"];
   }else{
    header('Location:recuperarpass.php'."?process=303");
   }
  }


}}
if(isset($_POST["cambiar"]) && !empty($_POST["cambiar"])){

  $db_json=file_get_contents('users.txt');
  $db=json_decode($db_json,true);
  for ($i=0; $i < count($db["usuarios"]) ; $i++) { 
    if($_POST["email"]==$db["usuarios"][$i]["email"]){
        $db["usuarios"][$i]["password"]=password_hash($_POST["cambiar"], PASSWORD_DEFAULT);

    }
  }
  $db_json=json_encode($db);
  file_put_contents('users.txt', $db_json);
  header('Location:recuperarpass.php'."?process=success");

}







 ?>


<!DOCTYPE html>
<html>
<head>
   <?=!include('head.php') ?>
</head>
<body>

  <?=!include('prueba2.php') ?>
    
  <div class="container">
        <div class="row">
          <div class="col-lg-5 col-sm-12 centro">
          <div class="row">

            <div class="col-12 text-center">
              <h2 class="blanco">Recuperar <span class="verde">Contraseña</span></h2>
            </div>
            
            <div class="cards col-12">
              <article class="card-body">
                <!--FORMULARIO PARA BUSCAR UN EMAIL EN LA BASE DE DATOS-->
                <form method="post" action="recuperarpass.php" class="<?php echo $estados["consultaClase"] ?>" >            
                  <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo electronico">                  
                  </div>
                  
                  
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block"> Buscar </button>
                  </div>                                                
                </form>
                <div class="<?php echo $estados["mensajeE"]; ?>">
                  <?php echo $estados["mensaje"]; ?>
                  </div>

                <!--FORMULARIO PARA RESPONDER LA PREGUNTA SECRETA-->
                <form method="post" action="recuperarpass.php" class="<?php echo $estados["preguntaClase"] ?>">
                  
                  <div class="form-group">
                    <input type="text" class="form-control" readonly="readonly" value="<?php echo $pregunta."?"; ?>"> <input type="hidden" name="email" value="<?php echo $objetoUsuario["email"] ?>">    
                  </div>
                   <div class="form-group">
                    
                    <input type="text" name="respuesta" class="form-control" placeholder="respuesta">                  
                  </div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Responder</button>
                  </div> 
                </form>
                <!--FORMULARIO PARA CAMBIAR LA CONTRASEÑA-->
                <form action="recuperarpass.php" method="post" class="<?php echo $estados["contraseña"] ?>">
                  <div class="form-group ">
                    <small class="form-text text-muted"> Ingrese nueva contraseña: </small>
                    <input type="password"   class="form-control" name="cambiar">
                    <input type="hidden" value="<?php echo $_POST["email"] ?>" name="email">
                  </div>
                  <div class="form-group">
                     <button type="submit" name="submit" class="btn btn-primary btn-block">Cambiar</button>
                  </div>

                  

                </form>
              </article> <!-- card-body -->
            </div> <!-- card -->


    </div> <!-- row -->
        </div>
        <div class="col-lg-7 d-none d-lg-block centro ">
          <img class="img-fluid" src="img/logop1.png">
        </div>
        </div>
    
  </div>


<?=!include('footer.php'); ?>

</body>
</html>