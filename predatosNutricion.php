<?php 
require_once 'config.php';
   session_start();
   $idU = $_SESSION['id'];
   	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	    header("location: login.php");
	    exit;
	}

if($_SERVER["REQUEST_METHOD"] == "POST"){

	$motivos = mysqli_real_escape_string($con, $_POST['motivos']);
	$edad = mysqli_real_escape_string($con, $_POST['edad']);
	$peso = mysqli_real_escape_string($con, $_POST['peso']);
	$historialM = mysqli_real_escape_string($con, $_POST['historialM']);
	$historialH = mysqli_real_escape_string($con, $_POST['historialH']);
	$historialA = mysqli_real_escape_string($con, $_POST['historialA']);
	$NAF = mysqli_real_escape_string($con, $_POST['NAF']);
	$historialS = mysqli_real_escape_string($con, $_POST['historialS']);
	$historialV = mysqli_real_escape_string($con, $_POST['historialV']);
	$mas = mysqli_real_escape_string($con, $_POST['mas']);
	$altura = mysqli_real_escape_string($con, $_POST['altura']);
	$tipo = mysqli_real_escape_string($con, $_POST['tipo']);
	$plazo = mysqli_real_escape_string($con, $_POST['plazo']);
	$fecha_hora_db = date('Y-m-d H:i:s', strtotime($plazo));

	$idN = mysqli_real_escape_string($con, $_POST['idN']);

$query = "INSERT INTO nutricion_predatos (idU, idE, motivos, edad, peso, historialM, historialH, historialA, NAF, historialS, historialV, mas, altura, tipo, plazo) VALUES ('$idU', '$idN', '$motivos', '$edad', '$peso', '$historialM', '$historialH', '$historialA', '$NAF', '$historialS', '$historialV', '$mas', '$altura', '$tipo', '$fecha_hora_db' )";
$ejecutar= mysqli_query($con, $query);

	
 	if($ejecutar){
        $insertS = "UPDATE usuarios SET statusD = '1' WHERE id = '$idU' ";
		  $ejecutarS= mysqli_query($con, $insertS);

		  	if ($ejecutarS) {
		  		echo "Status actualizado";
		  		header('location: dietas/');
		  	}
		  	else {
		  		echo "Fallo MOD Status.";
		  	}
     
        }
        else{
        echo 'Datos NO Ingresados'. mysqli_error($con);

        }
   	 
}?>


 	