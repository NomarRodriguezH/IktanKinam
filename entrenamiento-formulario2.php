<?php
	require_once 'config.php';

   session_start();


if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

$x6= $tipoeje= $peso= $altura="";	
$entrenador= $_POST['entrenador'];

    $consulta= mysqli_query($con, "SELECT * FROM entrenador WHERE idE = '$entrenador' LiMIT 1");
	$fila=mysqli_fetch_row($consulta);

	$x= $fila [1];
	$x2= $fila [2]; 
	$x3= $fila [4]; 
	$x4= $fila [11]; 
	$x5= $fila [12]; 
	$x6= $fila [14]; 
	$x7= $fila [15]; 


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		body {
			background: #abbaab;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #ffffff, #abbaab);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #ffffff, #abbaab); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		}
		.main {
			margin: auto;
			width: 40%;
			padding: 15px;
			/* From https://css.glass */
			background: rgba(52, 73, 216, 0.27);
			border-radius: 16px;
			box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
			backdrop-filter: blur(5px);
			-webkit-backdrop-filter: blur(5px);
			border: 1px solid rgba(52, 73, 216, 0.3);
			text-align: center;

		}
	</style>
</head>
<body>
	<div class="main">
 		<form action="predatos.php" method="POST">
 		<h2>Complementa tus datos</h2>
 			<div>
 				<input type="text" readonly value="<?php echo $x ?>" name="nombreE"><br><br>
 				<input type="text" readonly value="<?php echo $entrenador ?> " name="entreID">
 				<input type="text" readonly value="<?php echo $x2 ?>" name="apellidoE"><br><br>
 				<input type="text" readonly value="<?php echo $x3 ?>" name="sexoE"><br><br>
 				<input type="text" readonly value="<?php echo $x4 ?>" name="des"><br><br>
 				<input type="text" readonly value="<?php echo $x5 ?>" name="esp"><br><br>
 				<input type="text" readonly value="<?php echo $x6 ?>" name="user"><br><br>
 				<input type="text" readonly value="<?php echo $x7 ?>" name="imagen"><br><br>

 				<input type="text" placeholder="Tu peso" name="peso"><br><br>
				<input type="text" placeholder="Tu altura en metros" name="altura"><br><br>
				<input type="text" placeholder="Que tipo de ejericico buscas" name="tipoeje"><br><br>

 				<input type="submit" name="" value="Enviar" onauxclick="re()">
 			</div>
 		</form>
 	</div>
</body>
</html>


