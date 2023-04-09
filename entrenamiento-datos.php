<?php 
require_once 'config.php';
    session_start();

	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	    header("location: login.php");
	    exit;
	}

if(!isset($_GET['id'])){
	header("Location:entrenamiento-formulario.php");
}else{
	$id = mysqli_real_escape_string($con,$_GET['id']);
	if(!is_numeric($id)){
		header("Location:entrenamiento-formulario.php");
		exit();
	}else if(is_numeric($id)){
		
		$sql = "SELECT * FROM `esp` WHERE id_A='$id'";
		$result = mysqli_query($con,$sql); 
		//check if post available
		if(mysqli_num_rows($result)<=0){
			//nopost
			header("Location:entrenamiento-formulario.php");
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
 	<title>Completa Tus Datos De Entrenamiento</title>
     <link rel="stylesheet" href="Datos-Entrenamiento.css">
     <link href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap" rel="stylesheet">
 </head>
 <body>
<div class="Contenedor">
 	<div class="main">
 		<div class="formu">
 			<form action="predatos.php" method="POST" class="form">
                <h1>Ingreso de Datos</h1>
 				<p>Peso</p>
 				<input type="number" name="peso">

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

 				<p>Nivel de dificultad</p>
 				<select name="dificultad">
 					<option disabled>Escoje</option>
 					<option value="0">Principiante</option>
 					<option value="1">Basico</option>
 					<option value="2">Intermedio</option>
 					<option value="3">Avanzado</option>
 					<option value="4">Intensivo</option>
 					<option value="5">Personalizado</option>
 				</select>


 				<p>Tiempo a dedicar</p>
 				<select name="tiempo">
 					<option disabled>Escoje</option>
 					<option value="0">2-3 Horas semanales.</option>
 					<option value="1">3-5 Horas semanales.</option>
 					<option value="2">5-8 Horas semanales.</option>
 					<option value="3">+8 Horas semanales.</option> 					
 				</select>
 				<p>Plazo</p>
 				<input type="date" name="plazo" id="plazo" style="margin-bottom: 50px"><br><br>
 				<input type="hidden" name="idE" value="<?php echo $id;?>">

 				<button type="submit" class="fill">Enviar</button>
 			</form>
 		</div>
 	</div>
</div>
 </body>
 </html>