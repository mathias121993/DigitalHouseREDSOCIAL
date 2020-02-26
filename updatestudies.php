<?php 

session_start();
if(!isset($_SESSION['usuario']))
{
  header('Location:index.php');
}

$db=file_get_contents('users.txt');
$db_decode=json_decode($db,true);

for ($i=0; $i<count($db_decode["usuarios"]) ; $i++) { 
	if($db_decode["usuarios"][$i]["email"]==$_SESSION["usuario"]){		
		$db_decode["usuarios"][$i]["studies"][]=$_POST["formacion"];
	}
}
$db_encode=json_encode($db_decode);
file_put_contents('users.txt', $db_encode);
header('Location:profile.php');


 ?>