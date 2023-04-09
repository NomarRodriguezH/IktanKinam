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

	$formEnviado= $fila [10]; 


	if($formEnviado == '1'){
		header('location: entrenamiento-mental/index.php');
	}


	echo $_SESSION["username"];
	$mentor='';

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 	<style type="text/css">
 		body {
 			background: #ee9ca7;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #ffdde1, #ee9ca7);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #ffdde1, #ee9ca7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


 		}
 		.main {
 			width: 80%;
 			margin: auto;
 			border-radius: 41px;
			background: linear-gradient(145deg, #fd66f8, #d456d1);
			box-shadow:  15px 15px 30px #823480,
			             -15px -15px 30px #ff8aff;
 			color: white;
 			font-size: 25px;
 			text-align: center;
 			padding: 10px;
 		}

 		.dos {
 			box-shadow: 10px 10px 21px -1px rgba(0,0,0,0.75);
		-webkit-box-shadow: 10px 10px 21px -1px rgba(0,0,0,0.75);
		-moz-box-shadow: 10px 10px 21px -1px rgba(0,0,0,0.75);
		margin: auto;
		width: 80%;
		text-align: center;font-size: 22px;
		margin-top: 60px;
		padding: 10px;
 		}


 	</style>
 </head>
 <body>
 
 	<div class="main">
 		<form action="entrenamiento-mental-formulario.php" name="formulario1" method="POST">
 			<div>
 				<p>Para que puedas acceder al panel de entrenamientos mentales es necesario que escojas a un mentor registrado, a continuación podrás observar información acerca de los mentores disponibles, además deberás completar datos que servían para que tu mentor pueda guiarte de una manera más fácil.</p>


 				 <select name="mentor" required onchange="js()">
		    	<option  >Selecciona Tu Mentor</option>
		    		<?php  
		    			$sqlC = mysqli_query($con, "SELECT * FROM psicologo");
		    			while ($entrenador = mysqli_fetch_row($sqlC)) {?>		
		    			}
		    	<option readonly value="<?php echo $entrenador[0];?>" > <?php echo $entrenador[3];?> con especialidad en: <?php echo $entrenador[7] ?></option>
		    		<?php } ?>
		    </select> <br><br>

 			</div>
 		</form>
 	</div>


 	<script type="text/javascript">
 		function js(){
 			document.formulario1.submit();
 		}
 	</script>

 	<?php 
 		$mentorid='';

 	$mentorid= $_POST['mentor'];
 	


    $consulta="SELECT * FROM psicologo WHERE id = '$mentorid'  LiMIT 1" ;
	$res=mysqli_query($con,$consulta);
	$fila=mysqli_fetch_row($res);

	$nombreM= $fila [1];
	$apellidoM=$fila [2];
		$mentorUser= $fila [3];
	$correoM = $fila[4];
	$telefonoM=$fila [5];
	$estudiosM=$fila [6];
	$especialidadM =$fila[7];
	$reseidenciaM= $fila [8];
	$inofM = $fila [9];



    $consulta="SELECT * FROM usuarios WHERE id = '$idconsulta'  LiMIT 1" ;
	$res=mysqli_query($con,$consulta);
	$fila=mysqli_fetch_row($res);

	$last= $fila [2]; 

	


 	 ?>

 	 <div class="dos">
	 	 	<form action="procesar-mentor.php" method="POST">
	 	 	<p> Nombre del mentor: <?php echo $mentorid.  $apellidoM ?></p>
		 	 <p>Usuario del mentor: <?php echo $mentorUser ?></p>
		 	 <p>Correo del mentor: <?php echo $correoM ?></p>
		 	 <p>Su telefono: <?php echo $telefonoM ?></p>
		 	 <p>Que estudios tiene el mentor: <?php echo $estudiosM ?></p>
		 	 <p>En que se especializa: <?php echo $especialidadM ?></p>
		 	 <p>Donde recide: <?php echo $reseidenciaM ?></p>
		 	 <p>Información de el: <br> <?php echo $inofM ?></p>

	 	 <input type="hidden" readonly name="idM" value="<?php echo $mentorid;  ?>">
	 	 <input type="hidden" readonly name="uM" value="<?php echo $mentorUser;  ?>">
	 	 <input type="hidden" readonly name="idU" value="<?php echo $idconsulta;  ?>"> 
	 	 <input type="hidden" readonly name="uU" value="<?php echo $last;  ?>"> 

	 	 <h3 style="text-align: center;">Datos personales complementarios</h3>

	 	 <textarea placeholder="Padecimientos o enfermedades" name="Padecimientos"></textarea> 
	 	 <br><br>

	 	 <textarea placeholder="Detalles importantes" name="detalles"></textarea><br><br>

	 	 <label>Tipo de habilidades a desarollar.</label>
	 	 <select name="habilidades">
	 	 	<option value="1">Motrices</option>
	 	 	<option value="2">Visuales</option>
	 	 	<option value="3">Memoria</option>
	 	 	<option value="4">Atencion</option>
	 	 	<option value="5">Tratamiento de enfermedad</option>
	 	 </select><br><br>

		<input type="submit" name="" value="Seleccionar entrenador y guardar datos">

 	 </form>

 	 </div>
 	 
</body>
</html>

 	 





 	

