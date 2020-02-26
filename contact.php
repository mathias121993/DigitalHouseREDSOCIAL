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
            <div class="row">


            <div class="col-12 text-center">
              <h2 class="blanco"><span class="verde">C</span>ontact Us</h2>
            </div>
            
            <div class="cards">
              <article class="card-body">
                <form method="post" action="">
                 
                  <div class="form-row">
                    <div class="col form-group">  
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                    </div> <!-- form-group -->
                    <div class="col form-group">
                      <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido">
                    </div> <!-- form-group -->
                  </div> <!-- form-row -->
                  <div class="form-group">
                    <input type="email"name="email" id="email" class="form-control" placeholder="Correo electronico">
                  </div> <!-- form-group -->
                  <div class="form-group">
                  </div> <!-- form-group -->                 
                  
                  <div class="form-group">
                    <textarea placeholder="Dejanos tu comentario/sugerencia" class="form-control" aria-label="With textarea"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Enviar  </button>
                  </div> <!-- form-group -->    <button type="button" class="btn  btn-lg btn-block goo">Gmail</button>
                  <button type="button" class="btn  btn-lg btn-block faa">Facebook</button>
                  <button type="button" class="btn  btn-lg btn-block tw">Twitter</button>                                            
                </form>
              </article> <!-- card-body -->

            </div> <!-- card -->

             
               
             
    </div> <!-- row -->
        </div>

        <div class="col-lg-7 col-sm-12 centroz mapa">
          <div class="row">
          <div class=" embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13132.578090016908!2d-58.39241119134243!3d-34.6257879357225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccb2520946ad7%3A0x531f8f8d460384ad!2sConstituci%C3%B3n%2C%20CABA!5e0!3m2!1ses-419!2sar!4v1573686917354!5m2!1ses-419!2sar">
            </iframe>

          </div>
            <div class="info">
                <section>
                  <article>
                    <img class="imgcontact" src="img/telefono.png">
                    <h4><span class="verde">T</span>elephone <span class="verde">:</span></h4>
                    <a class="data"  href="123456">123456789</a>
                  </article>
                  <article>
                     <img class="imgcontact" src="img/correo.png">
                    <h4><span class="verde">E</span>mail <span class="verde">:</span></h4>
                    <a class="data" href="general@codersplug.com">general@codersplug.com</a>
                  </article>
                  <article>
                    <img  class="imgcontact" src="img/marcador.png">
                    <h4><span class="verde">U</span>bicacions <span class="verde">:</span></h4>
                    <p class="data" >Calle Falsa 123</p>
                  </article>
                </section>

            </div>
              
            </div>
            <div>
        </div>
    
  </div>


<?=!include('footer.php'); ?>

</body>
</html>