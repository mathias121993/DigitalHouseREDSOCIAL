<?php 
session_start();
$db_json=file_get_contents('users.txt');
$db=json_decode($db_json,true);

for ($i=0; $i<count($db) ; $i++) { 
	if($db["usuarios"][$i]["email"]==$_SESSION['usuario']){
		$db["usuarios"][$i]["interest"][]=$_POST["email"];
		

	}
}
$db_json=json_encode($db);
file_put_contents("users.txt", $db_json);
header('Location: friendsearch.php');


 ?>