<?php 

if(isset($_COOKIE["email"])){
  
    $_SESSION["usuario"]=$_COOKIE["email"];
    
      
}


session_start();
if(!isset($_SESSION['usuario']))
{
  header('Location:index.php');
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <?=!include('head.php') ?>
</head>
<body>

  <div class="container-fluid">
    <div class="row">
        <?=!include('navmini.php') ?>
      <div class="col-lg-3 col-md-5 d-none d-sm-none d-md-block  navaction">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="navbar-brand" href="#">
            <img src="img/title.png" width="150" height="auto" alt="">
          </a>
            <?=!include('navlateral.php') ?>
            
       </div>
          
      </div>
      




      
      <div class="col-lg-5 col-md-7 col-sm-12" >
        <div class="configuracion">
        <div class="text-center  ">
            <h2 class="blanco "><span class="verde">C</span>onfiguracion</h2>
          </div>
        <!-- CAMBIAR FOTO DE PERFIL -->
        <div class="uploaditem">
          <form action="updatephoto.php" method="POST" enctype="multipart/form-data">
              <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto">
                <label class="custom-file-label" for="inputGroupFile01">Foto perfil</label>
              </div>
              </div>
             <input type="submit" class="btn btn-upload" value="Subir foto">
          </form>
        </div>

        <!-- AGREGAR SKILLS/ LENGUAJES DE PROGRAMACION -->
        <div class="uploaditem">
          <form action="updateskills.php" method="POST">
              <div class="input-group mb-3">
                <select class="custom-select" name="skills">
                  <option selected>Seleccionar</option>
                  <option value="html">HTML</option>
                  <option value="css">CSS</option>
                  <option value="bootstrap">BOOTSTRAP</option>
                  <option value="php">PHP</option>
                  <option value="laravel">LARAVEL</option>
                </select>
                <div class="input-group-append">
                  <label class="input-group-text" for="inputGroupSelect02">Skills</label>
                </div>
              </div>
              <input type="submit" class="btn btn-upload" value="Actualizar Skills">
          </form>
        </div>

        <!-- AGREGAR CANALES O REDES SOCIALES -->
        <div class="uploaditem">
          <form action="updatered.php" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="link" name="link">
               <select class="custom-select" id="inputGroupSelect02" name="red">
                  <option selected>Seleccionar</option>
                  <option value="youtube">YOUTUBE</option>
                  <option value="git">GIT</option>
                  <option value="facebook">FACEBOOK</option>
                  <option value="instagram">INSTAGRAM</option>
                </select>
            </div>
            <input type="submit" class="btn btn-upload" value="Agregar RED">
          </form>
        </div>
        <!-- AGREGAR CENTRO DE FORMACION DEL USUARIO -->
        <div class="uploaditem">
          <form action="updatestudies.php" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Formacion" name="formacion">
            </div>
            <input type="submit" class="btn btn-upload" value="Agregar Formacion">
          </form>
        </div>
        <!-- AGREGAR LOCALIZACION -->
        <div class="uploaditem">
          <form action="updatelocalization.php" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Ubicacion" name="ubicacion">
            </div>
            <input type="submit" class="btn btn-upload" value="Agregar ubicacion">
          </form>
        </div>
        <!--/////////////////////////////////////////////////////////////////////////////////////-->
       </div>   
        
      </div>
      <div class="colizq col-4 d-none d-lg-block">
        
          <div class="col-12">
          <nav class="navbar navbar-light bg-light justify-content-between">
        <?php include('busqueda.php'); ?>
      </nav>
      </div>
      <div></div>
 
      </div>
  </div>
  </div>


<?=!include('footer.php'); ?>

</body>
</html>