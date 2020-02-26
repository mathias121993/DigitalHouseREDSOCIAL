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
     <?=!include('navmini.php')  ?>
      <div class="col-lg-3 col-md-5 d-none d-sm-none d-md-block  navaction">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="navbar-brand" href="#">
            <img src="img/title.png" width="150" height="auto" alt="">
          </a>
            <?=!include('navlateral.php') ?>
       </div>
        <div class="col-12">
             <a href="friends.php"><img class="menuflotante3" src="img/menu.png"></a>
            </div>
        </div>
      <div class="col-lg-5 col-md-7 col-sm-12" >
          <div class="text-center friendscabecera ">
            <h2 class="blanco "><span class="verde">I</span>ntereses de : @Username</h2>
          </div>
         <div class="Listadeamigos">
          
            <div class="fixed">
        

        <?php 
        if($_GET){
        $friends_json=file_get_contents('users.txt');
        $friends=json_decode($friends_json,true);
        foreach ($friends["usuarios"] as $key => $value) :
          
          if($value["name"]==$_GET["nombre"]) : ?>
            <div class="text-center  amigosmall ">
            <div class="row">
              <div class="col-4">
                <img class="profileimg" style="width: 100%" src="img/profile.jpg">
              </div>

              <div class="col-7">
                <h5 class="blanco"><?= $value["name"]." ".$value["apellido"]  ?></h5>
                <div class="text-left">
                  <h6 class="Skillsmini">Skills</h6>
                  <h6 class="Skillsmini">Channels</h6>
                  <h6 class="Skillsmini">Studies</h6>
                  <h6 class="Skillsmini">Interest</h6>
                </div>
                <div class="row">
                  <div class="col-6">
                    <form action="addfriend.php" method="post">
                      <input type="hidden" name="email" value="<?php echo $value['email']  ?>">
                      <input type="submit" class="btn btn-light" value="A+">
                    </form>
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-light">MP</button>
                  </div>
                  
                
              </div>
                
              </div>  
              </div>
            </div>

         <?php  endif;

        endforeach;
        }
         ?>
         
         <!-- <?php for($i=0; $i<11;$i++) : ?>
            <div class="text-center  amigosmall ">
            <div class="row">
              <div class="col-4">
                <img class="profileimg" style="width: 100%" src="img/profile.jpg">
              </div>

              <div class="col-7">
                <h5 class="blanco">USERNAME</h5>
                <div class="text-left">
                  <h6 class="Skillsmini">Skills</h6>
                  <h6 class="Skillsmini">Channels</h6>
                  <h6 class="Skillsmini">Studies</h6>
                  <h6 class="Skillsmini">Interest</h6>
                </div>
                <div class="row">
                  <div class="col-6">
                    <button type="button" class="btn btn-light">X</button>
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-light">MP</button>
                  </div>
                  
                
              </div>
                
              </div>  
              </div>
            </div>
          <?php endfor ?> -->
         </div>
         
            
         <div class="d-block d-sm-block d-md-none">
           <a href="friends.php"><img class="menuflotante" src="img/menu.png"></a>
         </div>

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