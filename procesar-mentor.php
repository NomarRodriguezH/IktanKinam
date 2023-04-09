<?php 

	require_once 'config.php';

	if($_SERVER["REQUEST_METHOD"] == "POST"){

	$idM = $_POST['idM'];
	$userMentor= $_POST['uM'];
    $idU = $_POST['idU'];
    $userU = $_POST['uU'];
    $Padecimientos = $_POST['Padecimientos']; 
    $detalles = $_POST['detalles']; 
    $habilidades = $_POST['habilidades'];


	$insert = "INSERT INTO mental_predatos SET idmentor = '$idM' , mentoruser = '$userMentor', iduser= '$idU', useru= '$userU', padecimientos = '$Padecimientos', detalles='$detalles' , tipo='$habilidades' ";
	$ejecutar= mysqli_query($con, $insert);

 	if($ejecutar){
        $insertS = "UPDATE usuarios SET statusM = '1' WHERE id = '$idU' ";
		  $ejecutarS= mysqli_query($con, $insertS);

		  	if ($ejecutarS) {
		  		echo "Status actualizado";
		  		header('location: entrenamiento-mental/index.php');
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