<?php 
session_start();

$db=file_get_contents('users.txt');
$db_decode=json_decode($db,true);
$contenido=$_POST["comentario"];
$time=new DateTime();
$post=["time"=> $time, "contenido" => $contenido];

for ($i=0; $i<count($db_decode["usuarios"]) ; $i++) { 
	if($db_decode["usuarios"][$i]["email"]==$_SESSION["usuario"]){		
		$db_decode["usuarios"][$i]["post"][]=$post;

	}
}
$db_encode=json_encode($db_decode);
file_put_contents('users.txt', $db_encode);
header('Location:profile.php');


 ?>