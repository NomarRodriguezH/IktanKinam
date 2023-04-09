<?php
	require_once 'config.php';
    session_start();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	    header("location: login.php");
	    exit;
	}
	$idconsulta = $_SESSION["id"];
	$consulta="SELECT * FROM usuarios WHERE id = '$idconsulta'  LiMIT 1" ;
	$res=mysqli_query($con,$consulta);
	$fila=mysqli_fetch_row($res);
	$formEnviado= $fila [11]; 
	if($formEnviado == '1'){
		header('location: dietas/index.php');
	}
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 	<style type="text/css">
 	body {
 		background: #FDFC47;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #24FE41, #FDFC47);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #24FE41, #FDFC47); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


 	}

 	.main {
 		font-size: 33px;
 		width: 80%;
 		margin: auto;
 		text-align: center;
 	/* From https://css.glass */
background: rgba(255, 255, 255, 0.29);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(5px);
-webkit-backdrop-filter: blur(5px);
border: 1px solid rgba(255, 255, 255, 0.3);
padding: 15px;
 	}

 	#btn {
 		padding: 20px;
 		height: 30px;
 		width: 160px;
 		text-align: center;
 		font-size: 22px;
 		border-radius: 12px;
 	}

 	#sele {
 		background-color: yellow;
 		font-size: 28px;
 		padding: 10px;
 		border-radius: 10px;
 		color: green;
 		  -webkit-text-stroke: .7px black;
 		font-weight: bold;
 		background: #fe8c00;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #f83600, #fe8c00);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #f83600, #fe8c00); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

 	}

 	</style>
 
 </head>
 <body>
 
 	<div class="main">
 		<form action="procesar-form-dietas.php" method="POST">
 			<div>
 				<h1>Hola <?php echo $_SESSION['username'] ?>, para poder acceder al panel necesitas completar información.</h1>
 				<p>Para que puedas acceder al panel de dietas es necesario que escojas a un nutriologo registrado, a continuación podrás observar información acerca de los especialistas disponibles, además deberás completar datos que servían para que te puedan asignar dietas de una manera profesional.</p>


 				 <select  id="sele" name="nutriologo" required>
		    	<option disabled >Selecciona Tu Entrenador</option>
		    		<?php  
		    			$sqlC = mysqli_query($con, "SELECT * from nutriologo");
		    			while ($entrenador = mysqli_fetch_row($sqlC)) {?>		
		    			}
		    	<option value="<?php echo $entrenador[1];?>" > <?php echo $entrenador[1];?> con especialidad en: <?php echo $entrenador[2] ?></option>
		    		<?php } ?>
		    </select> <br><br>

		    <input id="btn" type="submit" name="" value="Seleccionar">

 			</div>
 		</form>

		
 	</div>
 </body>
 </html>