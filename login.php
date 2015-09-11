<?php
include("connectDB2.php");

$user=$_POST["Usuario"];
$pass=$_POST["password"];

$stmt= $connectDB->prepare("SELECT nombre, pass 
	FROM usuario u WHERE u.nombre = ?");
$stmt->bind_param('s',$user);

$stmt->execute();

$result=$stmt->get_result();

$response= $result->fetch_assoc();

if($response["pass"] === $pass){
	echo "ok hasta aca estamos";
	session_start();
	$_SESSION["user"]=$user;
	$_SESSION["pepe"]="Este valor lo usamos despues";

}else{
	echo "error";
}

?>
