<?php 

session_start();
if(!isset($_SESSION['usuario']))
{
  header('Location:index.php');
}


if($_FILES["foto"]["error"]==0){
	move_uploaded_file($_FILES["foto"]["tmp_name"], "profileimg/".$_FILES["foto"]["name"]);
    $profile_img="profileimg/".$_FILES["foto"]["name"];
}

$db=file_get_contents('users.txt');
$db_decode=json_decode($db,true);

for ($i=0; $i<count($db_decode["usuarios"]) ; $i++) { 
	if($db_decode["usuarios"][$i]["email"]==$_SESSION["usuario"]){		
		$db_decode["usuarios"][$i]["foto_perfil"]=$profile_img;
	}
}
$db_encode=json_encode($db_decode);
file_put_contents('users.txt', $db_encode);
header('Location:profile.php');


 ?>