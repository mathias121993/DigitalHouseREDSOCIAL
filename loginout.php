<?php 
session_start();
session_destroy();
setcookie("email",NULL,-1);
header('Location: profile.php');


 ?>