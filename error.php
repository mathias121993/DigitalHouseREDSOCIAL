<?php 


$error=[

"nombre" => [],
"apellido" => [],
"email" => [],
"pregunta" =>[]

];

  /*$classNM="d-none";
  $classAM="d-none";
  $classEM="d-none";
  $classPM="d-none";
  $placeholderN="";
  $placeholderE="";
  $placeholderA="";
  $placeholderP="";*/

$mensajeClases=[
	"estado" => "d-none",
	"nombre" => [ "clase" => "d-none",
				  "placeholder" => "",
				  "mensaje" => "",
				  "input_color" => "",
				  "input_placeholder" => ""
				],
	"apellido" => [ "clase" => "d-none",
				  "placeholder" => "",
				  "mensaje" => "",
				  "input_color" => "",
				  "input_placeholder" => ""
				],
	"email" => [ "clase" => "d-none",
				  "placeholder" => "",
				  "mensaje" => "",
				  "input_color" => "",
				  "input_placeholder" => ""
				],
	"password" => [ "clase" => "d-none",
				  "placeholder" => "",
				  "mensaje" => "",
				  "input_color" => "",
				  "input_placeholder" => ""
				],
	"pregyrest" => [ "clase" => "d-none",
				  "placeholder" => "",
				  "mensaje" => "",
				  "input_color" => "",
				  "input_placeholder" => ""
				  ],
];

// Funcion creadora del archivo json en caso de no existir//
function crear_db(){
	global $user;
	$usuarios=["usuarios" => []];
	$usuario_json= json_encode($usuarios);
	file_put_contents("users.txt", $usuario_json);
}


//Funcion que valida si alguien introdujo un numero en un string//
function validacion($string){

	$abc="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	for ($i=0; $i<strlen($string) ; $i++) { 
		if(strpos($abc,substr($string,$i,1))===false){
			return false;
	    }
	}
	return true;

}
// Termina funcion de validacion de un string//


