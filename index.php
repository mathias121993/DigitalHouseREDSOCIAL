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
  	  		<div class="col-lg-5 col-sm-12 centro">
  				<section>
  					<img src="img/title.png" class="img-fluid">
  					<article class="text-center"><p class="blanco">Sitio de reunion para programadores, estudiantes , reclutadores y empresas IT</p></article>
  				</section>
  			</div>
  			<div class="col-lg-7 d-none d-lg-block centro ">
  				<img class="img-fluid" src="img/logop1.png">
  			</div>
  	  	</div>
  	
  </div>


<?=!include('footer.php'); ?>

</body>
</html>