<?php

$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];

if(empty($usuario) || empty($pass)){
	header("Location: index.php");
	exit();
}

$mysqli = new mysqli('127.0.0.1', 'root', '', 'login');
$mysqli->set_charset("utf8");

$sql = "SELECT * from usuarios where Username='" . $usuario . "'";  

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();


if($row = $result->fetch_assoc()){
	if($row['Password'] ==  $pass){
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location: admin.php");
	}else{
		header("Location: index.php");
		exit();
	}
}else{
	header("Location: index.php");
	exit();
}



?>