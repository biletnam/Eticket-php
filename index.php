<?php
session_start();
if(isset($_SESSION["user"])){
	echo "Hola ".$_SESSION["user"];
}else{
	header("Location:indexTwo.html");
}
?>
