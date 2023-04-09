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
	if($formEnviado == '1') {
		header('location: dietas');}

if(!isset($_GET['id'])){
	header("Location:nutricion-formulario.php");
}else{
	$id = mysqli_real_escape_string($con,$_GET['id']);
	if(!is_numeric($id)){
		header("Location:nutricion-formulario.php");
		exit();
	}else if(is_numeric($id)){
		
		$sql = "SELECT * FROM `esp` WHERE id_A='$id'";
		$result = mysqli_query($con,$sql); 
		//check if post available
		if(mysqli_num_rows($result)<=0){
			//nopost
			header("Location:nutricion-formulario.php");
		}else if(mysqli_num_rows($result)>0){ //Aqui lo bueno
			//while($row=mysqli_fetch_array($result)){
				//$uno = $row['post_title'];	
			//}
		} //termina lo bueno
	}
}
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Completa Tus Datos De Nutrición</title>
     <link rel="stylesheet" href="Datos-Entrenamiento.css">
     <link href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap" rel="stylesheet">
 </head>
 <body>
<div class="Contenedor">
 	<div class="main">
 		<div class="formu">
 			<form action="predatosNutricion.php" method="POST" class="form">
                <h1>Ingreso de Datos</h1>

                <p>Motivos por los cuales busca asistencia.</p>
 				<select name="motivos">
 					<option disabled>Escoje</option>
 					<option value="0">Pérdida o aumento de peso</option>
 					<option value="1">Afecciones médicas</option>
 					<option value="2">Embarazo y lactancia</option>
 					<option value="3">Desórdenes alimentarios</option>
 					<option value="4">Mejora del rendimiento deportivo</option>
 					<option value="5">Cambios en el estilo de vida</option>
 				</select>

                <p>Edad</p>
 				<input type="number" name="edad">

 				<p>Peso</p>
 				<input type="number" name="peso">

 				<p>Histrial medico (afecciones médicas, medicamentos recetados y cualquier alergia alimentaria conocida).</p>
 				<input type="text" name="historialM">

 				<p>Historial de hábitos alimentarios (patrones de alimentación, preferencias y aversiones alimentarias, y cualquier patrón de comer en exceso o bajo consumo de alimentos.).</p>
 				<input type="text" name="historialH">


 				<p>Historial de actividad física o actividades deportivas</p>
 				<input type="text" name="historialA">


 				<p>Nivel de acividad fisica actual</p>
 				<input type="text" name="NAF">


 				<p>Historial de hábitos de sueño y nivel de estrés.</p>
 				<input type="text" name="historialS">


 				<p>Historial de consumo de suplementos y vitaminas.</p>
 				<input type="text" name="historialV">

 				<p>Datos adicionales</p>
 				<input type="text" name="mas">

 				<p>Altura</p>
 				<input type="number" name="altura">


 				<p>Tipo de ejercicio</p>
 				<select name="tipo" required id="u" onchange="mi()" >
				    	<option disabled>Escoje</option>
					    	<?php  
						    	$sql = mysqli_query($con, "SELECT * from tipos_ejercicio");
						    	while ($usuarios = mysqli_fetch_row($sql)) { ?>		
					    	}
				    	<option value="<?php echo $usuarios[0];?>" > <?php echo $usuarios[1];?></option>
				    		<?php } ?>
				    </select>
                <br><br>

 				<p>Plazo</p>
 				<input type="datetime-local" name="plazo" id="plazo" style="margin-bottom: 50px"><br><br>
 				<input type="hidden" name="idN" value="<?php echo $id;?>">

 				<button type="submit" class="fill">Enviar</button>
 			</form>
 		</div>
 	</div>
</div>
 </body>
 </html>