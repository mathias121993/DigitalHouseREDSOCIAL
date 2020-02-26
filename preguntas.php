<?php 

if(isset($_GET['error'])){
  $class="alert alert-danger";
}else{
  $class="d-none";
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
  	  		<div class="col-lg-5 col-sm-12 text-center">
            
              <div class="row pregunta">
                <!--PREGUNTA-->
                <p class="col-lg-12 consigna"><span class="q">?</span>Lorem ipsum dolor sit amet, consectetur adipisicing
                </p>
                 <p class=" col-lg-12 respuesta">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                </p>
                <!--PREGUNTA-->
                <p class="col-lg-12 consigna"><span class="q">?</span>Lorem ipsum dolor sit amet, consectetur adipisicing
                </p>
                 <p class=" col-lg-12 respuesta">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                </p>
                <!--PREGUNTA-->
                <p class="col-lg-12 consigna"><span class="q">?</span>Lorem ipsum dolor sit amet, consectetur adipisicing
                </p>
                 <p class=" col-lg-12 respuesta">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                </p>
                <!--PREGUNTA-->
                <p class="col-lg-12 consigna"><span class="q">?</span>Lorem ipsum dolor sit amet, consectetur adipisicing
                </p>
                 <p class=" col-lg-12 respuesta">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                </p>
                <!--PREGUNTA-->
                <p class="col-lg-12 consigna"><span class="q">?</span>Lorem ipsum dolor sit amet, consectetur adipisicing
                </p>
                 <p class=" col-lg-12 respuesta">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                </p>
                
               

              </div>
              

             
          </div>
      			<div class="col-lg-7 d-none d-lg-block centro ">
      				<img class="img-fluid" src="img/logop1.png">
      			</div>
  	  	</div>
  	
  </div>


<?=!include('footer.php'); ?>

</body>
</html>