<?php
  $classNM="d-none";
  $classAM="d-none";
  $classEM="d-none";
   $classPM="d-none";
  $placeholderN="";
  $placeholderE="";
  $placeholderA="";
  $placeholderP="";
  $error=0;




if($_POST){
  if(strlen($_POST["nombre"])==0){
    $classN="is-invalid";
    $mensajeN="El campo esta vacio";
    $classNM="invalid-feedback";
    $error++;
  }else if(strlen($_POST["nombre"])<=2){
    $classN="is-invalid";
    $mensajeN="Requiere 2 o mas caracteres";
    $classNM="invalid-feedback";
    $error++;
  }else{
    $classN="is-valid";
    $placeholderN=$_POST["nombre"];
  }

  if(strlen($_POST["apellido"])==0){
    $classA="is-invalid";
    $mensajeA="El campo esta vacio";
    $classAM="invalid-feedback";
    $error++;
  }else if(strlen($_POST["apellido"])<=2){
    $classA="is-invalid";
    $mensajeA="Requiere 2 o mas caracteres";
    $classAM="invalid-feedback";
    $error++;
  }else{
    $classA="is-valid";
    $placeholderA=$_POST["apellido"];
  }
  if(strlen($_POST["email"])==0){
    $classE="is-invalid";
    $mensajeE="El campo esta vacio";
    $classEM="invalid-feedback";
    $error++;
  }else{
    $classE="is-valid";
    $placeholderE=$_POST["email"];
  }

  if(strlen($_POST["password"])==0){
    $classP="is-invalid";
    $mensajeP="El campo esta vacio";
    $classPM="invalid-feedback";
    $error++;
  }else if(strlen($_POST["password"])<=6){
    $classP="is-invalid";
    $mensajeP="Requiere 7 o mas caracteres";
    $classPM="invalid-feedback";
    $error++;
  }else{
    $classP="is-valid";
    $placeholderP=$_POST["password"];
  }
  if($error==0){
    $profile_img="img/profile.jpg";
    if(isset($_FILES["foto"])){
      move_uploaded_file($_FILES["foto"]["tmp_name"], "profileimg/".$_FILES["foto"]["name"]);
      $profile_img="profileimg/".$_FILES["foto"]["name"];
    }
    $user=[
    "id" =>rand ( 0 , 5000000 ),
    "foto_perfil" => $profile_img,
    "tipo_user" => $_POST["tipousuario"],
    "name" => $_POST["nombre"],
    "apellido" => $_POST["apellido"],
    "email" => $_POST["email"],
    "sexo" => $_POST["genero"],
    "password" => $_POST["password"],
    "skills" => [],
    "channels" => [],
    "studies" => [],
    "interest" => []
    ];
    if(!file_exists("users.txt")){

      $usuarios=[ "usuarios" => [$user]];
      $usuario_json= json_encode($usuarios);
      file_put_contents("users.txt", $usuario_json);
    }else{
      $users_json=file_get_contents("users.txt");
      $users_Array=json_decode($users_json,true);
      $users_Array["usuarios"][]=$user;
      $users_json=json_encode($users_Array);
      file_put_contents("users.txt", $users_json);
    }
    header('Location:register.php');
  }


}


 ?>