<?php 
require_once 'config.php';
   session_start();
   	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	    header("location: login.php");
	    exit;
	}

if($_SERVER["REQUEST_METHOD"] == "POST"){

	$peso= $_POST['peso'];
	$altura =$_POST['altura'];
	$tipo = $_POST['tipo'];
	$dificultad = $_POST['dificultad'];
	$tiempo = $_POST['tiempo'];
	$plazo = $_POST['plazo'];
	$idU = $_SESSION["id"];
	$idE= $_POST['idE'];

	$insert = "INSERT INTO entrenamiento_predatos SET ide = '$idE', idu= '$idU', peso = '$peso', altura='$altura' , tipo='$tipo', dificultad='$dificultad', constancia='$tiempo', plazo='$plazo'";
	$ejecutar= mysqli_query($con, $insert);

 	if($ejecutar){
        $insertS = "UPDATE usuarios SET statusE = '1' WHERE id = '$idU' ";
		  $ejecutarS= mysqli_query($con, $insertS);

		  	if ($ejecutarS) {
		  		echo "Status actualizado";
		  		header('location: entrenamiento/index.php');
		  	}
		  	else {
		  		echo "no se actualizadoel status";
		  	}
     
        }
        else{
        echo 'Datos NO Ingresados';
        }
   	 
}

	
 ?>


 	