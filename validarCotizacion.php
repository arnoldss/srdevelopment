<?php





$calculate=null;
$paid = 1000;
    $time = (int)$_POST['time'];
    $correo = $_POST['correo'];

$calculate=$paid*8*(int)$_POST['time']*(int)$_POST['persons'];
$name=htmlspecialchars($_POST['name']);


if(empty($name) || empty($correo)){
	header("Location: index.php");
	exit();
}




echo "Para tu proyecto $name, calculamos que un costo aproximado de tu proyecto seria de $ $calculate mxn contactanos a info@srdevelopmentmty.com.";

$mysqli = new mysqli('127.0.0.1', 'root', '', 'login');
$mysqli->set_charset("utf8");
$sql = "INSERT INTO cotizaciones (Nombre, Tiempo, Correo) VALUES ('$name', '$time', '$correo')";

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->affected_rows;

if($result > 0){
	echo "Cotizacion mandada a personas de ventas. Redirigiendote a Home en 10 segundos";
	header("refresh:10;url=index.php");

} else {
    echo "Cotizacion no guardada para personal de ventas. Redirigiendote a Home en 10 segundos";
	
	header("refresh:10;url=index.php");


	

}




?>