//Funcion que determina la validez de los campos pasado por $_POST dentro del registro//
function validacionDatos($datos){
	global $error;
	global $mensajeClases;

	if(empty($_POST["pregunta"]) || empty($_POST["respuesta"])){
		$error["pregunta"][]=["error","002"];
		$mensajeClases["pregyrest"]["clase"]="campo-invalido";
		$mensajeClases["pregyrest"]["mensaje"]="campo obligatorio";
		$mensajeClases["pregyrest"]["input_color"]="is-invalid";
	}else{
		$mensajeClases["pregyrest"]["input_color"]="is-valid";
		$mensajeClases["pregyrest"]["input_placeholder"]=$datos["respuesta"];
	}



	if(strlen($datos["nombre"])==0){
		$error["nombre"][]=["error","002"];
		$mensajeClases["nombre"]["clase"]="campo-invalido";
		$mensajeClases["nombre"]["mensaje"]="campo vacio";
		$mensajeClases["nombre"]["input_color"]="is-invalid";
	}else if(strlen($datos["nombre"])<3){
		$error["nombre"][]=["error","003"];
		$mensajeClases["nombre"]["clase"]="campo-invalido";
		$mensajeClases["nombre"]["mensaje"]="minimo 3 digitos";
		$mensajeClases["nombre"]["input_color"]="is-invalid";
	}else if(!validacion($datos["nombre"])){
		$error["nombre"][]=["error","004"];
		$mensajeClases["nombre"]["clase"]="campo-invalido";
		$mensajeClases["nombre"]["mensaje"]="caracteres invalidos";
		$mensajeClases["nombre"]["input_color"]="is-invalid";
	}else{
		$mensajeClases["nombre"]["input_color"]="is-valid";
		$mensajeClases["nombre"]["input_placeholder"]=$datos["nombre"];
	}

	if(strlen($datos["apellido"])==0){
		$error["apellido"][]=["error","002"];
		$mensajeClases["apellido"]["clase"]="campo-invalido";
		$mensajeClases["apellido"]["mensaje"]="campo vacio";
		$mensajeClases["apellido"]["input_color"]="is-invalid";
	}else if(strlen($datos["apellido"])<3){
		$error["apellido"][]=["error","003"];
		$mensajeClases["apellido"]["clase"]="campo-invalido";
		$mensajeClases["apellido"]["mensaje"]="minimo 3 digitos";
		$mensajeClases["apellido"]["input_color"]="is-invalid";
	}else if(!validacion($datos["apellido"])){
		$error["apellido"][]=["error","004"];
		$mensajeClases["apellido"]["clase"]="campo-invalido";
		$mensajeClases["apellido"]["mensaje"]="caracteres invalidos";
		$mensajeClases["apellido"]["input_color"]="is-invalid";
	}else{
		$mensajeClases["apellido"]["input_color"]="is-valid";
		$mensajeClases["apellido"]["input_placeholder"]=$datos["apellido"];
	}

	if(strlen($datos["password"])==0){
		$error["password"][]=["error","002"];
		$mensajeClases["password"]["clase"]="campo-invalido";
		$mensajeClases["password"]["mensaje"]="campo vacio";
		$mensajeClases["password"]["input_color"]="is-invalid";
	}else if(strlen($datos["password"])<7){
		$error["password"][]=["error","003"];
		$mensajeClases["password"]["clase"]="campo-invalido";
		$mensajeClases["password"]["mensaje"]="minimo 7 digitos";
		$mensajeClases["password"]["input_color"]="is-invalid";
	}else{
		$mensajeClases["password"]["input_color"]="is-valid";
		$mensajeClases["password"]["input_placeholder"]=$datos["password"];
	}

	if(strlen($datos["email"])==0){
		$error["email"][]=["error","002"];
		$mensajeClases["email"]["clase"]="campo-invalido";
		$mensajeClases["email"]["mensaje"]="campo vacio";
		$mensajeClases["email"]["input_color"]="is-invalid";
	}else if(!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)){
		$error["email"][]=["error","005"];
		$mensajeClases["email"]["clase"]="campo-invalido";
		$mensajeClases["email"]["mensaje"]="formato invalido";
		$mensajeClases["email"]["input_color"]="is-invalid";
	}else{
		if(!file_exists("users.txt")){
		    crear_db();
		 }
		$db_user=file_get_contents("users.txt");
		$db_user_array=json_decode($db_user,true);
		foreach ($db_user_array["usuarios"] as $nodo => $usuario) {
			if($usuario["email"]==$datos["email"]){
				$error["email"][]=["error","006"];
				$mensajeClases["email"]["clase"]="campo-invalido";
				$mensajeClases["email"]["mensaje"]="Email ya esta registrado";
				$mensajeClases["email"]["input_color"]="is-invalid";
			}
		}
		if(count($error["email"])==0){
			$mensajeClases["email"]["input_color"]="is-valid";
			$mensajeClases["email"]["input_placeholder"]=$datos["email"];
		}
	}
	if(count($error["nombre"])==0 && count($error["apellido"])==0 && count($error["email"])==0  && count($error["pregunta"])==0){
		    $profile_img="img/profile.jpg";
		    if($_FILES["foto"]["error"]==0){
		      move_uploaded_file($_FILES["foto"]["tmp_name"], "profileimg/".$_FILES["foto"]["name"]);
		      $profile_img="profileimg/".$_FILES["foto"]["name"];
		    }
		    if(isset($db_user_array)){
		    	$id=1;
		    }else{
		    $id=$db_user_array["usuarios"][count($db_user_array)-1]["id"]+1;}
		    $user=[
		    "id" => $id,
		    "foto_perfil" => $profile_img,
		    "tipo_user" => $_POST["tipousuario"],
		    "name" => $_POST["nombre"],
		    "apellido" => $_POST["apellido"],
		    "email" => $_POST["email"],
		    "sexo" => $_POST["genero"],
		    "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
		    "pregyrest" => [ "pregunta"=>$_POST["pregunta"], "respuesta"=>$_POST["respuesta"] ],
		    "skills" => [],
		    "channels" => [],
		    "studies" => [],
		    "interest" => [],
		    "location" => "",
		    "post" => []
		    ];
		    if(!file_exists("users.txt")){
		    	crear_db();
		      
		    }else{
		      $users_json=file_get_contents("users.txt");
		      $users_Array=json_decode($users_json,true);
		      $users_Array["usuarios"][]=$user;
		      $users_json=json_encode($users_Array);
		      file_put_contents("users.txt", $users_json);
		    }

		    $mensajeClases=[
				"estado" => "alerta alert-success",
				"nombre" => [ "clase" => "d-none",
							  "placeholder" => "",
							  "mensaje" => "",
							  "input_color" => "",
							  "input_placeholder" => ""
							],
				"apellido" => [ "clase" => "d-none",
							  "placeholder" => "",
							  "mensaje" => "",
							  "input_color" => "",
							  "input_placeholder" => ""
							],
				"email" => [ "clase" => "d-none",
							  "placeholder" => "",
							  "mensaje" => "",
							  "input_color" => "",
							  "input_placeholder" => ""
							],
				"password" => [ "clase" => "d-none",
							  "placeholder" => "",
							  "mensaje" => "",
							  "input_color" => "",
							  "input_placeholder" => ""
							],
				"pregyrest" => [ "clase" => "d-none",
							  "placeholder" => "",
							  "mensaje" => "",
							  "input_color" => "",
							  "input_placeholder" => ""
							  ]
			];
	}

}
//Termina la funcion de validacion de campos del registro//






 ?>