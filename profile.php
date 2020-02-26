<?php 
session_start();
if(!isset($_SESSION['usuario']))
{
  header('Location:index.php');
}

if(isset($_COOKIE["email"])){
  
    $_SESSION["usuario"]=$_COOKIE["email"];
    
      
}


if(isset($_SESSION["usuario"])){
  $usuarios=file_get_contents("users.txt");
  $usuariosArray=json_decode($usuarios,true);
  foreach ($usuariosArray["usuarios"] as $key => $usuario) {

    if($usuario["email"]==$_SESSION["usuario"]){
    
    $usuarioDatos=$usuario;    
      
    }
  }
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
  		<?=!include('navmini.php')  ?>
  		<div class="col-lg-3 col-md-5 d-none d-sm-none d-md-block  navaction">

        <!--/////////////////////////////////PERFIL EN GRANDE//////////////////////////////////-->

  			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  			  <a class="navbar-brand" href="#">
    				<img src="img/title.png" width="150" height="auto" alt="">
  			  </a>
  			  <div class="profile ">
  			  	<img class="profileimg" src="<?php echo $usuarioDatos["foto_perfil"]?>">
  			  	<h3 class="username"><?php echo $usuarioDatos["name"] ?></h3>
  			  	<h4 class="rol">Coder</h4>
  			  	<div>
  			  		<h6 class="option">Skills</h6>
              <?php foreach ($usuarioDatos["skills"] as $key ) : ?>
                <small><span class="blanco"><?php echo $key?></span></small>
              <?php endforeach ?>
	  			  	<h6 class="option">Channels</h6>
              <?php foreach ($usuarioDatos["channels"] as $key ) : ?>
                <a href="http://<?php echo $key[0] ?>"><small><span class="blanco"><?php echo $key[1] ?></span></small></a>
              <?php endforeach ?>
	  			  	<h6 class="option">Studies</h6>
              <?php foreach ($usuarioDatos["studies"] as $key ) : ?>
                <small><span class="blanco"><?php echo $key ?></span></small>
              <?php endforeach ?>
	  			  	<h6 class="option">Interest</h6>
  			  	</div>
  			  </div>
    			 <div class="col-12">
           <a href="profile.php"><img class="menuflotante2" src="img/menu.png"></a>
          </div>
			 </div>
			
  		</div>
  		<div class="col-lg-5 col-md-7 col-sm-12" >
        <!--/////////////////////////////////PERFIL EN CHICO//////////////////////////////////-->
  				<div class="text-center d-none d-sm-none d-md-block  ">
  					<h2 class="blanco "><span class="verde">P</span>rofile</h2>
  				</div>
  				<div class="text-center d-block d-sm-block d-md-none align-self-center profilesmall ">
  					<div class="row">
  						<div class="col-4">
  							<img class="profileimg" style="width: 100%" src="<?php echo $usuarioDatos["foto_perfil"]?>">
  						</div>

  						<div class="col-7">
  							<h5>USERNAME</h5>
  							<div class="text-left">
  								<h6 class="Skillsmini">Skills</h6>
                  <?php foreach ($usuarioDatos["skills"] as $key ) : ?>
                    <small><span class="blanco"><?php echo $key?></span></small>
                  <?php endforeach ?>
	  							<h6 class="Skillsmini">Channels</h6>
                  <?php foreach ($usuarioDatos["channels"] as $key ) : ?>
                    <a href="http://<?php echo $key[0] ?>"><small><span class="blanco"><?php echo $key[1] ?></span></small></a>
                  <?php endforeach ?>
	  							<h6 class="Skillsmini">Studies</h6>
                  <?php foreach ($usuarioDatos["studies"] as $key ) : ?>
                    <small><span class="blanco"><?php echo $key ?></span></small>
                  <?php endforeach ?>
	  							<h6 class="Skillsmini">Interest</h6>
  							</div>
  							<div class="row">
  								<div class="col-6">
  									<button type="button" class="btn btn-light">+</button>
  								</div>
  								<div class="col-6">
  									<button type="button" class="btn btn-light">MP</button>
  								</div>
  								
  							
  							</div>
  							
  						</div>	
  					</div>
  				</div>
  				
  			
  				<div class="fixed">
            
              <div class="row post">
                <div class="col-12">
                  <div class="form-group">
                   <form action="addcoment.php" method="POST">
                      <textarea class="form-control comentarios margin2" name="comentario" placeholder="Escribi tu comentario"></textarea>
                      <input type="submit" class="btn btn-warning" value="POSTEAR">
                   </form>
                  </div>
                </div> 
            </div>
          
         
         <?php foreach ($usuarioDatos["post"] as $key ) : ?>
            <div class="post">
            <div class="row">
              <div class="col-2">
                  <img  src="img/profile.jpg">
              </div>
              <div class="col-10 name" >
                <h3 style="color:#ebe770;">Username</h3>
 

                
                <p class="blanco">hace </p>
              </div>
            </div> <!--ROW-->
            <div class="comentario">
              <p><?php echo $key["contenido"] ?></p>
            </div>
            <div class="form-group">
              <textarea class="form-control comentarios" placeholder="Escribi tu comentario"></textarea>
            </div>
          </div>
          <?php endforeach ?>
         </div>
         <div class="d-block d-sm-block d-md-none">
           <a href="profile.php"><img class="menuflotante" src="img/menu.png"></a>
         </div>
  			
  		</div>
  		
  		<div class="colizq col-4 d-none d-lg-block">
  			
  				<div class="col-12">
  				<nav class="navbar navbar-light bg-light justify-content-between">
			     <?php include('busqueda.php'); ?>
				  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
             <?=!include('navlateral.php') ?>
				 </div>

			</nav>
			</div>
			<div></div>
 
  		</div>
 	
  		
  </div>
 	</div>
 	


<?=!include('footer.php'); ?>

</body>
</html>