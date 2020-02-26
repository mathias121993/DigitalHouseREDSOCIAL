<?php
if(isset($_GET['error'])){
  $class="alert alert-danger";
}else{
  $class="d-none";
}
include('error.php');
if($_POST){
  validacionDatos($_POST);
}
session_start();
if(isset($_SESSION["usuario"])){
  header('Location:profile.php');
}

 ?>


<!DOCTYPE html>
<html>
<head>
   <?=!include('head.php') ?>
</head>
<body>
  <div class="<?php echo $class; ?>" role="alert">
    Usuario y contraseña no coinciden
    </div>
  <?=!include('prueba2.php') ?>
    
  <div class="container">
  	  	<div class="row">
  	  		<div class="col-lg-5 col-sm-12 centro">
  				<div class="row">

            <div class="col-12 text-center">
              <div class=" <?php echo $mensajeClases["estado"] ?>" role="alert">
               Enhorabuena ya formas parte de CodersPlug
              </div>
              <h2 class="blanco">Forma parte de <span class="verde">Coders</span>Plug</h2>
            </div>
            
            <div class="cards">
              <article class="card-body">
<!--FORMULARIOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO-->
                <form method="post" action="register.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="foto">
                        <label class="custom-file-label" for="inputGroupFile01">Subi tu foto de perfil</label>
                      </div>
                    </div>
                  </div>
                    <!--TIPO DE USUARIO-->
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Tipo de usuario</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="tipousuario">
                          <option selected value="coder">Coder</option>
                        </select>
                      </div>
                    </div>                  
                  <div class="form-row">
                    <div class="col form-group ">  
                      <input type="text" name="nombre" id="nombre" class="form-control <?php echo $mensajeClases["nombre"]["input_color"] ?> " placeholder="Nombre" value="<?php echo $mensajeClases["nombre"]["input_placeholder"] ?>">
                      <div class="<?php echo $mensajeClases["nombre"]["clase"] ?>">
                        <?php echo $mensajeClases["nombre"]["mensaje"] ?>
                      </div>
                    </div> <!-- form-group -->
                    <div class="col form-group">
                      <input type="text" name="apellido" id="apellido" class="form-control <?php echo $mensajeClases["apellido"]["input_color"] ?>" placeholder="Apellido" value="<?php echo $mensajeClases["apellido"]["input_placeholder"] ?>">
                      <div class="<?php echo $mensajeClases["apellido"]["clase"] ?>">
                        <?php echo $mensajeClases["apellido"]["mensaje"] ?>
                      </div>
                      
                    </div> <!-- form-group -->
                  </div> <!-- form-row -->
                  <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control <?php echo $mensajeClases["email"]["input_color"] ?>" placeholder="Correo electronico" value="<?php echo $mensajeClases["email"]["input_placeholder"] ?>">
                    <div class="<?php echo $mensajeClases["email"]["clase"] ?>">
                        <?php echo $mensajeClases["email"]["mensaje"] ?>
                      </div>
                    
                  </div>
                  <!--Pregunta secreta-->
                        <div class="input-group mb-3">
                          <input type="text" class="form-control <?php echo $mensajeClases["pregyrest"]["input_color"] ?> " placeholder="Respuesta" name="respuesta" value="<?php echo $mensajeClases["pregyrest"]["input_placeholder"] ?>">
                           <select class="custom-select" id="inputGroupSelect02" name="pregunta">
                              <option selected>Pregunta secreta</option>
                              <option value="Amor platonico">Amor platonico</option>
                              <option value="1ra Mascota de la infancia">1ra Mascota de la infancia</option>
                              <option value="Apellido materno">Apellido materno</option>
                              <option value="Primer empleo">Primer empleo</option>
                              <option value="Nombre de tu primer pareja">Nombre de tu primer pareja</option>
                            </select>
                        </div>
                         <div class="<?php echo $mensajeClases["pregyrest"]["clase"] ?>">
                          <?php echo $mensajeClases["pregyrest"]["mensaje"] ?>
                        </div>

                   <!-- form-group -->
                  <div class="form-group">
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="genero" id="genero" value="male" required>
                      <span class="form-check-label"> Masculino </span>
                    </label>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="genero" id="genero" value="female">
                      <span class="form-check-label"> Femenino</span>
                    </label>
                  </div> <!-- form-group -->
                  <div class="form-group">
                    <input class="form-control <?php echo $mensajeClases["password"]["input_color"] ?>" name="password" type="password" placeholder="Contraseña" value="<?php echo $mensajeClases["password"]["input_placeholder"] ?>">
                    <div class="<?php echo $mensajeClases["password"]["clase"] ?>">
                        <?php echo $mensajeClases["password"]["mensaje"] ?>
                      </div>
                    
                  </div> <!-- form-group -->
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block"> Registrarse  </button>
                  </div> <!-- form-group -->                                                
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